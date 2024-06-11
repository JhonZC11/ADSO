$(document).ready(function(){
    $('#exampleModal').draggable()
    $('#close').click(function(){
        cierraForm()
    })
    $('#cancel').click(function(){
        cierraForm()
    })
    $('#registroCRUD').click(function(){
        muestraForm()
    })
})

function muestraForm() {$("#exampleModal").show();}
function cierraForm() {$("#exampleModal").hide();}