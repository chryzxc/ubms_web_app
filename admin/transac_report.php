<?php
 require_once "index.php";


 ?>
<style>
 .reports{
  color:black;
  background-color: #eaedf0;
}


</style>
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>	
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Billing Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="transac_report1.php" method="GET">
      <div class="modal-body">
              
      <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">From Date</label>
           <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control" placeholder="First name" required>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">To Date</label>
          <input type="date" name="to_date"  value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control" placeholder="Last name" required>
    </div>
   </div>

      </div>
      <div class="modal-footer">
        <button type="submit" onclick="showDiv()" class="btn btn-primary">Filter</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
      </form>
    </div>
  </div>
</div>

        <div class="container"> 
          
            
       
        <div class="card">
            <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Transaction Report

            <button style="margin-left:420px;" type="button" class="btn btn-primary btn-sm" onclick="location.href = 'reports.php';" > Bill Report</button>&nbsp
            <button type="button" class="btn btn-success btn-sm" onclick="location.href = 'cus_report.php';" > Customer Report</button>&nbsp
            <button type="button" class="btn btn-info btn-sm" onclick="location.href = 'transac_report.php';" > Transaction Report</button>&nbsp
            <button type="button" class="btn btn-danger btn-sm" data-target="#filterModal" data-toggle="modal"" > Filter Date</button>&nbsp
            <button type="button" class="btn btn-warning btn-sm" onclick="printDiv('printableArea')" > Print</button>&nbsp



            </p>
<br>
            <hr>

        
              
         <div id="printableArea">          
               
        
            <?php
               $connection = mysqli_connect("localhost","id18158940_root","p2]et1I%7b9nZqY2");
                $db = mysqli_select_db($connection,'id18158940_ubms');
                
                 // $query ="SELECT id,bill_id,customer_id,amount_tendered,date_paid,encoded_by,payment_method, //payment.encoded_by FROM payment INNER JOIN customer on customer.id = payment.customer_id";
             
                $query ="SELECT *, payment.encoded_by FROM payment INNER JOIN customer on customer.id = payment.customer_id ORDER BY date_paid DESC";
                $query_run = mysqli_query($connection, $query);
                ?>

<table class="table table-fluid table-hover" >
  <thead style="background-color:#e6e7e9;">
    <tr>
            <th scope="col">ID</th>
            <th scope="col">Bill No</th>  
            <th scope="col">Customer Name</th>
            <th scope="col">Amount Tendered</th> 
            <th scope="col">Date Paid</th> 
            <th scope="col">Encoded By</th> 

 
    </tr>
  </thead>
  
  <tbody>
  <?php 
              
                  foreach($query_run as $row)
                 { 
                ?>
    <tr>
            <td><?php  echo $row['id'];?></td>
            <td><?php echo $row['bill_id'];?></td>
            <td><?php echo $row['fname'].' '.$row['fname'];?></td>
            <td>₱ <?php echo number_format($row['amount_tendered']);?></td>
            <td><?php 
            
            
            // create a $dt object with the UTC timezone
$dt = new DateTime($row['date_paid'], new DateTimeZone('UTC'));

// get the local timezone
$loc = new DateTimeZone('Asia/Manila');

// change the timezone of the object without changing its time
$dt->setTimezone($loc);

// format the datetime
$dt->format('Y-m-d H:i:s');

echo $dt->format('Y-m-d h:i:s A');
            
  //     $utc = new DateTimeZone('UTC');
///$local = new DateTimeZone('Asia/Manila');
//$dt = new DateTime($row['date_paid'], $utc);

//$dt->setTimezone($local);
//echo $dt->format('c'), PHP_EOL;


            
            ?></td>
            <td><?php echo $row['encoded_by'];?></td>
           
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