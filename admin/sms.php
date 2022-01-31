<div class="modal fade" id="addpaymentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="api.php" method="POST">
      <div class="modal-body">
             
    

            <input type="hidden" name="update_id" id="update_id">
            <input type="hidden" name="customer_id" id="customer_id">

            <div class="form-group">
       <label class="font-weight-bold">Sender Name</label>
          <input type="text" maxlength="10" name="sender_name" id="sender_name" class="form-control"  >
    </div>
    <div class="form-group">
       <label class="font-weight-bold">Customer Mobile Number</label>
          <input type="text" maxlength="11" name="contact" id="contact" class="form-control"  >
    </div>

    <div class="form-group">
       <label class="font-weight-bold">Message</label>
      <textarea class="form-control" row="3" name="msg" onheyup="countChar" required></textarea>
      </div>
<p class="text-right" id="charNum">85</p>

           
           

      </div>
      <div class="modal-footer">
        <button type="submit" name="savepayment" class="btn btn-primary">Send</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
      </form>
    </div>
  </div>
</div>
<script>
  function countChar(val){
    var len= val.value.length;
    if(len >=85){
      val.value = val.value.subtring(0,85);
    }
    else{
      $('#charNum').text(85-len);
    };
  }
</script>