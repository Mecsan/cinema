<?php 
session_start();

if(isset($_GET['r_id'])){
    $r_id = $_GET['r_id'];
    echo $r_id;
}

include "../fetch/connection.php";

$sql = "delete from reviews where r_id='$r_id'";
$result = mysqli_query($con,$sql);
if(!$result){
    die();
}else{
    header("location:".$_SESSION['history']);
}



?>