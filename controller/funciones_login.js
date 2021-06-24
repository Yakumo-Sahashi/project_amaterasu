import Loader from './funciones_loader.js';
const loader = new Loader();

$(document).ready(() => { 
  function iniciarSesion(){

    if($('#email').val() == "" && $('#password').val() == ""){
      swal({
        title: "Advertencia!",
        text: "No puedes dejar vacios los dos campos!",
        icon: "warning"      
      });
      return false;
    }else if($('#email').val() == ""){
      swal({
        title: "Advertencia!",
        text: "Debes ingresar un nombre de email!",
        icon: "warning"  
      });
      return false;
    }else if($('#password').val() == ""){
      swal({
        title: "Advertencia!",
        text: "Debes ingresar un password!",
        icon: "warning" 
      });
      return false;
    }else{
      loader.opening();
    }
  
    $.ajax({
      type: 'POST',
      data: $('#frmLogin').serialize(),
      url:'model/login.php',
      success: (r)=>{
        if(r==="2"){
          setTimeout(() => {
            //ending();
            window.location = "home";
          }, 2000);
        }else{
          loader.ending();      
          swal('Upss', "Los datos que ingresaste no son validos\n\n Vuelve a intentar por favor "+r, 'error');
          return false;
        }
      }
    });
  }
    
  $('#btnSesion').click(()=>{
    iniciarSesion();
  });

  $("#frmLogin").keypress((e)=> {
      var code = (e.keyCode ? e.keyCode : e.which);
      if(code==13){
        iniciarSesion();
      }
  });
  
});