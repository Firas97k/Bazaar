/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// go up

var buttonGoUp = document.getElementById('go_up');

window.onscroll = function () {

    if (window.pageYOffset >= 500) {
        buttonGoUp.style.display = 'block';
    }
    else {
        buttonGoUp.style.display = 'none';
    }
};

buttonGoUp.onclick = function () {
    window.scrollTo(0, 0);
};
//--------------------------------------------------------------