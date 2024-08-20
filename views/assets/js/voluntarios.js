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
  $('#submit').on('click', function (e) {
    e.preventDefault();

    // Recoger los datos de ambos formularios
    var formData1 = $('#formulario1').serializeArray();
    var formData2 = $('#formulario2').serializeArray();

    var unir_datos = {};
    formData1.forEach(function(item) {
      unir_datos[item.name] = item.value;
    });
    formData2.forEach(function(item) {
      unir_datos[item.name] = item.value;
    });

    $.ajax({
      url: '../controller/VoluntariosController.php',
      type: 'POST',
      data: unir_datos,
      success: function (response) {
        Swal.fire({
          icon: 'success',
          title: 'Éxito',
          text: 'Datos enviados exitosamente!'
        });
      },
      error: function (err) {
        $('#response').html('<div class="alert alert-danger">Error al enviar los datos.</div>');
      }
    });
  });
});
