<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHARTS</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
    <h2>Fuel Quantity by Type</h2>
    <div id="fuel_quantity_chart"></div>

    <script>
        
        var fuelData = @json($fuelData);

        var stationIds = [];
        var regular = [];
        var superFuel = [];
        var diesel = [];

        fuelData.forEach(function(item) {
            stationIds.push(item.ucg_station_id);
            regular.push(item.total_regular);
            superFuel.push(item.total_super);
            diesel.push(item.total_diesel);
        });

       
        var fuelOptions = {
            chart: {
                type: 'bar',
                stacked: true
            },
            series: [{
                name: 'Regular',
                data: regular
            }, {
                name: 'Super',
                data: superFuel
            }, {
                name: 'Diesel',
                data: diesel
            }],
            xaxis: {
                categories: stationIds,
                title: {
                    text: 'Station ID'
                }
            },
            yaxis: {
                title: {
                    text: 'Fuel Quantity'
                }
            },
            title: {
                text: 'Fuel Quantity By Type',
                align: 'center'
            }
        };

       
        var fuelChart = new ApexCharts(document.querySelector("#fuel_quantity_chart"), fuelOptions);
        fuelChart.render();
    </script>

    <h2>Total Invoice By Station</h2>
    <div id="invoice_chart"></div>

    <script>
       
        var invoiceData = @json($invoiceData);

        var invoiceStationIds = [];
        var invoiceAmounts = [];

        invoiceData.forEach(function(item) {
            invoiceStationIds.push(item.ucg_station_id);
            invoiceAmounts.push(item.total_invoice);
        });

        var invoiceOptions = {
            chart: {
                type: 'bar',
                height: 400
            },
            series: [{
                name: 'Total Invoice',
                data: invoiceAmounts
            }],
            xaxis: {
                categories: invoiceStationIds,
                title: {
                    text: 'Station ID'
                }
            },
            yaxis: {
                title: {
                    text: 'Total Invoice Amount'
                }
            },
            title: {
                text: 'Total Invoice by Station',
                align: 'center'
            },
            colors: ['#008FFB'],
            dataLabels: {
                enabled: true
            }
        };

        var invoiceChart = new ApexCharts(document.querySelector("#invoice_chart"), invoiceOptions);
        invoiceChart.render();
    </script>

    <h2>Fuel Rate Comparison</h2>
    <div id="fuel_rate_comparison"></div>

    <script>
        
        var fuelRateData = @json($fuelComparsion)[0]; 

        var fuelTypes = ['Regular', 'Super', 'Diesel'];
        var averageFuelRates = [fuelRateData.avg_regular_rate, fuelRateData.avg_super_rate, fuelRateData.avg_diesel_rate];

        var fuelRateOptions = {
            chart: {
                type: 'bar',
                height: 400
            },
            series: [{
                name: 'Average Fuel Rate',
                data: averageFuelRates
            }],
            xaxis: {
                categories: fuelTypes,
                title: {
                    text: 'Fuel Type'
                }
            },
            yaxis: {
                title: {
                    text: 'Average Fuel Rate'
                }
            },
            title: {
                text: 'Fuel Rate Comparison',
                align: 'center'
            },
            colors: ['#00E396'],
            dataLabels: {
                enabled: true
            }
        };

        var fuelRateComparisonChart = new ApexCharts(document.querySelector("#fuel_rate_comparison"), fuelRateOptions);
        fuelRateComparisonChart.render();
    </script>

</body>
</html>
