const hamburger = document.getElementById('hamburger');
const mobileNav = document.getElementById('mobileNav');
const closeNav = document.getElementById('closeNav');

hamburger.addEventListener('click', () => {
mobileNav.classList.add('show');
});

closeNav.addEventListener('click', () => {
mobileNav.classList.remove('show');
});

window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
      mobileNav.classList.remove('show');
    }
  });

  document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById("hamburger");
  const mobileNav = document.getElementById("mobileNav");
  const closeNav = document.getElementById("closeNav");

  // Open mobiel menu
  hamburger.addEventListener("click", function () {
    mobileNav.classList.add("show");
    hamburger.style.display = "none";
  });

  // Sluit mobiel menu
  closeNav.addEventListener("click", function () {
    mobileNav.classList.remove("show");
    hamburger.style.display = "flex";
  });
});
