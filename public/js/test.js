const welcomeForm = document.getElementById('welcome-form');

const idInput = document.getElementById('id');
const fnameInput = document.getElementById('fname');
const lnameInput = document.getElementById('lname');
const sexInput = document.getElementById('sex');
const emailInput = document.getElementById('email');
const phoneInput = document.getElementById('phone');
const beginInput = document.getElementById('begin');
const birthdayInput = document.getElementById('birthday');
const birthplaceInput = document.getElementById('birthplace');
const addressInput = document.getElementById('address');
const fiscalcodeInput = document.getElementById('fiscalcode');
const weightInput = document.getElementById('weight');
const jobInput = document.getElementById('job');
const cohabitantsInput = document.getElementById('cohabitants');

const readInputs = () => {
    return {
        id: idInput.value.trim(),
        fname: fnameInput.value.trim(),
        lname: lnameInput.value.trim(),
        sex: sexInput.value.trim(),
        email: emailInput.value.trim(),
        phone: phoneInput.value.trim(),
        begin: beginInput.value.trim(),
        birthday: birthdayInput.value.trim(),
        birthplace: birthplaceInput.value.trim(),
        address: addressInput.value.trim(),
        fiscalcode: fiscalcodeInput.value.trim(),
        weight: weightInput.value.trim(),
        job: jobInput.value.trim(),
        cohabitants: cohabitantsInput.value.trim()
    }
}

if (welcomeForm)
    welcomeForm.addEventListener('submit', e => {
        e.preventDefault();

        data = readInputs();

        console.log(data);
    })