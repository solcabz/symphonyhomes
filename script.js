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