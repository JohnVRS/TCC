$totalVisitors = $valorReceita + $valorDespesa;

$newVsReturningVisitorsDataPoints = array(
    array("y" => $valorReceita, "name" => "Receita", "color" => "#3d9e1f"),
    array("y" => $valorDespesa, "name" => "Despesa", "color" => "#9e1f1f")
);

$newVisitorsDataPoints = array(
    array("x" => 1420050600000, "y" => 33000),
    array("x" => 1422729000000, "y" => 35960),
    array("x" => 1425148200000, "y" => 42160),
    array("x" => 1427826600000, "y" => 42240),
    array("x" => 1430418600000, "y" => 43200),
    array("x" => 1433097000000, "y" => 40600),
    array("x" => 1435689000000, "y" => 42560),
    array("x" => 1438367400000, "y" => 44280),
    array("x" => 1441045800000, "y" => 44800),
    array("x" => 1443637800000, "y" => 48720),
    array("x" => 1446316200000, "y" => 50840),
    array("x" => 1448908200000, "y" => 51600)
);

$returningVisitorsDataPoints = array(
    array("x" => 1420050600000, "y" => 22000),
    array("x" => 1422729000000, "y" => 26040),
    array("x" => 1425148200000, "y" => 25840),
    array("x" => 1427826600000, "y" => 23760),
    array("x" => 1430418600000, "y" => 28800),
    array("x" => 1433097000000, "y" => 29400),
    array("x" => 1435689000000, "y" => 33440),
    array("x" => 1438367400000, "y" => 37720),
    array("x" => 1441045800000, "y" => 35200),
    array("x" => 1443637800000, "y" => 35280),
    array("x" => 1446316200000, "y" => 31160),
    array("x" => 1448908200000, "y" => 34400)
);

<script>
                window.onload = function() {

                    var totalVisitors = <?php echo $totalVisitors ?>;
                    var visitorsData = {
                        "New vs Returning Visitors": [{
                            click: visitorsChartDrilldownHandler,
                            cursor: "pointer",
                            explodeOnClick: false,
                            innerRadius: "75%",
                            legendMarkerType: "square",
                            name: "New vs Returning Visitors",
                            radius: "100%",
                            showInLegend: true,
                            startAngle: 90,
                            type: "doughnut",
                            dataPoints: <?php echo json_encode($newVsReturningVisitorsDataPoints, JSON_NUMERIC_CHECK); ?>
                        }],
                        "New Visitors": [{
                            color: "#3d9e1f",
                            name: "New Visitors",
                            type: "column",
                            xValueType: "dateTime",
                            dataPoints: <?php echo json_encode($newVisitorsDataPoints, JSON_NUMERIC_CHECK); ?>
                        }],
                        "Returning Visitors": [{
                            color: "#9e1f1f",
                            name: "Returning Visitors",
                            type: "column",
                            xValueType: "dateTime",
                            dataPoints: <?php echo json_encode($returningVisitorsDataPoints, JSON_NUMERIC_CHECK); ?>
                        }]
                    };

                    var newVSReturningVisitorsOptions = {
                        animationEnabled: true,
                        theme: "dark2",
                        title: {
                            text: "Receita x Despesa"
                        },
                        
                        legend: {
                            fontFamily: "calibri",
                            fontSize: 14,
                            itemTextFormatter: function(e) {
                                return e.dataPoint.name + ": " + Math.round(e.dataPoint.y / totalVisitors * 100) + "%";
                            }
                        },
                        data: []
                    };

                    var visitorsDrilldownedChartOptions = {
                        animationEnabled: true,
                        theme: "light2",
                        axisX: {
                            labelFontColor: "#717171",
                            lineColor: "#a2a2a2",
                            tickColor: "#a2a2a2"
                        },
                        axisY: {
                            gridThickness: 0,
                            includeZero: false,
                            labelFontColor: "#717171",
                            lineColor: "#a2a2a2",
                            tickColor: "#a2a2a2",
                            lineThickness: 1
                        },
                        data: []
                    };

                    var chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
                    chart.options.data = visitorsData["New vs Returning Visitors"];
                    chart.render();

                    function visitorsChartDrilldownHandler(e) {
                        chart = new CanvasJS.Chart("chartContainer", visitorsDrilldownedChartOptions);
                        chart.options.data = visitorsData[e.dataPoint.name];
                        chart.options.title = {
                            text: e.dataPoint.name
                        }
                        chart.render();
                        $("#backButton").toggleClass("invisible");
                    }

                    $("#backButton").click(function() {
                        $(this).toggleClass("invisible");
                        chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
                        chart.options.data = visitorsData["New vs Returning Visitors"];
                        chart.render();
                    });

                }
            </script>



            <div id="chartContainer" style="height: 210px; width: 98%;border-radius: 30px;"></div>
            <button class="btn invisible" id="backButton">&lt; Back</button>
            <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
            <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>



