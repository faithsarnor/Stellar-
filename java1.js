document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".slide");
    const prevButton = document.getElementById("prev-slide");
    const nextButton = document.getElementById("next-slide");
    let currentIndex = 0;
  
    function showSlide(index) {
      const slidesContainer = document.getElementById("slides");
      const totalSlides = slides.length;
  
      if (index < 0) {
        currentIndex = totalSlides - 1;
      } else if (index >= totalSlides) {
        currentIndex = 0;
      } else {
        currentIndex = index;
      }
  
      slidesContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
  
    prevButton.addEventListener("click", function () {
      showSlide(currentIndex - 1);
    });
  
    nextButton.addEventListener("click", function () {
      showSlide(currentIndex + 1);
    });
  
    showSlide(currentIndex);
  });
  