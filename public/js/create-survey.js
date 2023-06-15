const checkboxes = document.querySelectorAll('[type="checkbox"]');
const selectAllBtn = document.getElementById('select-all');
const deselectAllBtn = document.getElementById('deselect-all');
const form = document.getElementById('survey-form');
const patientSelect = document.getElementById('patient-select');
const patientSelectError = document.getElementById('patient-select-error');

// select all checkboxes
selectAllBtn.addEventListener('click', () => {
    checkboxes.forEach(box => {
        box.checked = true;
    })
});

// deselect all checkboxes
deselectAllBtn.addEventListener('click', () => {
    checkboxes.forEach(box => {
        box.checked = false;
    })
});

console.log(checkboxes);


// form submit
form.addEventListener('submit', e => {
    e.preventDefault();

    patientSelect.classList.remove('is-invalid');
    patientSelectError.classList.add('d-none');

    const patient = patientSelect.value;

    if (!patient) {
        patientSelect.classList.add('is-invalid');
        patientSelectError.classList.remove('d-none');
        return;
    }

    let checkedQuestions = [];

    checkboxes.forEach(box => {
        if (box.checked) {
            checkedQuestions.push(box.dataset.id);
        }
    })

    if (!checkedQuestions.length) {
        alert('NON HAI SELEZIONATO NESSUN QUESTIONARIO!')
    }
});