document.addEventListener("DOMContentLoaded", function () {
  // --- SLIDESHOW ---
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

  if (prevButton && nextButton) {
    prevButton.addEventListener("click", function () {
      showSlide(currentIndex - 1);
    });

    nextButton.addEventListener("click", function () {
      showSlide(currentIndex + 1);
    });
  }

  showSlide(currentIndex);

  // --- SEARCH ---
  const searchIconTrigger = document.getElementById("search-icon");
  const searchContainer = document.getElementById("search-container");
  const searchInput = document.getElementById("search-input");
  const searchResults = document.getElementById("search-results");
  const searchCloseIcon = document.getElementById("search-close-icon");

  // Dynamically Populate Products for Search (using JavaScript and product data)
  // Ensure that the products variable is populated.  This is crucial!
  // Assuming products data is available in the global scope (from PHP)

  // ---  Important:  Check if 'products' variable is available
  if (typeof products === 'undefined' || !Array.isArray(products)) {
      console.error("Product data not loaded.  Check your PHP code and database connection.");
      // Optionally, disable the search or display an error message.
      if (searchIconTrigger) {
          searchIconTrigger.style.display = 'none';  // Hide the search icon
      }
      // return;  // Stop further search functionality if no data
  }

  function displaySearchResults(filteredProducts, searchTerm = "") {
    searchResults.innerHTML = "";
    if (searchTerm.length > 0) {
      if (filteredProducts.length > 0) {
        filteredProducts.forEach(product => {
          const link = document.createElement("a");
          link.textContent = product.name;
          link.addEventListener('click', function(event) {
              event.preventDefault(); // Prevent default link behavior
              const productElement = document.getElementById('product-' + product.product_id);
              if (productElement) {
                  // Add the highlight class
                  productElement.classList.add('highlighted');

                  // Scroll to the product
                  productElement.scrollIntoView({ behavior: 'smooth', block: 'start' });

                  // Remove the highlight class after a delay (e.g., 2 seconds)
                  setTimeout(function() {
                      productElement.classList.remove('highlighted');
                  }, 5000); // 2000 milliseconds = 2 seconds

                  searchContainer.classList.remove('active'); // Close search bar
              }
          });
          searchResults.appendChild(link);
        });
      } else {
        const noResults = document.createElement("p");
        noResults.textContent = "No products found.";
        searchResults.appendChild(noResults);
      }
      searchResults.style.display = "block";
    } else {
      searchResults.style.display = "none";
    }
  }

  if (searchIconTrigger) {
    searchIconTrigger.addEventListener("click", function (event) {
      event.preventDefault();
      searchContainer.classList.toggle("active");
      searchInput.focus();
    });
  }

  if (searchInput) {
    searchInput.addEventListener("keyup", function () {
      const searchTerm = searchInput.value.toLowerCase();

      // Use the products array from PHP (table_products)
      const filteredProducts = products.filter(product =>
          product.name.toLowerCase().includes(searchTerm)
      );
      displaySearchResults(filteredProducts, searchTerm);
    });
  }

  if (searchCloseIcon) {
    searchCloseIcon.addEventListener("click", function () {
      searchContainer.classList.remove("active");
      searchInput.value = "";
      searchResults.style.display = "none";
    });
  }

  // --- POPUP ---
  function showPopup(message) {
    let popup = document.getElementById("discount-popup");
    let popupMessage = document.getElementById("popup-message");

    if (popup && popupMessage) {
      popupMessage.textContent = message;
      popup.style.display = "block";
    }
  }

  window.showPopup = showPopup; // make accessible in HTML inline onclick

  const closePopupBtn = document.querySelector(".close-popup");
  if (closePopupBtn) {
    closePopupBtn.addEventListener("click", function () {
      document.getElementById("discount-popup").style.display = "none";
    });
  }

  slides.forEach(slide => {
    slide.addEventListener("click", function () {
      const message = this.dataset.message || "Get 30% off today with the code SAVE30 at checkout! Plus, receive a free 4-piece gift when you shop on first time of Stellar.com. This offer cannot be exchanged for cash or used as credit toward other products and is subject to change without notice. It cannot be combined with any other offers, and free items are eligible for returns or exchanges. Don’t miss out! Keep an eye on our site for 30% off every 3 weeks and other exclusive promotions coming your way!";
      showPopup(message);
    });
  });
});