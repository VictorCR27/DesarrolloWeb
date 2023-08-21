//-----------------------------------------------------------------------Cambio de forms
const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

registerLink.addEventListener('click', ()=> {
  wrapper.classList.add('active');
});

loginLink.addEventListener('click', ()=> {
  wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', () =>{
  wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click', () =>{
  wrapper.classList.remove('active-popup');
}); 


//-----------------------------------------------------------------------Carrusel
const carruselItems = document.querySelectorAll('.itemCarrusel');
const flechasCarrusel = document.querySelectorAll('.flechasCarrusel');

let currentIndex = 0;
const waitTime = 10000;

function nextIndex() {
    currentIndex = (currentIndex + 1) % carruselItems.length;
    showCurrentIndex();
}

function prevIndex() {
    currentIndex = (currentIndex - 1 + carruselItems.length) % carruselItems.length;
    showCurrentIndex();
}

function showCurrentIndex() {
    carruselItems.forEach((item, index) => {
        item.style.display = index === currentIndex ? 'block' : 'none';
    });
}

showCurrentIndex();

setInterval(nextIndex, waitTime);

//-----------------------------------------------------------------------Función para botones de roles
function toggleButton(button) {
  // Remover la clase "active" de todos los botones
  var buttons = document.getElementsByClassName("role-button");
  for (var i = 0; i < buttons.length; i++) {
      buttons[i].classList.remove("active");
  }
  
  // Agregar la clase "active" al botón seleccionado
  button.classList.add("active");
  
  // Actualizar el valor del input oculto "selectedRole"
  var selectedRoleInput = document.getElementById("selected-role");
  selectedRoleInput.value = button.value;
}

//-----------------------------------------------------------------------Carrusel de reviews

function modulo(number, mod) {
  let result = number % mod;
  if (result < 0) {
    result += mod;
  }
  return result;
}

function setUpCarousel(carousel) {
  function handleNext() {
    currentSlide = modulo(currentSlide + 1, numSlides);
    changeSlide(currentSlide);
  }

  function handlePrevious() {
    currentSlide = modulo(currentSlide - 1, numSlides);
    changeSlide(currentSlide);
  }

  function changeSlide(slideNumber) {
    carousel.style.setProperty('--current-slide', slideNumber);
  }

  // get elements
  const buttonPrevious = carousel.querySelector('[data-carousel-button-previous]');
  const buttonNext = carousel.querySelector('[data-carousel-button-next]');
  const slidesContainer = carousel.querySelector('[data-carousel-slides-container]');

  // carousel state we need to remember
  let currentSlide = 0;
  const numSlides = slidesContainer.children.length;

  // set up events
  buttonPrevious.addEventListener('click', handlePrevious);
  buttonNext.addEventListener('click', handleNext);
}

const carousels = document.querySelectorAll('[data-carousel]');
carousels.forEach(setUpCarousel);
