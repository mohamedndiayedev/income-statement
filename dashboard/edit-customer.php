<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-customer.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Customer File</h6>
      </div>
<div class="card-body">
<?php
 $connection = mysqli_connect("mkorvuw3sl6cu9ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","iigi5330azzahj3c","smij1gf9l7l65kwi","jj0m1ku5w7a37l39");
if(isset($_POST['edit_btn'])) 
{
   $id = $_POST['edit_id'];
   $query = "SELECT * FROM customer WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {
    ?>
    <form action="update-customer.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Customer Name</label>
                <input class="form-control" type="text" value="<?php echo $row['name'] ?>" name="name" placeholder="enter name  *">
        </div>

        <div class="form-group">
                <label>Plot Number</label>
                <input class="form-control" type="text" value="<?php echo $row['number'] ?>" name="number" placeholder="enter plot number *">
         </div>
         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" value="<?php echo $row['date'] ?>" name="date" placeholder="enter date *">
         </div>
         <div class="form-group">
                <label>Default Months</label>
                <input class="form-control" type="number" value="<?php echo $row['month'] ?>" name="month" placeholder="enter default month *">
         </div>
         <div class="form-group">
                <label>Amount (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['amount'] ?>" name="amount" placeholder="enter amount *">
         </div>
         <div class="form-group">
                <label for="status" class="form-control" type="text" value="<?php echo $row['status'] ?>" placeholder="enter status *">Choose a Payment Status</label>

                <select id="status" name="status">
                <option value="Paid">Paid</option>
                <option value="Not Paid">Not Paid</option>
                </select>
         </div>
        </div>

         <a href="default-customer.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="updatecustomer" class="btn btn-primary">Update</button>
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
