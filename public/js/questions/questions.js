const forms = document.querySelectorAll('.question-form');
const legends = [];
const deleteButtons = [];
const addButtons = []
const answersList = []
const answers = [];
const lists = [];

for (let i = 0; i < forms.length; i++) {

    legends[i] = forms[i].querySelectorAll('[data-legend]');
    deleteButtons[i] = forms[i].querySelectorAll('[data-delete]');
    addButtons[i] = forms[i].querySelector('[data-add]');
    answers[i] = forms[i].querySelectorAll('[data-answer]');
    answersList[i] = forms[i].querySelector('[data-list]');
    lists[i] = forms[i].querySelectorAll('li');

    forms[i].addEventListener('submit', (e) => {
        e.preventDefault();
    })
}

for (let i = 0; i < deleteButtons.length; i++) {

    for (let j = 0; j < deleteButtons[i].length; j++) {

        deleteButtons[i][j].addEventListener('click', () => {

            lists[i][j].remove();
            deleteButtons[i][j].remove();

        });
    }
}

for (let i = 0; i < addButtons.length; i++) {

    addButtons[i].addEventListener('click', () => {
        createElement(i);
    });
}


function createElement(i) {

    const newAnswer = answers[i][answers[i].length - 1].value;

    console.log(newAnswer);

    answers[i][answers[i].length - 1].value = newAnswer;

    const newDiv = document.createElement('div');
    const newInput = document.createElement('input');
    const newButton = document.createElement('button');
    const newIcon = document.createElement('i');

    newButton.appendChild(newIcon);

    newDiv.appendChild(newInput);
    newDiv.appendChild(newButton);

    newDiv.classList.add('d-flex', 'align-items-center', 'my-1');
    newInput.classList.add('form-control');
    newButton.classList.add('btn', 'btn-outline-primary', 'border-0', 'no-hover');
    newIcon.classList.add('fa-solid', 'fa-plus', 'fa-sm', 'ms-2');

    newInput.setAttribute('data-answer', i);
    newButton.setAttribute('data-add', i);

    answersList[i].appendChild(newDiv);

    newButton.addEventListener('click', () => {
        createElement(i);
    })
}