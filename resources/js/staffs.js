document.addEventListener("DOMContentLoaded", function () {
  if (window.location.pathname === "/frontdesk/stafflist") {
    fetchStaffs();
    setInterval(fetchStaffs, 5000);
    function fetchStaffs() {
      fetch("/api/stafflist")
        .then((response) => response.json())
        .then((data) => {
          displayStaffs(data);
        })
        .catch((error) => {
          console.error("Error fetching reservations:", error);
        });
    }

    function displayStaffs(staffs) {
      const staffContent = document.getElementById("staff-content");
      staffContent.innerHTML = ""; // Clear the current content

      staffs.forEach((staff) => {
        let bgColorClass;
        switch (staff.status) {
          case "Online":
            bgColorClass = "bg-green-100"; // Light green background
            break;

          case "Offline":
            bgColorClass = "bg-red-100"; // Light red background
            break;
        }

        // Create a new row for each staff member
        const row = document.createElement("tr");
        row.classList.add("hover:bg-gray-100");

        row.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/150?img=${staff.id}" alt="">
                    </div>
                    <div class="ml-6">
                        <div class="text-sm font-medium text-gray-900">${staff.name}</div>
                        <div class="text-sm text-gray-500">${staff.email}</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${bgColorClass} text-green-800">
                   ${staff.status}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${staff.role}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${staff.email}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <a href="#" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
            </td>
        `;

        // Append the new row to the table body
        staffContent.appendChild(row);
      });
    }
  }
});
