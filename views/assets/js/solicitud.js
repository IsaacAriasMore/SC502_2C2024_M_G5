$(document).ready(function () {
  $('#solicitudForm').on('submit', function (e) {
    e.preventDefault(); // Evita el envío tradicional del formulario

    var formData = $(this).serializeArray();
    var ayuda = [];
    $('.ayuda:checked').each(function() {
      ayuda.push($(this).val());
    });

    var data = formData.reduce(function(acc, field) {
      acc[field.name] = field.value;
      return acc;
    }, {});
    data['ayuda'] = ayuda.join(',');

    $.ajax({
      url: $(this).attr('action'),
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function (response) {
        if (response.exito) {
          Swal.fire({
              icon: 'success',
              title: '¡Éxito!',
              text: response.msg
          });
      } else {
          Swal.fire({
              icon: 'error',
              title: '¡Error!',
              text: response.msg
          });
      }
  },
  error: function(xhr, status, error) {
      Swal.fire({
          icon: 'error',
          title: '¡Error!',
          text: 'Error al procesar la solicitud.'
      });
  }
});
});
});
