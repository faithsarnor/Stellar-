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


document.addEventListener("DOMContentLoaded", function () {
  // Selectors
  const searchIconTrigger = document.querySelector(".fa-search");
  const searchContainer = document.getElementById("search-container");
  const searchInput = document.getElementById("search-input");
  const searchResults = document.getElementById("search-results");
  const searchCloseIcon = document.getElementById("search-close-icon");

  // Product List (Example Data)
  const products = [
    { name: "Cerave Hydrating Cleanser", url: "product1.html" },
    { name: "Cerave Moisturizing Cream", url: "product2.html" },
    { name: "La Roche-Posay Anthelios Sunscreen", url: "product3.html" },
    { name: "Another Product", url: "product4.html" },
  ];

  // Function to Display Search Results
  function displaySearchResults(filteredProducts, searchTerm = "") {
    searchResults.innerHTML = ""; // Clear previous results

    if (searchTerm.length > 0) {
      if (filteredProducts.length > 0) {
        filteredProducts.forEach(product => {
          const link = document.createElement("a");
          link.href = product.url;
          link.textContent = product.name;
          searchResults.appendChild(link);
        });
      } else {
        const noResults = document.createElement("p");
        noResults.textContent = "No products found.";
        searchResults.appendChild(noResults);
      }
      searchResults.style.display = "block"; // Ensure results are visible
    } else {
      searchResults.style.display = "none"; // Hide results when empty
    }
  }

  // Show Search Bar on Icon Click
  searchIconTrigger.addEventListener("click", function (event) {
    event.preventDefault();
    searchContainer.classList.toggle("active"); // Toggle visibility
    searchInput.focus();
  });

  // Handle Input Search
  searchInput.addEventListener("keyup", function () {
    const searchTerm = searchInput.value.toLowerCase();
    const filteredProducts = products.filter(product =>
      product.name.toLowerCase().includes(searchTerm)
    );
    displaySearchResults(filteredProducts, searchTerm);
  });

  // Close Search Bar
  searchCloseIcon.addEventListener("click", function () {
    searchContainer.classList.remove("active");
    searchInput.value = "";
    searchResults.style.display = "none";
  });
});

document.addEventListener("DOMContentLoaded", function () {
  function showPopup(message) {
      let popup = document.getElementById("discount-popup");
      let popupMessage = document.getElementById("popup-message");

      if (popup && popupMessage) {
          popupMessage.textContent = message;
          popup.style.display = "block";
      }
  }

  // Close button functionality
  document.querySelector(".close-popup").addEventListener("click", function () {
      document.getElementById("discount-popup").style.display = "none";
  });

  // Expose the function globally
  window.showPopup = showPopup;

  const slides = document.querySelectorAll(".slide");
      slides.forEach(slide => {
          slide.addEventListener("click", function() {
              const message = this.dataset.message;
              if (message) {
                  showPopup(message);
              }
          });
      });
});