<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");
    if(isset($_POST['customerbtn'])) 
 {
   $name = $_POST['name'];
   $number = $_POST['number'];
   $date = $_POST['date'];
   $month = $_POST['month'];
   $amount = $_POST['amount'];
   $status = $_POST['status'];

    $query = "INSERT INTO customer (name,number,date,month,amount,status) 
    VALUES('$name','$number','$date','$month','$amount','$status') ";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "Customer added with success!";
        header('Location: default-customer.php');
    }else {
     $_SESSION['status'] = "Customer not added!";
     header('Location: default-customer.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['deletecustomer']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM customer WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: default-customer.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: customer.php');
   }
}

   ?>