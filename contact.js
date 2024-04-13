document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector(".contact-form");

  form.addEventListener("submit", function (event) {
    var name = form.querySelector('input[name="your-name"]').value.trim();
    var email = form.querySelector('input[name="your-email"]').value.trim();
    var phone = form.querySelector('input[name="tel-893"]').value.trim();
    var service = form.querySelector('select[name="your-select"]').value.trim();
    var message = form
      .querySelector('textarea[name="your-message"]')
      .value.trim();

    var isValid = true;
    var phoneRegex = /^[0-9]{10}$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (name === "") {
      alert("Please enter your name.");
      isValid = false;
    }

    if (email === "") {
      alert("Please enter your email address.");
      isValid = false;
    } else if (!emailRegex.test(email)) {
      alert("Please enter a valid email address.");
      isValid = false;
    }

    if (phone === "") {
      alert("Please enter your phone number.");
      isValid = false;
    } else if (!phoneRegex.test(phone)) {
      alert("Please enter a valid 10-digit phone number.");
      isValid = false;
    }

    if (service === "Select Service") {
      alert("Please select a service.");
      isValid = false;
    }

    if (message === "") {
      alert("Please enter your message.");
      isValid = false;
    } else if (message.length < 10) {
      alert("Please enter a message of at least 10 characters.");
      isValid = false;
    }

    if (!isValid) {
      event.preventDefault();
    }
  });
});
