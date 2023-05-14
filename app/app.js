
// navbar script
const hamburgerMenu = document.getElementById('hamburger-menu');
const mainNavbar = document.getElementById('main-navbar');

let flag = false;

hamburgerMenu.addEventListener('click', function() {
    if (flag){
        mainNavbar.style.left = 'calc(var(--navbar-width) * -1)';
        hamburgerMenu.classList.remove('open');
        flag = false;                
    } else {
        mainNavbar.style.left = 0;
        hamburgerMenu.classList.add('open');
        flag = true;
    }
})

// active menu scrpit
// const navbarItems = document.getElementsByClassName('main-navbar-item');

// for(let i = 0; i < navbarItems.length; i++){
//     navbarItems[i].addEventListener('click', function(){
//         for(let j = 0; j < navbarItems.length; j++){
//             navbarItems[j].classList.remove('active');
//         }
//         navbarItems[i].classList.add('active');
//     })
// }

// function isInViewport(element) {
//     const rect = element.getBoundingClientRect();
//     return (
//         rect.top >= 0 &&
//         rect.left >= 0 &&
//         rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
//         rect.right <= (window.innerWidth || document.documentElement.clientWidth)
//     );
// }

// const viewportWidth = window.innerWidth || document.documentElement.clientWidth;
// const viewportHeight = window.innerHeight || document.documentElement.clientHeight;

// const sections = document.querySelectorAll('section');

// document.addEventListener('scroll', function(){

//     for(let i = 0; i < navbarItems.length; i++){
        
//         const message = isInViewport(sections[i]);
//         if (message){
//             for (let j = 0; j < navbarItems.length; j++){
//                 navbarItems[j].classList.remove('active');
//             }
//             navbarItems[i].classList.add('active');
//         }
//     }
// })

