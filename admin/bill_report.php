<?php
 require_once "index.php";
$from_date = $_GET['from_date'];
$to_date = $_GET['to_date'];

 ?>
<style>
 .customer{
  color:black;
  background-color: #eaedf0;
}


</style>
		

        <div class="container"> 
          
            
       
        <div class="card">
            <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Bill Report</p><bR><hr>

        
              
                   
               
<?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection,'pwlm');

                echo $from_date;
                echo $to_date;

                $query ="SELECT *, bill.id, bill.customer_id, customer.fname, customer.lname,
                bill.bill_no, bill.meter_no, bill.period_from, bill.period_to, bill.bill_amount,
                bill.bill_date, bill.due_date, bill.encoded_by, bill.date_created FROM bill 
                INNER JOIN customer ON bill.customer_id=customer.id WHERE date_created BETWEEN '$from_date' AND '$to_date'
                GROUP BY bill.id ORDER BY bill_no DESC
                ";
                $query_run = mysqli_query($connection, $query);
                ?>

<table class="table table-fluid" >
  <thead style="background-color:#e6e7e9;">
    <tr>
    <th hidden scope="col">ID</th>
            <th scope="col">Customer</th>  
            <th scope="col">Bill No.</th>
            <th scope="col">Meter No.</th> 
            <th scope="col">Period From</th> 
            <th scope="col">Period To</th> 
            <th scope="col">Bill Amount</th>
            <th scope="col">Bill Date</th> 
            <th scope="col">Due Date</th> 
            <th scope="col">Encoded By</th> 
            <th scope="col">Date Created</th> 

           
    </tr>
  </thead>
  
  <tbody>
  <?php 
              
                  foreach($query_run as $row)
                 { 
                ?>
    <tr>
    <td hidden><?php echo $row['id'];?></td>
            <td><?php  echo $row['lname'].", ".$row['fname'];?></td>
            <td><?php echo $row['bill_no'];?></td>
            <td><?php echo $row['meter_no'];?></td>
            <td><?php echo $row['period_from'];?></td>
            <td><?php echo $row['period_to'];?></td>
            <td><?php echo $row['bill_amount'];?></td>
            <td><?php echo $row['bill_date'];?></td>
            <td><?php echo $row['due_date'];?></td>
            <td><?php echo $row['encoded_by'];?></td>
            <td><?php echo $row['date_created'];?></td>

          
           
            <?php
                    }
          
               
            ?>
          </tr>
    
  </tbody>


</table>
            </div>
        </div>

     </div>

<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js" ></script>

     <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>

<script>
$(document).ready(function() {
    $('#datatableid').DataTable()
      
} );
</script>

<script>
$(document).ready(function(){
    $('.editbtn').on('click',function(){
        $('#editmodal').modal('show');
        
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
        return $(this).text();
        }).get();
        console.log(data);
    
    $('#update_id').val(data[0]);
    $('#lname').val(data[1]);
    $('#fname').val(data[2]);
    $('#contact').val(data[3]);
    $('#addr').val(data[4]);
    $('#conn_status').val(data[5]);

    
    });
});

</script>


<script >
$(document).ready(function(){
    $('.deletebtn').on('click',function(){
        $('#deletemodal').modal('show');
        
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
        return $(this).text();
        }).get();
        console.log(data);
    
    $('#delete_id').val(data[0]);
    $('#customer_id').val(data[1]);
    $('#bill_no').val(data[2]);
    });
});

</script>

		
		
		
      </div>
    </div>
</div>

</body>
</html>