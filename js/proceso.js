let item = ["1","Fruta Guanabana",
            "2","Guanabana sin cascara",
            "3","Guanabana sin semilla",
            "4","Guanabana limpia",
            "5","Guanabana Bolsa x10kg"]
let valor = [
    "1","3000", "Pelar", //Pelar
    "2","300", "Despulpar", //Despulpar
    "3","3000", "Limpiar",//Limpiar
    "4","1000", "Empacar" //Empacar
]
function cargaItem(){

var inp =document.getElementById("item").value;
var descripcionPrimerItem = document.getElementById("d_item")
var descripcionSegundoItem =document.getElementById("d_item2")
var idSegundoItem = document.getElementById("id2")


var idProceso = document.getElementById("idProceso")
var proceso = document.getElementById("proceso")

var horas = document.getElementById("horas")

var costo = document.getElementById("costo")
var costoTotal = document.getElementById("costoTotal")

var canti = document.getElementById("cantidad").value;
var total = canti*0.15;
var CantidadTotal = document.getElementById("cantidadTotal").value=canti-total;

var bolsasResultantes = canti/10;


if(inp<5){
if(inp==item[0]){ //1
    descripcionPrimerItem.innerHTML=item[1] //Fruta guanabana
    descripcionSegundoItem.innerHTML=item[3] //Fruta sin cascara
    idSegundoItem.value=item[2] // 2
    costo.value=valor[1] // 3000
    proceso.innerHTML=valor[2] // pelar
    idProceso.value=valor[0]
    horas.removeAttribute('readonly')
    $('#horas').change(function(){
        var h = document.getElementById("horas").value;
        costoTotal.value=  h * valor[1]
    })
} else if(inp==item[2]){ // 2
    descripcionPrimerItem.innerHTML=item[3] // Sin cascara
    descripcionSegundoItem.innerHTML=item[5] // Sin semilla
    idSegundoItem.value=item[4] // 3
    idProceso.value=valor[3]
    costo.value=valor[4]// 300
    costoTotal.value= canti * valor[4] // multiplicacion
    proceso.innerHTML=valor[5] // pelar
}else if(inp==item[4]){ // 3
    descripcionPrimerItem.innerHTML=item[5] // Sin semilla
    descripcionSegundoItem.innerHTML=item[7] // Limpia
    idSegundoItem.value=item[6] // 4
    idProceso.value=valor[6]
    costo.value=valor[7]// 3000
    proceso.innerHTML=valor[8] // limpiar
    horas.removeAttribute('readonly')
    $('#horas').change(function(){
        var h = document.getElementById("horas").value;
        costoTotal.value=  h * valor[1]
    })
}else if(inp==item[6]){ // 4
    descripcionPrimerItem.innerHTML=item[7] // Limpia
    descripcionSegundoItem.innerHTML=item[9] // Empacada
    idSegundoItem.value=item[8] // 4
    idProceso.value=valor[9] // 1000
    costo.value=valor[10]// 3000
    proceso.innerHTML=valor[11] // limpiar
    var inputTotal = document.getElementById("cantidadTotal").value = bolsasResultantes;
    costoTotal.value=bolsasResultantes*valor[10] // multiplicacion
}else{
    alert("Item desconocido!")
    inp.focus();
}
} else {
    alert("Item fuera de rango")
}

}

//=======================Ajax================= 


var usuario ={};

    $(document).ready(function(){
        $('#item').change(function(){
            realizarSolicitudAjax();
        });
        $('#cc').change(function(){
            realizarSolicitudAjax2();
        });
    }); 

function realizarSolicitudAjax() {
    // Obtener el valor del input
    var valorInput = $('#item').val();
    var cc = $('#cc').val();
    if(valorInput>=5){
        valorInput="";
        alert("Item fuera de rango")
        window.location.reload()
    } else {
        $.ajax({
        url: 'procesos/consulta_cantidad.php',
        type: 'GET',
        data: { inputValue: valorInput, cc: cc},
        dataType: 'json',
        success: function (data) {
            var resultadoTexto = '';
            var nombre = '';
            var operario = '';
            $.each(data, function (index, proveedor) {
                resultadoTexto += proveedor.cantidad;
                nombre += proveedor.descripcion;
            });
            if(resultadoTexto<=0){
                alert("No hay cantidad suficiente para operar!")
                window.location.reload();
            }else if(valorInput==4 && resultadoTexto < 10){
                alert("No hay cantidad suficiente para empacar\nTienes "+resultadoTexto+"kg de Guanabana Limpia")
                window.location.reload();
            }else{
                $('#operario-label').html(operario);
                $('#d_item').html(nombre);
                $('#c').val(resultadoTexto);
                $('#operario-label').html(usuario);
                
            }
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos de los proveedores:', status, error);
            $('#resultado').html('Error al cargar los datos de los proveedores. Por favor, intenta de nuevo más tarde.');
        }
    });
    }
    
}

function realizarSolicitudAjax2() {
    // Obtener el valor del input
    var valorInput = $('#cc').val();
    $.ajax({
        url: 'procesos/consulta_operario.php',
        type: 'GET',
        data: { inputValue: valorInput},
        dataType: 'json',
        success: function (data) {
            var resultadoTexto = '';
            $.each(data, function (index, proveedor) {
                resultadoTexto += proveedor.nombres;
            });
            usuario = resultadoTexto;
            $('#operario-label').html(resultadoTexto);
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener los datos de los proveedores:', status, error);
            $('#resultado').html('Error al cargar los datos de los proveedores. Por favor, intenta de nuevo más tarde.');
        }
    });
}