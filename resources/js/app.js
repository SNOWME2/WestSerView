import "./bootstrap";
import "./reservation";
import "./staffs";
import "./orderlist";

import "flowbite";
document.addEventListener("DOMContentLoaded", function () {
  if (
    window.location.pathname === "/login" ||
    window.location.pathname === "/staff/login" ||
    window.location.pathname === "/register"
  ) {
    // Password Peek
    const togglePassword = document.getElementById("togglePassword");
    const passwordField = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");
    const eyeSlashIcon = document.getElementById("eyeSlashIcon");

    if (togglePassword && passwordField && eyeIcon && eyeSlashIcon) {
      togglePassword.addEventListener("click", function () {
        if (passwordField.type === "password") {
          passwordField.type = "text";
          eyeIcon.classList.add("hidden");
          eyeSlashIcon.classList.remove("hidden");
        } else {
          passwordField.type = "password";
          eyeIcon.classList.remove("hidden");
          eyeSlashIcon.classList.add("hidden");
        }
      });
    }
  }
    // Dynamic Menu
    const toggleOpen = document.getElementById("toggleOpen");
    const toggleClose = document.getElementById("toggleClose");
    const collapseMenu = document.getElementById("collapseMenu");

    function handleClick() {
      if (collapseMenu.style.display === "block") {
        collapseMenu.style.display = "none";
      } else {
        collapseMenu.style.display = "block";
      }
    }

    if (toggleOpen && toggleClose) {
      toggleOpen.addEventListener("click", handleClick);
      toggleClose.addEventListener("click", handleClick);
    }
  
  console.log("JavaScript loaded");
  
  if (window.location.pathname === "/frontdesk/reservationlist") {
    const checkinInput = document.getElementById("checkin");
    const checkoutInput = document.getElementById("checkout");

    checkinInput.addEventListener("change", () => {
      const checkinDate = new Date(checkinInput.value);
      // Set the min date for checkout input to be the same or after checkin date
      checkoutInput.setAttribute("min", checkinInput.value);
    });

    // Initialize min date for checkout if checkin date is already set
    if (checkinInput.value) {
      checkoutInput.setAttribute("min", checkinInput.value);
    }
  }

  document.getElementById("select-all").addEventListener("change", function () {
    const checkboxes = document.querySelectorAll('input[name="cart_ids[]"]');
    checkboxes.forEach((checkbox) => (checkbox.checked = this.checked));
  });

  // JavaScript to handle form submission for selected items
  document
    .getElementById("delete-selected-form")
    .addEventListener("submit", function (event) {
      const selectedCheckboxes = document.querySelectorAll(
        'input[name="cart_ids[]"]:checked'
      );
      if (selectedCheckboxes.length === 0) {
        event.preventDefault();
        alert("Please select at least one item to delete.");
      }
    });
  
});
