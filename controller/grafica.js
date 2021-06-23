var data = [{
    x: ['Word', 'Excel', 'PDF', 'JPG', 'MP3'],
    y: [15, 5, 10, 13, 3],
    type: 'bar',
    marker: {
        color: ['#0167d5', '#0ea814', '#fe2c2b', '#f8a61c', '#c11fcc'],
        line: {
            width: 1.0
        }
    }
}];
var layout = {
    title: 'Porcentaje de archivos por tipo',
    font: {
        size: 16
    }
};

Plotly.newPlot('graficaArchivos', data, layout);