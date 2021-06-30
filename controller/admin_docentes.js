/**import Loader from '../funciones_loader.js';
const loader = new Loader(); */
function agregarDocentes(){
	$.ajax({
		method: "POST",
		data: $('#frmAgregarDocentes').serialize(),
		url: "model/procesos/admin/agregarDocentes.php",
		success:function(r){
			console.log(r);
			r = r.trim();
			if(r == 1){
                $('#nombreCategoria').val("");
				swal(":D","Agregado con exito", "success");
			}else{
				swal("D:","No se pudo agregar el usuario","error");
			}
		}
	});
	return false;
}
function agregarDocentes(){
	$.ajax({
		method: "POST",
		data: $('#frmAgregarDocentes').serialize(),
		url: "model/procesos/admin/agregarCorreo.php",
		success:function(r){
			console.log(r);
			r = r.trim();
			if(r == 1){
                $('#nombreCategoria').val("");
				swal(":D","Agregado con exito", "success");
			}else{
				swal("D:","No se pudo agregar el usuario","error");
			}
		}
	});
	return false;
}
function obtenerDocentes(idDocente){
	$.ajax({
		type:"POST",
		data: "idDocente=" + idDocente,
		url:"model/procesos/admin/obtenerDocentes.php",
		success:function(r){
		r = jQuery.parseJSON(r);
		console.log(r);
		$('#idDocenteA').val(r['idDocente']);
		$('#nombreA').val(r['nombre']);
		$('#apellidoPaternoA').val(r['apellidoPaterno']);
		$('#ApellidoMaternoA').val(r['apellidoMaterno']);
		$('#rfcA').val(r['rfc']);
		$('#correoA').val(r['correo']);
		$('#carreraA').val(r['carrera']);
		$('#fechaNacimientoA').val(r['fechaNacimiento']);
		$('#telefonoA').val(r['telefono']);
		}
	  })
}
function actualizarDocentes(){
    $.ajax({
		method: "POST",
		data: $('#frmActualizarDocente').serialize(),
		url: "model/procesos/admin/actualizarDocentes.php",
		success:function(r){
			r = r.trim();
			console.log(r);
			if(r == 1){
				//$("#frmActualizarDocente")[0].reset();
				swal(":D","Actualizado con exito", "success");
			}else{
				swal("D:","No se pudo Actualizar","error")
			}
		} 
	});
	return false;
}
function eliminarDocente(idDocente){
	
	if(idDocente<1){
		swal("No tienes id de docente");
		return false;
	}else{
		idDocente = parseInt(idDocente);
		swal({
			title: 'Estas seguro que quieres eliminar el docente',
			text: "No se podra recuperar el docente",
			icon: 'warning',
			buttons: true,
			dangerMode:true,
		}).then((willDelete) => {
			if(willDelete){
				$.ajax({
					type:"POST",
					data:"idDocente=" + idDocente,
					url:"model/procesos/admin/eliminardocentes.php",
					success:function(r){
					  r = r.trim();
					  console.log(r);
					  if(r==1){
						swal(
						'Eliminado!',
						'Eliminado con exito',
						'success'
						)
					  }else{
						swal("D:","Fallo al eliminar","error");
					  }
					}
				});
			}
		})
	}
}
