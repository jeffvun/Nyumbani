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
        <div class="card col-8 m-5 pb-5 shadow bg-body rounded">
            <div class="card-header p-2">
                <h3>Properties</h3>
            </div>

            <div class="d-flex justify-content-center mb-4">
                <select class="form-select form-select mb-3 mt-3" style="width: 50%" id="propertiesChartFilter"
                    aria-label=".form-select-lg example">
                    <option disabled selected>Choose filtering options</option>
                    <option value="1">Availability</option>
                    <option value="2">Verification</option>
                </select>
            </div>


            <canvas id="propertiesChart" width="400" height="180"></canvas>

        </div>

    </div>
</body>

</html>


<script>
$(document).ready(function() {

    // $.ajax({
    //     url: "<?php echo base_url('properties/chartData') ?>",
    //     method: "POST",
    //     data: {
    //         filter: 1,
    //     },
    //     success: function(data) {

    //         showPropertiesChart(data);
    //     }

    // })
    var propertiesChart;
    showPropertiesChart(1);

    $("#propertiesChartFilter").on('change', function() {

        var filter = $(this).val();

        showPropertiesChart(filter);

        // $.ajax({
        //     url: "<?php echo base_url('properties/chartData') ?>",
        //     method: "POST",
        //     data: {
        //         filter: filter,
        //     },
        //     success: function(data) {

        //         showPropertiesChart(data);

        //     }

        // })

    });


    function showPropertiesChart(filter) {

        $.ajax({
            url: "<?php echo base_url('properties/propertyChartData') ?>",
            method: "POST",
            data: {
                filter: filter,
            },
            success: function(data) {

                const ctx = document.getElementById('propertiesChart').getContext('2d');
                console.log(typeof propertiesChart);

                //Destroy existing chart on ajax reload
                if (typeof propertiesChart !== 'undefined') {
                    propertiesChart.destroy()
                }
                propertiesChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Properties',
                            data: data.numbers,
                            backgroundColor: [
                                'rgb(30, 216, 167)',
                                'rgb(255, 99, 132)',

                            ],
                            hoverOffset: 4
                        }]
                    },
                });

            }

        })


    }




});


// const ctx = document.getElementById('propertiesChart').getContext('2d');
// const propertiesChart = new Chart(ctx, {
//     type: 'doughnut',
//     data: {
//         labels: [
//             'Rented',
//             'Vacant'
//         ],
//         datasets: [{
//             label: 'My First Dataset',
//             data: [20, 200],
//             backgroundColor: [
//                 'rgb(30, 216, 167)',
//                 'rgb(255, 99, 132)',

//             ],
//             hoverOffset: 4
//         }]
//     },
// });
</script>