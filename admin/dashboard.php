<?php
 include "index.php";
 include "config.php";

 ?>
 <style>
.dashboard{
  color:black;
  background-color: #eaedf0;
}
</style>
          <div class="row" >
          <div class="col-12 col-sm-6 col-md-4" >
            <div class="small-box shadow-sm " style="background-color:white;"> 
              <div class="inner">
                  
                <h3 ><?php echo $conn->query("SELECT * FROM customer")->num_rows+1; ?></h3>

                <p>Total Customers</p>
              </div>
              <div class="icon" >
                <i class="fa fa-users fa-5x"  style="background-color:white;" ></i>
              </div>
            </div>
          </div>




          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box shadow-sm " style="background-color:white;">
              <div class="inner">
                  
                <h3><?php echo $conn->query("SELECT * FROM bill")->num_rows;  ?></h3>

                <p>Total Billing</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart fa-5x" ></i>
              </div>
            </div>
          </div>




          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box shadow-sm " style="background-color:white;">
              <div class="inner">
                  
                <h3><?php echo $conn->query("SELECT * FROM customer")->num_rows; ?></h3>

                <p >Total Invoice</p>
              </div>
              <div class="icon" style="width:00px;">
                <i class="fas fa-sticky-note fa-5x" ></i>
              </div>
            </div>
          </div>




          
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box shadow-sm " style="background-color:white;">
              <div class="inner">
                  
                <h3><?php echo $conn->query("SELECT * FROM user")->num_rows; ?></h3>

                <p>Total Accounts</p>
              </div>
              <div class="icon">
                <i class="fas fa-user fa-5x"  ></i>
              </div>
            </div>
          </div>




          
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box shadow-sm " style="background-color:white;">
              <div class="inner">
                  
                <h3><?php
                require 'config.php';
                foreach($conn->query('SELECT SUM(amount_tendered) 
                FROM invoice WHERE DATE(date_paid)=CURDATE()' ) as $row) {
                echo "<tr>";
                echo "<td>" .'₱ '. number_format($row['SUM(amount_tendered)']) .''; "</td>";
                echo "</tr>"; 
                }

                
                ?></h3>

                <p>Payment Today</p>
              </div>
              <div class="icon" style="width:00px;">
                <i class="fas fa-coins fa-5x"  ></i>
              </div>
            </div>
          </div>



          
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box shadow-sm " style="background-color:white;">
              <div class="inner">
                  
                <h3><?php
                require 'config.php';
                foreach($conn->query('SELECT SUM(amount_tendered) 
                FROM invoice' ) as $row) {
                echo "<tr>";
                echo "<td>" .'₱ '. number_format($row['SUM(amount_tendered)']) .' '; "</td>";
                
                echo "</tr>"; 
                }

                
                ?></h3>

                <p>Total Payments</p>
              </div>
              <div class="icon" style="width:00px;">
                <i class="fas fa-money-check fa-5x"  ></i>
              </div>
            </div>
          </div>
          


</div>


<?php
    /* Database connection settings */
    $host = 'localhost';
    $user = 'id18158940_root';
    $pass = 'p2]et1I%7b9nZqY2';
    $db = 'id18158940_ubms';
    $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

    $data1 = '';
    $data2 = '';

    //query to get data from the table
    $sql = "SELECT date_paid, SUM(amount_tendered) AS total_grand  FROM invoice GROUP BY date_paid ";

    $result = mysqli_query($mysqli, $sql);

    //loop through the returned data
    while ($row = mysqli_fetch_array($result)) {

        $data1 = $data1 . '"'. $row['date_paid'].'",';
        $data2 = $data2 . '"'. $row['total_grand'] .'",';
    }

    $data1 = trim($data1,",");
    $data2 = trim($data2,",");
?>

        <script type="text/javascript" src="Chart.bundle.min.js"></script>

      
    </head>
    <div class="container"  style="color:black"> 
   
     

            <canvas id="chart" style="width: 100%; height: 75vh; background: white;  margin-top: -40px;"></canvas>

            <script>
                var ctx = document.getElementById("chart").getContext('2d');
                var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?php echo $data1; ?> ],
                    datasets: 
                    [

                    {
                        label: 'Daily Payments Total ',
                        data: [<?php echo $data2; ?>, ],
                        backgroundColor: 'transparent',
                        borderColor:'rgb(0,0,255)',
                        borderWidth: 3  
                    }]
                },

                options: {
                    scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                    tooltips:{mode: 'index'},
                    legend:{display: true, position: 'top', labels: {fontColor: 'black', fontSize: 16}}
                }
            });
            </script>
        </div>
       
      </div>
   <footer><center>
Copyright © 2021
   </footer>