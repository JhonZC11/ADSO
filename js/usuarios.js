
    /*----------------ABRE EL FORM-----------------------*/ 
    
    function muestraForm(){
        $("#form").show();
    }
    function cierraForm(){
        $("#form").hide();
    }
    function cierra(){
        $("#ad").hide();
    }

    $(document).ready(function() {
        $("#iv").draggable();
        $("#usuarios").draggable();
        $("#form").draggable();
    });

    /*----------------------------------------------------*/ 



    /*----------------CIERRA LA VENTANA CRUD-----------------------*/ 
    let btnUsuarios = document.getElementById("closeUsuarios");
    btnUsuarios.addEventListener("click", function(e){
        e.preventDefault();
        usuarios.style.display = "none";
    });
    /*-------------------------------------------------------------*/ 

    let Close = document.getElementById("close");
    Close.addEventListener("click", function(event){
        event.preventDefault();
        form.style.display = "none";
    });
 
    let cierraM = document.getElementById("cancel");
    cierraM.addEventListener("click", function(event){
        event.preventDefault();
        form.style.display = "none";
    });

    let addBtn = document.getElementById("registra");
    addBtn.addEventListener("click", function(event){
        event.preventDefault();
    });


