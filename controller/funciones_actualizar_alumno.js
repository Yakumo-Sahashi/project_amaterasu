$(document).ready(()=>{
    function actualizarAnime(){

        va= /[a-zA-Z]/;
    
        if($('#actualiza_titulo').val() == ""){
        Swal.fire({
            icon: 'error',
            html: "<div class='text-white'>El titulo no puede quedar vacio</div>",
            background: 'rgb(0,0,0,0.7)',
            buttonsStyling:false,
            customClass:{
            confirmButton:'btn btn-lg btn-blue',
            }      
        });
        return false;
        }else if($('#actualiza_genero').val()==""){
        Swal.fire({
            icon: 'error',
            html: "<div class='text-white'>El genero no puede quedar vacio</div>",
            background: 'rgb(0,0,0,0.7)',
            buttonsStyling:false,
            customClass:{
            confirmButton:'btn btn-lg btn-blue',
            }      
        });
        return false;
        }else if ($('#actualiza_descripcion').val()==""){
        Swal.fire({
            icon: 'error',
            html: "<div class='text-white'>La descripcion no puede quedar vacia</div>",
            background: 'rgb(0,0,0,0.7)',
            buttonsStyling:false,
            customClass:{
            confirmButton:'btn btn-lg btn-blue',
            }      
        });
        return false;
        }else if($('#actualiza_capitulo').val() == ""){
        Swal.fire({
            icon: 'error',
            html: "<div class='text-white'>La cantidad de capitulos no puede quedar vacia</div>",
            background: 'rgb(0,0,0,0.7)',
            buttonsStyling:false,
            customClass:{
            confirmButton:'btn btn-lg btn-blue',
            }      
        });
        return false;
        }else{
            
        }
    
        $.ajax({
        type: 'POST',
        data: $('#actualizaAnime').serialize(),
        url:'sql/anime/actualizarAnime.php',
        success: function(r){
            if(r==2){
            mostrarDatos();
            Swal.fire({
                title: "<div class='text-white'>Perfecto</div>",
                html: "<div class='text-white'>Se actualizó la información del anime!</div>",
                //icon: "success",
                imageUrl: "img/alerta/success.png",
                imageWidth: '40%',
                imageAlt: 'Thoru',
                showConfirmButton: true,
                buttonsStyling:false,
                customClass:{
                confirmButton:'btn btn-lg btn-blue mr-1'
                },
                background: 'rgb(0,0,0,0.7)'
            });
            }else{
            Swal.fire({
                title: 'Upps',
                imageUrl: "img/alerta/error.png",
                imageWidth: '40%',
                html: "<div class='text-white'>Error al intentar actualizar la información del anime\n\n"+r+"</div>",
                background: 'rgb(0,0,0,0.7)',
                buttonsStyling:false,
                customClass:{
                confirmButton:'btn btn-lg btn-blue',
                }      
            });
            }
        }
        });
    }

    $()
});
    