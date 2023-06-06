// DOM elements
const form = document.querySelector('.question-form');

const ul = form.querySelector('ul');
const addButton = document.getElementById('add-button');
const newAnswerInput = document.getElementById('add-answer');
const typeSelect = document.getElementById('type');
const legendContanier = document.getElementById('legend-container');

let deleteButtons = [];
let answersInput = [];
let answers = [];
let legendsFields = [];

/**
 * Reload elements from dom
 */
function getElements() {
    deleteButtons = form.querySelectorAll('[data-delete]');
    answersInput = form.querySelectorAll('[data-answer]');
    answers = form.querySelectorAll('[data-list]');
    legendsFields = form.querySelectorAll('[data-legend]');

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


/**
 * Reads all legend fields and displays them, according to the legend type selected
 */
function printLegends() {
    const type = typeSelect.value;
    const to = parseInt(type.at(2));
    const from = parseInt(type.at(0));
    const numberOfLegends = to - from + 1;

    let elementsToAdd = '';

    for (let i = 0; i < numberOfLegends; i++) {
        const legend = i < legendsFields.length ? legendsFields[i].value : '';
        elementsToAdd += `
        <div class="d-flex my-1 align-items-center">
            <span class="me-3">${from + i}.</span>
            <input type="text" class="form-control" data-legend="${i}" name="legend-${i}" value="${legend}">
        </div>`
    }

    legendContanier.innerHTML = elementsToAdd;
    legendsFields = form.querySelectorAll('[data-legend]');
}


getElements();
printLegends();

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

typeSelect.addEventListener('change', printLegends);