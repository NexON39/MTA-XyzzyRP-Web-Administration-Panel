const ctx = document.getElementById('stats_chart').getContext('2d');

Chart.defaults.font.family = "'Ubuntu', sans-serif";
Chart.defaults.font.size = 19;
Chart.defaults.borderColor = '#D0D0D0';

const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['06.03.2022','07.03.2022','08.03.2022','09.03.2022','10.03.2022','11.03.2022','12.03.2022','13.03.2022','14.03.2022','15.03.2022','16.03.2022','17.03.2022','18.03.2022','19.03.2022'],
        datasets: [{
            label: 'Aktywność graczy',
            data: ['12','24','45','200','50','100','2','152','23','5','90','72','45','110'],
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
                text: 'Aktywność graczy z ostatnich 14 dni',
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