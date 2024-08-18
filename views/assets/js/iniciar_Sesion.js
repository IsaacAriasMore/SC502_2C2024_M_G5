document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm'); // Obtener el formulario por ID

    loginForm.addEventListener('submit', function(event) { // Agregar un evento al enviar el formulario
        event.preventDefault(); // Prevenir el envío del formulario por defecto

        const correo = document.getElementById('correo').value.trim();
        const contrasena = document.getElementById('contrasena').value.trim();

        // Validar credenciales mediante AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'Iniciar_SesionController.php', true); // URL del controlador
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);

                if (response.success) {
                    // Guardar datos en sessionStorage
                    sessionStorage.setItem('rol', response.rol);
                    // Redirigir a la página principal
                    window.location.href = './index.php';
                } else {
                    alert('Error en el inicio de sesión: ' + response.message);
                }
            }
        };

        // Enviar datos al controlador
        xhr.send(`correo=${encodeURIComponent(correo)}&contrasena=${encodeURIComponent(contrasena)}`);
    });
});