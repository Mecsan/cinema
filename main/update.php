<?php
session_start();

include "../fetch/connection.php";


if (!isset($_SESSION['user'])) {
    header("location:login.php");
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $id = $_POST['back_id'];
        $msg = $_POST['back_msg'];
        $userid = $_SESSION['user'];
        
        // to checking that user has permission oe not to update this post 
        // means whether the post is updateing is of him or he randomly type
        // some url and get into this
        $sql = " select * from users as u,reviews as r where r.u_id=u.u_id
         and r.r_id='$id' and r.u_id='$userid';";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {

            $sql = "update reviews set r_msg='$msg' where r_id='$id';";
            $result = mysqli_query($con, $sql);
            if (!$result) {
                die();
            } else{
                echo "<script>history.back()</script>";
            }
        } else {
            echo " you dont have authorization to delete this review ";
        }
    }
}
