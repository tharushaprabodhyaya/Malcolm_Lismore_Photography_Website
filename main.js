// JavaScript for slider navigation
const btns = document.querySelectorAll('.nav-btn');
const slides = document.querySelectorAll('.video-slide');
let currentSlide = 0;

const sliderNav = function(manual) {
btns.forEach((btn) => {
  btn.classList.remove('active');
});

slides.forEach((slide) => {
  slide.classList.remove('active');
});

btns[manual].classList.add('active');
slides[manual].classList.add('active');
};

btns.forEach((btn, i) => {
  btn.addEventListener("click", () => {
    sliderNav(i);
    currentSlide = i; // Update currentSlide when manually navigating
  });
});

// Automatic slideshow
const autoSlide = () => {
  currentSlide = (currentSlide + 1) % slides.length; // Loop back to the first slide
  sliderNav(currentSlide);
};

// Set interval for automatic slide change (e.g., every 5 seconds)
setInterval(autoSlide, 7000);

const modal = document.getElementById('inquiryModal');
const closeBtn = document.querySelector('.close');
const sessionTypeDropdown = document.getElementById('sessionTypeDropdown');
const sessionPrice = document.getElementById('sessionPrice'); // Price div to display the price

const packages = {
  "Wedding": ["Wedding Basic - $2000", "Wedding Standard - $4000", "Wedding Premium - $7000+"],
  "Pre-Shoot": ["Pre-Shoot Basic - $500", "Pre-Shoot Standard - $1500", "Pre-Shoot Premium - $2500"],
  "Portrait": ["Portrait Basic - $700", "Portrait Standard - $1500", "Portrait Premium - $3000+"],
  "Event": ["Event Basic - $1000", "Event Standard - $2500", "Event Premium - $5000+"]
};

// Open modal on button click
document.querySelectorAll('.inquiry-btn').forEach(button => {
  button.addEventListener('click', () => {
    const category = button.getAttribute('data-category');
    updateDropdown(category);
    modal.style.display = 'block';
  });
});

// Close modal
closeBtn.onclick = function() {
  modal.style.display = "none";
};

// Close modal when clicking outside
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

// Populate dropdown based on selected category
function updateDropdown(category) {
  sessionTypeDropdown.innerHTML = "";
  packages[category].forEach(plan => {
    const option = document.createElement('option');
    option.value = plan;
    option.textContent = plan;
    sessionTypeDropdown.appendChild(option);
  });

  // Reset the price display when the dropdown is updated
  sessionPrice.textContent = "Select a session type to see the price";
}

// Update the price dynamically when a session type is selected
sessionTypeDropdown.addEventListener('change', () => {
  const selectedOption = sessionTypeDropdown.options[sessionTypeDropdown.selectedIndex];
  const price = selectedOption.value.split(" - ")[1]; // Extract the price from the option text
  sessionPrice.textContent = price ? price : "Select a session type to see the price";
});

document.querySelectorAll('input[name="photoes"]').forEach(radio => {
  radio.addEventListener('change', () => {
    const category = radio.id.replace('check', '').toLowerCase();
    document.querySelectorAll('.photo').forEach(photo => {
      // Show all photos if "All Photos" is selected
      if (category === '1') {
        photo.style.display = 'block';
      } else {
        // Show photos matching the selected category, hide others
        photo.style.display = photo.classList.contains(category) ? 'block' : 'none';
      }
    });
  });
});