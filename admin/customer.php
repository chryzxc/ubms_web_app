<?php
 require_once "index.php";
 ?>
<style>
 .customer{
  color:black;
 background-color:#EFEBF7;
}
</style>
		
		<div class="modal fade" id="customeraddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="addcustomer.php" method="POST">
      <div class="modal-body">
             
      
      <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">First Name</label>
           <input type="text" name="fname" class="form-control" placeholder="First name" required>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Last Name</label>
          <input type="text" name="lname" class="form-control" placeholder="Last name" required>
    </div>
   </div>
    <div class="form-group">
       <label class="font-weight-bold">Contact Number</label>
          <input type="number" name="contact" class="form-control" placeholder="Contact Number" required>
    </div>
    <div class="form-group">
       <label class="font-weight-bold">Address</label>
          <textarea name="addr" class="form-control" rows="3" placeholder="Address" required></textarea>
    </div>
              
    <div class="form-group">
<label class="font-weight-bold">Connection Status</label>
<div class="form-group">
<select class="form-control" name="conn_status">
<option value="0">Inactive</option>
<option value="1">Active</option>
</select>
</div>
</div>     

<input type="text" name="encoded_by" class="form-control" value='<?php   echo $_SESSION['username']; ?>' hidden>


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
        <h5 class="modal-title" id="exampleModalLabel">Edit Customer Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updatecustomer.php" method="POST">
      <div class="modal-body">
             
    

            <input type="hidden" name="update_id" id="update_id">
            
            <div class="form-row">
       <div class="col-md-6">
         <label class="font-weight-bold">First Name</label>
           <input type="text" name="fname" id="fname" class="form-control" placeholder="First name" required>
     </div>
     <div class="col-md-6">
        <label class="font-weight-bold">Last Name</label>
          <input type="text" name="lname" id="lname"class="form-control" placeholder="Last name" required>
    </div>
   </div>
    <div class="form-group">
       <label class="font-weight-bold">Contact Number</label>
          <input type="number" name="contact" id="contact" class="form-control" placeholder="Contact Number" required>
    </div>
    <div class="form-group">
       <label class="font-weight-bold">Address</label>
          <textarea name="addr" id="addr" class="form-control"  rows="3" placeholder="Address" required></textarea>
    </div>
              
    <div class="form-group">
<label class="font-weight-bold">Connection Status</label>
<div class="form-group">
<select class="form-control" id="conn_status" name="conn_status">
<option value="0">Inactive</option>
<option value="1">Active</option>
</select>
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

<!-- ======================view================================- -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Billing Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="deletecustomer.php" method="POST">
      <div class="modal-body">
             
            <input type="hidden" name="delete_id" id="delete_id">
           
            <div class="card">
            <div class="card-body">

    
               
<?php
                $connection = mysqli_connect("localhost","id18158940_root","p2]et1I%7b9nZqY2");
                $db = mysqli_select_db($connection,'id18158940_ubms');

                $query ="SELECT bill.id, bill.customer_id, customer.fname, customer.lname,
                bill.bill_no, bill.meter_no, bill.period_from, bill.period_to, bill.bill_amount,
                bill.bill_date, bill.due_date, bill.encoded_by FROM bill 
                INNER JOIN customer ON bill.customer_id=customer.id 
                WHERE bill.customer_id=customer.id";
                $query_run = mysqli_query($connection, $query);
                ?>

            <table class="table table-striped table-bordered  table-sm" cellspacing="0"
  width="100%">
  <thead>
    <tr>
            
            <th scope="col">Customer</th>  
            <th scope="col">Bill No.</th>
            <th scope="col">Meter No.</th> 
            <th scope="col">Period From</th> 
            <th scope="col">Period To</th> 
            <th scope="col">Bill Amount</th>
            <th scope="col">Bill Date</th> 
            <th scope="col">Due Date</th> 
            <th scope="col">Encoded By</th> 
 
    </tr>
  </thead>
  
  <tbody>
  <?php 
                if($query_run){
                  foreach($query_run as $row)
                 { 
                ?>
    <tr>
            <td><?php  echo $row['lname'].", ".$row['fname'];?></td>
            <td><?php echo $row['bill_no'];?></td>
            <td><?php echo $row['meter_no'];?></td>
            <td><?php echo $row['period_from'];?></td>
            <td><?php echo $row['period_to'];?></td>
            <td><?php echo "₱ ".$row['bill_amount'];?></td>
            <td><?php echo $row['bill_date'];?></td>
            <td><?php echo $row['due_date'];?></td>
            <td><?php echo $row['encoded_by'];?></td>
    </tr>
    
  </tbody>
  <?php
                    }
                }
                else{
                    echo "No record found";
                }
            ?>

</table>
            </div>
        </div>
           

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
            <div class="card-header" style="background-color:#3B1E080D ;">
            <p class="card-title text-md-center text-xl-left" style="font-size:20px; padding-top:7px; "><strong>Customer Information</p>
            <button type="button" style="float:right;background-color:#94787a;border: none;" class="btn btn-primary" data-toggle="modal" data-target="#customeraddModal">
            Add Customer
            </button>
          </div>
                
              
            <div class="card-body">
                <?php
                $connection = mysqli_connect("localhost","id18158940_root","p2]et1I%7b9nZqY2");
                $db = mysqli_select_db($connection,'id18158940_ubms');


                $query ="SELECT * FROM customer ";
                $query_run = mysqli_query($connection, $query);
                ?>

<table class="table table-fluid table-hover" id="myTable">
  <thead style="background-color:#3B1E080D;">
    <tr>
            <th scope="col">ID</th>
            <th scope="col">Lastname</th>  
            <th scope="col">Firstname</th>
            <th scope="col">Contact No.</th> 
            <th scope="col">Address</th> 
            <th scope="col">Connection Status</th> 
            <th scope="col">Encoded By</th> 
            <th scope="col">Account Number</th> 
            <th scope="col">Edit</th> 
            <th scope="col">View Billing Info</th> 
 
    </tr>
  </thead>
  
  <tbody>
  <?php 
              
                  foreach($query_run as $row)
                 { 
                ?>
    <tr style="font-weight:normal;">
            <td><?php  echo $row['id'];?></td>
            <td><?php echo $row['lname'];?></td>
            <td><?php echo $row['fname'];?></td>
            <td><?php echo $row['contact'];?></td>
            <td><?php echo $row['addr'];?></td>
            <td><?php echo $row['conn_status'];?></td>
            <td><?php echo $row['encoded_by'];?></td>
            <td><?php echo $row['acc_number'];?></td>
            <td><center><button type="button" class="btn btn-success  btn-sm editbtn"><i class="fas fa-edit"></i></button> </center> </td>
            <td><center><a class="btn btn-info btn-sm" href="customer_info.php?page=record&id=<?php echo $row['id'] ?>&cust=<?php echo $row['fname']." ". $row['lname'];?>">
            <i class="fas fa-info-circle"></i></a></center></td>
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
    $('#username').val(data[6]);
    
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