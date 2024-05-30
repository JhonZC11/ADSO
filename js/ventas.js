$(document).ready(function () {
    $('#cliente').change(function () {
        realizarSolicitudAjax();
    });
    consultaStock();
    $("#cantidad").change(function () {
        validaCantidad();
    })
});

function validaCantidad() {
    var stock = parseInt($('#unidadesD').val());
    var cantidad = parseInt($('#cantidad').val());
    if (cantidad > stock) {
        $("#cantidad").focus();
        $("#cantidad").val(" ");
        Swal.fire("La cantidad no puede ser mayor que el stock!");
    }

}

function realizarSolicitudAjax() {
    // Obtener el valor del input
    var valorInput = $('#cliente').val();

    $.ajax({
        url: '../ventas/consulta_cliente.php',
        type: 'GET',
        data: { inputValue: valorInput },
        dataType: 'json',
        success: function (data) {
            var resultadoTexto = '';

            $.each(data, function (index, proveedor) {
                resultadoTexto += proveedor.nombres;

            });

            $('#resultado').text(resultadoTexto);

            // Agregar el evento change a los campos de cantidad
            $('.cant').change(function () {
                calcularVtotal($(this).closest('tr')); // Pasar la fila correspondiente a la función calcularVtotal
            });
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos de los clientes:', status, error);
            $('#resultado').html('Error al cargar los datos de los clientes. Por favor, intenta de nuevo más tarde.');
        }
    });
}
function consultaStock() {
    // Obtener el valor del input
    var valorInput = $('#item').val();

    $.ajax({
        url: '../ventas/consulta_stock.php',
        type: 'GET',
        data: { inputValue: valorInput },
        dataType: 'json',
        success: function (data) {
            var resultadoTexto = '';

            $.each(data, function (index, proveedor) {
                resultadoTexto += proveedor.cantidad;

            });

            $('#unidadesD').val(resultadoTexto);


        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos del stock:', status, error);
            $('#resultado').html('Error al cargar los datos del Stock. Por favor, intenta de nuevo más tarde.');
        }
    });
}