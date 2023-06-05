const forms = document.querySelectorAll('.question-form');
const legends = [];
const deleteButtons = [];
const answers = [];

for (let i = 0; i < forms.length; i++) {
    legends[i] = forms[i].querySelectorAll('[data-legend]')
    deleteButtons[i] = forms[i].querySelectorAll('[data-delete]')
    answers[i] = forms[i].querySelectorAll('[data-answer]')
}

forms.forEach((form) => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();
    })
})
