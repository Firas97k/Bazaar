
var 
    // buttons
    loginButton = document.getElementById('login'),
    signupButton = document.getElementById('signup'),

    // forms
    loginForm = document.getElementById('login_form'),
    signupForm = document.getElementById('signup_form'),

    goButton = document.getElementById('go');
    goButton.onclick = function(){
        this.setAttribute('value', 'Please, Wait ...');

        // window.open('../Home/Home Page.html', '_blank');
        // location.href = '../Home/Home Page.html';
    }


// defult mode
loginButton.classList.add('activeChoose');
loginForm.classList.add('activeForm');

// when click login
loginButton.addEventListener('click', function () {
    signupButton.classList.remove('activeChoose');
    signupForm.classList.remove('activeForm');

    this.classList.add('activeChoose');
    loginForm.classList.add('activeForm');
});
// when click sign up
signupButton.addEventListener('click', function () {
    loginButton.classList.remove('activeChoose');
    loginForm.classList.remove('activeForm');

    this.classList.add('activeChoose');
    signupForm.classList.add('activeForm');
});

// functions ----------------------------
function goToHome () {
   
}

