document.addEventListener("DOMContentLoaded", function () {
 if(window.location.pathname === "/order_list"){
 
  fetchOrderList();
  setInterval(fetchOrderList, 10000);

  function fetchOrderList() {
    fetch("/api/orderlist")
      .then((response) => response.json())
      .then((data) => {
        displayOrders(data);
      })
      .catch((error) => {
        console.error("Error fetching reservations:", error);
      });
  }

  function displayOrders(orders) {
    const ordersContent = document.getElementById("orderslist-content");
    ordersContent.innerHTML = ""; // Clear the current content

    orders.forEach((order) => {
      let bgColorClass;
      switch (order.status) {
        case "Confirmed":
          bgColorClass = "bg-green-100"; // Light green background
          break;

        case "Cancelled":
          bgColorClass = "bg-red-100"; // Light red background
          break;

        case "Completed":
          bgColorClass = "bg-blue-100"; // Light blue background
          break;

        case "Pending":
          bgColorClass = "bg-yellow-100"; // Light yellow background
          break;

        default:
          bgColorClass = ""; // No background color if status is unknown
          break;
      }

      // Create a new row for each order
      const row = document.createElement("tr");
      row.classList.add("hover:bg-gray-100");

      row.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/150?img=${
                          order.cart_id
                        }" alt="">
                    </div>
                    <div class="ml-6">
                        <div class="text-sm font-medium text-gray-900">${
                          order.fob?.product_name ?? "Product Name N/A"
                        }</div>
                        <div class="text-sm text-gray-500">${
                          order.reservation?.guest_name ?? "Guest Name N/A"
                        }</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${bgColorClass} text-green-800">
                   ${order.status ?? "N/A"}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${
              order.quantity ?? "N/A"
            }</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">P${
              order.total ?? "N/A"
            }</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <a href="#" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
            </td>
        `;

      // Append the new row to the orders table body
      ordersContent.appendChild(row);
    });
  }
 }



 
});
  