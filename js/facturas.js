

$("#form2").hide();
$(document).ready(function () {

    $("#form").draggable();
    $("#form2").draggable();
    $("#proveedores").draggable();

    $('#inputProveedor').change(function () {
        realizarSolicitudAjax();
    });
    $('#motivo').change(function () {
        proveedoresAJAX();
        $("#form2").show();
    })
    $(document).on('change', '#v_kg', function () {
        var fila = $(this).closest('.row'); // O el contenedor adecuado de la fila
        if (fila.length > 0) {
            calcularVtotal(fila);
        } else {
            console.error('No se encontró la fila contenedora');
        }
    });

});


function proveedoresAJAX() {
    var m = $('#motivo').val();
    $.ajax({
        url: 'movimientos/trae_proveedor.php',
        type: 'GET',
        data: { motivo: m },
        dataType: 'json',
        success: function (data) {
            var resultadoTexto = '';
            $.each(data, function (index, proveedor) {
                resultadoTexto += '<tr><td>' + proveedor.nit + '</td><td>' + proveedor.nombre + '</td><td>' + proveedor.categoria + '</td></tr>';
            });
            $("#dato").html(resultadoTexto)
        },
        error: function () {
            alert('Error al realizar la solicitud');
        }
    });
}

function realizarSolicitudAjax() {
    // Obtener el valor del input
    var valorInput = $('#inputProveedor').val();
    var m = $('#motivo').val();

    $.ajax({
        url: 'movimientos/consultar_proveedores.php',
        type: 'GET',
        data: { inputValue: valorInput, motivo: m },
        dataType: 'json',
        success: function (data) {
            var resultadoTexto = '';
            var json = '';
            var datos = '';

            $.each(data, function (index, proveedor) {
                resultadoTexto += proveedor.nombre;
                json += proveedor.productos;
            });

            $('#resultado').text(resultadoTexto);
            const productos = JSON.parse(json);
            productos.forEach(function(item){
                datos += '<div class="row"><div class="col w-50 p-1 m-2 col border border-dark-subtle"><input type="checkbox" class="" name="items[]" value="' + item.id_secos + '_'+ item.descripcion+ '_'+ item.valor +'"></div><div class="col-4 p-1 m-2 border border-dark-subtle">' + item.descripcion + ' / ' + item.unidad +
                '</div><div class="col p-1 m-2 border border-dark-subtle"><input type="text" class="cant w-50 p-1" name="cantd[]"></div><div class="col p-1 m-2 border border-dark-subtle"><input type="text"  class="v_kg w-50 p-1"  readonly value="' + item.valor + '"></div><div class="col p-1 m-2 border border-dark-subtle" ><input type="text"  class="v_total w-50 p-1" readonly></div></div>';
            });
            $('#filaInputs').hide();
            $('#datos').html(datos);

            // Agregar el evento change a los campos de cantidad
            $('.cant').change(function () {
                var fila = $(this).closest('.row'); // O el contenedor adecuado de la fila
                if (fila.length > 0) {
                    calcularVtotal(fila);
                } else {
                    console.error('No se encontró la fila contenedora');
                }
            });
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos de los proveedores:', status, error);
            $('#resultado').html('Error al cargar los datos de los proveedores. Por favor, intenta de nuevo más tarde.');
        }
    });
}/*
function calcularVtotal(fila) {
    var cantidad = parseFloat(fila.find('#cant').val());
    var valorUnidad = parseFloat(fila.find('#v_kg').val());
        
    if (!isNaN(cantidad) && !isNaN(valorUnidad)) {
        var vtotal = cantidad * valorUnidad;
        fila.find('#v_total').val(vtotal.toLocaleString());
    } else {
        fila.find('#v_total').val('');
    }
}*/
function calcularVtotal(fila) {
    var cantidad = parseFloat(fila.find('.cant').val());
    var valorUnidad = parseFloat(fila.find('.v_kg').val());
        
    if (!isNaN(cantidad) && !isNaN(valorUnidad)) {
        var vtotal = cantidad * valorUnidad;
        fila.find('.v_total').val(vtotal.toLocaleString());
    } else {
        fila.find('.v_total').val('');
    }
}