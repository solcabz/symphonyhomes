document.getElementById('menu-toggle').addEventListener('click', function() {
    document.getElementById('menu').classList.toggle('active');
});

 document.addEventListener("DOMContentLoaded", function () {
  const lazyBgSections = document.querySelectorAll(".lazy-bg");

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const bg = el.getAttribute("data-bg");
        if (bg) {
          el.style.backgroundImage = `url('${bg}')`;
          el.classList.remove("lazy-bg");
          observer.unobserve(el);
        }
      }
    });
  });

  lazyBgSections.forEach(section => observer.observe(section));
});

  const navLinks = document.querySelectorAll('.nav-links a');

  navLinks.forEach(link => {
    link.addEventListener('mouseleave', () => {
      const underline = link.querySelector('::after');
      // Instead of trying to select a pseudo-element directly,
      // we use a trick: trigger a class toggle on the parent to simulate the out animation
      link.classList.add('hide');
      link.querySelector('style')?.remove(); // Clean previous styles

      const style = document.createElement('style');
      style.textContent = `
        .nav-links a.hide::after {
          animation: underline-out 0.4s forwards;
        }
      `;
      document.head.appendChild(style);

      setTimeout(() => {
        link.classList.remove('hide');
      }, 400);
    });
  });