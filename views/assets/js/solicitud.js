

document.getElementById('solicitarBtn').addEventListener('click', function() {


  // ids de los campos que tienen que estar llenos
  const camposObligatorios = [
      'inputNombre', 'inputApellido', 'exampleInputEmail1', 
      'inputNumeroINT','inputApellidofam','inputninos','inputadolentes','inputAdultos',
      'inputprovincia','inputCanton' 
  ];


  let todosCamposLlenos = true;




  // verificar que todos los campos esten llenos
  for (let id of camposObligatorios) {
      const campo = document.getElementById(id);
      if (!campo.value.trim()) {
          todosCamposLlenos = false;
          break;
      }
  }



  // verificar si al menos una opción de ayuda está seleccionada
  const opcionesAyuda = document.querySelectorAll('input[type="checkbox"][value^="option"]');
  let ayudaSeleccionada = false;
  for (let opcion of opcionesAyuda) {
      if (opcion.checked) {
          ayudaSeleccionada = true;
          break;
      }
  }



  // verificar si los términos y condiciones esta marcado
  const terminosAceptados = document.getElementById('defaultCheck1').checked;

  if (todosCamposLlenos && ayudaSeleccionada && terminosAceptados) {
    document.getElementById('solicitarBtn').addEventListener('click', function () {
      document.querySelectorAll('.form-control').forEach(input => input.value = '');
      document.querySelectorAll('.form-check-input').forEach(checkbox => checkbox.checked = false);
  Swal.fire({
    icon: "success",
    title: "Información enviada, gracias por contar con nosotros"
  });
  });
  } else {
    Swal.fire({
      icon: "error",
      title: "Por favor, complete todos los campos, seleccione al menos una opción de ayuda y acepte los términos y condiciones."
    });
  }
});

sr.reveal('.imgin', {
  duration: 3500,
});
sr.reveal('.informacion', {
  duration: 3500,
  reset: true
});

sr.reveal('.ayudas', {
  delay:1000,
  duration: 3500,
  origin: 'bottom',
    distance:'40px',
  reset: true
});




