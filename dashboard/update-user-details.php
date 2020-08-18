<?php
session_start();
$connection = mysqli_connect("mkorvuw3sl6cu9ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","iigi5330azzahj3c","smij1gf9l7l65kwi","jj0m1ku5w7a37l39");

if(isset($_POST['updateuser']))
{
   $id = $_POST['edit_id'];
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

   $query = "UPDATE userz SET updates='$user1', name='$user2',location='$user3',dob='$user4',price='$user5',plot='$user6',size='$user7',tel1='$user8',tel2='$user9',
   email='$user10',nextofkin='$user11',agent_name='$user12',agent='$user13',last_agent='$user14',active='$user15' WHERE id='$id'";
   $query_run = mysqli_query($connection, $query);

   if ($query_run)
    {
       $_SESSION['success'] = "User data updated!";
        header('Location: user-details.php');

   } else {
    $_SESSION['status'] = "Infos not updated!";
   }
}

?>