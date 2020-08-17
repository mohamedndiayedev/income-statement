<?php 
session_start();
include('database/dbconfig.php');
include('includes/header-cheese.php');
include('includes/navbar-agent.php');
include('includes/scripts.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agent Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>
    <form action="code-agent-details.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Agent Name</label>
                <input class="form-control" type="text" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Agent User ID</label>
                <input class="form-control" type="text" name="cheese2" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="text" name="cheese3" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Level of Access</label>
                <input class="form-control" type="number" name="cheese4" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>City</label>
                <input class="form-control" type="text" name="cheese5" placeholder="enter data *">
         </div>
         
         <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" type="number" name="cheese6" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Update Date</label>
                <input class="form-control" type="date" name="cheese7" placeholder="enter data *">
         </div>
         
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="agentbtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Agent Details File
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add agent details
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
           $query = "SELECT * FROM agents";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-striped" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Agent Name</th>
                            <th>Agent User ID</th>
                            <th>Password</th>
                            <th>Level of Access</th>
                            <th>City</th>
                            <th>Phone Number</th>
                            <th>Date Updates</th>
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
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['uid']; ?></td>
                            <td><?php echo $row['passwd']; ?></td>
                            <td><?php echo $row['level']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['upd']; ?></td>
                            <td>
                              <form action="edit-agent-details.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Update</button>
                             </form>
                            </td>
                            <td>
                             <form action="code-agent-details.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="delete_agent" class="btn btn-danger" >Delete</button>
                              </form>
                            </td>
                    </tr>
     <?php
        }
      } else {echo "No Agent Found";
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



