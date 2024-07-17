
/*login roles*/
const loginForm = document.getElementById('loginForm');//se agarra el id del formulario


loginForm.addEventListener('submit', function(event) { // aqui agregamos un evento para enviar el formulario
    event.preventDefault(); // Prevenir el envío del formulario por defecto

    // Obtener los valores de correo y contraseña
    const email = document.getElementById('correo').value.trim();
    const password = document.getElementById('contrasena').value.trim();

    // Validar credenciales
    if (email === 'jarias30680@ufide.ac.cr' && password === '12345678') {
        // Asignar rol de administrador (simulación)
        sessionStorage.setItem('role', 'admin');
        // Redireccionar a página de administrador (simulación)
        
        
        // Cambiar a la página de administrador real
    } else if(email === 'isaacarias053@gmail.com' && password === '12345678'){
        sessionStorage.setItem('role', 'userR');
    } else{
        sessionStorage.setItem('role', 'userNR'); 
    }
});