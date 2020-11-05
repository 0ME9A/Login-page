var form1 = document.getElementsByClassName('form2');
var toggler1 = document.getElementById('toggler1');
var toggler2 = document.getElementById('toggler2');
var form2 = document.getElementsByClassName('formA');


form1[0].style.transform = 'scale(0)';
toggler1.onclick = function(){
    if (toggler1.innerHTML == 'sign in'){
        form1[0].style.transform = 'scale(1)';
        form2[0].style.transform = 'scale(0)';
        this.innerHTML = 'register';
    }
    else{
        form1[0].style.transform = 'scale(0)';
        form2[0].style.transform = 'scale(1)';
        this.innerHTML = 'sign in';
    }
}
toggler2.onclick = function(){
    if (toggler2.innerHTML == 'sign in'){
        form1[0].style.transform = 'scale(1)';
        form2[0].style.transform = 'scale(0)';
        this.innerHTML = 'register';
    }
    else{
        form1[0].style.transform = 'scale(0)';
        form2[0].style.transform = 'scale(1)';
        this.innerHTML = 'sign in';
    }
}