<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</head>

<body>
    <div class="container">

        <div class="d-flex justify-content-center mb-4">
            <div class="card col-6 m-5 pb-5 shadow bg-body rounded">
                <div class="card-header p-2">
                    <h3>Users</h3>
                </div>

                <div class="d-flex justify-content-center mb-4">
                    <select class="form-select form-select mb-3 mt-3" style="width: 50%" id="usersChartFilter"
                        aria-label=".form-select-lg example">
                        <option disabled selected>Choose filtering options</option>
                        <option value="1">Type</option>
                        <option value="2">Status</option>
                    </select>
                </div>


                <canvas id="usersChart" width="400" height="180"></canvas>

            </div>

            <div class="card col-6 m-5 pb-5 shadow bg-body rounded">
                <div class="card-header p-2">
                    <h3>Properties</h3>
                </div>

                <div class="d-flex justify-content-center mb-4">
                    <select class="form-select form-select mb-3 mt-3" style="width: 50%" id="propertiesChartFilter"
                        aria-label=".form-select-lg example">
                        <option disabled selected>Choose filtering options</option>
                        <option value="1">Availability</option>
                        <option value="2">Verification</option>
                        <option value="3">Property Type</option>

                    </select>
                </div>


                <canvas id="propertiesChart" width="400" height="180"></canvas>

            </div>
        </div>


        <div class="d-flex justify-content-center mb-4">

            <div class="card col-10 m-5 pb-5 shadow bg-body rounded">
                <div class="card-header p-2">
                    <h3>Property Locations</h3>
                </div>




                <canvas id="propertyLocationChart" width="600" height="260"></canvas>

            </div>
        </div>


    </div>
</body>

</html>


<script>
$(document).ready(function() {

    var propertiesChart, propertiesChart2, propertiesChart3;
    showUsersChart(1);
    showPropertiesChart(1);
    showPropertyLocationChart();

    $("#propertiesChartFilter").on('change', function() {

        var filter = $(this).val();
        showPropertiesChart(filter);

    });


    $("#usersChartFilter").on('change', function() {

        var filter = $(this).val();
        showUsersChart(filter);

    });


    function showPropertiesChart(filter) {

        $.ajax({
            url: "<?php echo base_url('properties/propertyChartData') ?>",
            method: "POST",
            data: {
                filter: filter,
            },
            success: function(data) {
                console.log(data);

                const ctx = document.getElementById('propertiesChart').getContext('2d');

                //Destroy existing chart on ajax reload
                if (typeof propertiesChart !== 'undefined') {
                    propertiesChart.destroy()
                }

                propertiesChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Users',
                            data: data.numbers,
                            backgroundColor: [
                                'rgb(30, 216, 167)',
                                'rgb(255, 99, 132)',
                                'rgb(250, 220, 72)',
                                'rgb(96, 221, 235)',
                                'rgb(184, 230, 227)',


                            ],
                            hoverOffset: 4
                        }]
                    },
                });

            }

        });


    }

    function showUsersChart(filter) {

        $.ajax({
            url: "<?php echo base_url('users/usersChartData') ?>",
            method: "POST",
            data: {
                filter: filter,
            },
            success: function(data) {
                const ctx = document.getElementById('usersChart').getContext('2d');

                //Destroy existing chart on ajax reload
                if (typeof propertiesChart3 !== 'undefined') {
                    propertiesChart3.destroy()
                }

                propertiesChart3 = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Properties',
                            data: data.totals,
                            backgroundColor: [
                                'rgb(30, 216, 167)',
                                'rgb(255, 99, 132)',
                                'rgb(250, 220, 72)',


                            ],
                            hoverOffset: 4
                        }]
                    },
                });

            }

        });


    }

    function showPropertyLocationChart() {
        $.ajax({
            url: "<?php echo base_url('properties/propertyLocationChartData') ?>",
            method: "GET",

            success: function(data) {
                const colors = getColors(data.totals.length);
                const ctx = document.getElementById('propertyLocationChart').getContext(
                    '2d');
                //Destroy existing chart on ajax reload
                if (typeof propertiesChart2 !== 'undefined') {
                    propertiesChart2.destroy()
                }
                propertiesChart2 = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        labels: data.counties,
                        datasets: [{
                            label: 'Properties',
                            data: data.totals,
                            backgroundColor: colors,
                            hoverOffset: 4
                        }]
                    },
                });

            }

        });
    }

    function getColors(size) {

        var colors = [];

        $.ajax({
            url: "https://gist.githubusercontent.com/jjdelc/1868136/raw/c9160b1e60bd8c10c03dbd1a61b704a8e977c46b/crayola.json",
            method: "GET",

            success: function(data) {
                const result = JSON.parse(data);
                let colors2 = colors;

                let r = Math.floor(Math.random() * 87);

                for (let i = 0; i < size; i++) {
                    colors2.push("rgb" + result[r++].rgb);
                }


            },
            async: false

        });

        return colors;
    }


});
</script>