let password = document.querySelector('#passwordUsuario');
let buttonPassword = document.querySelector('.buttonPassword');
let msg = document.querySelector('.p');

buttonPassword.addEventListener('click', () => {

    if(password.value !== ''){
        if (password.type === 'password') {
            password.type = 'text';
            buttonPassword.src = '/build/img/ver.png';
        } else {
            password.type = 'password';
            buttonPassword.src = '/build/img/ocultar.png';
        }
    } else{
        msg.style.color = 'red';
        msg.textContent = 'Primero introduzca una contraseña';
    }

    setTimeout(function(){
        msg.textContent = '';
    }, 2000);
});