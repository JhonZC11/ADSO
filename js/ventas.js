


$(document).ready(function () {
    $('#modal').show();
    $('#modal').draggable();
    $('#cliente').change(function () {
        realizarSolicitudAjax();
    });
    consultaStock();
    $("#cantidad").change(function () {
        validaCantidad();
        vTotal()
    })
    $("#closeModal").click(function(){
        $('#modal').hide();
    })
    $("#closeModal2").click(function(){
        $('#modal').hide();
    })

    var cantidad = document.getElementById('cantidad');
    cantidad.addEventListener('input', function () {
        var valor = parseFloat(cantidad.value);
        if (valor < 0) { cantidad.value = 0; }
    });
    var vkg = document.getElementById('v_kg');
    vkg.addEventListener('input', function(){
        var valorr  = parseFloat(vkg.value);
        if (valorr < 0) { vkg.value = 0; }
    })
    $('#v_kg').change(function(){
        vTotal()
    })
});



function vTotal() {
    var inp1 = document.getElementById("cantidad").value;
    var inp2 = document.getElementById("v_kg").value;
    var vT = inp1 * inp2;
    var label = document.getElementById("v_total").value = vT;
}

function validaCantidad() {
    var stock = parseInt($('#unidadesD').val());
    var cantidad = parseInt($('#cantidad').val());
    if (cantidad > stock) {
        $("#cantidad").focus();
        $("#cantidad").val(" ");
        $("#v_kg").val("");
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