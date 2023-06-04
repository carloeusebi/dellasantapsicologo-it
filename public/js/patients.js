// ! PATIENT ROWS ARE CLICKABLES
const rows = document.getElementsByClassName('clickable-row');

for (let i = 0; i < rows.length; i++) {
    rows[i].addEventListener('click', () => {

        window.location = rows[i].getAttribute('data-href');
    })

}

// ! ORDER TABLE

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

const type = urlParams.get('type');
const order = urlParams.get('order');

const arrows = document.querySelectorAll('table form .fa-solid');
const orderInput = document.querySelectorAll('input[name="order"]');
const typeInput = document.querySelectorAll('input[name="type"]');

for (let i = 0; i < orderInput.length; i++) {

    if (orderInput[i].value === order) {

        arrows[i].classList.remove('invisible');

        if (type === 'asc') {

            arrows[i].classList.replace('fa-chevron-up', 'fa-chevron-down');
            typeInput[i].value = 'desc';
        }

    }
}