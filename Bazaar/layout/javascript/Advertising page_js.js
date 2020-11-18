var images = Array.from(document.querySelectorAll('.img_box .images img'));
var arrayOfDots = Array.from(document.querySelectorAll('.img_box .control #dots #ul_dots li'));

slideCount = 5;
currentSlide = 1;

var nextButton = document.getElementById('next');
nextButton.onclick = nextSlide;

var previousButton = document.getElementById('previous');
previousButton.onclick = previousSlide;

theChecker();


// methods ----------------------------------------------------------

function theChecker() {


    // remove all active from other images and other dots
    removeAllActives();

    // active current Slide (show it)
    images[currentSlide - 1].classList.add('activeImg');

    // active current dot
    arrayOfDots[currentSlide - 1].classList.add('activeUl');

    if (currentSlide == 1) {
        // make previous buuton disable
        previousButton.classList.add('disable');
    } else {
        //remove disable from previous button
        previousButton.classList.remove('disable')
    }

    if (currentSlide == slideCount) {
        // make next buuton disable
        nextButton.classList.add('disable');
    } else {
        //remove disable from next button
        nextButton.classList.remove('disable')
    }

}

function removeAllActives() {

    images.forEach(function (img) {
        img.classList.remove('activeImg');
    });

    arrayOfDots.forEach(function (li) {
        li.classList.remove('activeUl');
    });
}

function nextSlide() {
    if (nextButton.classList.contains('disable')) {

        // do nothing
        return false;

    } else {

        currentSlide++;
        theChecker();

    }
}

function previousSlide() {
    if (previousButton.classList.contains('disable')) {

        // do nothing
        return false;

    } else {

        currentSlide--;
        theChecker();

    }
}

