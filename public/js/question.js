// DOM elements
const form = document.querySelector('.question-form');

const ul = form.querySelector('ul');
const addButton = document.getElementById('add-button');
const newAnswerInput = document.getElementById('add-answer');
let deleteButtons = [];
let answersInput = [];
let answers = [];

/**
 * Reload elements from dom
 */
function getElements() {
    deleteButtons = form.querySelectorAll('[data-delete]');
    answersInput = form.querySelectorAll('[data-answer]');
    answers = form.querySelectorAll('[data-list]');

    for (let i = 0; i < deleteButtons.length; i++) {
        deleteButtons[i].addEventListener('click', () => {
            answers[i].remove();
        })
    }
}

/**
 * Creates new list element
 */
function createListElement() {
    const newAnswer = newAnswerInput.value.trim();
    newAnswerInput.value = '';
    const newIndex = answers.length;

    ul.innerHTML += `
    <li class="d-flex align-items-center my-1" data-list="${newIndex}">
        <input type="text" class="form-control" data-answer="${newIndex}" value="${newAnswer}">
            <button type="button" class="btn btn-outline-danger border-0 no-hover" data-delete="${newIndex}" tabindex="-1">
                <i class="fa-solid fa-trash-can fa-sm ms-2"></i>
            </button>
        </li>`;

    getElements();
}


getElements();

// ! EVENT LISTENERS

form.addEventListener('submit', (e) => {
    e.preventDefault();
})


for (let i = 0; i < deleteButtons.length; i++) {
    deleteButtons[i].addEventListener('click', () => {
        answers[i].remove();
    })
}


addButton.addEventListener('click', createListElement);
newAnswerInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        createListElement();
    }
});