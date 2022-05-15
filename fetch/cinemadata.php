<?php
 include 'connection.php';


 
 $c_id = $_GET['id'];
 $sql = "select * from cinemas where c_id='$c_id';";
 $result = mysqli_query($con, $sql);
 $cinema = mysqli_fetch_assoc($result);

 $c_name = $cinema['c_name'];
 

 $str2 = "<section class='movie_content' style=' background: linear-gradient(#11186a,#00000069)
, url(" . $cinema['path'] . ".jpg);
background-size: cover;
background-position: center center;'>
<div class='width'>

<div class='smimg' style=' background:   url(" . $cinema['path'] . ".jpg)' ;
background-size: cover;
background-position: center center;'>
</div>
<div class='in'>
<div class='cotent'>
<h1>" . $cinema['c_name'] . "</h1>
<span>" . $cinema['city'] . "</span>
<p> " . $cinema['c_address'] . "</p>
<div class='rat'>
<i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
<i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
<i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
<i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
<i class='fa fa-star-half-o' style='font-size: 2rem;'></i>
</div>
</div></section>";
 echo $str2;

 ?>
