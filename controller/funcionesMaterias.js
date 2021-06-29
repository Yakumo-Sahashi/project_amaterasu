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
            $.ajax({
                type: 'POST',
                data: $('#frmMateriaAnadir').serialize(),
                url: 'model/anadirMateria.php',
                success: (r)=>{
                    console.log(r);
                    if(r == ""){
                        swal({
                            title: "Error",
                            text: "Hubo un error al insertar los datos!",
                            icon: "error"
                        });
                    }else{
                        swal({
                            title: "Exito",
                            text: "Los datos se guardaron correctamente",
                            icon: "success"
                        });
                    }
                    
                }
            });
            return false;
        }

        
    };

    function editarMateria(){
        if($('#lunes').val() == "" && $('#martes').val() == "" && $('#miercoles').val() == "" && $('#jueves').val() == "" && $('#viernes').val() == ""){
            swal({
                title: "Advertencia!",
                text: "No puedes dejar todos los horarios vacios",
                icon: "warning"
            });
            return false;
        }else {

        }
    };

    $('#btnAnadirMateria').click(()=>{
        anadirMateria();
    });

    $('#btnEditarMateria').click(()=>{
        editarMateria();
    })
});