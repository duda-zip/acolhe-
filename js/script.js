document.addEventListener("DOMContentLoaded", function () {
  const openMenu = document.getElementById("openMenu");
  const closeMenu = document.getElementById("closeMenu");
  const sideMenu = document.getElementById("sideMenu");

  openMenu.addEventListener("click", function () {
    sideMenu.classList.add("active");
  });

  closeMenu.addEventListener("click", function () {
    sideMenu.classList.remove("active");
  });
});

let ticking = false;

function getCurrentSection(sections) {
  const offset = window.innerHeight / 2;
  let closestIndex = 0;
  let minDistance = Infinity;

  sections.forEach((section, index) => {
    const rect = section.getBoundingClientRect();
    const sectionTop = rect.top;
    const distance = Math.abs(sectionTop - offset);

    if (distance < minDistance) {
      minDistance = distance;
      closestIndex = index;
    }
  });

  return closestIndex;
}

window.addEventListener('wheel', function (e) {
  e.preventDefault();
  if (ticking) return;

  ticking = true;

  const direction = e.deltaY > 0 ? 1 : -1;
  const sections = [...document.querySelectorAll('section, .hero')];
  const currentIndex = getCurrentSection(sections);
  const nextIndex = Math.min(Math.max(currentIndex + direction, 0), sections.length - 1);

  sections[nextIndex].scrollIntoView({ behavior: 'smooth' });

  setTimeout(() => {
    ticking = false;
  }, 300);
}, { passive: false });
