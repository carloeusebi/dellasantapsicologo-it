const container = document.querySelector('.drag-container');
const draggables = document.querySelectorAll('.draggable');

let isDragging = false;

const getDragAfterElement = y => {
    const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')];

    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2;
        return offset < 0 && offset > closest.offset ? { offset: offset, element: child } : closest;
    }, { offset: Number.NEGATIVE_INFINITY }).element;
}

async function startDragging() {
    await new Promise(resolve => setTimeout(resolve, 1000));
    const draggable = this;
    draggable.classList.add('dragging');
    isDragging = true;
}

function stopDragging() {
    const draggable = this;
    draggable.classList.remove('dragging');
    isDragging = false;
}

const handleTouchMove = (e) => {
    e.preventDefault();
    if (isDragging) {
        const y = e.clientY ? e.clientY : e.touches[0].clientY;
        const afterElement = getDragAfterElement(y);
        const draggable = document.querySelector('.dragging');
        container.insertBefore(draggable, afterElement);
    }
}

draggables.forEach(draggable => {
    draggable.addEventListener('dragstart', startDragging);
    draggable.addEventListener('dragend', stopDragging);

    draggable.addEventListener('touchstart', startDragging, { passive: false });
    draggable.addEventListener('touchend', stopDragging, { passive: false });
});


container.addEventListener('dragover', handleTouchMove);
container.addEventListener('touchmove', handleTouchMove, { passive: false });

