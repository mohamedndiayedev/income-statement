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
   $query = "SELECT * FROM userz WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-user-details.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Update</label>
                <input class="form-control" type="datetime-local" value="<?php echo $row['updates'] ?>" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Full Name</label>
                <input class="form-control" type="text" value="<?php echo $row['name'] ?>" name="cheese2" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Location</label>
                <input class="form-control" type="text" value="<?php echo $row['location'] ?>" name="cheese3" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Dob</label>
                <input class="form-control" type="time" value="<?php echo $row['dob'] ?>" name="cheese4" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Price</label>
                <input class="form-control" type="number" value="<?php echo $row['price'] ?>" name="cheese5" placeholder="enter data *">
         </div>
         
         <div class="form-group">
                <label>Plot (in meters)</label>
                <input class="form-control" type="text" value="<?php echo $row['plot'] ?>" name="cheese6" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Size</label>
                <input class="form-control" type="text" value="<?php echo $row['size'] ?>" name="cheese7" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Phone 1</label>
                <input class="form-control" type="number" value="<?php echo $row['tel1'] ?>" name="cheese8" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Phone 2</label>
                <input class="form-control" type="number" value="<?php echo $row['tel2'] ?>" name="cheese9" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" value="<?php echo $row['email'] ?>" name="cheese10" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Next of Kin</label>
                <input class="form-control" type="text" value="<?php echo $row['nextofkin'] ?>" name="cheese11" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Agent Name</label>
                <input class="form-control" type="text" value="<?php echo $row['agent_name'] ?>" name="cheese12" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Agent Num.</label>
                <input class="form-control" type="number" value="<?php echo $row['agent'] ?>" name="cheese13" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Last Agent Num.</label>
                <input class="form-control" type="number" value="<?php echo $row['last_agent'] ?>" name="cheese14" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Status</label>
                <input class="form-control" type="number" value="<?php echo $row['active'] ?>" name="cheese15" placeholder="enter data *">
         </div>

         <a href="user-details.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="updateuser" class="btn btn-primary">Update</button>
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