document.addEventListener("DOMContentLoaded", function () {
  if (window.location.pathname === "/frontdesk/reservationlist") {
    fetchReservations();
    setInterval(fetchReservations, 10000);
    // Poll every 10 seconds

    // Fetch Reservation List
    function fetchReservations() {
      fetch("/api/reservations")
        .then((response) => response.json())
        .then((data) => {
          displayReservations(data);
        })
        .catch((error) => {
          console.error("Error fetching reservations:", error);
        });
    }
    //Reservation List Views
    function displayReservations(reservations) {
      const container = document.getElementById("reservations-container");
      container.innerHTML = ""; // Clear the container before adding new content

      reservations.forEach((reservation) => {
        const reservationElement = document.createElement("div");
        reservationElement.classList.add(
          "reservation-item",
          "shadow-md",
          "rounded-lg",
          "overflow-hidden",
          "mb-4"
        );
        reservationElement.setAttribute(
          "data-reservation-id",
          reservation.reservation_id
        );

        // Determine the background color based on the status
        let bgColorClass;
        switch (reservation.status) {
          case "Arrived":
            bgColorClass = "bg-green-100"; // Light green background
            break;
          case "Departed":
            bgColorClass = "bg-gray-100"; // Light gray background
            break;
          case "Cancelled":
            bgColorClass = "bg-red-100"; // Light red background
            break;
          default:
            bgColorClass = "bg-white"; // Default white background
            break;
        }

        reservationElement.innerHTML = `
            <div class="p-4 ${bgColorClass}">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-bold text-gray-700">
                        ${
                          reservation.mode_of_reservation === "Online"
                            ? `<p>Mr./Ms. ${reservation.guest_name}</p>
                                  <p>${reservation.guest_contact_or_email}</p>`
                            : `<p>Mr./Ms. ${reservation.guest_name}</p>
                                   <p>${reservation.guest_contact_or_email}</p>`
                        }
                    </span>
                    <span class="text-sm text-gray-500">
                        Room ${reservation.rooms.room_number}
                    </span>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-500">
                        <p class="text-sm">Booking Date</p>
                        <p class="text-sm">
                            ${new Date(
                              reservation.reservation_start_date
                            ).toLocaleString("en-GB", {
                              dateStyle: "short",
                              timeStyle: "short",
                              hour12: true,
                            })}
                        </p>
                    </div>
                    <div class="text-gray-500">
                        <p class="text-sm">End Date</p>
                        <p class="text-sm">
                            ${new Date(
                              reservation.reservation_end_date
                            ).toLocaleString("en-GB", {
                              dateStyle: "short",
                              timeStyle: "short",
                              hour12: true,
                            })}
                        </p>
                    </div>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <div class="text-gray-500">
                        <p class="text-sm">Capacity</p>
                        <p class="text-sm">${reservation.number_of_guest}</p>
                    </div>
                    <div class="text-gray-500">
                        <p class="text-sm">Nights</p>
                        <p class="text-sm">
                            ${Math.ceil(
                              (new Date(reservation.reservation_end_date) -
                                new Date(reservation.reservation_start_date)) /
                                (1000 * 60 * 60 * 24)
                            )}
                        </p>
                    </div>
                </div>
                <div class="text-right">
                    <a href="#" type="button" class="text-blue-500 hover:text-blue-700 text-sm view-details-btn">
                        View Details
                    </a>
                </div>
                <div class="flex justify-end mt-2">
                    <button class="status-btn bg-green-500 text-white px-4 py-2 rounded ml-2" data-status="Arrived">Mark as Arrived</button>
                    <button class="status-btn bg-red-500 text-white px-4 py-2 rounded ml-2" data-status="Cancelled">Cancel</button>
                    <button class="status-btn bg-blue-500 text-white px-4 py-2 rounded ml-2" data-status="Departed">Mark as Departed</button>
                </div>
            </div>
        `;
        container.appendChild(reservationElement);
      });

      attachStatusButtonListeners();
        // attachViewDetailsListeners();
    }
    //Drawer View
    function attachViewDetailsListeners() {
      document.querySelectorAll(".view-details-btn").forEach((button) => {
        button.addEventListener("click", function (e) {
          e.preventDefault();
          const reservationId = this.closest(".reservation-item").getAttribute(
            "data-reservation-id"
          );
          fetchReservation(reservationId);

          const drawer = document.getElementById("drawer-reservation");
          if (drawer) {
            drawer.classList.remove("translate-x-full");
            drawer.classList.add("translate-x-0");
          }
        });
      });
    }
    //Status Button
    function attachStatusButtonListeners() {
      document.querySelectorAll(".status-btn").forEach((button) => {
        button.addEventListener("click", function () {
          const reservationId = this.closest(".reservation-item").getAttribute(
            "data-reservation-id"
          );
          const status = this.getAttribute("data-status");
          updateReservationStatus(reservationId, status);
        });
      });
    }

    //fetch reservation detail
    function fetchReservation(revid) {
      console.log("Fetching details for reservation ID:", revid);

      const loadingElement = document.getElementById("drawer-loading-rev");
      const contentElement = document.getElementById(
        "drawer-reservation-content"
      );

      if (loadingElement) {
        loadingElement.classList.remove("hidden");
      }

      if (contentElement) {
        contentElement.classList.add("hidden");
      }

      fetch(`/api/get-reservation-detail/${revid}`)
        .then((response) => response.json())
        .then((data) => {
          const revID = document.getElementById("reservation-id");
          const reservationDate = document.getElementById("reservation-date");
          const reservationTime = document.getElementById("reservation-time");
          const partySize = document.getElementById("party-size");
          const guestName = document.getElementById("guest-name");
          const guestEmail = document.getElementById("guest-email");
          const guestPhone = document.getElementById("guest-phone");
          const tableNumber = document.getElementById("table-number");
          const tableType = document.getElementById("table-type");
          const status = document.getElementById("status");

          if (revID) {
            revID.textContent = data.rev_id;
          }

          if (reservationDate) {
            reservationDate.textContent = new Date(
              data.reservation_start_date
            ).toLocaleDateString("en-GB");
          }

          if (reservationTime) {
            reservationTime.textContent = new Date(
              data.reservation_start_date
            ).toLocaleTimeString("en-US", {
              hour: "numeric",
              minute: "numeric",
              hour12: true,
            });
          }
          if (partySize) {
            partySize.textContent = data.number_of_guest;
          }

          if (guestName) {
            guestName.textContent = data.guest_name;
          }

          if (guestEmail) {
            guestEmail.textContent = data.guest_email;
          }

          if (tableNumber) {
            tableNumber.textContent = data.room_number;
          }

          if (tableType) {
            tableType.textContent = data.room_type;
          }

          if (status) {
            status.textContent = data.status;
          }

          handleStatusUpdates(revid, data.status);

          if (loadingElement) {
            loadingElement.classList.add("hidden");
          }

          if (contentElement) {
            contentElement.classList.remove("hidden");
          }
        })
        .catch((error) => {
          console.error("Fetch Error:", error);

          if (loadingElement) {
            loadingElement.classList.add("hidden");
          }

          if (contentElement) {
            contentElement.innerHTML = `
            <p class="text-red-500">An error occurred while fetching the reservation details.</p>
          `;
            contentElement.classList.remove("hidden");
          }
        });
    }

    //Update Status update (Cancel, departed, arrived)
    function updateReservationStatus(revid, status) {
      fetch(`/update-reservation-status/${revid}`, {
        method: "PATCH",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
        },
        body: JSON.stringify({ status }),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            fetchReservations(); // Refresh reservations list
            // closeDrawer(); // Close the drawer
            console.log('update successfully');
          } else {
            console.error("Error updating reservation status:", data.message);
          }
        })
        .catch((error) => {
          console.error("Fetch Error:", error);
        });
    }
    //Handle Status update (Cancel, departed, arrived)
    function handleStatusUpdates(revid, currentStatus) {
      const cancelBtn = document.getElementById("cancel-reservation");
      const arrivedBtn = document.getElementById("mark-arrived");
      const departedBtn = document.getElementById("mark-departed");

      // Reset button states
      if (cancelBtn) {
        cancelBtn.classList.toggle(
          "bg-gray-500",
          currentStatus === "Cancelled"
        );
      }
      if (arrivedBtn) {
        arrivedBtn.classList.toggle(
          "bg-green-500",
          currentStatus === "Arrived"
        );
      }
      if (departedBtn) {
        departedBtn.classList.toggle(
          "bg-blue-500",
          currentStatus === "Departed"
        );
      }
    }

    //drawer
    const drawerReservation = document.getElementById("drawer-reservation");

    document.querySelectorAll(".open-drawer-btn").forEach((btn) => {
      btn.addEventListener("click", function () {
        const reservationId = this.getAttribute("data-reservation-id");
        if (reservationId) {
          fetchReservationDetails(reservationId);
          drawerReservation.classList.remove("translate-x-full");
          drawerReservation.classList.add("translate-x-0");
        }
      });
    });

    // Close Drawer
    const closeButton = document.querySelector(
      "#drawer-reservation [data-drawer-hide='drawer-reservation']"
    );
    if (closeButton) {
      closeButton.addEventListener("click", function () {
        drawerReservation.classList.add("translate-x-full");
        drawerReservation.classList.remove("translate-x-0");
      });
    }
  }
});
