<?php
include 'connection.php';
if (!$con) {
    die();
} else {
    $sql = "select * from movies where new!='no';";
    $result = mysqli_query($con,$sql);
    if(!$result){
        die();
    }
    else{
       // var_dump($result);
       $str="";
        if(mysqli_num_rows($result)>0){
            $str.="<div class='section'>
                <section class='movies umovies'>
                
                    <h2>Upcoming movies<a href='movie.php?new'>See all...</a></h2>
                    
                    
                    <div class='slide'>
                    
                    <button class='pre'><</button>
                    <button class='nxt'>></button>
                    <div class='contain'>";
                 

            while($row = mysqli_fetch_assoc($result)){

                $str.="
                <div class='m_item'>
                <div class='img' style='background-image: url(".$row['path'].".jpg)'>
                </div>
                <div class='m_name'>".$row['m_name']." </div>
              </div>";                
            }
            $str.="</div>
            </div>
            </section>
          </div>";

        }
        echo $str;
        
    }
}
?>

  
