$(document).ready(function () {
    function mostrarTabla() {
        $('#tablaMaterias').DataTable({
            language: {
                url: "http://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            },
            ajax: './model/mostrarMaterias.php',
            columns: [
                { data: "nombreMateria" },
                { data: "nombreDocente" },
                { data: "carrera" },
                { data: "semestre" },
                { data: "aula" },
                {
                    data: "idHorario",
                    render: function (idHorario, type, row) {
                        return '<span class="btn btn-warning btn-sm text-white borde-button" data-toggle="modal" data-target="#editarMateriaModal" onclick="mostrarDatosHorario('+ idHorario +')"><i class="fas fa-edit"></i></span>'
                    }
                }
            ]
        });

        return false;

    };

    mostrarTabla();
});