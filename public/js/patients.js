// ! PATIENT ROWS ARE CLICKABLES
const rows = document.getElementsByClassName('clickable-row');

for (let i = 0; i < rows.length; i++) {
    rows[i].addEventListener('click', () => {

        window.location = rows[i].getAttribute('data-href');
    })

}