<style>
.contain{
    display: grid;
    grid-template-columns: repeat(4,25%);
}
.img{
    width: 100%;
}
@media screen and (max-width:1150px) {
    .contain{
        grid-template-columns: repeat(3,33%);
    }
    
}
@media screen and (max-width:755px) {
    .contain{
        grid-template-columns: repeat(2,50%);
    }
   
    
}
@media  screen and (max-width:500px) {
    .movies{
        width: 100%;
    }
    
}
@media  screen and (max-width:290px) {
    .contain{
        grid-template-columns: 100%;
    }
    
}
</style>


<?php

 

include 'connection.php';
if (!$con) {
    die();
} else {
    $new='no';
    $title ='All movies';
    if(isset($_GET['new'])){
        $new='yes';
        $title='All upcoming movies ';
    }
    $sql = "select * from movies where new='$new'";
    $result = mysqli_query($con, $sql);
    $len = mysqli_num_rows($result);
    if ($len > 0) {
        $str = " <div class='section'>
        <section class='movies'>
        <h2>$title</h2>;
            <div class='contain'>";
            while ($row = mysqli_fetch_assoc($result)) {
            $str .= "<div class='m_item' >
                <div class='img' style='background-image: url(".$row['path'].".jpg)'>
                </div>
                <div class='m_name'>".$row['m_name']." </div>
              </div>";
        }
        $str.=" </div>
        </div>
        </section>
      </div>";
    }
    echo $str;
}
?>