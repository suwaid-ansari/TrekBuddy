let navbar = document.querySelector('.header .navbar');
document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.add('active');
}
document.querySelector('#nav-close').onclick = () =>{
    navbar.classList.remove('active');
}
window.onscroll=()=>{
    navbar.classList.remove('active');
    if(window.scrollY>0){
        document.querySelector('.header').classList.add('active');
    }else{
        document.querySelector('.header').classList.remove('active');
    }
};
window.onload=()=>{
    if(window.scrollY>0){
        document.querySelector('.header').classList.add('active');
    }else{
        document.querySelector('.header').classList.remove('active');
    }
};

let btnclr = document.querySelector('button');
let inputs = document.querySelectorAll('input');
btnclr.addEventListener('click', () =>{
    inputs.forEach(input => input.value ='');
});

/*function validateForm(){
/*    
/*    var check = document.getElementById("em");
/*    if (check.value!=usrn.value.includes('@')) {
/*        // alert("error"); 
/*        document.getElementById('error').innerHTML='Email Should contain @ and cannot be blank';
/*    }
/*}*/

function ValidateEmail() 
{
    var email = document.getElementById('em');
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value))
  {
    return true;
}
    alert("You have entered an invalid email address!"); 
}