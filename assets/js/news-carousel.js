//  const track = document.querySelector('.carousel-track');
//   const prevBtn = document.querySelector('.carousel-btn.prev');
//   const nextBtn = document.querySelector('.carousel-btn.next');
//   const originalSlides = Array.from(track.children);
//   const itemGap = 24;

//   // Clone first and last
//   const firstClone = originalSlides[0].cloneNode(true);
//   const lastClone = originalSlides[originalSlides.length - 1].cloneNode(true);

//   track.appendChild(firstClone);
//   track.insertBefore(lastClone, originalSlides[0]);

//   const slides = Array.from(track.children);
//   let index = 1;
//   let isTransitioning = false;

//   function getItemWidth() {
//     return slides[0].offsetWidth + itemGap;
//   }

//   function updatePosition() {
//     track.style.transition = 'none';
//     track.style.transform = `translateX(-${getItemWidth() * index}px)`;
//   }

//   function slideTo(newIndex) {
//     if (isTransitioning) return;
//     isTransitioning = true;
//     track.style.transition = 'transform 0.5s ease';
//     track.style.transform = `translateX(-${getItemWidth() * newIndex}px)`;
//     index = newIndex;
//   }

//   nextBtn.addEventListener('click', () => {
//     if (isTransitioning) return;
//     slideTo(index + 1);
//   });

//   prevBtn.addEventListener('click', () => {
//     if (isTransitioning) return;
//     slideTo(index - 1);
//   });

//   track.addEventListener('transitionend', () => {
//     const total = slides.length;
//     if (index === 0) {
//       // Jump from clone of last → real last
//       index = total - 2;
//       updatePosition();
//     } else if (index === total - 1) {
//       // Jump from clone of first → real first
//       index = 1;
//       updatePosition();
//     }
//     isTransitioning = false;
//   });

//   // Handle resize
//   window.addEventListener('resize', updatePosition);

//   // Init
//   window.addEventListener('load', () => {
//     updatePosition();
//   });


document.addEventListener("DOMContentLoaded", function() {
  const slides = document.querySelector(".carousel-slides");
  const dots = document.querySelectorAll(".control-dot");
  let currentSlide = 0;
  const totalSlides = dots.length;
  const slideInterval = 3000;

  // Dynamically set width of slides container based on number of slides
  if(slides) {
    slides.style.width = `${totalSlides * 100}%`;
  }

  function goToSlide(index) {
    currentSlide = index;
    slides.style.transform = `translateX(-${index * 100}%)`;
    dots.forEach(dot => dot.classList.remove("active"));
    dots[index].classList.add("active");
  }

  // Initialize first slide
  if(totalSlides > 0) {
    goToSlide(0);
  }

  dots.forEach(dot => {
    dot.addEventListener("click", () => {
      const index = parseInt(dot.dataset.index);
      goToSlide(index);
    });
  });

  // Auto slide
  let autoSlideTimer = setInterval(() => {
    const nextSlide = (currentSlide + 1) % totalSlides;
    goToSlide(nextSlide);
  }, slideInterval);

  function resetAutoSlide() {
    clearInterval(autoSlideTimer);
    autoSlideTimer = setInterval(() => {
      const nextSlide = (currentSlide + 1) % totalSlides;
      goToSlide(nextSlide);
    }, slideInterval);
  }
});