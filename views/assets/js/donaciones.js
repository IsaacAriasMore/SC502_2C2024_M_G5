
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
    origin: 'right',
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
    origin: 'right',
    distance: '100px',
    reset: true
});

sr.reveal('.info1', {
    delay: 2000,
    duration: 3500,
    origin: 'left',
    distance: '100px',
    reset: true
});
sr.reveal('.info2', {
    delay: 2200,
    duration: 3500,
    origin: 'left',
    distance: '100px',
    reset: true
});
sr.reveal('.info3', {
    delay: 2400,
    duration: 3500,
    origin: 'left',
    distance: '100px',
    reset: true
});
sr.reveal('.info4', {
    delay: 2600,
    duration: 3500,
    origin: 'left',
    distance: '100px',
    reset: true
});
/**/
sr.reveal('.info5', {
    delay: 2000,
    duration: 3500,
    origin: 'right',
    distance: '100px',
    reset: true
});
sr.reveal('.info6', {
    delay: 2200,
    duration: 3500,
    origin: 'right',
    distance: '100px',
    reset: true
});
sr.reveal('.info7', {
    delay: 2400,
    duration: 3500,
    origin: 'right',
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

/* */

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

function updateTotal() {
  const donacion = document.getElementById('donacion').value;
  const otherAmountContainer = document.getElementById('otherAmountContainer');
  const otherAmount = document.getElementById('otherAmount').value;
  let total = 0;

  if (donacion === 'otros') {
    otherAmountContainer.style.display = 'block';
    total = parseFloat(otherAmount) || 0;
  } else {
    otherAmountContainer.style.display = 'none';
    total = parseFloat(donacion);

  const totalAmount = document.getElementById('totalAmount');

  if (donacion === 'otros') {
      totalAmount.value = '';
      totalAmount.placeholder = 'Ingrese el monto deseado';
  } else {
      totalAmount.value = parseFloat(donacion);
      totalAmount.placeholder = '';
  }
}

  document.getElementById('totalAmount').value = total;
}

function updatePaymentMethod() {
  const metodoPago = document.getElementById('metodoPago').value;
  const sinpeContainer = document.getElementById('sinpeContainer');
  const tarjetaContainer = document.getElementById('tarjetaContainer');

  if (metodoPago === 'sinpe') {
    sinpeContainer.style.display = 'block';
    tarjetaContainer.style.display = 'none';
  } else if (metodoPago === 'tarjeta') {
    sinpeContainer.style.display = 'none';
    tarjetaContainer.style.display = 'block';
  } else {
    sinpeContainer.style.display = 'none';
    tarjetaContainer.style.display = 'none';
  }
}

  document.getElementById('btn-submit').addEventListener('click', function() {
    Swal.fire({
      icon: "success",
      title: "donacion realizada"
    });
});