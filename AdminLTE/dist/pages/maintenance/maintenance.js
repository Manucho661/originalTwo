// fetch scheduled schedules.
  fetch('actions/fetch_records.php', { cache: 'no-store' })
  .then(response => response.text()) // read as plain text
  .then(rawText => {
    console.log("🔍 Raw response from PHP:", rawText);

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

maintenanceRequests();
 

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
      <div class="${requests.payment_status}"> ${requests.payment_status}</div>
       </td>
      <td style="vertical-align: middle;">
  <div style="display: flex; flex-direction: column; justify-content: center; height: 100%;">
    <div class="d-flex gap-15px" style="align-items: center;">
      
      <div>
        <button class="btn btn-sm"
          data-building-name="${requests.building_name}"
          data-unit="${requests.unit || ''}"
          data-inspection-id="${requests.id}"
          style="background-color: #00192D; color:#FFC107">
          Pay
        </button>
      </div>

      <div>
        <button class="btn btn-sm view-btn"
          style="background-color: #193042; margin-left:10px; color:#fff;"
          title="View"
          data-id="${requests.id}"
          data-status="${status}">
          <i class="fas fa-eye"></i>
        </button>
      </div>

      <div>
        <button class="btn btn-sm"
          style="background-color: #b02a37; margin-left: 2px; margin-right: 2px; color: #fff;"
          title="Delete">
          <i class="fas fa-trash"></i>
        </button>
      </div>

    </div>
      </div>
    </td>

    `;

   // Add the event listener here AFTER the row is in memory
    const tempDiv = document.createElement('div');
    tempDiv.appendChild(row);
    
//     const inspectBtn = tempDiv.querySelector('.inspect_btn');
//     inspectBtn.addEventListener('click', (e) => {
//       const btn = e.currentTarget;
//       const buildingName = btn.getAttribute('data-building-name');
//       const unit = btn.getAttribute('data-unit');
//       const inspectionId = btn.getAttribute('data-inspection-id');

//       document.getElementById('modal_building_name').textContent = buildingName;
//       document.getElementById('modal_unit').textContent = unit;
//       document.getElementById('modal_inspection_id').value = inspectionId;

//       const prfm_Ins_mdl = document.getElementById('perform_inspection_modal');
//       prfm_Ins_mdl.style.display =  "block";
//     });

//    const viewBtn = tempDiv.querySelector('.view-btn');
//   viewBtn.addEventListener('click', () => {
//     const inspectionId = viewBtn.getAttribute('data-id');

//     // Get the status text from the row
//     const statusSpan = tempDiv.querySelector('td span');
//     const statusText = statusSpan?.textContent?.trim().toLowerCase();

//     const status = viewBtn.getAttribute('data-status');
//     if (status === 'completed') {
//       viewDetails(inspectionId);
//     } else {
//       alert('You can only view details for completed inspections.');
//     }
//   });
    tableBody.appendChild(tempDiv.firstChild); // append the full row
  });
}