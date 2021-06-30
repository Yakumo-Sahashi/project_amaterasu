$(document).ready(function (){
    
    var altura= $('.menu').offset().top;

	$(window).on('scroll',function(){
		if ($(window).scrollTop() > altura) {
			$('.menu').addClass('menu-fixed');
		}else{
			$('.menu').removeClass('menu-fixed');
		}
	});

    function mostrarTabla(){
        $('#tablaUsuarios').DataTable({
            language: {
                url:"http://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            },
            ajax:'./model/mostrarUsuariosActivos.php',
            columns: [
                {data: "idUsuario"},
                {data: "email"},
                {data: "rol",
                    render: function(data, type, row){
                        if(row.rol == 2){
                            return 'Docente';
                        }else{
                            return 'Alumno';
                        }
                    }
                },
                {data: "estado",
                    render: function(data, type, row){
                        if(row.estado == 1){
                            return '<span class="btn btn-success borde-button mr-2"></span>Online';
                        }else if(row.estado == 2){
                            return '<span class="btn btn-danger borde-button mr-2"></span>Offline';
                        }else{
                            return '<span class="btn btn-secondary borde-button mr-2"></span>Inactiv';
                        }
                    }
                }
            ]
        });
        return false;
    }

    mostrarTabla();
});