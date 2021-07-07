import Loader from './funciones_loader.js';
const loader = new Loader();

$(document).ready(() => { 
  function iniciarRecuperacion(){

    if($('#email').val() == ""){
      swal({
        title: "Advertencia!",
        text: "Debes ingresar un email!",
        icon: "warning"  
      });
      return false;
    }else{
      loader.opening();
    }
  
    $.ajax({
      type: 'POST',
      data: $('#frmRecuperar').serialize(),
      url:'model/recuperar.php',
      success: (r)=>{
        if(r==="2"){
            loader.ending();
            swal({
                icon: "success",
                title: "Cuenta localizada!",
                html: true,
                text: '\n\n Se ha enviado un correo a la direccion de email ingresada anteriormente...\n\nEn caso de no encontrarlo en tu bandeja de entrada busca en spam.',
                closeOnClickOutside: false,
                closeOnEsc: false,
                value: true,
                buttons: false,
                timer: 5000
            }).then((value) => {
                window.location = "login";
            });
        }else{
          loader.ending();      
          swal('Upss', "El email ingresado no es valido\n\n Vuelve a intentar por favor "+r, 'error');
          return false;
        }
      }
    });
  }
    
  $('#btnRecuperar').click(()=>{
    iniciarRecuperacion();
  });

  $("#frmRecuperar").keypress((e)=> {
      var code = (e.keyCode ? e.keyCode : e.which);
      if(code==13){
        iniciarRecuperacion();
      }
  });
  
});