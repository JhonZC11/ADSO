

$("#form2").hide();
$(document).ready(function(){
    $('#p').change(function(){
        realizarSolicitudAjax();
    });
    
    $('#motivo').change(function(){
        proveedoresAJAX();
        $("#form2").show();
    })

});

$(document).ready(function() {
    $("#form").draggable();
    $("#form2").draggable();
    $("#proveedores").draggable();
    $("#exampleModal").draggable();
});

//Función para traer los proveedores y ser mostrados como guias
function proveedoresAJAX(){
    var m = $('#motivo').val();
    $.ajax({
        url: 'movimientos/trae_proveedor.php',
        type: 'GET',
        data: { motivo: m},
        dataType: 'json',
        success: function (data) {
            var resultadoTexto = '';
            $.each(data, function (index, proveedor) {
                resultadoTexto += '<tr><td>' + proveedor.nit + '</td><td>' + proveedor.nombre + '</td><td>'+ proveedor.categoria +'</td></tr>';
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
    var valorInput = $('#p').val();
    var m = $('#motivo').val();
    //Realizamos la solicitud de los productos que se desean utilizar en la transaccion
    $.ajax({
        url: 'movimientos/consultar_proveedores.php',
        type: 'GET',
        data: { inputValue: valorInput, motivo: m},
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
            //En base a los resultados creamos por cada uno de los productos una fila que, a su vez crea un input de tipo checkbox
            //y un input de tipo text para la cantidad de productos que se desean utilizar y que estos sean manipulados en el backend
            productos.forEach(function(item){
                datos += '<tr><td class="d"><input type="checkbox" name="items[]" value="' + item.id_secos + '_'+ item.descripcion+ '_'+ item.valor +'"></td><td>' + item.descripcion + ' / ' + item.unidad +
                '</td><td class="d"><input type="text" class="cant" name="cantd[]" style="width:50px;"></td><td><input type="text" class="v_kg" readonly value="' + item.valor + '"></td><td class="d"><input type="text" class="v_total" readonly></td></tr>';
            });
            $('#datos').html(datos);

            // Agregar el evento change a los campos de cantidad
            $('.cant').change(function() {
                calcularVtotal($(this).closest('tr')); // Pasar la fila correspondiente a la función calcularVtotal
            });
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos de los proveedores:', status, error);
            $('#resultado').html('Error al cargar los datos de los proveedores. Por favor, intenta de nuevo más tarde.');
        }
    });
}

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