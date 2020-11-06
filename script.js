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


var username = document.getElementById('username');
var email = document.getElementById('email');
var password = document.getElementById('password');
var confirm_password = document.getElementById('confirm-password');
var male = document.getElementById('male');
var female = document.getElementById('female');


// variable for reguler expression
var findnum = /[0-9]/g;
var findspe = /\W/g;
var findalpha = /[a-z A-Z]/g;
var findmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
// username reguler expression created
username.onchange = function(){
    var len = (username.value);
    if (len.match(findnum) || len.match(findspe)){        
        document.getElementById('c1').style.display = 'none';
        document.getElementById('w1').style.display = 'block';
    }
    else{
        if (len.length < 3){
            document.getElementById('c1').style.display = 'none';
            document.getElementById('w1').style.display = 'block';
        }
        else{
            document.getElementById('c1').style.display = 'block';
            document.getElementById('w1').style.display = 'none';
        }
    }
}
// email reguler expression
email.onchange = function(){
    var len = (email.value);
    if (len.match(findmail)){
        document.getElementById('c2').style.display = 'block';
        document.getElementById('w2').style.display = 'none';
    }
    else{
        document.getElementById('c2').style.display = 'none';
        document.getElementById('w2').style.display = 'block';
    }
}
// password reguler expression
password.onchange = function(){
    var len = (password.value);
    if (len.match(findnum) && len.match(findspe) && len.match(findalpha)){
        if (len.length >= 8){
            document.getElementById('c3').style.display = 'block';
            document.getElementById('w3').style.display = 'none';
        }else{
            document.getElementById('c3').style.display = 'none';
            document.getElementById('w3').style.display = 'block';
        }
    }
    else{
        document.getElementById('c3').style.display = 'none';
        document.getElementById('w3').style.display = 'block';
    }
}
// check password that both are same or not
confirm_password.onchange = function(){
    var len = (confirm_password.value);
    if (len != password.value || len.length <= 8){
        document.getElementById('c4').style.display = 'none';
        document.getElementById('w4').style.display = 'block';
    }
    else{
        document.getElementById('c4').style.display = 'block';
        document.getElementById('w4').style.display = 'none';
    }
}

// check everything ok or not if not btn will be disabled else will be enebled
var male = document.getElementById('male');
var female = document.getElementById('female');
var form1_btn = document.getElementById('form1_btn');
setInterval(() => {
    if ((c1,c2,c3,c4).style.display == 'block'){
        if (male.checked || female.checked){
            form1_btn.disabled = false;
        }
    }
    else{
        form1_btn.disabled = true;
    }
}, 1000);

// signin for old users
var signemail = document.getElementById('signin-email');
var signpass = document.getElementById('signin-password');
signemail.onchange = function(){
    var len = (signemail.value);
    if (len.match(findmail)){
        document.getElementById('c5').style.display = 'block';
        document.getElementById('w5').style.display = 'none';
    }
    else{
        document.getElementById('c5').style.display = 'none';
        document.getElementById('w5').style.display = 'block';
    }
}
signpass.onchange = function(){
    var len = (signpass.value);
    if (len.match(findnum) && len.match(findspe) && len.match(findalpha)){
        if (len.length >= 8){
            document.getElementById('c6').style.display = 'block';
            document.getElementById('w6').style.display = 'none';
        }else{
            document.getElementById('c6').style.display = 'none';
            document.getElementById('w6').style.display = 'block';
        }
    }
    else{
        document.getElementById('c6').style.display = 'none';
        document.getElementById('w6').style.display = 'block';
    }
}
var signin_btn = document.getElementById('signin-btn');
setInterval(() => {
    if ((c5,c6).style.display == 'block'){
        signin_btn.disabled = false;
    }
    else{
        signin_btn.disabled = true;
    }
}, 1000);
