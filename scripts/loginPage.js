const loginButton = document.getElementById('login-btn');

const userNameInput = document.getElementById('exampleInputEmail1');
const passWordInput = document.getElementById('exampleInputPassword1');
let userName, passWord;

loginButton.addEventListener('click',function(){

    userName = userNameInput.value;
    passWord = passWordInput.value;

    if(userName == 'admin' && passWord == 'root'){
        window.location.href = 'logged.html';
    }
    else{
        alert('Invalid username or password.');
    }
})