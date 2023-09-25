const chart= Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Médicos más activos por mes'
    },
    subtitle: {
    },
    xAxis: {
        categories: [
            'Médico A',
            'Médico B',
            'Médico C',
     
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad de citas'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: .02,
            borderWidth: 0
        }
    },
    series: [
    ]
});

function fetchData()
{
    //Fetch API
    fetch('/charts/doctors/bars/data')
    .then(function(response){
        return response.json();
    })
    .then(function(myJson){
        console.log(myJson);
    });
}   