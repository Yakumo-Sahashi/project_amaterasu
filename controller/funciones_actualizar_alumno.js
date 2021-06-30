import Loader from './funciones_loader.js';
const loader = new Loader();
const nombre = /[a-zA-Z]+/;
const expresionEmail = /\w+@\w+\.+[a-z]/;
const tel = /[0-9]/;
const expresionCURP = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;

$(document).ready(() => {   

    function actualizarDatos() {
        loader.opening();
        var control = $('#edtControl').val();
        $.ajax({
            type: 'POST',
            data: $('#frmACtualizaAlumno').serialize(),
            url: 'model/actualizarAlumno.php',
            success: function (r) {
                loader.ending();
                if (r == "2") {
                    tabla.ajax.reload(null,false);
                    $('#frmACtualizaAlumno')[0].reset();
                    swal({
                        title: "Correcto!",
                        text: "Se actulizaron los datos del alumno con N.Control: " + control,
                        icon: "success"  
                        });
                } else {
                    alerta(r);

                }
            }
        });
    }

    function insertarAlumno() {
        loader.opening();
        $.ajax({
            type: 'POST',
            data: $('#frmAgregarAlumno').serialize(),
            url: 'model/agregarAlumnoAdmin.php',
            success: function (r) {
                loader.ending();
                if (r == "2") {
                    tabla.ajax.reload(null,false);
                    swal({
                        title: "Correcto!",
                        text: "Se ha agregado al alumno con exito!",
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
            $('#edtFecha').val() == "" && $('#edtCarrera').val() == "" && 
            $('#edtTelefono').val() == "" && $('#edtCurp').val() == "") {
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
        }else if($('#edtCarrera').val() == ""){
            alerta("No puedes dejar vacio el campo Carrera!");
            return false;
        }else if($('#edtFecha').val() == ""){
            alerta("No puedes dejar vacio el campo Fecha Nacimiento!");
            return false;
        }else if($('#edtCurp').val() == ""){
            alerta("No puedes dejar vacio el campo CURP!");
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
        }else if(!tel.test($('#edtTelefono').val()) && !(telefono.length == 10)){
            alerta("El campo Telefono debe contener solo 10 numeros!");
            return false;
        }else if(!expresionEmail.test($('#edtEmail').val())){
            alerta("Estructura de email no valida!\n\nejemplo: correo@gmail.com");
            return false;
        }else if(!expresionCURP.test($('#edtCurp').val())){
            alerta("CURP no valido!");
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
        }else if(!expresionEmail.test($('#email').val())){
            alerta("Estructura de email no valida!\n\nejemplo: correo@gmail.com");
            return false;
        }else if(!expresionCURP.test($('#curp').val())){
            alerta("CURP no valido!");
            return false;
        }else{
            insertarAlumno();
        }
    }

    function validarVaciosAdd(){

        if( $('#email').val() == "" && $('#nombre').val() == "" &&
            $('#paterno').val() == "" && $('#materno').val() == "" &&
            $('#fechaNacimiento').val() == "" && $('#carrera').val() == "" && 
            $('#telefono').val() == "" && $('#curp').val() == "") {
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
        }else if($('#carrera').val() == ""){
            alerta("No puedes dejar vacio el campo Carrera!");
            return false;
        }else if($('#fechaNacimiento').val() == ""){
            alerta("No puedes dejar vacio el campo Fecha Nacimiento!");
            return false;
        }else if($('#curp').val() == ""){
            alerta("No puedes dejar vacio el campo CURP!");
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