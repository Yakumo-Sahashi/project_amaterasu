function fechaActual(){ 
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth() + 1;
    var yyyy = hoy.getFullYear();

    dd = dd < 10 ? "0" + dd : dd;
    mm = mm < 10 ? "0" + mm : mmd;

    return yyyy + "-" + mm + "-" + dd;
}

$('#btnSemestre').click(()=> {
    mostrarHorario();
});

$('#btnCancelar').click(()=>{
    $('#frmSemestre')[0].reset()
});

$('#btnActualizar').click(() => {
    actualizarFecha();
});

function actualizarFecha() {
    $.ajax({
        type: 'POST',
        data: $('#frmSemestre').serialize(),
        url: 'model/actualizarFechaSemestre.php',
        success: (r) => {
            if (r == "2") {
                swal('Formato de fecha correctos', 'Actualizacion completa!', 'success');
            } else {
                swal('Formato de fecha incorrectos', 'Actualizacion no completada!\n\n' + r, 'warning');
            }
        }
    });
}


function validarFecha() {
    let fecha_fin = $('#fechaFin').val();
    if (fecha_fin > fechaActual()) {
        actualizarFecha();
    } else {
        swal('Se ha producido un error!', 'La fecha de terminacion no puede ser menor a la de inicio!', 'error');
        return false;
    }

}

function mostrarHorario() {
    $.ajax({
        url: 'model/mostrarFechaSemestre.php',
        success: (r) => {
            datos_precarga = jQuery.parseJSON(r);
            $('#inicioSemestre').val(datos_precarga['inicioSemestre'].substring(8) + "-" + datos_precarga['inicioSemestre'].substring(5, 7) + "-" + datos_precarga['inicioSemestre'].substring(0, 4));
            $('#finSemestre').val(datos_precarga['finSemestre'].substring(8) + "-" + datos_precarga['finSemestre'].substring(5, 7) + "-" + datos_precarga['finSemestre'].substring(0, 4));
            if (fechaActual()  >= datos_precarga['finSemestre']) {
                $('#nombreSemestre').html("Semestre finalizado: " + datos_precarga['semestre']);
                $('#proximoSemestre').css("display","");
                $('#lt').css("visibility",'visible');
                $('#btnActualizar').css("visibility",'visible');
            }else{
                $('#nombreSemestre').html("Semestre actual: " + datos_precarga['semestre']);
                $('#proximoSemestre').css("display","none");
                $('#btnActualizar').css("visibility",'hidden');
                $('#lt').css("visibility",'hidden');
            }
        }
    });

}