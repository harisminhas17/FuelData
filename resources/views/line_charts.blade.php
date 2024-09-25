<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>LINE CHARTS</title>
</head>
<body>
    <h2>Trends Over Time</h2>
    <div id="trends_over_time"></div>

    <script>
    var trendsData = @json($trendsOverTime);

    var dates = [];
    var regular = [];
    var superFuel = [];
    var diesel = [];
    var totalInvoice = [];

    trendsData.forEach(function(item) {
        dates.push(item.day_date); 
        regular.push(item.total_regular); 
        superFuel.push(item.total_super); 
        diesel.push(item.total_diesel); 
        totalInvoice.push(item.total_invoice); 
    });


var trendsOptions = {
    chart: {
        type: 'line',
        height: 400
    },
    series: [{
        name: 'Regular Fuel',
        data: regular
    }, {
        name: 'Super Fuel',
        data: superFuel
    }, {
        name: 'Diesel Fuel',
        data: diesel
    }, {
        name: 'Total Invoice',
        data: totalInvoice
    }],
    xaxis: {
        categories: dates,
        title: {
            text: 'Date'
        }
    },
    yaxis: {
        title: {
            text: 'Quantity / Invoice Amount'
        }
    },
    title: {
        text: 'Trends Over Time',
        align: 'center'
    },
    colors: ['#008FFB', '#00E396', '#FEB019', '#FF4560'],
    dataLabels: {
        enabled: true
    },
    stroke: {
        curve: 'smooth' 
    },
    markers: {
        size: 5
    }
};

var trendsChart = new ApexCharts(document.querySelector("#trends_over_time"), trendsOptions);
trendsChart.render();

    </script>

    <h2>Price Trends</h2>
    <div id="price_trends_chart"></div>

    <script>

    var priceTrendsData = @json($priceTrends);

    var dates = [];
    var regularRates = [];
    var superRates = [];
    var dieselRates = [];

    priceTrendsData.forEach(function(item) {
        dates.push(item.day_date); 
        regularRates.push(item.avg_regular_rate); 
        superRates.push(item.avg_super_rate); 
        dieselRates.push(item.avg_diesel_rate); 
    });

    var priceTrendsOptions = {
        chart: {
            type: 'line',
            height: 400
        },
        series: [
            {
                name: 'Regular Fuel Rate',
                data: regularRates
            }, 
            {
                name: 'Super Fuel Rate',
                data: superRates
            }, 
            {
                name: 'Diesel Fuel Rate',
                data: dieselRates
            }
        ],
        xaxis: {
            categories: dates,
            title: {
                text: 'Date'
            }
        },
        yaxis: {
            title: {
                text: 'Average Fuel Rate'
            }
        },
        title: {
            text: 'Price Trends Over Time',
            align: 'center'
        },
        colors: ['#008FFB', '#00E396', '#FEB019'],
        dataLabels: {
            enabled: true
        },
        stroke: {
            curve: 'smooth'
        },
        markers: {
            size: 5 
        }
    };

    var priceTrendsChart = new ApexCharts(document.querySelector("#price_trends_chart"), priceTrendsOptions);
    priceTrendsChart.render();
    </script>
</body>
</html>