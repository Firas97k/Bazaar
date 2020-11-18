
// fetch all items in nav
var arrayOfNav = Array.from(document.querySelectorAll(' nav ul li'));

var burger = document.getElementById('burger');

var nav = document.querySelector('nav ul');

var currentPage = location.pathname.toString();

var classes = document.getElementById('classes');

// active nav
activeLiPage(currentPage);

//Go To Home
arrayOfNav[0].addEventListener('click',function(){
    window.location = 'http://localhost/PhpProject%D9%A1/Bazaar/includes/templates/navigationController.php?itemNavClicked=home';
});
//Go To Profile
arrayOfNav[1].addEventListener('click', function () {
    window.location = 'http://localhost/PhpProject%D9%A1/Bazaar/includes/templates/navigationController.php?itemNavClicked=profile';
});
//Go To Contact Us
arrayOfNav[2].addEventListener('click', function () {
    window.location = 'http://localhost/PhpProject%D9%A1/Bazaar/includes/templates/navigationController.php?itemNavClicked=contactUs';
});
//Go To log out
arrayOfNav[3].addEventListener('click', function () {
    window.location = 'http://localhost/PhpProject%D9%A1/Bazaar/includes/templates/navigationController.php?itemNavClicked=logout';
});

burger.addEventListener('click', function () {

    nav.classList.toggle('activeBurger');
    if(currentPage.includes("Home")){
        classes.classList.toggle('activeBurger');
    }
    
    // make butger x
    burger.classList.toggle('toggle');
});


// functions

function activeLiPage(pageName){
    if(currentPage.search(pageName) > -1){
        arrayOfNav.forEach(function(li){
            li.classList.remove('activeNav');
        });
        if(currentPage.includes("Home")){
            arrayOfNav[0].classList.add('activeNav');
        }
        else if(currentPage.includes("Profile")){
            arrayOfNav[1].classList.add('activeNav');
        }
        else if(currentPage.includes("Contact")){
            arrayOfNav[2].classList.add('activeNav');
        }
    }
}