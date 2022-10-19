<html>
<meta charset="UTF-8">

<head>

</head>

<body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: "./reportController.php?action=report",
            success: function(result) {
                var map;
                const data = JSON.parse(result);
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                map = data
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable(map);
                    var options = {
                        title: 'My Daily Activities'
                    };
                    var chart = new google.visualization.PieChart(document.getElementById(
                        'piechart'));
                    chart.draw(data, options);
                }
            }
        });


    });
    </script>
</body>

</html>