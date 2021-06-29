$(document).ready(function (){
    var obj;
    var array;
    $('#tablaUsuarios').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        ajax:'./model/mostrarUsuariosActivos.php',
        columns: [
            {data: "idUsuario"},
            {data: "email"},
            {data: "rol"},
            {data: "estado",
                render: function(data, type, row){
                    if(row.estado == 1){
                        return '<span class="btn btn-success borde-button mr-2"></span>Online';
                    }else if(row.estado == 2){
                        return '<span class="btn btn-danger borde-button mr-2"></span>Offline';
                    }else{
                        return '<span class="btn btn-secondary borde-button mr-2"></span>Inactivo';
                    }
                }
            }
        ]
    });

    var altura= $('.menu').offset().top;

	$(window).on('scroll',function(){
		if ($(window).scrollTop() > altura) {
			$('.menu').addClass('menu-fixed');
		}else{
			$('.menu').removeClass('menu-fixed');
		}
	});

    function mostrarTabla(){
        $.ajax({
            url:"model/mostrarUsuariosActivos.php",
            success:(r)=>{
                obj = JSON.parse(r);
                console.log(obj.data[0].estado);
                
            }
        });
        return false;
    }

    mostrarTabla();
});