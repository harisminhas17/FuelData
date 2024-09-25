<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Pie Charts</title>
    <style>
        #fuel_distribution_chart {
            width: 600px;
            height: 600px;
            margin: 0 auto;
        }
        #market_share_chart{
            width: 600px;
            height: 600px;
            margin: 0% auto;
        }
    </style>
</head>
<body>

    <h2>Market Share by Station</h2>
    <div id="market_share_chart"></div>

    <h2>Fuel Type Distribution</h2>
    <div id="fuel_distribution_chart"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var invoiceShareData = @json($invoiceData);

            var stationIds = [];
            var totalInvoices = [];

            invoiceShareData.forEach(function(item) {
                stationIds.push(item.ucg_station_id);
                totalInvoices.push(Number(item.total_invoice));
            });

            var invoiceOptions = {
                chart: {
                    type: 'pie'
                },
                series: totalInvoices,
                labels: stationIds,
                title: {
                    text: 'Market Share by Station'
                }
            };

            var invoiceChart = new ApexCharts(document.querySelector("#market_share_chart"), invoiceOptions);
            invoiceChart.render();


            var fuelData = @json($fuelType[0]); 

            var fuelTypes = ['Regular', 'Super', 'Diesel'];
            var fuelQuantities = [
                Number(fuelData.regular),  
                Number(fuelData.super),  
                Number(fuelData.diesel)    
            ];

            var fuelOptions = {
                chart: {
                    type: 'pie'
                },
                series: fuelQuantities, 
                labels: fuelTypes,      
                title: {
                    text: 'Fuel Type Distribution'
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " units";
                        }
                    }
                }
            };

            var fuelChart = new ApexCharts(document.querySelector("#fuel_distribution_chart"), fuelOptions);
            fuelChart.render();
        });
    </script>
</body>
</html>
