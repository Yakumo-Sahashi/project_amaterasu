$(document).ready(function (){
    function anadirMateria(){
        if($('#lunes').val() == "" && $('#martes').val() == "" && $('#miercoles').val() == "" && $('#jueves').val() == "" && $('#viernes').val() == ""){
            swal({
                title: "Advertencia!",
                text: "No puedes dejar todos los horarios vacios",
                icon: "warning"
            });
            return false;
        }else {

        }

        
    }

    $('#btnAnadir').click(()=>{
        anadirMateria();
    })
});