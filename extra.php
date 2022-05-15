<?php

include 'connection.php';


$url = $_SERVER['REQUEST_URI'];
// echo $url ."<br>";
$arr = array(explode('movies/', $url));
$url = $arr[0][1];
$arr = array(explode('.php', $url));
$url = $arr[0][0];
// echo $url;
$name = str_replace("_", " ", $url);
// echo $name;

$sql = "select * from movies where m_name='$name'";
$result = mysqli_query($con, $sql);
// var_dump($result);
if (!mysqli_num_rows($result)) {
  echo "no found";
} else {
  $movie = mysqli_fetch_assoc($result);
  $m_id = $movie['m_id'];
  $str = "<section class='main'>
    <section class='movie_content' style=' background: linear-gradient(#11186a,#00000069),url(../../" . $url . ".jpg) ;
    background-size: cover;
  background-position: center center;'>
      <div class='width'>
    
        <div class='smimg' style=' background:  url(../../" . $url . ".jpg) ;
        background-size: cover;
      background-position: center center;'>
        </div>
        <div class='in'>
          <div class='cotent'>
            <h1>" . $movie['m_name'] . "</h1>
            <span>" . $movie['m_release'] . "</span>
            <ul class='tags'>
              <li>Triller</li>
              <li>Action</li>
              <li>scifi</li>
            </ul>
            <span>" . $movie['m_duration'] . "</span>
            <ul class='other'>
    
              <li>
                <ul class='lan'>
                  <li>Eng</li>
                  <li>Hindi</li>
                  <li>Tamil</li>
                </ul>
              </li>
              <li>
                <ul class='dim'>
                  <li>2d</li>
                  <li>3d</li>
                </ul>
              </li>
            </ul>
          </div>
          <div class='rat_book'>
    
            <div class='rat'>
              <i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
              <i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
              <i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
              <i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
              <i class='fa fa-star-half-o' style='font-size: 2rem;'></i>
            </div>
            <a href='/book.php' id='book'>Book tickets</a>
          </div>
        </div>
      </div>
    
    </section>
    <section class='main_about'>
      <div class='about'>
        <h3>About</h3>
        <div>
          With Spider-Man's identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong,
          dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be
          Spider-Man.
        </div>
      </div>
    
      <div class='cast'>
        <h3> cast</h3>
        <div>
          <div class='cast_i'> <img src='c1.jpg' alt=''><span>James bond</span></div>
          <div class='cast_i'> <img src='c2.jpg' alt=''><span>James bond</span></div>
          <div class='cast_i'> <img src='c3.jpg' alt=''><span>James bond</span></div>
          <div class='cast_i'> <img src='c4.jpg' alt=''><span>James bond</span></div>
          <div class='cast_i'> <img src='c5.jpg' alt=''><span>James bond</span></div>
        </div>
      </div>
    
    
    
    
    
    
    
      <div class='review'>
    
        <h3>Reviews</h3>";

  if (isset($_SESSION['user'])) {

    $u_id = $_SESSION['user'];
    if (isset($_POST['add'])) {
      // storing the review in the database
      $msg = $_POST['review'];
      $date = date("y-m-d");
      $sql = "INSERT INTO `reviews` (`r_id`, `r_msg`, `r_date`, `m_id`, `u_id`) 
      VALUES (NULL, '$msg', '$date', '$m_id', '$u_id')";
      $result = mysqli_query($con, $sql);
      if (!$result) {
        die();
      } else {
        $currname = $_SERVER['REQUEST_URI'];
        // header("location:".$currname);
        echo "<script>location.href='" . $currname . "'</script>";
      }
    }

   
    $sql = "select * from reviews  
        where m_id='$m_id' and u_id='$u_id';";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
         $review = mysqli_fetch_assoc($result);
         $str.="<div class='review_item active'>
         <div class='review_top'>
           <div class='review_left'>
             <div class='review_name'>Your review</div>
             <div class='review_date'>" . $review['r_date'] . "</div>
           </div>
            
           <a href='dlt.php?r_id=".$review['r_id']."' class='form dlt'>dlt</a>
           <button class='form edit'>edit</button>
           <button class='form update'>update</button>
           
           </div>
           
         <div class='review_con'>" . $review['r_msg'] . "</div>
         <form method='POST' action='update.php' id='back_form'>
         <input type='text' name='back_id' id='back_id' value='".$review['r_id']."'>
            <textarea  name='back_msg' id='back_msg'></textarea>
            <input type='submit' name='update'>
         </form>
        
       </div>";

        }
        else{
          $str.="<div class='new_review'>
          Add review
          <button class='big' onclick='see_review_form(this)'>+</button>
          <form class='add' method='POST'>
            <textarea rows='3' class='re_con' placeholder='your review' name='review'></textarea>
            <input type='submit' class='submit' value='add' name='add'></form></div>";
        }
  }  else {
    $str .= "<div class='new_review'>
    Add review
    <button class='big' onclick='see_review_form(this)'>+</button>
    <form class='add' method='POST'>
      <textarea rows='3' class='re_con' placeholder='your review' name='review'></textarea><input type='reset' class='submit' value='add' name='add' disabled> ";
    $str .= "<span class='loginmsg'>please login to add review</span
            >";
    $str .=  "<div class='link'><a href='../login.php'>Login</a></div></form></div>";
  }


  // for fetching all the reviews
