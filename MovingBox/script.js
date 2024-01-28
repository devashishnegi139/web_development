const uB = document.getElementById("uButton");
const dB = document.getElementById("dButton");
const lB = document.getElementById("lButton");
const rB = document.getElementById("rButton");

uB.addEventListener('click', () => moveBox('up'));
dB.addEventListener('click', () => moveBox('down'));
lB.addEventListener('click', () => moveBox('left'));
rB.addEventListener('click', () => moveBox('right'));

function moveBox(direction) {
    const box = document.querySelector('.box1');
    const computedStyle = getComputedStyle(box);
    let currentTop = parseInt(computedStyle.top) || 0;
    let currentLeft = parseInt(computedStyle.left) || 0;

    switch (direction) {
        case 'up':
            box.style.top = (currentTop - 10) + 'px';
            break;
        case 'down':
            box.style.top = (currentTop + 10) + 'px';
            break;
        case 'left':
            box.style.left = (currentLeft - 10) + 'px';
            break;
        case 'right':
            box.style.left = (currentLeft + 10) + 'px';
            break;
    }
}