$(document).ready(function() {

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
      
    }
  
    $.ajax({
      type: 'POST',
      data: $('#frmLogin').serialize(),
      url:'model/login.php',
      success: (r)=>{
        if(r==="2"){
          swal({
            icon: "success",
            title: "Iniciando sesion...",
            html: true,
            text: '\n\n Estas siendo redirigido ...',
            closeOnClickOutside: false,
            closeOnEsc: false,
            value: true,
            buttons: false,
            timer: 1500
          }).then((value) => {
              window.location = "docente";
  
          });
        }else{
          //$('#login_inic')[0].reset();      
          swal('Upss', "Los datos que ingresaste no son validos\n\n Vuelve a intentar por favor "+r, 'error');
          return false;
        }
      }
    });
  }
  
  
  function cerrarSesion(accion){
    $.ajax({
      type: 'POST',
      data: 'funcion='+accion, 
      url:'model/login.php',
      success: (r)=>{
        if(r==="2"){
          swal({
            icon: "success",
            title: "cerrando sesion...",
            html: true,
            text: '\n\n Estas siendo redirigido ...',
            closeOnClickOutside: false,
            closeOnEsc: false,
            value: true,
            buttons: false,
            timer: 1500
          }).then((value) => {
            window.location = "login";  
          });
        }else{
          alert(r);
        }
      }
    });
  }

  
  $('#btnSesion').click(()=>{
    iniciarSesion();
  });

  $('#btnCerrarSesion').click(()=>{
    cerrarSesion(3);
  });


  $("#frmLogin").keypress((e)=> {
      var code = (e.keyCode ? e.keyCode : e.which);
      if(code==13){
        iniciarSesion();
      }
  });
});