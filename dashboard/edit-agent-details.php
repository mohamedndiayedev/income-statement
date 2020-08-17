<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-agent.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Agent Infos</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("mkorvuw3sl6cu9ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","iigi5330azzahj3c","smij1gf9l7l65kwi","jj0m1ku5w7a37l39");
if(isset($_POST['edit_btn'])) 
{
   $id = $_POST['edit_id'];
   $query = "SELECT * FROM agents WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-agent-details.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Agent Name</label>
                <input class="form-control" value="<?php echo $row['name'] ?>" type="text" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Agent User ID</label>
                <input class="form-control" value="<?php echo $row['uid'] ?>" type="text" name="cheese2" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Password</label>
                <input class="form-control" value="<?php echo $row['passwd'] ?>" type="text" name="cheese3" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Level of Access</label>
                <input class="form-control" value="<?php echo $row['level'] ?>" type="number" name="cheese4" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>City</label>
                <input class="form-control" value="<?php echo $row['city'] ?>" type="text" name="cheese5" placeholder="enter data *">
         </div>
         
         <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" value="<?php echo $row['phone'] ?>" type="number" name="cheese6" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Update Date</label>
                <input class="form-control" value="<?php echo $row['upd'] ?>" type="date" name="cheese7" placeholder="enter data *">
         </div>

         <a href="agent-details.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="updateagent" class="btn btn-primary">Update</button>
   </form>
      <?php
    }
}

?>

</div>
</div>
</div>
</div>


<?php 
  include('includes/scripts.php');
  include('includes/footer.php');
?>