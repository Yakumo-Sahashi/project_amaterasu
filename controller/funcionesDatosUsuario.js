$(document).ready(function(){
    var tamanio;
    function editarImagenPerfil(){
        
        $('#archivoImagenPerfil').bind('change', function(){
            tamanio = (this.files[0].size)/1024;
            console.log(tamanio);
            if(tamanio > 2048){
                swal({
                    title: "Advertencia!",
                    text: "El archivo es mayor a 2 Mb!",
                    icon: "warning"
                });
                return false;
            }else{
                
            }
        });
        
        
    };

    editarImagenPerfil();
   
    $('#btnAceptarImg').click(()=>{
        if(tamanio > 2048){
            swal({
                title: "Advertencia!",
                text: "El archivo es mayor a 2 Mb!",
                icon: "warning"
            });
            return false;
        }else{
            
        }
    });
});