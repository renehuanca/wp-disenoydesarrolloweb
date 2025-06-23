// Toggle menu mobile

const menuToggle = document.getElementById('menu-toggle');
const content = document.getElementsByTagName('main')[0];
const menu = document.getElementById('menu');
const closeMenuButton = document.getElementById('close-menu-button');

menuToggle.addEventListener('click', () => {
  menu.classList.add('translate-in');
  menu.classList.remove('translate-end');
});

content.addEventListener('click', () => {
  if (menu.classList.contains('translate-in')) {
    menu.classList.remove('translate-in');
    menu.classList.add('translate-end');
  }
});

document.querySelectorAll('#menu a').forEach(link => {
  link.addEventListener('click', () => {
    menu.classList.remove('translate-in');
    menu.classList.add('translate-end');
  });
});

closeMenuButton.addEventListener('click', () => {
  if (menu.classList.contains('translate-in')) {
    menu.classList.remove('translate-in');
    menu.classList.add('translate-end');
  }
})

// Submenu mobile

const toggleBtn = document.getElementById('toggle-servicios');
const submenu = document.getElementById('submenu-servicios');

toggleBtn.addEventListener('click', () => {
  submenu.classList.toggle('abierto');
});
const header = document.getElementById('header');

function updateHeader() {
  if (window.scrollY > 0) {
    header.style.backgroundColor = 'rgba(0, 0, 0, 0.9)';
    header.style.webkitBackdropFilter = 'blur(8px)';
    header.style.backdropFilter = 'blur(8px)';
    header.style.transition = 'all 0.3s ease-in-out';
    header.style.height = '70px'
  } else {
    header.style.backgroundColor = 'transparent';
    header.style.webkitBackdropFilter = 'none';
    header.style.backdropFilter = 'none';
    header.style.transition = 'all 0.3s ease-in-out';
    header.style.height = '100px'
  }
}

window.addEventListener('scroll', updateHeader);
window.addEventListener('DOMContentLoaded', updateHeader);


// hero slide

const frases = document.querySelectorAll('.frase-item');
let current = 0;

setInterval(() => {
  frases[current].classList.remove('active');
  current = (current + 1) % frases.length;
  frases[current].classList.add('active');
}, 4000);



// services typing text effect
const phrases = ["DISEÑO", "DESARROLLO"];
const el = document.querySelector(".writing-text");

let phraseIndex = 0;
let charIndex = 0;
let typing = true;

function type() {
  const currentPhrase = phrases[phraseIndex];

  if (typing) {
    el.textContent = currentPhrase.slice(0, charIndex++);
    if (charIndex > currentPhrase.length) {
      typing = false;
      setTimeout(type, 1500); // Pausa antes de borrar
      return;
    }
  } else {
    el.textContent = currentPhrase.slice(0, --charIndex);
    if (charIndex === 0) {
      typing = true;
      phraseIndex = (phraseIndex + 1) % phrases.length;
    }
  }

  setTimeout(type, typing ? 100 : 50); // Velocidad de escritura/borrado
}

// Esperar al cargar el DOM
window.addEventListener("DOMContentLoaded", type);

// Show or hide scroll to top button
const scrollToTopButton = document.getElementById('scroll-to-top');

window.addEventListener('scroll', () => {
  if (window.scrollY > 500) {
    scrollToTopButton.classList.remove('d-none');
  } else {
    scrollToTopButton.classList.add('d-none');
  }
});


