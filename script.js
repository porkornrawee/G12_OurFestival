const form = document.getElementById("registerForm");
const message = document.getElementById("successMessage");

form.addEventListener("submit", function(e) {
    e.preventDefault();
    message.style.display = "block";
    form.reset();
    setTimeout(() => window.location.href = "BoothDirectoryPage.html", 3000);
});