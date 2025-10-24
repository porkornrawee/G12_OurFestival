const form = document.getElementById("registerForm");
const message = document.getElementById("successMessage");

form.addEventListener("submit", function(e) {
    e.preventDefault();
    message.style.display = "block";
    form.reset();
    setTimeout(() => window.location.href = "Homepage.html", 3000);
});

function toggleReadMore() {
            var moreText = document.getElementById("moreText");
            var btnText = document.getElementById("readMoreBtn");

            if (moreText.style.display === "none") {
                moreText.style.display = "inline";
                btnText.innerHTML = "ย่อ";
            } else {
                moreText.style.display = "none";
                btnText.innerHTML = "อ่านเพิ่มเติม";
            }
}