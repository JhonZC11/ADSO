    /*----------------ABRE EL FORM-----------------------*/ 
    
    function muestraForm(){
        $("#form").show();
   
    }
    function cierraForm(){
        $("#form").hide();

    }
    function cierraForm2(){

        $("#form2").hide();
        $("#modalItems").hide();
    }
    function cierra(){
        $("#ad").hide();
    }

    $(document).ready(function() {
        $("#iv").draggable();
        $("#usuarios").draggable();
        $("#form").draggable();
        $("#exampleModal").draggable();
    });

    /*----------------------------------------------------*/ 

    


let motivos = ["EAC", "DB", "FC"]
let d_motivos = ["Entrada Almacen", "Dar baja", "Factura Compra(Insumos)"]

//Control del input motivo

function cargaMotivo(){

    var inp = document.getElementById("motivo").value;
    var inputProveedor = document.getElementById("inputProveedor");
    var inp2 = document.getElementById("v_kg");
    var nf = document.getElementById("numeroFactura");

    if(inp!=motivos[0]&&inp!=motivos[1]&&inp!=motivos[2]){
        alert("Los motivos contemplados son: \n EAC, FC, DB");
        $("#motivo").focus()
        $("#motivo").val("")

    } else if (inp==motivos[0]){
        $(document).ready(function() {
            Swal.fire({
                title: 'Atención!',
                text: 'Con este motivo solo manejas el item 1',
                icon: 'info',
                confirmButtonText: 'Cool'
            });
        });
        nf.readOnly=false;
        inp2.readOnly=false;
        inputProveedor.readOnly=false;
        var inp =document.getElementById("item");
        
        inp.value = "1";

        inp.addEventListener('input', function() {
            var valor = parseFloat(inp.value);
            if (valor > 1) { inp.value = "1"; }
        });
        

    }  else if (inp==motivos[1]){
        var datos = '';
        nf.readOnly=true;
        inp2.readOnly=true;
        inputProveedor.readOnly=true;

        //alert("Algunos campos no son digitables con este movito")
        alert("")
        $(document).ready(function() {
            Swal.fire({
                position: 'top',
                title: 'Atención!',
                text: 'A continuación verás los items que tienes a disposición',
                icon: 'info',
                confirmButtonText: 'Cool'
            });
        });
        var items = ["Fruta Guanabana","Guanabana sin cascara","Guanabana sin semilla","Guanabana limpia","Guanaba Bolsa 10kg","Paquete Bolsas x 100u","Fibra 1500m","Benzoato 1,5kg","Escorpico 0,5kg","Tijeras","Bandeja","Tarro 1kg","Tarro 20kg","Tarro 40kg","Jabon 4L"]
        for (let i = 0; i < 15; i++) {
            datos+="<tr><td>"+ (i+1) + "</td><td>" + items[i] +"</td></tr>";
        }

        $('#tableBody').html(datos);
        $('#modalItems').show();
    }  else if (inp==motivos[2]){
        alert("En este motivo los items dependen del proveedor que selecciones, los item del 1 al 5 no están disponibles con este motivo")

        nf.readOnly=false;
        inp2.readOnly=false;
        inputProveedor.readOnly=false;

    } 
}


//============================== NO TOCAR  ====================================

//Netamente validación de los items ingresados

function cargaItem(){
    let motivo = document.getElementById("motivo").value;
    let motivos = ["EAC", "DB", "FC"]
    if(motivo==motivos[0]){
        var descripcionItem =document.getElementById("d_item");
        descripcionItem.innerHTML="Fruta Guanabana";
    }
    else if(motivo==motivos[1]){
        let item = 
                [
                    "1", "Fruta Guanabana", 
                    "2", "Fruta sin cascara",
                    "3", "Fruta sin semilla",
                    "4", "Fruta limpia",
                    "5", "Fruta en bolsas 10kg",
                    "6", "Paquete Bolsas x 100u",
                    "7", "Fibra 1500m",
                    "8", "Benzoato 1,5kg",
                    "9", "Escorpico 0,5kg",
                    "10","Tijeras",
                    "11","Bandeja",
                    "12","Tarro 1kg",
                    "13","Tarro 20kg",
                    "14","Tarro 40kg",
                    "15","Jabon 4L"

                ]
        var inp =document.getElementById("item").value;
        var i =document.getElementById("d_item")
        var index = item.indexOf(inp);
        if (index !== -1) {  // Verificar si el índice es válido
            i.innerHTML = item[index + 1]; // Mostrar el siguiente item
        } else {
            alert("¡Item desconocido o fuera de rango!");
            document.getElementById("item").focus(); // Enfocar el input
        }
    } else if (motivo==motivos[2]) {
        /*
        fetch("inventario_insumos.json")
            .then(response => response.json())
            .then(data =>{
                alert(data)
            })
            .catch(error=>console.log(error));/*/

    } else {
        
        document.getElementById("item").focus(); // Enfocar el input
    } 
}

//=========================================================================================
function vTotal(){
    var inp1 = document.getElementById("cant").value;
    var inp2 = document.getElementById("v_kg").value;
    var vT = inp1*inp2;
    var label = document.getElementById("v_total").value=vT;
    
}


var inputNumero = document.getElementById('cant');
var inputNumero2 = document.getElementById('v_kg');
var inputNumero3 = document.getElementById('numeroFactura');
var inp =document.getElementById("item");
inputNumero.addEventListener('input', function() {
    var valor = parseFloat(inputNumero.value);
    if (valor < 0) { inputNumero.value = 0; }
});
inputNumero2.addEventListener('input', function() {
    var valor = parseFloat(inputNumero2.value);
    if (valor < 0) { inputNumero2.value = 0; }
});
inputNumero3.addEventListener('input', function() {
    var valor = parseFloat(inputNumero3.value);
    if (valor < 0) { inputNumero3.value = 0; }
});
inp.addEventListener('input', function() {
    var valor = parseFloat(inp.value);
    if (valor < 0) { inp.value = 0; }
});



function validarFecha() {
    var fechaInput = new Date(document.getElementById("fecha").value);
    var fechaActual = new Date();
    var unAnioAtras = new Date();
    unAnioAtras.setFullYear(fechaActual.getFullYear() - 1);

    if (fechaInput > fechaActual) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "La fecha no puede ser mayor a la actual",
        });
        return false;
    } else if (fechaInput < unAnioAtras) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "La fecha ingresada no puede ser mayor a un año de antigüedad",
        });
        return false;
    }
    return true;
}


document.getElementById("exampleModal").addEventListener("submit", function(event) {
    if (!validarFecha()) {
        event.preventDefault(); // Evita que el formulario se envíe
    }
});


document.getElementById("motivo").addEventListener("change", cargaMotivo)
document.getElementById("item").addEventListener("focusout", cargaItem)