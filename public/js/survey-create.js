const form = document.getElementById('survey-form');

const checkboxes = document.querySelectorAll('[type="checkbox"]');
const selectAllBtn = document.getElementById('select-all');
const deselectAllBtn = document.getElementById('deselect-all');

const patientSelect = document.getElementById('patient_id');
const patientSelectError = document.getElementById('patient_id-error');
const titleInput = document.getElementById('survey-title');

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


// form submit
form.addEventListener('submit', e => {
    e.preventDefault();

    patientSelect.classList.remove('is-invalid');
    patientSelectError.classList.add('d-none');

    const patient = patientSelect.value;

    // checks if patient is inserted
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

    // checks if at least one checkbox is checked
    if (!checkedQuestions.length) {
        alert('ATTENZIONE!!\nNon hai selezionato nessun questionario!')
        return;
    }

    form.submit();
});