import Loader from './funciones_loader.js';
const loader = new Loader();
const nombre = /[a-zA-Z]+/;
const expresionEmail = /\w+@\w+\.+[a-z]/;
const tel = /[0-9]/;
const expresionRFC = /^([A-Z,Ñ,&]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})$/;

$(document).ready(() => {   

    function actualizarDatos() {
        loader.opening();
        $.ajax({
            type: 'POST',
            data: $('#frmACtualizaDocente').serialize(),
            url: 'model/actualizarDocente.php',
            success: function (r) {
                loader.ending();
                if (r == "2") {
                    tabla.ajax.reload(null,false);
                    $('#frmACtualizaDocente')[0].reset();
                    swal({
                        title: "Correcto!",
                        text: "Se actulizaron los datos del docente",
                        icon: "success"  
                        });
                } else {
                    alerta(r);

                }
            }
        });
    }

    function insertarDocente() {
        loader.opening();
        $.ajax({
            type: 'POST',
            data: $('#frmAgregarDocente').serialize(),
            url: 'model/agregarDocenteAdmin.php',
            success: function (r) {
                loader.ending();
                if (r == "2") {
                    tabla.ajax.reload(null,false);
                    $('#frmAgregarDocente')[0].reset();
                    swal({
                        title: "Correcto!",
                        text: "Se ha agregado al docente con exito!",
                        icon: "success"  
                        });
                } else {
                    alerta(r);

                }
            }
        });
    }

    function validarVacios(){
        if( $('#edtEmail').val() == "" && $('#edtNombre').val() == "" &&
            $('#edtPaterno').val() == "" && $('#edtMaterno').val() == "" &&
            $('#edtFecha').val() == "" && $('#edtArea') == "" && 
            $('#edtTelefono').val() == "" && $('#edtRfc').val() == "") {
            alerta("No puedes dejar ningun campo vacio!");
            return false;
        }else if($('#edtNombre').val() == ""){
            alerta("No puedes dejar vacio el campo Nombre!");
            return false;
        }else if($('#edtPaterno').val() == ""){
            alerta("No puedes dejar vacio el campo Apellido Paterno!");
            return false;
        }else if($('#edtMaterno').val() == ""){
            alerta("No puedes dejar vacio el campo Apellido Materno!");
            return false;
        }else if($('#edtTelefono').val() == ""){
            alerta("No puedes dejar vacio el campo Telefono!");
            return false;
        }else if($('#edtEmail').val() == ""){
            alerta("No puedes dejar vacio el campo email!");
            return false;
        }else if($('#edtArea').val() == ""){
            alerta("No puedes dejar vacio el campo Area!");
            return false;
        }else if($('#edtFecha').val() == ""){
            alerta("No puedes dejar vacio el campo Fecha Nacimiento!");
            return false;
        }else if($('#edtRfc').val() == ""){
            alerta("No puedes dejar vacio el campo RFC!");
            return false;
        }else{
            validarCaracteres();
        }
    }

    function validarCaracteres(){

        var telefono = ""+$('#edtTelefono').val();
        if(!nombre.test($('#edtNombre').val())){
            alerta("El campo Nombre debe contener solo letras!");
            return false;
        }else if(!nombre.test($('#edtPaterno').val())){
            alerta("El campo Apellido paterno debe contener solo letras!");
            return false;
        }else if(!nombre.test($('#edtMaterno').val())){
            alerta("El campo Apellido materno debe contener solo letras!");
            return false;
        }else if(!tel.test($('#edtTelefono').val())){
            alerta("El campo Telefono debe contener solo numeros!");
            return false;
        }else if(telefono.length != 10){
            alerta("El campo Telefono debe contener solo 10 numeros!");
            return false;                
        }else if(!expresionEmail.test($('#edtEmail').val())){
            alerta("Estructura de email no valida!\n\nejemplo: correo@gmail.com");
            return false;
        }else if(!expresionRFC.test($('#edtRfc').val())){
            alerta("RFC no valido!");
            return false;
        }else{
            actualizarDatos();
        }
    }

    function validarCaracteresAdd(){
        var telefono = ""+$('#telefono').val();
        if(!nombre.test($('#nombre').val())){
            alerta("El campo Nombre debe contener solo letras!");
            return false;
        }else if(!nombre.test($('#paterno').val())){
            alerta("El campo Apellido paterno debe contener solo letras!");
            return false;
        }else if(!nombre.test($('#materno').val())){
            alerta("El campo Apellido materno debe contener solo letras!");
            return false;
        }else if(!tel.test($('#telefono').val()) && !(telefono.length == 10)){
            alerta("El campo Telefono debe contener solo 10 numeros!");
            return false;
        }else if(telefono.length != 10){
            alerta("El campo Telefono debe contener solo 10 numeros!");
            return false;                
        }else if(!expresionEmail.test($('#email').val())){
            alerta("Estructura de email no valida!\n\nejemplo: correo@gmail.com");
            return false;
        }else if(!expresionRFC.test($('#rfc').val())){
            alerta("RFC no valido!");
            return false;
        }else{
            insertarDocente();
        }
    }

    function validarVaciosAdd(){

        if( $('#email').val() == "" && $('#nombre').val() == "" &&
            $('#paterno').val() == "" && $('#materno').val() == "" &&
            $('#fechaNacimiento').val() == "" && $('#area').val() == "" && 
            $('#telefono').val() == "" && $('#rfc').val() == "") {
            alerta("No puedes dejar ningun campo vacio!");
            return false;
        }else if($('#nombre').val() == ""){
            alerta("No puedes dejar vacio el campo Nombre!");
            return false;
        }else if($('#paterno').val() == ""){
            alerta("No puedes dejar vacio el campo Apellido Paterno!");
            return false;
        }else if($('#materno').val() == ""){
            alerta("No puedes dejar vacio el campo Apellido Materno!");
            return false;
        }else if($('#telefono').val() == ""){
            alerta("No puedes dejar vacio el campo Telefono!");
            return false;
        }else if($('#email').val() == ""){
            alerta("No puedes dejar vacio el campo email!");
            return false;
        }else if($('#area').val() == ""){
            alerta("No puedes dejar vacio el campo Area!");
            return false;
        }else if($('#fechaNacimiento').val() == ""){
            alerta("No puedes dejar vacio el campo Fecha Nacimiento!");
            return false;
        }else if($('#rfc').val() == ""){
            alerta("No puedes dejar vacio el campo RFC!");
            return false;
        }else{
            validarCaracteresAdd();            
        }
    }

    function alerta(msj){
        swal({
            title: "Advertencia!",
            text: ""+msj,
            icon: "warning"  
        });
    }

    $('#btnEditar').click(() => {
        validarVacios();
    });

    $('#btnAgregar').click(()=>{
        validarVaciosAdd();
    });
});