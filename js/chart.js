const ctx = document.getElementById('stats_chart').getContext('2d');

Chart.defaults.font.family = "'Ubuntu', sans-serif";
Chart.defaults.font.size = 19;
Chart.defaults.borderColor = '#D0D0D0';

const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [jsonData[0]['date'],jsonData[1]['date'],jsonData[2]['date'],jsonData[3]['date'],jsonData[4]['date'],jsonData[5]['date'],jsonData[6]['date'],jsonData[7]['date'],jsonData[8]['date'],jsonData[9]['date'],jsonData[10]['date'],jsonData[11]['date'],jsonData[12]['date'],jsonData[13]['date']],
        datasets: [{
            label: 'Aktywność graczy',
            data: [jsonData[0]['players'],jsonData[1]['players'],jsonData[2]['players'],jsonData[3]['players'],jsonData[4]['players'],jsonData[5]['players'],jsonData[6]['players'],jsonData[7]['players'],jsonData[8]['players'],jsonData[9]['players'],jsonData[10]['players'],jsonData[11]['players'],jsonData[12]['players'],jsonData[13]['players']],
            borderColor: '#282547'
        }]
    },
    options: {
        plugins: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Aktywność graczy z ostatnich 14 dni (dane odświeżane przy wejściu gracza na serwer)',
                color: 'black',
                align: 'center'
            },
            tooltip: {
                displayColors: false
            }
        },
        elements: {
            line: {
                borderWidth: 2
            },
            point: {
                pointStyle: 'circle',
                backgroundColor: 'rgba(255,66,66,1)',
                hitRadius: 100,
                hoverRadius: 10,
                hoverBorderWidth: 2
            }
        },
        scales: {
            x: {
                ticks: {
                    color: 'rgba(255,66,66,1)'
                }
            },
            y: {
                ticks: {
                    color: '#282547'
                }
            }
        }
    }
});