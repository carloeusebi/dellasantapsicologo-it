// WELCOME FORM
const section = document.getElementById('main-section');
const welcomeForm = document.getElementById('welcome-form');

const idInput = document.getElementById('id');
const fnameInput = document.getElementById('fname');
const lnameInput = document.getElementById('lname');
const sexInput = document.getElementById('sex');
const emailInput = document.getElementById('email');
const phoneInput = document.getElementById('phone');
const birthdayInput = document.getElementById('birthday');
const birthplaceInput = document.getElementById('birthplace');
const addressInput = document.getElementById('address');
const fiscalcodeInput = document.getElementById('fiscalcode');
const weightInput = document.getElementById('weight');
const heightInput = document.getElementById('height');
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
        birthday: birthdayInput.value.trim(),
        birthplace: birthplaceInput.value.trim(),
        address: addressInput.value.trim(),
        fiscalcode: fiscalcodeInput.value.trim(),
        weight: weightInput.value.trim(),
        height: heightInput.value.trim(),
        job: jobInput.value.trim(),
        cohabitants: cohabitantsInput.value.trim()
    }
}


if (welcomeForm) {
    welcomeForm.addEventListener('submit', async e => {
        e.preventDefault();

        let response;

        const data = readInputs();

        const url = '/test/update-patient';

        await fetch('/test/update-patient', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(result => {
                console.log(result);
                response = result;
            })

        console.log(response);

        if (response === 'success') {
            section.innerHTML = '';
        }

    });
}