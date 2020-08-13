<?php 
session_start();
include('database/dbconfig.php');
include('includes/header.php');
include('includes/navbar-customer.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;></span>
        </button>
      </div>
      <form action="code-customer.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Customer Name</label>
                <input class="form-control" type="text" name="name" placeholder="Customer Name  *">
        </div>

        <div class="form-group">
                <label>Plot Number</label>
                <input class="form-control" type="text" name="number" placeholder="plot number *">
         </div>

         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" name="date" placeholder="Date *">
         </div>
         <div class="form-group">
                <label>Default Months</label>
                <input class="form-control" type="number" name="month" placeholder="Default Months *">
         </div>

         <div class="form-group">
                <label>Amount (GMD)</label>
                <input class="form-control" type="number" name="amount" placeholder="Amount in GMD *">
         </div>
         <div class="form-group">
                <div class="form-group">
                <label for="status" class="form-control" type="text" placeholder="enter status *">Choose a Payment Status</label>

                <select id="status" name="status">
                <option value="Paid">Paid</option>
                <option value="Not Paid">Not Paid</option>
                </select>
         </div>
         </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="customerbtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>
      <div class="container-fluid">
      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"> Default Customer Details:
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add default customer
            </button>
        </h6>
        <strong><h6>DEFAULT CUSTOMER</h6></strong>
       <strong><h6>PAYMENT TRACKING FILE</h6></strong>
     </div>

      <div class="table-responsive">

       <?php 
           $query = "SELECT * FROM customer";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-bordered" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Plot Number</th>
                            <th>Date</th>
                            <th>Default Months</th>
                            <th>Amount (GMD)</th>
                            <th>Payment Status</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
        <?php 
        
        if(mysqli_num_rows($query_run) > 0){
           
          while ($row = mysqli_fetch_assoc($query_run)) 
          {
            ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['number']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['month']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                              <form action="edit-customer.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Update</button>
                             </form>
                            </td>
                            <td>
                             <form action="code-customer.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="deletecustomer" class="btn btn-danger" >Delete</button>
                              </form>
                            </td>
                    </tr>
     <?php
        }
      } else {echo "No Recors Found";
      }
      ?>
                    </tbody>
           </table>
         </div>

     </div>
<?php 
  include('includes/scripts.php');
  include('includes/footer.php');
?>
   </div>

</div>



