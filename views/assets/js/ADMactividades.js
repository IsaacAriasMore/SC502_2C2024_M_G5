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
function listarActividadesTodos() {
    tabla = $('#tbllistado').DataTable({
        processing: true, // Activamos el procesamiento de DataTables
        serverSide: true, // Paginación y filtrado del lado del servidor
        dom: 'Bfrtip', // Definimos los elementos del control de tabla
        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
        ajax: {
            url: '../controller/ADMactividadesController.php?op=listar_para_tabla',
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
    listarActividadesTodos();
});

/* CRUD */

/* Función para agregar una nueva actividad */
$('#actividad_add').on('submit', function (event) {
    event.preventDefault();
    $('#btnRegistrar').prop('disabled', true);
    var formData = new FormData($('#actividad_add')[0]);
    $.ajax({
        url: '../controller/ADMactividadesController.php?op=insertar',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case '1':
                    toastr.success('Actividad registrada');
                    $('#actividad_add')[0].reset();
                    tabla.ajax.reload();
                    break;
                case '2':
                    toastr.error('La actividad ya existe. Corrija e inténtelo nuevamente.');
                    break;
                case '3':
                    toastr.error('Hubo un error al tratar de ingresar los datos.');
                    break;
                default:
                    toastr.error(datos);
                    break;
            }
            $('#btnRegistrar').removeAttr('disabled');
        }
    });
});

/* Función para activar una actividad */
function activar(id) {
    bootbox.confirm('¿Está seguro de activar la actividad?', function (result) {
      if (result) {
        $.post(
          '../controller/ADMactividadesController.php?op=activar',
          { id: id },
          function (data) {
            switch (data) {
              case '1':
                toastr.success('Actividad activada');
                tabla.ajax.reload();
                break;
              case '0':
                toastr.error('Error: La actividad no puede activarse. Consulte con el administrador...');
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

/* Función para desactivar una actividad */
function desactivar(id) {
    bootbox.confirm('¿Está seguro de desactivar esta actividad?', function (result) {
        if (result) {
            $.post(
                '../controller/ADMactividadesController.php?op=desactivar',
                { id: id },
                function (data) {
                    switch (data) {
                        case '1':
                            toastr.success('Actividad desactivada');
                            tabla.ajax.reload();
                            break;
                        case '0':
                            toastr.error('Error: No se pudo desactivar la actividad.');
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
        var id = row.find('td').eq(0).text(); // ID en la primera columna
        var nombre = row.find('td').eq(1).text(); // Nombre en la segunda columna
        var lugar = row.find('td').eq(2).text(); // Lugar en la tercera columna
        var fecha = row.find('td').eq(3).text(); // Fecha en la cuarta columna
        var hora = row.find('td').eq(4).text(); // Hora en la quinta columna
        var estado = row.find('td').eq(5).text(); // Estado en la sexta columna

        // Llenar los datos en el formulario de actualización
        $('#EId').val(id);
        $('#Enombre').val(nombre);
        $('#Elugar').val(lugar);
        $('#Efecha').val(fecha);
        $('#Ehora').val(hora);
        $('#Eestado').val(estado);

        // Mostrar el formulario de modificación y ocultar el de creación
        $('#formulario_update').show();
        $('#formulario_add').hide();
    });
});

/* Función para modificar los datos de una actividad */
$('#actividad_update').on('submit', function (event) {
    event.preventDefault();
    bootbox.confirm('¿Desea modificar los datos?', function (result) {
        if (result) {
            var formData = new FormData($('#actividad_update')[0]);
            $.ajax({
                url: '../controller/ADMactividadesController.php?op=editar',
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
                            toastr.success('Actividad actualizada exitosamente');
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
