// ! navbar open and close
const hamburgerMenu = document.getElementById('hamburger-menu');
const topNavbar = document.getElementById('top-navbar');

let flag = false;

hamburgerMenu.addEventListener('click', function() {
    if (flag){
        topNavbar.style.left = 'calc(var(--navbar-width) * -1)';
        hamburgerMenu.classList.remove('open');
        flag = false;                
    } else {
        topNavbar.style.left = 0;
        hamburgerMenu.classList.add('open');
        flag = true;
    }
})

// ! Closing email response popup
const closeResponse = document.getElementsByClassName('fa-xmark');
const response = document.getElementsByClassName('response');

if (closeResponse[0] != null){

    closeResponse[0].addEventListener('click', async function() {
        response[0].style.opacity = '0';
        
        // it waits for animation to complete, then it hides popup
        await new Promise(resolve => setTimeout(resolve, 300));
        response[0].style.visibility = 'hidden';
    })
}
    
// ! Button is greyed out if checkbox is not checked
const normativeCheckbox = document.getElementById('norm-cb');
const formButton = document.getElementById('formButton');

normativeCheckbox.addEventListener('click', () => {
    if(normativeCheckbox.checked){
        formButton.classList.remove('unclickable');
    } else {
        formButton.classList.add('unclickable');        
    }
})

// ! after submit button click changes cursor to loading
const form = document.getElementById('contact-form');

form.addEventListener('submit', () => {
    document.body.classList.add('wait');
})















// formButton.addEventListener('click', () => {
//     if(!formButton.classList.contains('unclickable')){
//         console.log('loading');
//         document.body.classList.add('wait');
//     }
// })