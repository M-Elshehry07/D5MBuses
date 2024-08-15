var container = document.getElementById('routes-section');
var slider = document.getElementById('slider');
var slides = document.getElementsByClassName('slide').length;
var buttons = document.getElementsByClassName('btn');

var currentPosition = 0;
var currentMargin = 0;
var slidesPerPage = 0;
var slidesCount = slides - slidesPerPage;
var containerWidth = container.offsetWidth;
var prevKeyActive = false;
var nextKeyActive = true;

window.addEventListener("resize", checkWidth);

function checkWidth() {
    containerWidth = container.offsetWidth;
    setParams(containerWidth);
}

function setParams(w) {
    if (w < 551) {
        slidesPerPage = 1;
    } else if (w < 901) {
        slidesPerPage = 2;
    } else if (w < 1101) {
        slidesPerPage = 3;
    } else {
        slidesPerPage = 4;
    }
    slidesCount = slides - slidesPerPage;
    if (currentPosition > slidesCount) {
        currentPosition -= slidesPerPage;
    }
    currentMargin = -currentPosition * (100 / slidesPerPage);
    slider.style.marginLeft = currentMargin + '%';
    updateButtons();
}

function updateButtons() {
    if (slidesCount <= 0) {
        buttons[0].classList.add('inactive');
        buttons[1].classList.add('inactive');
    } else {
        buttons[0].classList.toggle('inactive', currentPosition === 0);
        buttons[1].classList.toggle('inactive', currentPosition >= slidesCount);
    }
}

setParams();

function slideLeft() {
    if (slidesCount <= 0) return;

    if (currentPosition === 0) {
        currentPosition = slides - slidesPerPage-1;
    } else {
        currentPosition--;
    }
    currentMargin = -currentPosition * (100 / slidesPerPage);
    slider.style.marginLeft = currentMargin + '%';
    updateButtons();
}

function slideRight() {
    if (slidesCount <= 0) return;

    if (currentPosition >= slidesCount - 1) {
        currentPosition = 0;
    } else {
        currentPosition++;
    }
    currentMargin = -currentPosition * (100 / slidesPerPage);
    slider.style.marginLeft = currentMargin + '%';
    updateButtons();
}
