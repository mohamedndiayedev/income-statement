<?php
session_start();
$connection = mysqli_connect("mkorvuw3sl6cu9ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","iigi5330azzahj3c","smij1gf9l7l65kwi","jj0m1ku5w7a37l39");
    if(isset($_POST['usertbtn'])) 
 {
   $user1 = $_POST['cheese1'];
   $user2 = $_POST['cheese2'];
   $user3 = $_POST['cheese3'];
   $user4 = $_POST['cheese4'];
   $user5 = $_POST['cheese5'];
   $user6 = $_POST['cheese6'];
   $user7 = $_POST['cheese7'];
   $user8 = $_POST['cheese8'];
   $user9 = $_POST['cheese9'];
   $user10 = $_POST['cheese10'];
   $user11 = $_POST['cheese11'];
   $user12 = $_POST['cheese12'];
   $user13 = $_POST['cheese13'];
   $user14 = $_POST['cheese14'];
   $user15 = $_POST['cheese15'];

    $query = "INSERT INTO userz (updates,name,location,dob,price,plot,size,tel1,tel2,email,nextofkin,agent_name,agent,last_agent,active) 
    VALUES('$user1','$user2','$user3','$user4','$user5','$user6','$user7','$user8','$user9','$user10','$user11','$user12','$user13','$user14','$user15') ";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "User added with success!";
        header('Location: user-details.php');
    }else {
     $_SESSION['status'] = "User not added!";
     header('Location: user-details.php');
    }
 
   }
/*Code helping to delete data from the Database */

if(isset($_POST['delete_user']))
{
   $id = $_POST['delet_id'];
   $query = "DELETE FROM userz WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "User deleted with success! ";
    header('Location: user-details.php');
   }else 
   {
    $_SESSION['status'] = "User not deleted!";
    header('Location: user-details.php');
   }
}

   ?>