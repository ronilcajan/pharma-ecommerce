doughnutChart = document.getElementById('doughnutChart').getContext('2d'),
barChart = document.getElementById('barChart').getContext('2d');

$.ajax({
    type: "POST",
    url: SITE_URL+"dashboard/getOrders",
    dataType: "json",
    success: function(response) {
        console.log(response);
        new Chart(doughnutChart, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [response.total, response.undeliver, response.deliver],
                    backgroundColor: ['#1972E8','#6861CE','#31CE36']
                }],
        
                labels: [
                'Total Orders',
                'Delivery Ongoing',
                'Orders Delivered'
                ]
            },
            options: {
                responsive: true, 
                maintainAspectRatio: false,
                legend : {
                    position: 'bottom'
                },
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                }
            }
        });
    }
});

$.ajax({
    type: "POST",
    url: SITE_URL+"dashboard/getSales",
    dataType: "json",
    success: function(response) {
        console.log(response);

        new Chart(barChart, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets : [{
                    label: "Sales",
                    backgroundColor: 'rgb(23, 125, 255)',
                    borderColor: 'rgb(23, 125, 255)',
                    data: [
                        response.jan.amount, 
                        response.feb.amount, 
                        response.mar.amount, 
                        response.apr.amount, 
                        response.may.amount, 
                        response.jun.amount, 
                        response.jul.amount, 
                        response.aug.amount, 
                        response.sep.amount, 
                        response.oct.amount, 
                        response.nov.amount, 
                        response.dec.amount
                    ],
                }],
            },
            options: {
                responsive: true, 
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
            }
        });
    }
});

