const container = document.querySelector('.drag-container');
const draggables = document.querySelectorAll('.draggable');

let isDragging = false;
let touchTimeout;

const getDragAfterElement = y => {
    const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')];

    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2;
        return offset < 0 && offset > closest.offset ? { offset: offset, element: child } : closest;
    }, { offset: Number.NEGATIVE_INFINITY }).element;
}

function handelStartDragging(e) {
    const startDragging = dragging => {
        dragging.classList.add('dragging');
        isDragging = true;
    };

    const dragging = this;

    if ('touches' in e) {
        touchTimeout = setTimeout(() => {
            startDragging(dragging);
        }, 750);
    } else {
        startDragging(dragging);
    }
}

function stopDragging() {
    clearTimeout(touchTimeout);
    this.classList.remove('dragging');
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
    draggable.addEventListener('dragstart', handelStartDragging);
    draggable.addEventListener('dragend', stopDragging);

    draggable.addEventListener('touchstart', handelStartDragging, { passive: false });
    draggable.addEventListener('touchend', stopDragging, { passive: false });
});


container.addEventListener('dragover', handleTouchMove);
container.addEventListener('touchmove', handleTouchMove, { passive: false });

