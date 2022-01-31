
<?php
 require_once "index.php";
 ?>
<style>
 .account{
  color:black;
  background-color: #eaedf0;
}
</style>
		
		<div class="modal fade" id="billingaddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="useraccount.php" method="POST">
      <div class="modal-body">
             
      

       <div class="form-group">
         <label class="font-weight-bold">Account Name</label>
           <input type="text" name="fullname" class="form-control" placeholder="Full Name" required>
     </div>

     <div class="form-group">
         <label class="font-weight-bold">Contact Number</label>
           <input type="text" name="contact_no" class="form-control" placeholder="Contact Number" required>
     </div>

          
        <div class="form-row">
          <div class="col-md-6">
            <label class="font-weight-bold">Username</label>
           <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
             <div class="col-md-6">
         <label class="font-weight-bold">Password</label>
          <input type="text" name="password" class="form-control" placeholder="Password" required>
    </div>
   </div>

   <div class="form-group">
<label class="font-weight-bold">Account Type</label>
<div class="form-group">
<select class="form-control" name="account_type">
<option value="Admin">Admin</option>
<option value="Encoder">Encoder</option>
</select>
</div>
</div>    

<div class="form-group">
<label class="font-weight-bold">Account Status</label>
<div class="form-group">
<select class="form-control" name="status">
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>
</select>
</div>
</div>    

 
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
        <h5 class="modal-title" id="exampleModalLabel">Edit User Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updateuseraccount.php" method="POST">
      <div class="modal-body">
             
    

            <input type="hidden" name="update_id" id="update_id">
            
           
       <div class="form-group">
         <label class="font-weight-bold">Account Name</label>
           <input type="text" name="fullname"  id="fullname" class="form-control" required>
     </div>

     <div class="form-group">
         <label class="font-weight-bold">Contact Number</label>
           <input type="text" name="contact_no" id="contact_no" class="form-control"  required>
     </div>

          
        <div class="form-row">
          <div class="col-md-6">
            <label class="font-weight-bold">Username</label>
           <input type="text" name="username" id="username"  class="form-control" placeholder="Username" required>
        </div>
             <div class="col-md-6">
         <label class="font-weight-bold">Password</label>
          <input type="text" name="password" id="password" class="form-control" placeholder="Password" required>
    </div>
   </div>

   <div class="form-group">
<label class="font-weight-bold">Account Type</label>
<div class="form-group">
<select class="form-control" id="account_type" name="account_type">
<option value="Admin">Admin</option>
<option value="Encoder">Encoder</option>
</select>
</div>
</div>    

<div class="form-group">
<label class="font-weight-bold">Account Status</label>
<div class="form-group">
<select class="form-control" id="status" name="status">
<option  value="Active">Active</option>
<option  value="Inactive">Inactive</option>
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
      <form action="deluseraccount.php" method="POST">
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
        <div class="container"> 
          
          <div class="card"> 
              <div class="card-header" style="background-color:#3B1E080D;">
              <p class="card-title text-md-center text-xl-left" style="font-size:20px; padding-top:7px; "><strong>User Accounts
          
              </p>
              <button type="button"  style="float:right;background-color:#94787a;border: none;" class="btn btn-primary" data-toggle="modal" data-target="#billingaddModal">
            Add User
            </button>
           
                </div>
        
            <div class="card-body">

    
              
                   
               
<?php
              $connection = mysqli_connect("localhost","id18158940_root","p2]et1I%7b9nZqY2");
                $db = mysqli_select_db($connection,'id18158940_ubms');


                $query ="SELECT * FROM user";
                $query_run = mysqli_query($connection, $query);
                ?>

<table class="table table-fluid table-hover" id="myTable">  
  <thead style="background-color:#3B1E080D;">
    <tr>
            <th scope="col">ID</th>
            <th scope="col">Account Type</th>  
            <th scope="col">Account Name</th>
            <th scope="col">Username</th> 
            <th scope="col">Password</th> 
            <th scope="col">Contact Number</th> 
            <th scope="col">Status</th> 
            <th scope="col">Date Added</th> 
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
            <td><?php  echo $row['account_type']?></td>
            <td><?php echo $row['fullname'];?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['password'];?></td>
            <td><?php echo $row['contact_no'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><?php echo $row['date_created'];?></td>

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
    $('#account_type').val(data[1]);
    $('#fullname').val(data[2]);
    $('#username').val(data[3]);
    $('#password').val(data[4]);
    $('#contact_no').val(data[5]);
    $('#status').val(data[6]);
    $('#date_created').val(data[7]);

  

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