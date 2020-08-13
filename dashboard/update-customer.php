<?php
session_start();
 $connection = mysqli_connect("mkorvuw3sl6cu9ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","iigi5330azzahj3c","smij1gf9l7l65kwi","jj0m1ku5w7a37l39");


if(isset($_POST['updatecustomer']))
{
   $id = $_POST['edit_id'];
   $use1 = $_POST['name'];
   $use2 = $_POST['number'];
   $use3 = $_POST['date'];
   $use4 = $_POST['month'];
   $use5 = $_POST['amount'];
   $use6 = $_POST['status'];

   
   $query = "UPDATE customer SET name='$use1', number='$use2', date='$use3', month='$use4',amount='$use5',status='$use6'
    WHERE id='$id'";
   $query_run = mysqli_query($connection, $query);

   if ($query_run)
    {
       $_SESSION['status_code'] = "File updated with success!";
        header('Location: default-customer.php');

   } else {
    $_SESSION['status'] = "File not updated";
   }
}

?>
