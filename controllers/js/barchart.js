$(function() {
    $.ajax({
        type: 'get',
        url: '/corporate/dashboardBarChart'
    }).then(function (response) {
        labelinfo = response.labels;
        dateinfo = response.dates;

        var ctx = document.getElementById("canvas").getContext('2d');
        var canvas = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dateinfo,
                datasets: [{
                    label: 'Total Amount (GH¢)',
                    data: labelinfo,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 22, 132, 0.2)',
                        'rgba(56, 162, 235, 0.2)',
                        'rgba(255, 106, 86, 0.2)',
                        'rgba(75, 152, 192, 0.2)',
                        'rgba(15, 102, 255, 0.2)',
                        'rgba(255, 159, 14, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 22, 132, 0.2)',
                        'rgba(56, 162, 235, 0.2)',
                        'rgba(255, 106, 86, 0.2)',
                        'rgba(75, 152, 192, 0.2)',
                        'rgba(15, 102, 255, 0.2)',
                        'rgba(255, 159, 14, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 22, 132, 0.2)',
                        'rgba(56, 162, 235, 0.2)',
                        'rgba(255, 106, 86, 0.2)',
                        'rgba(75, 152, 192, 0.2)',
                        'rgba(15, 102, 255, 0.2)',
                        'rgba(255, 159, 14, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(225,99,132,1)',
                        'rgba(54, 62, 235, 1)',
                        'rgba(235, 106, 86, 1)',
                        'rgba(75, 192, 92, 1)',
                        'rgba(153, 10, 255, 1)',
                        'rgba(255, 59, 64, 1)',
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(225,99,132,1)',
                        'rgba(54, 62, 235, 1)',
                        'rgba(235, 106, 86, 1)',
                        'rgba(75, 192, 92, 1)',
                        'rgba(153, 10, 255, 1)',
                        'rgba(255, 59, 64, 1)',
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(225,99,132,1)',
                        'rgba(54, 62, 235, 1)',
                        'rgba(235, 106, 86, 1)',
                        'rgba(75, 192, 92, 1)',
                        'rgba(153, 10, 255, 1)',
                        'rgba(255, 59, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
});