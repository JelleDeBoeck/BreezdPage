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
  