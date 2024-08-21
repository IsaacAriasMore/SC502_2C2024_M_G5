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
function listarTodosDb() {
    tabla = $('#tbllistado').DataTable({
        processing: true, // Activamos el procesamiento de DataTables
        serverSide: true, // Paginación y filtrado del lado del servidor
        dom: 'Bfrtip', // Definimos los elementos del control de tabla
        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
        ajax: {
            url: '../controller/ADMregistrarseController.php?op=listar_para_tabla',
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
    listarTodosDb();
});

/* CRUD */

/* Función para agregar una nueva registrarse */
$('#registrarse_add').on('submit', function (event) {
    event.preventDefault();
    $('#btnRegistar').prop('disabled', true);
    var formData = new FormData($('#registrarse_add')[0]);
    $.ajax({
        url: '../controller/ADMregistrarseController.php?op=insertar',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case '1':
                    toastr.success('Usuario registrada');
                    $('#registrarse_add')[0].reset();
                    tabla.ajax.reload();
                    break;
                case '2':
                    toastr.error('La registrarse ya existe. Corrija e inténtelo nuevamente.');
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
    bootbox.confirm('¿Está seguro de activar la donación?', function (result) {
      if (result) {
        $.post(
          '../controller/ADMregistrarseController.php?op=activar',
          { id: id },
          function (data) {
            switch (data) {
              case '1':
                toastr.success('Usuario activado');
                tabla.ajax.reload();
                break;
              case '0':
                toastr.error('Error: El usuario no puede activarse. Consulte con el administrador...');
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
    bootbox.confirm('¿Está seguro de desactivar este usuario?', function (result) {
        if (result) {
            $.post(
                '../controller/ADMregistrarseController.php?op=desactivar',
                { id: id },
                function (data) {
                    switch (data) {
                        case '1':
                            toastr.success('Usuario desactivado');
                            tabla.ajax.reload();
                            break;
                        case '0':
                            toastr.error('Error: No se pudo desactivar el usuario.');
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
    $('#tbllistado').on('click', '.btn-warning', function() {
        // Obtener los datos del botón clickeado
        var row = $(this).closest('tr');
        var id = row.find('td').eq(0).text().trim(); // ID en la primera columna
        var nombre = row.find('td').eq(1).text().trim(); // Nombre en la segunda columna
        var usuario = row.find('td').eq(2).text().trim(); // Usuario en la tercera columna
        var correo = row.find('td').eq(3).text().trim(); // Correo en la cuarta columna
        var contrasena = row.find('td').eq(4).text().trim(); // Contraseña en la quinta columna
        var fecharegistro = row.find('td').eq(5).text().trim(); // Fecha de registro en la sexta columna
        var id_cargo = row.find('td').eq(6).text().trim(); // ID Cargo en la séptima columna
        var estado = row.find('td').eq(7).text().trim(); // Estado en la octava columna

        // Llenar los datos en el formulario de actualización
        $('#EId').val(id);
        $('#Enombre').val(nombre);
        $('#Eusuario').val(usuario);
        $('#Ecorreo').val(correo);
        $('#Econtrasena').val(contrasena);
        $('#Efecharegistro').val(fecharegistro);
        $('#Eid_cargo').val(id_cargo);
        $('#Eestado').val(estado);

        // Mostrar el formulario de modificación y ocultar el de creación
        $('#formulario_update').show();
        $('#formulario_add').hide();
    });
});


/* Función para modificar los datos de una registrarse */
$('#registrarse_update').on('submit', function (event) {
    event.preventDefault();
    bootbox.confirm('¿Desea modificar los datos?', function (result) {
        if (result) {
            var formData = new FormData($('#registrarse_update')[0]);
            $.ajax({
                url: '../controller/ADMregistrarseController.php?op=editar',
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
                            toastr.success('Usuario actualizado exitosamente');
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
