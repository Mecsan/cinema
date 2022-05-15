<?php


include 'connection.php';

 

$url = $_GET['name'];
// echo $url;


// $name = str_replace("_"," ",$url);

$sql = "select * from movies as m,cinemas as c,cinema_movie as rel
where m.m_id=rel.m_id and c.c_id=rel.c_id and m.m_name='$url';";

$result = mysqli_query($con,$sql);

if(!$result){
    die();
}else{
    $str="<section class=content'>
    <h2>select cinema</h2>
    
    <div class='cinemalist'>";
    while($rel = mysqli_fetch_assoc($result)){
        $str.=" <div class='cinema_i'  onclick='go(".$rel['c_id'].")'>
        <div>
            <h3>".$rel['c_name']."</h3>
            <span>".$rel['city']."</span>
        </div>
        <div class='rat'>
            <i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
            <i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
            <i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
            <i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
            <i class='fa fa-star-half-o' style='font-size: 2rem;'></i>
        </div>
    </div>";

    
    }
    $str.="</div>
    </section>";
    echo $str;

}



?>

<!-- <div class='selectionn'>
    <label>city</label>
       <select id='cinema_select'>
       <option value='all'>all</option>
       <option value='nadiad'>nadiad</option>
       <option value='anand'>anand</option>
       <option value='Baroda'>Baroda</option>
       </select>

    </div> -->