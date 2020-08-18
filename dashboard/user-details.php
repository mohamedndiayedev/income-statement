<?php 
session_start();
include('database/dbconfig.php');
include('includes/header-cheese.php');
include('includes/navbar-user.php');
include('includes/scripts.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>
    <form action="code-user-details.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Update Stamp</label>
                <input class="form-control" type="datetime-local" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Full Name</label>
                <input class="form-control" type="text" name="cheese2" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Location</label>
                <input class="form-control" type="text" name="cheese3" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Dob</label>
                <input class="form-control" type="time" name="cheese4" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Price</label>
                <input class="form-control" type="number" name="cheese5" placeholder="enter data *">
         </div>
         
         <div class="form-group">
                <label>Plot (in meters)</label>
                <input class="form-control" type="text" name="cheese6" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Size</label>
                <input class="form-control" type="text" name="cheese7" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Phone 1</label>
                <input class="form-control" type="number" name="cheese8" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Phone 2</label>
                <input class="form-control" type="number" name="cheese9" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" name="cheese10" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Next of Kin</label>
                <input class="form-control" type="text" name="cheese11" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Agent Name</label>
                <input class="form-control" type="text" name="cheese12" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Agent Num.</label>
                <input class="form-control" type="number" name="cheese13" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Last Agent Num.</label>
                <input class="form-control" type="number" name="cheese14" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Status</label>
                <input class="form-control" type="number" name="cheese15" placeholder="enter data *">
         </div>
         
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="userbtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">User Details File
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add user details
              </button>
<!--               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Export to Excel File
              </button> -->
        </h6><br/>
        <h6>
        <p><strong>Universal Properties.</strong></p>
        <p><strong>Working Agent Details</strong></p>
     
        </h6>
     </div>
      <div class="table-responsive">

       <?php 
           $query = "SELECT * FROM userz";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-striped" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Update Stamp</th>
                            <th>Full Name</th>
                            <th>Location</th>
                            <th>Dob</th>
                            <th>Price</th>
                            <th>Plot (in meters)</th>
                            <th>Size</th>
                            <th>Phone 1</th>
                            <th>Phone 2</th>
                            <th>Email</th>
                            <th>Next of Kin</th>
                            <th>Agent Name</th>
                            <th>Agent Num.</th>
                            <th>Last Agent Num.</th>
                            <th>Status</th>
                            <th>Modify</th>
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
                            <td><?php echo $row['updates']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['plot']; ?></td>
                            <td><?php echo $row['size']; ?></td>
                            <td><?php echo $row['tel1']; ?></td>
                            <td><?php echo $row['tel2']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['nextofkin']; ?></td>
                            <td><?php echo $row['agent_name']; ?></td>
                            <td><?php echo $row['agent']; ?></td>
                            <td><?php echo $row['last_agent']; ?></td>
                            <td><?php echo $row['active']; ?></td>
                            <td>
                              <form action="edit-user-details.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Update</button>
                             </form>
                            </td>
                            <td>
                             <form action="code-user-details.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="delete_user" class="btn btn-danger" >Delete</button>
                              </form>
                            </td>
                    </tr>
     <?php
        }
      } else {echo "No User Found";
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



