/*window.sr = ScrollReveal();

sr.reveal('.navbar', {
    duration: 1000
});
*/

function buscador() {
    Swal.fire("Esta funcion aun no esta disponible");
    return false;
};

// plantilla.js
document.addEventListener('DOMContentLoaded', function() {
    const role = sessionStorage.getItem('role');
    const navbarContainer = document.getElementById('navbar-container');

    let navbarFile;
    switch(role) {
        case 'admin':
            navbarFile = 'roles/admin.php';
            break;
        case 'userR':
            navbarFile = 'roles/usuarioR.php';
            break;
        default:
            navbarFile = 'roles/usuarioNR.php';
    }

    fetch(navbarFile)
        .then(response => response.text())
        .then(data => {
            navbarContainer.innerHTML = data;
        })
        .catch(error => {
            console.error('Error al cargar el navbar:', error);
        });
});



