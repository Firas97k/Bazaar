class adContainer{
    images;
    arrayOfDots;
    nextButton;
    previousButton;
    slideCount = 5;
    currentSlide = 1;
    constructor(images, arrayOfDots, nextButton, previousButton){
        this.images = images;
        this.arrayOfDots = arrayOfDots;
        this.nextButton = nextButton;
        this.previousButton = previousButton;
    }
    // methods ----------------------------------------------------------

    theChecker() {

        // remove all active from other images and other dots
        this.removeAllActives();

        // active current Slide (show it)
        this.images[this.currentSlide - 1].classList.add('activeImg');

        // active current dot
        this.arrayOfDots[this.currentSlide - 1].classList.add('activeUl');

        if (this.currentSlide == 1) {
            // make previous buuton disable
            this.previousButton.classList.add('disable');
        } else {
            //remove disable from previous button
            this.previousButton.classList.remove('disable');
        }

        if (this.currentSlide == this.slideCount) {
            // make next buuton disable
            this.nextButton.classList.add('disable');
        } else {
            //remove disable from next button
            this.nextButton.classList.remove('disable');
        }
    }

    removeAllActives() {

        this.images.forEach(function (img) {
            img.classList.remove('activeImg');
        });

        this.arrayOfDots.forEach(function (li) {
            li.classList.remove('activeUl');
        });
    }

    nextSlide() {
        if (this.nextButton.classList.contains('disable')) {
            // do nothing
            return false;
        } else {
            this.currentSlide++;
            this.theChecker();
        }
    }

    previousSlide() {
        if (this.previousButton.classList.contains('disable')) {
            // do nothing
            return false;
        } else {
            this.currentSlide--;
            this.theChecker();
        }
    }
} 

var allImages = Array.from(document.querySelectorAll('.box .images img'));

var allDots = Array.from(document.querySelectorAll('.box .control #dots #ul_dots li'));

var allNextButton = Array.from(document.querySelectorAll('#next'));

var allPreviousButton = Array.from(document.querySelectorAll('#previous'));

// create objects from imgContainer
var objects = new Array(allNextButton.length);
var start = 0;
var end = 5;
for(var i = 0; i<objects.length; i++){
    objects[i] = new adContainer(allImages.slice(start, end), allDots.slice(start, end), allNextButton[i], allPreviousButton[i]);
    start = start + 5;
    end = end + 5;
}

// add nextSlide & previousSlide & theChecker functions
objects.forEach(function (x){
    x.nextButton.addEventListener('click', function(){
        x.nextSlide();
    });
    
    x.previousButton.addEventListener('click', function(){
        x.previousSlide();
    });
    
    x.theChecker();
});
