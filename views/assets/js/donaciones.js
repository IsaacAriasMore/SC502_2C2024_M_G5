document.addEventListener('DOMContentLoaded', function() {
  window.sr = ScrollReveal();
  sr.reveal('.iz', {
    delay: 500,
    duration: 2500,
    origin: 'left',
    distance: '100px',
    reset: true
  });
});


$(document).ready(function () {
    $('#submit').on('click', function (e) {
      e.preventDefault();
  
      // Recoger los datos de ambos formularios
      var formData1 = $('#formulario').serializeArray();//el serializeArray convierte un string en un array[0,1,2,3,4,5,6,7,8]"explicacion con dibujito para que se entienda"
      var formData2 = $('#formulario2').serializeArray();
  
      var unir_datos = {};
      formData1.forEach(function(item) {// el forEach a lo entendido hace que un array en lugar de mostrarse [1,2,3,4,5] hace que se muestre asi 1,2,3,4,5
        unir_datos[item.name] = item.value;
      });
      formData2.forEach(function(item) {
        unir_datos[item.name] = item.value;
      });
  
      $.ajax({
        url: '../controller/DonacionesController.php',
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
    });});