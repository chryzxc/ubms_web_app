
<?php
 require_once "index.php";
 ?>
<style>
 .inv{
  color:black;
  background-color: #eaedf0;
}
</style>
		
		<div class="modal fade" id="billingaddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Billing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="addbilling.php" method="POST">
      <div class="modal-body">
             
      
     
        <div class="form-group">
          <label for="Customer">Customer</label>
            <select class="form-control" name="customer_id">
               <?php
                  $pdo = new PDO('mysql:host=localhost;dbname=id18158940_ubms', 'id18158940_root', 'p2]et1I%7b9nZqY2');
                  $sql = "SELECT id, fname, lname FROM customer";
                  $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                  $customers = $stmt->fetchAll();
                  ?>
           <?php foreach($customers as $customer): ?>
              <option value="<?= $customer['id']; ?>"><?= $customer['fname']." ".$customer['lname']; ?></option>
            <?php endforeach; ?>
            </select>
                  </div>
          
        <div class="form-row">
          <div class="col-md-6">
            <label class="font-weight-bold">Bill No.</label>
            <?php 
            require_once "config.php";
            

    
            $result = mysqli_query($conn, "SELECT MAX(bill_no) bill_no FROM bill");
            if (!$result) { 
            } else {
                $row = mysqli_fetch_object($result);
                $autogen = $row->bill_no;
                $autogen += 1;
            }
            ?>
           <input type="text" name="bill_no" class="form-control"  
           value='<?php echo $autogen;?>' placeholder="Bill No." readonly>
        </div>
             <div class="col-md-6">
         <label class="font-weight-bold">Meter No.</label>
          <input type="number" name="meter_no" class="form-control" placeholder="Meter No." required>
    </div>
   </div>


   <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Period From</label>
           <input type="date" name="period_from" class="form-control" required>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Period To</label>
          <input type="date" name="period_to" class="form-control"  required>
    </div>
   </div>

   <div class="form-group">
       <label class="font-weight-bold">Bill Amount</label>
          <input type="number" name="bill_amount" class="form-control" placeholder="Bill Amount" required>
    </div>

   <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Bill Date</label>
           <input type="date" name="bill_date" class="form-control" placeholder="Bill Date" required>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Due Date</label>
          <input type="date" name="due_date" class="form-control" placeholder="Due Date" required>
    </div>
   </div>   

   

   <input type="text" name="encoded_by" class="form-control" value='<?php   echo $_SESSION['uname']; ?>' hidden>
   
   <input type="text" name="status" class="form-control" value='Unpaid' hidden>

 
      </div>
      <div class="modal-footer">
        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
      </form>
    </div>
  </div>
</div>

<!-- ==========================update============================- -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Invoice Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="editinvoice.php" method="POST">
      <div class="modal-body">
             
    

            <input type="hidden" name="update_id" id="update_id">

            <div class="form-group">
       <label class="font-weight -bold">Customer Name</label>
          <input type="text" name="customer_id" id="customer_id" class="form-control" readonly>
    </div>

            
            <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Period From</label>
           <input type="text" name="period_from" id="period_from" class="form-control" readonly >
     </div>

     <div class="col-md-6">
        <label class="font-weight-bold">Bill Date</label>
          <input type="text" name="bill_date" id="bill_date"class="form-control" readonly>
    </div>
   </div>

   <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Due Date</label>
           <input type="text" name="due_date" id="due_date" class="form-control" readonly>
     </div>

     <div class="col-md-6">
        <label class="font-weight-bold">Period To</label>
          <input type="text" name="period_to" id="period_to"class="form-control" readonly>
    </div>
   </div>


   <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Bill Amount</label>
           <input type="text" name="bill_amount" id="bill_amount" class="form-control" readonly>
     </div>

     <div class="col-md-6">
        <label class="font-weight-bold">Amount Tendered</label>
          <input type="text" name="amount_tendered" id="amount_tendered" class="form-control" >
    </div>
   </div>
  
   <input type="text" name="encoded_by" id="encoded_by" class="form-control" hidden>

              
  
           

           
           

      </div>
      <div class="modal-footer">
        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
      </form>
    </div>
  </div>
</div>

