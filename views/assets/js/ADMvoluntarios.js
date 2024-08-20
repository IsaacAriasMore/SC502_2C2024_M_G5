/* Función para limpiar los formularios */
function limpiarForms() {
    $('#formulario_add').trigger('reset');
    $('#formulario_update').trigger('reset');
}

/* Función para cancelar el uso del formulario de modificación */
function cancelarForm() {
    limpiarForms();
    $('#formulario_add').show();
    $('#formulario_update').hide();
}

/* Función para cargar el listado en el DataTable */
function listarVoluntariosTodos() {
    tabla = $('#tbllistado').DataTable({
        processing: true, // Activamos el procesamiento de DataTables
        serverSide: true, // Paginación y filtrado del lado del servidor
        dom: 'Bfrtip', // Definimos los elementos del control de tabla
        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
        ajax: {
            url: '../controller/ADMvoluntariosController.php?op=listar_para_tabla',
            type: 'GET',
            dataType: 'json',
            error: function (e) {
                console.log(e.responseText);
            },
            dataSrc: 'aaData',
            destroy: true, // Permite reiniciar la tabla si ya existe
            pageLength: 5 // Número de registros por página
        }
    });
}

/* Función principal */
$(function () {
    $('#formulario_update').hide();
    listarVoluntariosTodos();
  });

/* CRUD */

/* Función para agregar una nueva donación */
$('#voluntario_add').on('submit', function (event) {
    event.preventDefault();
    $('#btnRegistar').prop('disabled', true);
    var formData = new FormData($('#voluntario_add')[0]);
    $.ajax({
        url: '../controller/ADMvoluntariosController.php?op=insertar',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case '1':
                    toastr.success('Voluntario registrado');
                    $('#voluntario_add')[0].reset();
                    tabla.ajax.reload();
                    break;
                case '2':
                    toastr.error('El voluntario ya existe. Corrija e inténtelo nuevamente.');
                    break;
                case '3':
                    toastr.error('Hubo un error al tratar de ingresar los datos.');
                    break;
                default:
                    toastr.error(datos);
                    break;
            }
            $('#btnRegistar').removeAttr('disabled');
        }
    });
});

function activar(id) {
    bootbox.confirm('¿Está seguro de activar el voluntario?', function (result) {
      if (result) {
        $.post(
          '../controller/ADMvoluntariosController.php?op=activar',
          { id: id },
          function (data) {
            switch (data) {
              case '1':
                toastr.success('Voluntario activado');
                tabla.ajax.reload();
                break;
              case '0':
                toastr.error('Error: El voluntario no puede activarse. Consulte con el administrador...');
                break;
              default:
                toastr.error(data);
                break;
            }
          }
        );
      }
    });
}

/* Función para eliminar una donación */
function desactivar(id) {
    bootbox.confirm('¿Está seguro de desactivar este voluntario?', function (result) {
        if (result) {
            $.post(
                '../controller/ADMvoluntariosController.php?op=desactivar',
                { id: id },
                function (data) {
                    switch (data) {
                        case '1':
                            toastr.success('voluntario desactivado');
                            tabla.ajax.reload();
                            break;
                        case '0':
                            toastr.error('Error: No se pudo desactivar el voluntario.');
                            break;
                        default:
                            toastr.error(data);
                            break;
                    }
                }
            );
        }
    });
}


/* Habilitación del formulario de modificación al presionar el botón en la tabla */
document.addEventListener("DOMContentLoaded", function() {
    // Suponiendo que estás usando jQuery para manejar el clic en el botón
    $('#tbllistado').on('click', '.btn-warning', function() {
        // Obtener los datos del botón clickeado
        var row = $(this).closest('tr');
        var id = row.find('td').eq(0).text(); 
        var nombre = row.find('td').eq(1).text(); 
        var apellidos = row.find('td').eq(2).text(); 
        var email = row.find('td').eq(3).text(); 
        var telefono = row.find('td').eq(4).text(); 
        var cedula = row.find('td').eq(5).text(); 
        var residencia = row.find('td').eq(6).text(); 
        var descripcion = row.find('td').eq(7).text(); 
        var estado = row.find('td').eq(8).text();

        // Llenar los datos en el formulario de actualización
        $('#EId').val(id);
        $('#Enombre').val(nombre);
        $('#Eapellidos').val(apellidos);
        $('#Eemail').val(email);
        $('#Etelefono').val(telefono);
        $('#Ecedula').val(cedula);
        $('#Eresidencia').val(residencia);
        $('#Edescripcion').val(descripcion);
        $('#Eestado').val(estado);

        // Mostrar el formulario de modificación y ocultar el de creación
        $('#formulario_update').show();
        $('#formulario_add').hide();
    });
});

/* Función para modificar los datos de una donación */
$('#voluntario_update').on('submit', function (event) {
    event.preventDefault();
    bootbox.confirm('¿Desea modificar los datos?', function (result) {
        if (result) {
            var formData = new FormData($('#voluntario_update')[0]);
            $.ajax({
                url: '../controller/ADMvoluntariosController.php?op=editar',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (datos) {
                    switch (datos) {
                        case '0':
                            toastr.error('Error: No se pudieron actualizar los datos');
                            break;
                        case '1':
                            toastr.success('voluntario actualizado exitosamente');
                            tabla.ajax.reload();
                            limpiarForms();
                            $('#formulario_update').hide();
                            $('#formulario_add').show();
                            break;
                        case '2':
                            toastr.error('Error: Datos incorrectos.');
                            break;
                        default:
                            toastr.error(datos);
                            break;
                    }
                }
            });
        }
    });
});

