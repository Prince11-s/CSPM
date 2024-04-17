<?php
    include 'sidebar.php';
    include 'total_amt_count.php';
    include 'dbconn.php';

    $query = "SELECT * FROM add_product"; 
    $result = mysqli_query($conn,$query);


    $chamfering = mysqli_query($conn, "SELECT * FROM add_product WHERE descrip='Chamfering'");
    $chamfering_count = mysqli_num_rows($chamfering);
    //echo $chamfering_count;

    $assembly = mysqli_query($conn, "SELECT * FROM add_product WHERE descrip='Assembly'");
    $assembly_count = mysqli_num_rows($assembly);
    //echo $assembly_count;

    $Painting = mysqli_query($conn, "SELECT * FROM add_product WHERE descrip='Painting'");
    $painting_count = mysqli_num_rows($Painting);
    //echo $painting_count;

    $punching = mysqli_query($conn, "SELECT * FROM add_product WHERE descrip='Punching'");
    $punching_count = mysqli_num_rows($punching);
    // $punching_count;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Styles/dashboard_styl.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Count'],
            
            ['Chamfering', <?php echo $chamfering_count; ?>],
            ['Assembly', <?php echo $assembly_count; ?>],
            ['Painting', <?php echo $painting_count; ?>],
            ['Punching', <?php echo $punching_count; ?>]
        ]);

        var options = {
            title: 'Process ',
            pieHole: 0.4,
            backgroundColor: 'transparent',
            legend: 'none',
            width: 400, 
            height: 400,
            titleTextStyle: {
                fontSize: 16, 
                color: '#333', 
                bold: true, 
                italic: false, 
                marginTop: 5, 
         },
         chartArea: {
            top: 65,
            left : 60
      }
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
    
</head>
<body>
    <div>
        <div class="main">
            <div class="show">
            <a href="manage_customer.php" class="cust_sho_contain">
                <div class="content">
                    <div class="head">
                        <div class="head1">
                            <span>Customer</span>
                        </div>
                        <div class="head2">
                            <h6>Total no. of customers</h6>
                        </div>
                    </div>

                    <div class="cust-count-live">
                    <?php
                        require 'dbconn.php';

                        $query = "SELECT id FROM add_customer ORDER BY id";
                        $query_run = mysqli_query($conn,$query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h4>'.$row.'</h4>';
                    ?>
                    </div>
                    </div>
                    </a>

                

                <a href="manage_prod.php" class="prod_sho_contain">
                <div class="content">
                        <div class="head">
                            <div class="head1">
                                <span>Product</span>
                            </div>    
                            <div class="head2">
                                <h6>Total no. of products</h6>
                            </div>
                        </div>

                        <div class="prod-count-live">
                        <?php
                            require 'dbconn.php';

                            $query = "SELECT id FROM add_product ORDER BY id";
                            $query_run = mysqli_query($conn,$query);

                            $row = mysqli_num_rows($query_run);

                            echo '<h4>'.$row.'</h4>';
                        ?>
                        </div>
                </div></a>

            <div class="pie">
                <div id="donutchart" class="pie-chart"></div>
                
                <div class="pie-live-count">

                    
                        <div class="live-count-cham">
                            <i class='bx bxs-circle'></i>
                            <span>Chamfering </span>
                            <label><?php echo $chamfering_count; ?></label>
                        </div>
                        <div class="live-count-assm">
                            <i class='bx bxs-circle'></i>
                            <span>Assembly</span>
                            <label><?php echo $assembly_count; ?></label>
                        </div>
                        <div class="live-count-punc">
                            <i class='bx bxs-circle'></i>
                            <span>Painting</span>
                            <label> <?php echo $painting_count; ?></label>
                        </div>
                        <div class="live-count-paint">
                            <i class='bx bxs-circle'></i>
                            <span>Punching</span>
                            <label> <?php echo $punching_count; ?></label>
                        </div>
                    
                    
                </div>
            </div>
            </div>
            <div class="btom_show">
                <div class="chart">
                <div id="bar-chart" class="bar-chart" style="background-color: transparent;" ></div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Process', 'Amount'],
            ['Chamfering', <?php echo $totalChamfering; ?>],
            ['Assembly', <?php echo $totalAssembly; ?>],
            ['Painting', <?php echo $totalPainting; ?>],
            ['Punching', <?php echo $totalPunching; ?>]
        ]);

        var options = {
            title: 'Revenue',
            width: 500,
            height:'auto',
            legend: { position: 'none' },
            chart: { title: 'Revenue',
             },
            bars: 'vertical',
            backgroundColor: 'transparent',
            axes: {
                x: { side: 'top', label: 'Percentage' }
            },
            bar: { groupWidth: "80%" },
            titleTextStyle: {
                color: 'black', // Change the color of the chart title text
                fontSize: 16, 
                bold: true,
                italic: false,
                marginTop:15,
            },
            textStyle: {
                bold:true,
                color: 'black' // Change the color of the axis labels and other text
            },
            colors: ['blue', 'red', 'orange', 'green']
        };

        var chart = new google.charts.Bar(document.getElementById('bar-chart'));
        

        chart.draw(data, google.charts.Bar.convertOptions(options));
    };
</script>


</body>
</html>