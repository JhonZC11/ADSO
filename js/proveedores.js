$(document).ready(function(){
    $('#exampleModal').draggable()
    $('#registroCRUD').click(function(){
        $('#exampleModal').show()
    })
    $('#close').click(function(){
        $('#exampleModal').hide()
    })
    $('#cancel').click(function(){
        $('#exampleModal').hide()
    })
})