import Loader from './funciones_loader.js';
const loader = new Loader();

$(document).ready(() => {

    function cerrarSesion(accion) {
        loader.opening();
        $.ajax({
            type: 'POST',
            data: 'funcion=' + accion,
            url: 'model/login.php',
            success: (r) => {
                loader.ending();
                if (r === "2") {
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
                } else {
                    alert(r);
                }
            }
        });
    }

    $('#btnCerrarSesion').click(() => {
        cerrarSesion(3);
    });
});