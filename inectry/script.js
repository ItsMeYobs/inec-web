function togglePassword() {
    var passwordField = document.getElementById("password");
    var togglePasswordText = document.querySelector(".toggle-password");
    
    if (passwordField.type === "password") {
        passwordField.type = "text";
        togglePasswordText.textContent = "Hide";
    } else {
        passwordField.type = "password";
        togglePasswordText.textContent = "Show";
    }
}

function showAboutUs() {
    document.getElementById("main-content").style.display = "none"; // Hide main content
    document.getElementById("about-us").style.display = "block"; // Show About Us
    document.getElementById("overlay").style.display = "block"; // Show overlay
}

function hideAboutUs() {
    document.getElementById("main-content").style.display = "block"; // Show main content
    document.getElementById("about-us").style.display = "none"; // Hide About Us
    document.getElementById("overlay").style.display = "none"; // Hide overlay
}

function showContactUs() {
    document.getElementById("main-content").style.display = "none"; // Hide main
    document.getElementById("contact-us").style.display = "block"; // Show contact Us content
    document.getElementById("overlay").style.display = "block"; // Show overlay
}
function hideContactUs() {
    document.getElementById("main-content").style.display = "block"; // Show main content
    document.getElementById("contact-us").style.display = "none"; // Hide contact Us
    document.getElementById("overlay").style.display = "none"; // Hide overlay
}