<?php
session_start();
$connection = mysqli_connect("mkorvuw3sl6cu9ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","iigi5330azzahj3c","smij1gf9l7l65kwi","jj0m1ku5w7a37l39");
    if(isset($_POST['agentbtn'])) 
 {
   $name = $_POST['cheese1'];
   $uid = $_POST['cheese2'];
   $passwd = $_POST['cheese3'];
   $level = $_POST['cheese4'];
   $city = $_POST['cheese5'];
   $phone = $_POST['cheese6'];
   $upd = $_POST['cheese7'];

    $query = "INSERT INTO agents (name,uid,passwd,level,city,phone,upd) 
    VALUES('$name','$uid','$passwd','$level','$city',$phone,$upd) ";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "Agent added with success!";
        header('Location: agent-details.php');
    }else {
     $_SESSION['status'] = "Manager not added!";
     header('Location: agent-details.php');
    }
 
   }
/*Code helping to delete data from the Database */

if(isset($_POST['delete_agent']))
{
   $id = $_POST['delet_id'];
   $query = "DELETE FROM agents WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "Agent deleted with success! ";
    header('Location: agent-details.php');
   }else 
   {
    $_SESSION['status'] = "Agent not deleted!";
    header('Location: agent-details.php');
   }
}

   ?>