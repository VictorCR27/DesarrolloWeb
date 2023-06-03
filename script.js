//Cambio de forms
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


//Carrusel
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

flechasCarrusel.forEach((flecha) => {
    flecha.addEventListener('click', (event) => {
        const targetId = event.currentTarget.getAttribute('href');
        const targetIndex = parseInt(targetId.split('-')[1]) - 1;
        currentIndex = targetIndex;
        showCurrentIndex();
    });
});





