const form = document.getElementById("registerForm");
const message = document.getElementById("successMessage");

if (form) {
    form.addEventListener("submit", function(e) {
        e.preventDefault();
        message.style.display = "block";
        form.reset();
        setTimeout(() => window.location.href = "Homepage.html", 3000);
    });
}

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
const ratingLabels = document.querySelectorAll('.rating label');
ratingLabels.forEach(label => {
      label.addEventListener('click', () => {
        ratingLabels.forEach(l => l.classList.remove('active'));
        label.classList.add('active');
      });
});

const hamburgerToggle = document.getElementById("hamburgerToggle");
const mainNav = document.getElementById("mainNav");

hamburgerToggle.addEventListener("click", function() {
    hamburgerToggle.classList.toggle("is-active");
    mainNav.classList.toggle("nav-open");

    const isExpanded = hamburgerToggle.getAttribute("aria-expanded") === "true";
    hamburgerToggle.setAttribute("aria-expanded", !isExpanded);
});

document.addEventListener('click', function(event) {
    const isClickInsideNav = mainNav.contains(event.target);
    const isClickOnToggle = hamburgerToggle.contains(event.target);

    if (!isClickInsideNav && !isClickOnToggle) {
        if (mainNav.classList.contains('nav-open')) {
            mainNav.classList.remove('nav-open');
            hamburgerToggle.classList.remove('is-active');
            hamburgerToggle.setAttribute('aria-expanded', 'false');
        }
    }
});