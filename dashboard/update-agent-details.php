<?php
session_start();
$connection = mysqli_connect("mkorvuw3sl6cu9ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","iigi5330azzahj3c","smij1gf9l7l65kwi","jj0m1ku5w7a37l39");

if(isset($_POST['updateagent']))
{
   $id = $_POST['edit_id'];
   $name = $_POST['cheese1'];
   $uid = $_POST['cheese2'];
   $passwd = $_POST['cheese3'];
   $level = $_POST['cheese4'];
   $city = $_POST['cheese5'];
   $phone = $_POST['cheese6'];
   $upd= $_POST['cheese7'];

   $query = "UPDATE agents SET name='$name', uid='$uid',passwd='$passwd',level='$level',city='$city',phone='$phone',upd='$upd'   WHERE id='$id'";
   $query_run = mysqli_query($connection, $query);

   if ($query_run)
    {
       $_SESSION['success'] = "Agent data updated!";
        header('Location: agent-details.php');

   } else {
    $_SESSION['status'] = "Infos pas à jour!";
   }
}

?>