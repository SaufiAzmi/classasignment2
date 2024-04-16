function validateForm() {
    var name = document.forms["studentForm"]["name"].value;
    var matricNo = document.forms["studentForm"]["matricNo"].value;
    var currentAddress = document.forms["studentForm"]["currentAddress"].value;
    var homeAddress = document.forms["studentForm"]["homeAddress"].value;
    var email = document.forms["studentForm"]["email"].value;
    var mobilePhone = document.forms["studentForm"]["mobilePhone"].value;
    var homePhone = document.forms["studentForm"]["homePhone"].value;

    // Regular expressions for validation
    var nameRegex = /^[a-zA-Z\s]+$/;
    var matricNoRegex = /^[0-9]{7}$/;
    var addressRegex = /^[a-zA-Z0-9\s,'-]*$/;
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var phoneRegex = /^[0-9]{3}-[0-9]{8}$/;

    // Validate name
    if (!name.match(nameRegex)) {
        alert("Please enter a valid name.");
        return false;
    }

    // Validate matric number
    if (!matricNo.match(matricNoRegex)) {
        alert("Please enter a valid matric number (7 digits).");
        return false;
    }

    // Validate current address
    if (!currentAddress.match(addressRegex)) {
        alert("Please enter a valid current address.");
        return false;
    }

    // Validate home address
    if (!homeAddress.match(addressRegex)) {
        alert("Please enter a valid home address.");
        return false;
    }

    // Validate email
    if (!email.match(emailRegex)) {
        alert("Please enter a valid email address.");
        return false;
    }
x
    // Validate mobile phone number
    if (!mobilePhone.match(phoneRegex)) {
        alert("Please enter a valid mobile phone number (e.g. 123-45678901).");
        return false;
    }

    // Validate home phone number
    if (!homePhone.match(phoneRegex)) {
        alert("Please enter a valid home phone number (e.g. 123-45678901).");
        return false;
    }

    // Form is valid
    return true;
}