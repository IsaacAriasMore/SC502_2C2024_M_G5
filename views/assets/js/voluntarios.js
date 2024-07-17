
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

  document.getElementById('btn-submit').addEventListener('click', function() {
    document.querySelectorAll('.form-control').forEach(input => input.value = '');
    document.querySelectorAll('.form-check-input').forEach(checkbox => checkbox.checked = false);
    Swal.fire({
      icon: "success",
      title: "Información enviada, gracias por contar con nosotros"
    });
  });

