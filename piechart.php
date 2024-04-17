<?php require_once 'dbconn.php';?>

<?php 

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



            <div id="piechart" style="width: 250px; height: 250px;"></div>


            <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>piechart</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
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
        title: 'My Daily Activities',
        width: 900,
        height: 500
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
</head>
<body>
  <div id="piechart"></div>
</body>
</html>