if(isset($_SESSION['user'])){
  $sql ="select * from movies as m,reviews as r,users as u
  where m.m_id='$m_id' and r.m_id=m.m_id and u.u_id =r.u_id and r.u_id!='$u_id'";
}else{
  $sql = "select * from movies as m,reviews as r,users as u
  where m.m_id='$m_id' and r.m_id=m.m_id and u.u_id =r.u_id ";
}
  $result = mysqli_query($con, $sql);
  $len = mysqli_num_rows($result);

  if ($len > 0) {
    while ($review = mysqli_fetch_assoc($result)) {
      $str .= "
      <div class='review_item'>
          <div class='review_top'>
            <div class='review_left'>
              <div class='review_name'>" . $review['name'] . "</div>
              <div class='review_date'>" . $review['r_date'] . "</div>
            </div>
          </div>
          <div class='review_con'>" . $review['r_msg'] . "</div>
        </div>
      ";
    }
  }










  $str .= "
      </div>
    </section>
    </section>";
  echo $str;
}

?>




<!-- "<section class='main'>

<section class='movie_content'>
  <div class='width'>

    <div class='smimg' style='background-image: url(spider.jpg);'></div>
    <div class='in'>
      <div class='cotent'>
        <h1>spiderman :No way home</h1>
        <span>2021</span>
        <ul class='tags'>
          <li>Triller</li>
          <li>Action</li>
          <li>scifi</li>
        </ul>
        <span>2:30</span>
        <ul class='other'>

          <li>
            <ul class='lan'>
              <li>Eng</li>
              <li>Hindi</li>
              <li>Tamil</li>
            </ul>
          </li>
          <li>
            <ul class='dim'>
              <li>2d</li>
              <li>3d</li>
            </ul>
          </li>
        </ul>
      </div>
      <div class='rat_book'>

        <div class='rat'>
          <i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
          <i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
          <i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
          <i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>
          <i class='fa fa-star-half-o' style='font-size: 2rem;'></i>
        </div>
        <button id='book'>Book tickets</button>
      </div>
    </div>
  </div>

</section>
<section class='main_about'>
  <div class='about'>
    <h3>About</h3>
    <div>
      With Spider-Man's identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong,
      dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be
      Spider-Man.
    </div>
  </div>

  <div class='cast'>
    <h3> cast</h3>
    <div>
      <div class='cast_i'> <img src='c1.jpg' alt=''><span>James bond</span></div>
      <div class='cast_i'> <img src='c2.jpg' alt=''><span>James bond</span></div>
      <div class='cast_i'> <img src='c3.jpg' alt=''><span>James bond</span></div>
      <div class='cast_i'> <img src='c4.jpg' alt=''><span>James bond</span></div>
      <div class='cast_i'> <img src='c5.jpg' alt=''><span>James bond</span></div>
    </div>
  </div>







  <div class='review'>

    <h3>Reviews</h3>
    <div class='new_review'>
      Add review
      <button class='big' onclick='see_review_form(this)'>+</button>
      <div class='add'>
        <input type='text' name='name' class='re_name' placeholder='name'>
        <textarea rows='3' class='re_con' placeholder='your review'></textarea>
        <button class='submit'>Add</button>
      </div>
    </div>
    <div class='review_item'>
      <div class='review_top'>
        <div class='review_left'>
          <div class='review_name'>Sanket mecwan</div>
          <div class='review_date'>12th june,2020</div>
        </div>
        <div class='review_rat'>
          <i class='fa fa-star' aria-hidden='true'></i>
          <i class='fa fa-star' aria-hidden='true'></i>
          <i class='fa fa-star' aria-hidden='true'></i>
          <i class='fa fa-star' aria-hidden='true'></i>
          <i class='fa fa-star-half-o'></i>
        </div>
      </div>
      <div class='review_con'>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo, asperiores qui, debitis accusantium, optio soluta eveniet totam quisquam ut voluptas cum ducimus nulla sapiente error aperiam perferendis facere! Autem, a?</div>
    </div>
    <div class='review_item'>
      <div class='review_top'>
        <div class='review_left'>
          <div class='review_name'>Sanket mecwan</div>
          <div class='review_date'>12th june,2020</div>
        </div>
        <div class='review_rat'>
          <i class='fa fa-star' aria-hidden='true'></i>
          <i class='fa fa-star' aria-hidden='true'></i>
          <i class='fa fa-star' aria-hidden='true'></i>
          <i class='fa fa-star' aria-hidden='true'></i>
          <i class='fa fa-star-half-o'></i>
        </div>
      </div>
      <div class='review_con'> res qui, debitis accusantium, optio soluta eveniet totam quisquam ut voluptas cum ducimus nulla sapiente error aperiam perferendis facere! Autem, a?</div>
    </div>

  </div>
</section>
</section>" -->