<!-- ======================================================- -->



<br>
        <div class="container"> 
          
        <div class="card"> 
            <div class="card-header" style="background-color:#3B1E080D;">
            <p class="card-title text-md-center text-xl-left" style="font-size:20px; padding-top:7px; "><strong>Invoice Information</p>
               
            </div>
       
     
            <div class="card-body">

    
              
                   
               
<?php
               $connection = mysqli_connect("localhost","id18158940_root","p2]et1I%7b9nZqY2");
                $db = mysqli_select_db($connection,'id18158940_ubms');

                $query ="SELECT invoice.id, invoice.customer_id, customer.fname, customer.lname, bill.bill_no,
                invoice.bill_no, invoice.date_paid, invoice.amount_tendered, invoice.encoded_by, 
                bill.period_from, bill.period_to, bill.bill_date, bill.due_date, bill.bill_amount FROM invoice 
                INNER JOIN customer ON invoice.customer_id=customer.id 
                INNER JOIN bill on bill.bill_no = invoice.bill_no WHERE status='Paid'
                ";
                $query_run = mysqli_query($connection, $query);
                ?>
<table class="table table-fluid table-hover" id="myTable">
  <thead style="background-color:#3B1E080D;">
    <tr>
            <th scope="col"></th> 
            <th scope="col">ID</th> 
            <th scope="col">Customer Name</th>  
            <th scope="col">Bill No.</th>
            <th scope="col">Invoice No.</th> 
            <th scope="col">Date Paid</th> 
            <th scope="col">Amount Tendered</th> 
            <th scope="col">Encoded By</th>
            <th hidden scope="col">Period To</th> 
            <th hidden scope="col">Period From</th> 
            <th hidden scope="col">Bill Date</th> 
            <th hidden scope="col">Due Date</th>
            <th hidden scope="col">Bill Amount</th>  
            <th scope="col"></th> 
           
 
    </tr>
  </thead>
  
  <tbody>
  <?php 
          
                  foreach($query_run as $row)
                 { 
                ?>
    <tr style="font-weight:normal;">
    <td><center><button type="button" class="btn btn-success  btn-sm editbtn"><i class="fas fa-edit"></i></button> </center> </td>
           <td><?php echo $row['id'];?></td>
            <td><?php  echo $row['lname'].", ".$row['fname'];?></td>
            <td><?php echo $row['bill_no'];?></td>
            <td><?php echo $row['id'];?></td>
            <td><?php $date1 = $row['date_paid'];
              $timestamp = strtotime($date1);
              $period_from = date("m-d-Y", $timestamp);
              echo $period_from;
            ?></td>
            <td><?php echo  $row['amount_tendered'];?></td>
            <td><?php echo $row['encoded_by'];?></td>
            <td hidden><?php echo $row['period_to'];?></td>
            <td hidden><?php echo $row['period_from'];?></td>
            <td hidden><?php echo $row['bill_date'];?></td>
            <td hidden><?php echo $row['due_date'];?></td>
            <td hidden><?php echo $row['bill_amount'];?></td>
            <td><center><a class="btn btn-warning btn-sm" href="print_invoice.php?page=record&id=<?php echo $row['id'] ?>&cust=<?php echo $row['fname']?>&sur=<?php echo $row['lname']?>&bill=<?php echo $row['bill_no']?>">
            <i class="fas fa-print"></i> Print </a></center></td>
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
$(document).ready(function(){
    $('.editbtn').on('click',function(){
        $('#editmodal').modal('show');
        
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
        return $(this).text();
        }).get();
        console.log(data);
    
    $('#edit').val(data[0]);
    $('#update_id').val(data[1]);
    $('#customer_id').val(data[2]);
    $('#bill_no').val(data[3]);
    $('#id').val(data[4]);
    $('#date_paid').val(data[5]);
    $('#amount_tendered').val(data[6]);
    $('#encoded_by').val(data[7]);
    $('#period_to').val(data[8]);
    $('#period_from').val(data[9]);
    $('#bill_date').val(data[10]);
    $('#due_date').val(data[11]);
    $('#bill_amount').val(data[12]);
    $('#print').val(data[13]);
        
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