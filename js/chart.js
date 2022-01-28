const ctx = document.getElementById('stats_chart').getContext('2d');

Chart.defaults.font.family = "'Ubuntu', sans-serif";
Chart.defaults.font.size = 18;
Chart.defaults.borderColor = '#D0D0D0';

const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Pon','Wt','Śr','Czw','Pt','Sb','Nd'],
        datasets: [{
            label: 'Aktywność graczy',
            data: ['12','24','45','200','50','100','2'],
            borderColor: 'rgba(0,179,0,1)'
        }]
    },
    options: {
        plugins: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Aktywność graczy z danego tygodnia',
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
                backgroundColor: 'rgba(255,191,0,1)',
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
                    color: 'rgba(0,179,0,1)'
                }
            }
        }
    }
});
