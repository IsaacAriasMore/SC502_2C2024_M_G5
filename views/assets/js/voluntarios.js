
sr.reveal('.iz', {
    delay: 500,
    duration: 3500,
    origin: 'left',
    distance: '100px',
    reset: true
});
sr.reveal('.de', {
    delay: 500,
    duration: 3500,
    origin: 'left',
    distance: '100px',
    reset: true
});
sr.reveal('.titulo1', {
    delay: 1500,
    duration: 3500,
    origin: 'left',
    distance: '100px',
    reset: true
});
sr.reveal('.titulo2', {
    delay: 1500,
    duration: 3500,
    origin: 'left',
    distance: '100px',
    reset: true
});

sr.reveal('.info5', {
    delay: 2000,
    duration: 3500,
    origin: 'left',
    distance: '100px',
    reset: true
});
sr.reveal('.info6', {
    delay: 2200,
    duration: 3500,
    origin: 'left',
    distance: '100px',
    reset: true
});
sr.reveal('.info7', {
    delay: 2400,
    duration: 3500,
    origin: 'left',
    distance: '100px',
    reset: true
});
sr.reveal('.info8', {
    delay: 2600,
    duration: 3500,
    origin: 'right',
    distance: '100px',
    reset: true
});


sr.reveal('.img', {
    delay: 3000,
    duration: 3500,
    origin: 'bottom',
    distance: '100px',
    reset: true
});


  $(document).ready(function () { 
    $('#formulario').on('submit', function (e) { 
        e.preventDefault(); 
        var formData = new FormData($('#formulario')[0])
        $.ajax({ 
            url: '../controllers/VoluntariosController.php', 
            type: 'POST', 
            data: formData, 
            contentType :  false,
            processData  : false,
            //generar un JSON con cada valor de cada campo del formulario 
            success: function(response) { 
                // no olvidar generar un div con el respectivo ID para mostrar la respuesta 
                // obtener la respuesta y convertirla usando el JSON.parse 
                $('#response').html('<div class="alert alert-success">Se agregado exitosamente!</div>'); 
            }, 
            error: function(err) { 
                // no olvidar generar un div con el respectivo ID para mostrar la respuesta 
                //obtener la respuesta y convertirla usando el JSON.parse 
                //mostrar el error en la siguiente alerta 
                $('#response').html('<div class="alert alert-danger">Error al agregar el voluntario.</div>'); 
            } 
        }); 
    }) 
});