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
function listarSolicitudesTodos() {
    tabla = $('#tbllistado').DataTable({
        processing: true, // Activamos el procesamiento de DataTables
        serverSide: true, // Paginación y filtrado del lado del servidor
        dom: 'Bfrtip', // Definimos los elementos del control de tabla
        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
        ajax: {
            url: '../controller/ADMsolicitudController.php?op=listar_para_tabla',
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
    listarSolicitudesTodos();
});

/* CRUD */

/* Función para agregar una nueva solicitud */
$('#solicitud_add').on('submit', function (event) {
    event.preventDefault();
    $('#btnRegistar').prop('disabled', true);
    var formData = new FormData($('#solicitud_add')[0]);
    $.ajax({
        url: '../controller/ADMsolicitudController.php?op=insertar',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case '1':
                    toastr.success('Solicitud registrada');
                    $('#solicitud_add')[0].reset();
                    tabla.ajax.reload();
                    break;
                case '2':
                    toastr.error('La solicitud ya existe. Corrija e inténtelo nuevamente.');
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

/* Función para activar una solicitud */
// Función para activar una solicitud
function activar(id) {
    bootbox.confirm('¿Está seguro de activar la donación?', function (result) {
      if (result) {
        $.post(
          '../controller/ADMsolicitudController.php?op=activar',
          { id: id },
          function (data) {
            switch (data) {
              case '1':
                toastr.success('Donación activada');
                tabla.ajax.reload();
                break;
              case '0':
                toastr.error('Error: La donación no puede activarse. Consulte con el administrador...');
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
    bootbox.confirm('¿Está seguro de desactivar esta donación?', function (result) {
        if (result) {
            $.post(
                '../controller/ADMsolicitudController.php?op=desactivar',
                { id: id },
                function (data) {
                    switch (data) {
                        case '1':
                            toastr.success('Donación desactivada');
                            tabla.ajax.reload();
                            break;
                        case '0':
                            toastr.error('Error: No se pudo desactivar la donación.');
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
        var id = row.find('td').eq(0).text(); // ID en la primera columna
        var nombre = row.find('td').eq(1).text(); // Nombre en la segunda columna
        var apellidos = row.find('td').eq(2).text(); // Apellidos en la tercera columna
        var telefono = row.find('td').eq(3).text(); // Teléfono en la cuarta columna
        var ayuda = row.find('td').eq(4).text(); // Tipo de Ayuda en la quinta columna
        var familiar = row.find('td').eq(5).text(); // Familiar en la sexta columna
        var integrantes = row.find('td').eq(6).text(); // Integrantes en la séptima columna
        var ninos = row.find('td').eq(7).text(); // Niños en la octava columna
        var adolecentes = row.find('td').eq(8).text(); // Adolecentes en la novena columna
        var adultos = row.find('td').eq(9).text(); // Adultos en la décima columna
        var provincia = row.find('td').eq(10).text(); // Provincia en la undécima columna
        var canton = row.find('td').eq(11).text(); // Cantón en la duodécima columna
        var destino = row.find('td').eq(12).text(); // Destino en la decimotercera columna

        // Llenar los datos en el formulario de actualización
        $('#EId').val(id);
        $('#Enombre').val(nombre);
        $('#Eapellidos').val(apellidos);
        $('#Etelefono').val(telefono);
        $('#Eayuda').val(ayuda);
        $('#Efamiliar').val(familiar);
        $('#Eintegrantes').val(integrantes);
        $('#Eninos').val(ninos);
        $('#Eadolecentes').val(adolecentes);
        $('#Eadultos').val(adultos);
        $('#Eprovincia').val(provincia);
        $('#Ecanton').val(canton);
        $('#Edestino').val(destino);

        // Mostrar el formulario de modificación y ocultar el de creación
        $('#formulario_update').show();
        $('#formulario_add').hide();
    });
});

/* Función para modificar los datos de una solicitud */
$('#solicitud_update').on('submit', function (event) {
    event.preventDefault();
    bootbox.confirm('¿Desea modificar los datos?', function (result) {
        if (result) {
            var formData = new FormData($('#solicitud_update')[0]);
            $.ajax({
                url: '../controller/ADMsolicitudController.php?op=editar',
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
                            toastr.success('Solicitud actualizada exitosamente');
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
