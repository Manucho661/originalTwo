// fetch maintanence records.
fetch('actions/fetch_records.php', { cache: 'no-store' })
.then(response => response.text()) // read as plain text
.then(rawText => {
  // console.log("🔍 Raw response from PHP:", rawText);
  try {
    const data = JSON.parse(rawText);
    console.log("✅ Parsed JSON:", data);
    
    if (data.success) {
      populateRequestsTable(data.data);
    } else {
      console.error("⚠️ Backend error:", data.error);
    }
  } catch (e) {
    console.error("❌ JSON parsing error:", e.message);
  }
})
.catch(error => {
  console.error("❌ Network error:", error.message);
});

// populate maintenanceRequests Table
function populateRequestsTable(requests) {
  const tableBody = document.getElementById("maintenanceRequestsTableBody");
  tableBody.innerHTML = ""; // Clear any existing rows
  requests.forEach(requests => {
    const row = document.createElement("tr");

    // ✅ STEP 1: Create statusHTML
    let statusHTML = '';
    const status = (requests.status || '').toLowerCase();

    if (status === 'in progress') {
      statusHTML = `
        <td>
          <span class="status in-progress">
            <i class="fas fa-spinner fa-spin"></i> In Progress
          </span>
        </td>`;
    } else if (status === 'completed') {
      statusHTML = `
        <td>
          <span class="status completed" >
            <i class="fas fa-check-circle"></i> Completed
          </span>
        </td>`;
        
    }
    
    else if (status === 'pending') {
      statusHTML = `
        <td>
          <span class="status completed" >
            <i class="fas fa-check-circle"></i> Pending
          </span>
        </td>`;
    }
    else if (status === 'cancelled') {
      statusHTML = `
        <td>
          <span class="status cancelled" >
            <i class="fas fa-check-circle"></i> Cancelled
          </span>
        </td>`;
    }
    else if (status === 'in_progress') {
      statusHTML = `
        <td>
          <span class="status completed" >
           <i class="fas fa-spinner fa-spin"></i> In Progress
          </span>
        </td>`;
    }
    else if (status === 'incomplete') {
      statusHTML = `
        <td>
          <span class="status incomplete">
            <i class="fas fa-times-circle"></i> Incomplete
          </span>
        </td>`;
    } else {
      statusHTML = `
        <td>
          <span class="status unknown" style="color: gray;">
            <i class="fas fa-question-circle"></i> Unknown
          </span>
        </td>`;
    }
    row.innerHTML = `
      <td>${requests.request_date || ''}</td>
      <td>${requests.id || ''}</td>
      <td>
      <div>${requests.residence}</div>
      <div style="color: green;">${requests.unit}</div>
      </td>
      
      <td>
      <div>${requests.category }</div>
        <div style="color:green; border:none; width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; ">${requests.description }</div>

      </td>
      <td>
      <div>${requests.provider_name|| ''} </div>
      <div class="email" style="width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; ">📧 </i> ${requests.provider_email|| ''} </div>
      </td>
      <td>${requests.priority|| ''} </td>
      ${statusHTML}
      <td>
        <div class="${requests.payment_status}">
          <i class="${requests.payment_status === 'Paid' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle'}"></i>
          ${requests.payment_status}
        </div>
      </td>

      <td style="vertical-align: middle;">
      <div style="display: flex; flex-direction: column; justify-content: center; height: 100%;">
      <div class="d-flex gap-15px" style="align-items: center;">
      <div>
        <button class="btn btn-sm pay-btn d-flex"
          data-building-name="${requests.building_name}"
          data-unit="${requests.unit || ''}"
          data-request-id="${requests.id}"
          style="background-color: #00192D; color:#FFC107"> <i class="fas fa-coins" style="margin-right:3px;"></i>
          Pay
        </button>
      </div>
      <div>
        <button class="btn btn-sm pay-btn"
          style="background-color: #193042; margin-left:10px; color:#fff;"
          title="View"
          data-id="${requests.id}"
          data-status="${status}">
          <i class="fas fa-eye"></i>
        </button>
      </div>
      <div class="dropdown">
            <button class="btn btn-sm more-btn d-flex" data-bs-toggle="dropdown" aria-expanded="false">⋮</button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" style="color: #FFA000 !important;"> <i class="fas fa-tasks"></i> Assign Provider</a></li>
              <li><a class="dropdown-item" href="#" style="color: #FFA000 !important;"> <i class="fas fa-tasks"></i> Mark Complete</a></li>
              <li><a class="dropdown-item" href="#" style="color: #FFA000 !important;" ><i class="fas fa-eye"></i> View Payment</a></li>
              <li><a class="dropdown-item" href="#" style="color: #F87171 !important;"  ><i class="fas fa-trash"></i>     Delete Request</a></li>
            </ul>
          </div>
    </div>
      </div>
    </td>
    `;
   // Add the event listener here AFTER the row is in memory
     const tempDiv = document.createElement('div');
     tempDiv.appendChild(row);
      const payBtn = tempDiv.querySelector('.pay-btn');
      payBtn.addEventListener('click', (e) => {
      const btn = e.currentTarget;
      // const buildingName = btn.getAttribute('data-building-name');
      //  const unit = btn.getAttribute('data-unit');
      const requestId = btn.getAttribute('data-request-id');

      // document.getElementById('modal_building_name').textContent = buildingName;
      // document.getElementById('modal_unit').textContent = unit;
      document.getElementById('modal_request_id').value = requestId;
      const modal = new bootstrap.Modal(document.getElementById('recordPaymentModal'));
      modal.show();
      });
    tableBody.appendChild(tempDiv.firstChild); // append the full row
  });
  
// add dataTable
  const table = $('#requests-table').DataTable({
        dom: 'Brtip',
        order: [],
        buttons: [
          {
            extend: 'excelHtml5',
            text: 'Excel',
            exportOptions: { columns: ':not(:last-child)' }
          },
          {
            extend: 'pdfHtml5',
            text: 'PDF',
            exportOptions: { columns: ':not(:last-child)' },
            customize: function (doc) {
              doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
              doc.styles.tableHeader.alignment = 'center';
              doc.styles.tableBodyEven.alignment = 'center';
              doc.styles.tableBodyOdd.alignment = 'center';

              const body = doc.content[1].table.body;
              for (let i = 1; i < body.length; i++) {
                if (body[i][4]) body[i][4].color = 'blue';
              }
            }
          }
        ]
      });

      table.buttons().container().appendTo('#custom-buttons');

      $('#searchInput').on('keyup', function () {
        table.search(this.value).draw();
      });
}

// Add a payment
function addRequestPayment(event){
  event.preventDefault(); // Prevent the form from submitting immediately
  const form = document.getElementById("recordPaymentForm");
  const formData = new FormData(form);

  // 🔍 Log actual contents of the FormData
   for (let [key, value] of formData.entries()) {
     console.log(`${key}: ${value}`);
   }
     fetch("actions/add_records.php", {
            method: "POST",
            body: formData
          })
          .then(res => res.text())
          .then(data => {
            alert(data); // Display success message or error from server
            location.reload(); // Reload the page to reflect changes (optional)
          })
          .catch(err => console.error(err));
};
