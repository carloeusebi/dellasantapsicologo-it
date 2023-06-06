const forms = document.querySelectorAll('.question-form');
const legends = [];
const deleteButtons = [];
const addButtons = []
const answersList = []
const answers = [];
const lists = [];

for (let i = 0; i < forms.length; i++) {

    getElements(i);

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

    answers[i][answers[i].length - 1].value = newAnswer;

    const thisButton = addButtons[i];

    const index = parseInt(thisButton.getAttribute('data-add'));
    const nextIndex = index + 1;

    thisButton.removeAttribute('data-add');

    const newLi = document.createElement('li');
    const newInput = document.createElement('input');
    const newButton = document.createElement('button');
    const newIcon = document.createElement('i');

    newButton.appendChild(newIcon);

    newLi.appendChild(newInput);
    newLi.appendChild(newButton);

    newLi.classList.add('d-flex', 'align-items-center', 'my-1');
    newInput.classList.add('form-control');
    newButton.classList.add('btn', 'btn-outline-primary', 'border-0', 'no-hover');
    newIcon.classList.add('fa-solid', 'fa-plus', 'fa-sm', 'ms-2');

    newInput.setAttribute('data-answer', nextIndex);
    newButton.setAttribute('data-add', nextIndex);
    newLi.setAttribute('data-li', nextIndex);

    answersList[i].appendChild(newLi);

    //this button
    thisButton.innerHTML = ' <i class="fa-solid fa-trash-can fa-sm ms-2"></i>';
    thisButton.classList.replace('btn-outline-primary', 'btn-outline-danger');
    let clone = thisButton.cloneNode(true);
    thisButton.replaceWith(clone);

    clone.setAttribute('data-delete', index);
    clone.tabIndex = -1;

    getElements(i);

    clone.addEventListener('click', () => {

        const remove = clone.getAttribute('data-delete');
        const actualList = lists[i];

        actualList.forEach(list => {
            if (list.getAttribute('data-li') === remove) list.remove();
        });

    })

    //next button
    newButton.addEventListener('click', () => {
        createElement(i);
    })

}

function getElements(i) {

    legends[i] = forms[i].querySelectorAll('[data-legend]');
    deleteButtons[i] = forms[i].querySelectorAll('[data-delete]');
    addButtons[i] = forms[i].querySelector('[data-add]');
    answers[i] = forms[i].querySelectorAll('[data-answer]');
    answersList[i] = forms[i].querySelector('[data-list]');
    lists[i] = forms[i].querySelectorAll('[data-li]');
}