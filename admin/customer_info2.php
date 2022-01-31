<?php
 require_once "index.php";
 require_once 'config.php';
 ?>
<?php 
$id = $_GET['id']; 
$name = $_GET['cust']; 
$query =mysqli_query($conn, "SELECT DISTINCT  customer.lname,
customer.contact, customer.addr FROM  customer 
WHERE customer.id='$id' ");
while($row = mysqli_fetch_array($query)) {
  $contact =  $row['contact']; 
  $addr =  $row['addr'];}
?>

<!-- ==========================update============================- -->
<div class="modal fade" id="addpaymentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="addpayment.php" method="POST">
      <div class="modal-body">
             
    

            <input type="hidden" name="update_id" id="update_id">
            <input type="hidden" name="customer_id" id="customer_id">

            <div class="form-group">
       <label class="font-weight-bold">Customer Name</label>
          <input type="text" name="customer_name" id="customer_name" class="form-control"  readonly>
    </div>

            <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Bill No.</label>
           <input type="text" name="bill_no" id="bill_no" class="form-control" readonly>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Meter No.</label>
          <input type="text" name="meter_no" id="meter_no" class="form-control" readonly>
    </div>
   </div>
   <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Period From</label>
           <input type="text" name="period_from" id="period_from" class="form-control" readonly>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Period To</label>
       
          <input type="text" name="period_to" id="period_to" class="form-control" readonly>
    </div>
   </div>

   <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Bill Date</label>
           <input type="text" name="bill_date" id="bill_date" class="form-control" readonly>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Due Date</label>
       
          <input type="text" name="due_date" id="due_date" class="form-control" readonly>
    </div>
   </div>

   <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Bill Amount</label>
           <input type="text" name="bill_amount" id="bill_amount" class="form-control" readonly>
     </div>

     <div class="col-md-6">
        <label class="font-weight-bold">Amount Paid</label>
       
          <input type="number" name="balance" id="balance"  class="form-control" readonly>
    </div>
    </div>
    <div class="col-md-6">
        <label class="font-weight-bold">Amount Tendered</label>
     <input type="number" name="amount_tendered" id="amount_tendered" style="border-color:red;" class="form-control" placeholder="P 0.00">
   </div>
   <input type="text" name="encoded_by" id="encoded_by" class="form-control" value='<?php   echo $_SESSION['username']; ?>' hidden>
   <input type="text" name="status" id="status" class="form-control" hidden>
   <input type="text" name="fname" id="fname" class="form-control" hidden>
   <input type="text" name="lname" id="lname" class="form-control" hidden>


           

           
           

      </div>
      <div class="modal-footer">
        <button type="submit" name="savepayment" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
      </form>
    </div>
  </div>
</div>

<!-- ===================================SMS===================- -->



<div class="modal fade" id="SMSModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Bill</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="api.php" method="POST">
      <div class="modal-body">
             
    

            <input type="hidden" name="update_id" id="update_id">
            
            <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Bill No</label>
           <input type="text" name="billno" id="bill_no1" class="form-control" readonly required>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Meter No</label>
          <input type="text" name="meterno" id="meter_no1"class="form-control" readonly required>
    </div>
   </div>
   <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Period From</label>
           <input type="text" name="period_from" id="period_from1" class="form-control" readonly required>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Period To</label>
          <input type="text" name="period_to" id="period_to1"class="form-control" readonly required>
    </div>
   </div>
   <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Bill Amount</label>
           <input type="text" name="bill_amount" id="bill_amount1" class="form-control" readonly required>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Due Date</label>
          <input type="text" name="due_date" id="due_date1"class="form-control"  readonly required>
    </div>
   </div>

           
          
      </div>
      <div class="modal-footer">
        <button type="submit" name="updatedata" class="btn btn-primary">Send</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
      </form>
    </div>
  </div>
</div>

<!-- ======================================================- -->

<div class="container"> 
          <div class="card" style="height:200px;">
          <div class="card-body" >
          <p class="card-title text-md-center text-xl-left">View Customer Billing Information</p><bR><hr>
          <p style=" font-size:23px;"><?php echo $name;?>       
          
</p>
          <p style="margin-top:-10px; font-size:20px;"><i style="color:green;" class="fa fa-map-marker-alt" ></i> <?php echo $addr;?></p>
          <p style="margin-top:-18px; font-size:20px;"><i style="color:blue;" class="fas fa-phone-square-alt"></i> <?php echo $contact;?></p>  
         
        </div>          
          </div>
      <div class="card">
          <div class="card-body">
  
     
                 
             
<?php
              require_once "config.php";
              $query ="SELECT bill.id, bill.customer_id, customer.fname, customer.lname,
              bill.bill_no, bill.meter_no, bill.period_from, bill.period_to, bill.bill_amount,
              bill.bill_date, bill.due_date, bill.encoded_by, bill.status, amount_tendered, balance FROM bill 
              INNER JOIN customer ON bill.customer_id=customer.id where bill.customer_id = '$id' ORDER BY `id` DESC ";
              $query_run = mysqli_query($conn, $query);
      
            
             ?>
            
            <table class="table table-fluid" id="myTable">
<thead class="thead-style">
  <tr>    
          <th scope="col" hidden>Customer ID</th>
          <th scope="col" hidden>Customer Name</th>
          <th scope="col">Payment</th>
          <th scope="col">Send Billing</th>
          <th scope="col">Bill No.</th>
          <th scope="col">Meter No.</th> 
          <th scope="col">Period From</th> 
          <th scope="col">Period To</th> 
          <th scope="col">Bill Amount</th>
          <th scope="col">Bill Date</th> 
          <th scope="col">Due Date</th> 
          <th scope="col">Encoded By</th> 
          <th scope="col" hidden>Status</th> 
          <th scope="col" hidden>Amount Tendered</th> 
          <th scope="col" hidden>Paid</th> 
          <th scope="col" hidden></th> 
          <th scope="col" hidden></th> 

  </tr>
</thead>

<tbody>
<?php 
            
                foreach($query_run as $row)
               { 
               
              ?>
  <tr>
      
       
           <td style="width:100px; "><?php
            
      if($row['status']=='Paid'){
         echo '<center><button readonly class="btn btn-success btn-sm" style="color:white;"><i class="fas fa-check-square" style="color:white;"></i> Paid</button></center>';
         
      }
       if($row['status']=='Underpaid' and $row['balance']>0){
        echo '<center><button type="button" class="btn btn-outline-warning btn-sm addpaymentbtn">
      Add Payment</button> <br><button readonly style="margin-top:10px; font-size:12px;" class="btn btn-primary btn-sm style="color:red;"> Credit '.$row['balance'].'</p> </center>
      '; 
        
      }
        if($row['status']=='Underpaid' and $row['balance']<0){
          echo '<center><button type="button" class="btn btn-outline-warning btn-sm addpaymentbtn">
        Add Payment</button> <button readonly style="margin-top:10px; font-size:12px;" class="btn btn-danger btn-sm"> Debit '.$row['balance'].'</button> </center>
        '; 
        }
        if($row['status']=='Underpaid' and $row['balance']==0){
          echo '<center><button type="button" class="btn btn-outline-warningbtn-sm addpaymentbtn">
        Add Payment</button> <button readonly style="margin-top:10px; font-size:12px;" class="btn btn-success btn-sm"> Paid '.$row['balance'].'</button> </center>
        '; 
        }
      if ($row['status']=='Unpaid') {
        echo '<center><button type="button" class="btn btn-outline-warning btn-sm addpaymentbtn">Add Payment</button> </center>
        ';  }
      ?></td>



<td style="width:100px; "><?php
            
            if($row['status']=='Paid'){
               echo '';
               
            }
             if($row['status']=='Underpaid' and $row['balance']>0){
              echo ' <center><button type="button" class="btn btn-success  btn-sm sendsms">Send</button> 
               </center>
            '; 
              
            }
              if($row['status']=='Underpaid' and $row['balance']<0){
                echo '<center><button type="button" class="btn btn-outline-primary  btn-sm sendsms">Send</button>  </center>
              '; 
              }
              if($row['status']=='Underpaid' and $row['balance']==0){
                echo ' <center><button type="button" class="btn btn-success  btn-sm sendsms">Send</button>  </center>
              '; 
              }
            if ($row['status']=='Unpaid') {
              echo '<center><button type="button" class="btn btn-success  btn-sm sendsms">Send</button>  </center>
              ';  }
            ?></td>
      
      








          <td hidden><?php echo $row['customer_id']?></td>
          <td hidden><?php echo $row['lname'].", ".$row['fname'];?></td>
          <td><?php echo $row['bill_no'];?></td>
          <td><?php echo $row['meter_no'];?></td>
          <td><?php  echo $row['period_from'];?></td>
          <td><?php echo $row['period_to'];  ?></td>
          <td><?php echo $row['bill_amount'];?></td>
          <td><?php echo $row['bill_date'];?></td>
          <td><?php echo $row['due_date']; ?></td>
          <td><?php echo $row['encoded_by'];?></td>
          <td hidden><?php echo $row['status'];?></td>
          <td hidden><?php echo $row['amount_tendered'];?></td>
          <td hidden><?php echo $row['balance'];?></td>
          <td hidden><?php echo $row['fname'];?></td>
          <td hidden><?php echo $row['lname'];?></td>
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
  $('.addpaymentbtn').on('click',function(){
      $('#addpaymentmodal').modal('show');
      
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function(){
      return $(this).text();
      }).get();
      console.log(data);

  $('#update_id').val(data[0]);
  $('#customer_id').val(data[1]);
  $('#customer_name').val(data[2]);
  $('#bill_no').val(data[3]);
  $('#meter_no').val(data[4]);
  $('#period_from').val(data[5]);
  $('#period_to').val(data[6]);
  $('#bill_amount').val(data[7]);
  $('#bill_date').val(data[8]);
  $('#due_date').val(data[9]);
  $('#encoded_by').val(data[10]);
  $('#status').val(data[11]);
  $('#amount_tendered').val(data[12]);
  $('#balance').val(data[13]);
  $('#fname').val(data[14]);
  $('#lname').val(data[15]);



  
  });
});

</script>


<script>
$(document).ready(function(){
  $('.sendsms').on('click',function(){
      $('#SMSModal').modal('show');
      
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function(){
      return $(this).text();
      }).get();
      console.log(data);

  $('#update_id1').val(data[0]);
  $('#customer_id1').val(data[1]);
  $('#customer_name1').val(data[2]);
  $('#bill_no1').val(data[3]);
  $('#meter_no1').val(data[4]);
  $('#period_from1').val(data[5]);
  $('#period_to1').val(data[6]);
  $('#bill_amount1').val(data[7]);
  $('#bill_date1').val(data[8]);
  $('#due_date1').val(data[9]);
  $('#encoded_by1').val(data[10]);
  $('#status1').val(data[11]);
  $('#amount_tendered1').val(data[12]);
  $('#balance1').val(data[13]);
  $('#fname1').val(data[14]);
  $('#lname1').val(data[15]);



  
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

  });
});

</script>

      
      
      
    </div>
  </div>
</div>

</body>
</html>