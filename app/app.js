
// navbar script
const hamburgerMenu = document.getElementById('hamburger-menu');
const mainNavbar = document.getElementById('main-navbar');
const navbarItems = document.getElementsByClassName('main-navbar-item');

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

// for(let i = 0; i < navbarItems.length; i++){
//     navbarItems[i].addEventListener('click', function(){
//         for(let j = 0; j < navbarItems.length; j++){
//             navbarItems[j].classList.remove('active');
//         }
//         navbarItems[i].classList.add('active');

//         //al click chiudo la navbar
//         mainNavbar.style.left = 'calc(var(--navbar-width) * -1)';
//         hamburgerMenu.classList.remove('open');
//         flag = false; 

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

// ! Closing email response popup

const closeResponse = document.getElementsByClassName('fa-xmark');
const response = document.getElementsByClassName('response');

closeResponse[0].addEventListener('click', async function() {
    response[0].style.opacity = '0';
    
    // it waits for animation to complete, then it hides popup
    await new Promise(resolve => setTimeout(resolve, 300));
    response[0].style.visibility = 'hidden';
})