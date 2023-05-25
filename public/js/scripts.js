// ! navbar open and close
const hamburgerMenu = document.getElementById('hamburger-menu');
const topNavbar = document.getElementById('top-navbar');

hamburgerMenu.addEventListener('click', () => {
    if (hamburgerMenu.classList.contains('open')){
        hamburgerMenu.classList.remove('open');
    } else {
        hamburgerMenu.classList.add('open');
    }
})

// ! Closing email response popup
const closeResponse = document.getElementsByClassName('fa-xmark');
const response = document.getElementsByClassName('response');

if (closeResponse[0] != null){

    closeResponse[0].addEventListener('click', async () => {
        response[0].style.opacity = '0';
        
        // it waits for animation to complete, then it hides popup
        await new Promise(resolve => setTimeout(resolve, 300));
        response[0].style.visibility = 'hidden';
    })
}
    
// ! Button is greyed out if checkbox is not checked
const normativeCheckbox = document.getElementById('norm-cb');
const formButton = document.getElementById('formButton');

if (normativeCheckbox.checked){
    formButton.classList.add('clickable');
}

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