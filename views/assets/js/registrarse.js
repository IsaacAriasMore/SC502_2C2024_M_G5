document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm'); // Obtener el formulario por ID

    registerForm.addEventListener('submit', function(event) { // Agregar un evento al enviar el formulario
        event.preventDefault(); // Prevenir el envío del formulario por defecto

        const name = document.getElementById('nombre').value.trim();
        const surname = document.getElementById('apellidos').value.trim();
        const email = document.getElementById('correo').value.trim();
        const phone = document.getElementById('telefono').value.trim();
        const password = document.getElementById('contrasena').value.trim();

        // Validar datos de registro mediante AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'controller/registrarseController.php', true); // URL del controlador
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);

                if (response.success) {
                    // Redirigir a la página de inicio de sesión
                    window.location.href = './Iniciar_Sesion.php';
                } else {
                    alert('Error en el registro: ' + response.message);
                }
            }
        };

        // Enviar datos al controlador
        xhr.send(`nombre=${encodeURIComponent(name)}&apellidos=${encodeURIComponent(surname)}&correo=${encodeURIComponent(email)}&telefono=${encodeURIComponent(phone)}&contrasena=${encodeURIComponent(password)}`);
    });
});
