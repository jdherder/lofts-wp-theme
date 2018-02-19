const body = document.querySelector('body');
const nav = document.querySelector('nav');
const navToggle = nav.querySelector('.main-navigation__mobile-toggle');
const navContainer = nav.querySelector('.main-navigation__container');

let navOpen = false;

navToggle.addEventListener('click', ()=> {
  if (!navOpen) {
    navContainer.classList.add('open');
    navToggle.classList.add('is-active');
    body.classList.add('scroll-lock');
  } else {
    navContainer.classList.remove('open');
    navToggle.classList.remove('is-active');
    body.classList.remove('scroll-lock');
  }

  navOpen = !navOpen;
});