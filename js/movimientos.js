let motivos = ["EAC", "DB", "FC"]
let d_motivos = ["Entrada Almacen", "Dar baja", "Factura Compra(Insumos)"]






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
        var nf = document.getElementById("nf");
        nf.readOnly=true;
        inp2.readOnly=true;
        inputProveedor.readOnly=true;
        alert("Algunos campos no son digitables con este movito")


    }  else if (inp==motivos[2]){
        d.innerHTML=d_motivos[2];


    } else {
        alert("Motivos invalidos!")
        $("#motivo").focus()
    }
}




function cargaItem(){
    var inp = document.getElementById("motivo").value;
    var inp =document.getElementById("item").value;
    var i =document.getElementById("d_item")
    let motivos = ["EAC", "DB", "FC"]

    if(inp==motivos[0]||inp==motivos[1]){
        let item = 
        [
            "1","Fruta Guanabana", 
            "2", "Guanabana sin cáscara", 
            "3", "Fruta sin semilla", 
            "4", "Fruta limpia", 
            "5", "Fruta en bolsas 10kg"
        ]
        var index = item.indexOf(inp);
        if (index !== -1) {  
            i.innerHTML = item[index + 1];
        }

    } else if (inp==motivos[2]) {
        
        fetch("inventario_insumos.json")
            .then(response => response.json())
            .then(data =>{
                alert(data)
            })
            .catch(error=>console.log(error));

    } else {
        alert("¡Item desconocido o fuera de rango!");
        document.getElementById("item").focus(); // Enfocar el input
    }
}








function vTotal(){
    var inp1 = document.getElementById("cant").value;
    var inp2 = document.getElementById("v_kg").value;
    var vT = inp1*inp2;
    var label = document.getElementById("v_total").value=vT;
    
}
