

<?php
 require_once "index.php";
 ?>
<style>
 .billing{
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
   
   <script>
       function handler(e){
           var fetchedDate = new Date(e.target.value);

         
        //  var newDate = new Date(fetchedDate.getFullYear(), fetchedDate.getMonth(), fetchedDate.getDate());
          
         //    alert(fetchedDate.getFullYear() +"-" +fetchedDate.getMonth() + 2+"-"+fetchedDate.getDate());
        //    var newDate = fetchedDate.getFullYear() +"-" +fetchedDate.getMonth() + 2+"-"+fetchedDate.getDate();
             
             var newDate = new Date(fetchedDate.setMonth(fetchedDate.getMonth()+2));
         // newDate.setMonth(newDate.getMonth() + 1);
         
        
         
         var output = newDate.getFullYear() +"-" + ("0" + newDate.getMonth()).slice(-2)+"-"+ ("0" + newDate.getDate()).slice(-2);
       
      
      
    
           document.getElementById("period_to_date").value = output;
          
 
       }
       
        function handlerBillDate(e){
            var fetchedDateBill = new Date(e.target.value);

      
             
            var newDateBill = new Date(fetchedDateBill.setMonth(fetchedDateBill.getMonth()+2));
       
            var outputBill = newDateBill.getFullYear() +"-" + ("0" + newDateBill.getMonth()).slice(-2)+"-"+ ("0" + newDateBill.getDate()).slice(-2);
       
      
      
    
           document.getElementById("duedate").value = outputBill;
          
 
       }
       
       
       
   </script>
   
  
  

   <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Period From</label>
           <input type="date" name="period_from" class="form-control" onchange="handler(event);" required>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Period To</label>
          <input type="date" name="period_to" class="form-control" id="period_to_date" required >
    </div>
   </div>

   <div class="form-group">
       <label class="font-weight-bold">Bill Amount</label>
          <input type="number" name="bill_amount" class="form-control" placeholder="Bill Amount" required>
    </div>

   <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Bill Date</label>
           <input type="date" name="bill_date" class="form-control" placeholder="Bill Date" onchange="handlerBillDate(event);" required>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Due Date</label>
          <input type="date" name="due_date" class="form-control" placeholder="Due Date" id="duedate" required>
    </div>
   </div>   

   

   <input type="text" name="encoded_by" class="form-control" value='<?php   echo $_SESSION['username']; ?>' hidden>
   
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Billing Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updatebilling.php" method="POST">
      <div class="modal-body">
             
    

            <input type="hidden" name="update_id" id="update_id">
            
            <div class="form-group">
          <label for="Customer">Customer</label>
          <input type="text" name="customer_id" id="customer_id" class="form-control" readonly>

                  </div>
          
        <div class="form-row">
          <div class="col-md-6">
            <label class="font-weight-bold">Bill No.</label>
           <input type="text" name="bill_no" id="bill_no" class="form-control">
        </div>
             <div class="col-md-6">
         <label class="font-weight-bold">Meter No.</label>
          <input type="number" name="meter_no" id="meter_no" class="form-control" placeholder="Meter No." required>
    </div>
   </div>


   <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Period From</label>
           <input type="text" name="period_from" id="period_from" class="form-control" required>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Period To</label>
          <input type="text" name="period_to" id="period_to" class="form-control"  required>
    </div>
   </div>

   <div class="form-group">
       <label class="font-weight-bold">Bill Amount</label>
          <input type="number" name="bill_amount" id="bill_amount" class="form-control" placeholder="Bill Amount" required>
    </div>

   <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">Bill Date</label>
           <input type="text" name="bill_date" id="bill_date"  class="form-control" placeholder="Bill Date" required>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Due Date</label>
          <input type="text" name="due_date" id="due_date" class="form-control" placeholder="Due Date" required>
    </div>
   </div>   



           
           

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

<!-- ======================delete================================- -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Billing Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="delbilling.php" method="POST">
      <div class="modal-body">
             
      
  

            <input type="hidden" name="delete_id" id="delete_id">
           
            <h4>Do you want to delete this Data?</h4>
           

      </div>
      <div class="modal-footer">
        <button type="submit" name="deletedata" class="btn btn-primary">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
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
          <p class="card-title text-md-center text-xl-left" style="font-size:20px; padding-top:7px; "><strong>Billing Information</p>

            <button type="button"  style="float:right;background-color:#94787a;border: none;" class="btn btn-primary" data-toggle="modal" data-target="#billingaddModal">
            Add Billing
            </button>
              
            </div>
                
              
                <div class="card-body">

    
              
                   
               
<?php
                $connection = mysqli_connect("localhost","id18158940_root","p2]et1I%7b9nZqY2");
                $db = mysqli_select_db($connection,'id18158940_ubms');

                $query ="SELECT bill.id, bill.customer_id, customer.fname, customer.lname,
                bill.bill_no, bill.meter_no, bill.period_from, bill.period_to, bill.bill_amount,
                bill.bill_date, bill.due_date, bill.encoded_by FROM bill 
                INNER JOIN customer ON bill.customer_id=customer.id ORDER BY bill.bill_no DESC";
                $query_run = mysqli_query($connection, $query);
                ?>

<table class="table table-fluid table-hover" id="myTable">
  <thead style="background-color:#3B1E080D;">
    <tr >
            <th scope="col">ID</th>
            <th scope="col">Customer</th>  
            <th scope="col">Bill No.</th>
            <th scope="col">Meter No.</th> 
            <th scope="col">Period From</th> 
            <th scope="col">Period To</th> 
            <th scope="col">Bill Amount</th>
            <th scope="col">Bill Date</th> 
            <th scope="col">Due Date</th> 
            <th scope="col">Encoded By</th> 
            <th scope="col">Edit</th> 
            <th scope="col">Delete</th> 
 
    </tr>
  </thead>
  
  <tbody>
  <?php 
          
                  foreach($query_run as $row)
                 { 
                ?>
    <tr style="font-weight:normal;">
             <td><?php echo $row['id'];?></td>
            <td><?php  echo $row['lname'].", ".$row['fname'];?></td>
            <td><?php echo $row['bill_no'];?></td>
            <td><?php echo $row['meter_no'];?></td>
            <td><?php echo $row['period_from'];?></td>
            <td><?php echo $row['period_to'];?></td>
            <td><?php echo $row['bill_amount'];?></td>
            <td><?php echo $row['bill_date'];?></td>
            <td><?php echo $row['due_date'];?></td>
            <td><?php echo $row['encoded_by'];?></td>

            <td><center><button type="button" class="btn btn-success  btn-sm editbtn"><i class="fas fa-edit"></i></button> </center> </td>
            <td> <center> <button type="button" class="btn btn-danger  btn-sm deletebtn"><i class="fas fa-eraser"></button></td>
            <?php
                    }
                
            
            ?>
          </tr>
    
  </tbody>
  

</table>
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
    
    $('#update_id').val(data[0]);
    $('#customer_id').val(data[1]);
    $('#bill_no').val(data[2]);
    $('#meter_no').val(data[3]);
    $('#period_from').val(data[4]);
    $('#period_to').val(data[5]);
    $('#bill_amount').val(data[6]);
    $('#bill_date').val(data[7]);
    $('#due_date').val(data[8]);
    $('#encoded_by').val(data[9]);



  

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