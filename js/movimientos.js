let motivos = ["EAC", "DB", "FC"]
let d_motivos = ["Entrada Almacen", "Dar baja", "Factura Compra(Insumos)"]
let item = ["1","Fruta Guanabana"]


function cargaMotivo(){

    var inp = document.getElementById("motivo").value;
    var d =document.getElementById("d_motivo")
    
    if(inp!=motivos[0]&&inp!=motivos[1]&&inp!=motivos[2]){
        alert("Motivos invalidos!")
        $("#motivo").focus()
    } else if (inp==motivos[0]){
        d.innerHTML=d_motivos[0];
    }  else if (inp==motivos[1]){
        d.innerHTML=d_motivos[1];
        var inputProveedor = document.getElementById("p");
        var inp2 = document.getElementById("v_kg");
        inp2.readOnly=true;
        inputProveedor.readOnly=true;
    }  else if (inp==motivos[2]){
        d.innerHTML=d_motivos[2];
    } else {
        alert("Motivos invalidos!")
        $("#motivo").focus()
    }
}
function cargaItem(){
    var inp =document.getElementById("item").value;
    var i =document.getElementById("d_item")
    if(inp==item[0]){
        i.innerHTML=item[1]
    }else{
        alert("Item desconocido!")
        inp.focus();
    }
}
function vTotal(){
    var inp1 = document.getElementById("cant").value;
    var inp2 = document.getElementById("v_kg").value;
    var vT = inp1*inp2;
    var label = document.getElementById("v_total").value=vT;
    
}

function validarFormulario() {
    var campo1 = document.getElementById("motivo").value;
    var campo2 = document.getElementById("nf").value;
    var campo3 = document.getElementById("p").value;
    var campo4 = document.getElementById("ff").value;
    var campo5 = document.getElementById("item").value;
    var campo6 = document.getElementById("cant").value;
    var campo7 = document.getElementById("v_kg").value;

    if (campo1 === "" || campo2 === "" || campo3 === ""|| campo4 === ""|| campo5 === ""|| campo6 === ""|| campo7 === "") {
        alert("Por favor, completa al menos un campo.");
        return false; // Evita que se envíe el formulario
    }
}
