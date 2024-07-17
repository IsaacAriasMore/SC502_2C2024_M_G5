
/*login roles*/
const loginForm = document.getElementById('loginForm');//se agarra el id del formulario


loginForm.addEventListener('submit', function(event) { // aqui agregamos un evento para enviar el formulario
    event.preventDefault(); // prevenir el envío del formulario por defecto

   
    const email = document.getElementById('correo').value.trim();
    const password = document.getElementById('contrasena').value.trim();

    // validar credenciales simulación
    if (email === 'jarias30680@ufide.ac.cr' && password === '12345678') {
        sessionStorage.setItem('role', 'admin');
        
        
    } else if(email === 'isaacarias053@gmail.com' && password === '12345678'){
        sessionStorage.setItem('role', 'userR');
    } else{
        sessionStorage.setItem('role', 'userNR'); 
    }
});