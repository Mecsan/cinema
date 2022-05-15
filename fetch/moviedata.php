<?php

 

include 'connection.php';




if (isset($_GET['name'])) {





  if (isset($_GET['book'])) {

    if (isset($_SESSION['user'])) {


      if (isset($_GET['id'])) {


        if (isset($_GET['date']) && isset($_GET['time']) && isset($_GET['seats'])) {

            $id=$_SESSION['user'];
            $date=$_GET['date'];
            $time=$_GET['time'];
            $seats= json_decode($_GET['seats']);
            // echo $id."<br>".$date."<br>".$time."<br>".$seats;
            // var_dump($seats);
            $movie=$_GET['name'];
            $c_id=$_GET['id']; 


            $sql = " select * from cinemas as c,movies as m,cinema_movie as cm
            where cm.c_id=c.c_id and cm.m_id=m.m_id and cm.c_id='$c_id' and
            m.m_name='$movie'";

            $result = mysqli_query($con,$sql);

            if(!$result){
              die();
            } else{
              $row = mysqli_fetch_assoc($result);
              // echo $row['c_name']."<br>";
              // echo $row['m_name']."<br>";
              // var_dump(json_decode($row['date_time']));
               $date_time = json_decode($row['date_time']);
               foreach( $date_time->{'date_time'} as $x){

                  if($x->{'date'}==$date){

                      foreach( $x->{'timimgs'} as $y){

                        if($y->{'time'}==$time){

                          foreach($seats as $z){

                            $y->{'seats'}[$z]="".$id."";
                          }
                           
                        }

                      }
                  }
               }
               $date_time=json_encode($date_time);

               $sql="update cinema_movie set date_time = '$date_time'";
               $result=mysqli_query($con,$sql);
               if(!$result){
                 die();
               } else{
                 $_SESSION['booked']="ticket booked successfully";
                 header("location:index.php");
               }

            }

        } else {

          include 'cinemadata.php';
          $url = $_GET['name'];
           

          $sql = "select * from cinema_movie as c,movies as m where c.c_id='$c_id'
      and c.m_id=m.m_id and m.m_name='$url';";

          $result = mysqli_query($con, $sql);

          $date_time = mysqli_fetch_assoc($result);
          $obj = $date_time['date_time'];

          echo "<div class='main_selection'>
      <div id='dates'>

      </div>
      <div id='times'>
      
      
      </div>
     
      <div id='seats'>
      </div>
      <span class='err'></span>
      <button id='final_book' onclick='check_and_submit(this)'>book</button>
       </div>";

          echo "<script>
       
       let jsondata = " . $obj . ";
       
       </script>
        <script src='../js/select_date.js'></script>
      ";
        }
      } else {
        include 'book_cinema.php';
      }
    }
  } else {



    $url = $_GET['name'];

    //$name = str_replace("_", " ", $url);

    $sql = "select * from movies where m_name='$url'";
    $result = mysqli_query($con, $sql); 
    // var_dump($result);
    if (!mysqli_num_rows($result)) {
      echo "no found";
    } else {
      $movie = mysqli_fetch_assoc($result);
      $m_id = $movie['m_id'];
      $str = "<section class='main'>
  <section class='movie_content' style=' background: linear-gradient(#11186a,#00000069)
  , url(" . $movie['path'] . ".jpg) ;
  background-size: cover;
  background-position: center center;'>
  <div class='width'>
  
  <div class='smimg' style=' background:  url(" . $movie['path'] . ".jpg) ;
  background-size: cover;
  background-position: center center;'>
  </div>
  <div class='in'>
  <div class='cotent'>
  <h1>" . $movie['m_name'] . "</h1>
  <span>" . $movie['m_release'] . "</span>";

  $tags =  explode(",",$movie['tags']);
  $str.="<ul class='tags'>";
  foreach($tags as $a){
    $str.="<li>$a</li>";
  }
   
  $str.="
  </ul>
  <ul class='other'>
  <ul class='lan'>";
  $langs=explode(",",$movie['lan']);
  foreach($langs as $b){
    $str.="<li>$b</li>";
  }
  $str.="</ul></ul>


  <span>" . $movie['m_duration'] . "</span>
  
                </div>";

                if($movie['new']=='no'){

                  
                  
                  $str.="<div class='rat_book'>
                  
                  <div class='rat'>";
                  for($i=1;$i<=$movie['rating'];$i++){
                    $str.="<i class='fa fa-star' aria-hidden='true' style='font-size: 2rem;'></i>";
                  }
                  if($i-$movie['rating']==0.5){
                    $str.="  <i class='fa fa-star-half-o' style='font-size: 2rem;'></i>";
                  }
                  
                  
                  $str.="</div>";
                  if (isset($_SESSION['user'])) {
                    if(isset($_GET['id'])){
                      $str.="<a href='movie.php?name=" . $url . "&book&id=".$_GET['id']."' id='book'>Book tickets</a>";
                    }
                    else{
                      $str .=   "<a href='movie.php?name=" . $url . "&book' id='book'>Book tickets</a>";
                    }
                  } else {
                    $_SESSION['history'] = $_SERVER['REQUEST_URI'];
                    $str .= "<a href='login.php' id='book'>Login to book tickets</a>";
                  }
                }else{
                  $str.= "<span class='soon'>Soon in cinema</span>";
                }
      $str .= "
         
            </div>
            </div>
            </div>
            
            </section>
    <section class='main_about'>
    <div class='about'>
        <h3>About</h3>
        <div>
        ".$movie['about']."
        </div>
        </div>
        
     
          
          
          
          
          
    
    ";
    if($movie['new']=='no'){

      $str.="<div class='review'>
    
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
        $_SESSION['history'] = $_SERVER['REQUEST_URI'];


        $sql = "select * from reviews  
        where m_id='$m_id' and u_id='$u_id';";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
          $review = mysqli_fetch_assoc($result);
          $str .= "<div class='review_item active'>
          <div class='review_top'>
          <div class='review_left'>
          <div class='review_name'>Your review</div>
          <div class='review_date'>" . $review['r_date'] . "</div>
          </div>
          
          <a href='dlt.php?r_id=" . $review['r_id'] . "' class='form dlt'>dlt</a>
          <button class='form edit'>edit</button>
          <button class='form update'>update</button>
          
          </div>
          
          <div class='review_con'>" . $review['r_msg'] . "</div>
          <form method='POST' action='update.php' id='back_form'>
          <input type='text' name='back_id' id='back_id' value='" . $review['r_id'] . "'>
          <textarea  name='back_msg' id='back_msg'></textarea>
          <input type='submit' name='update'>
          </form>
        
          </div>";
        } else {
          $str .= "<div class='new_review'>
          Add review
          <button class='big' onclick='see_review_form(this)'>+</button>
          <form class='add' method='POST'>
            <textarea rows='3' class='re_con' placeholder='your review' name='review'></textarea>
            <input type='submit' class='submit' value='add' name='add'></form></div>";
        }
      } else {
        $str .= "<div class='new_review'>
    Add review
    <button class='big' onclick='see_review_form(this)'>+</button>
    <form class='add' method='POST'>
    <textarea rows='3' class='re_con' placeholder='your review' name='review'></textarea><input type='reset' class='submit' value='add' name='add' disabled> ";
        $str .= "<span class='loginmsg'>please login to add review</span
    >";
        $str .=  "<div class='link'><a href='login.php'>Login</a></div></form></div>";
      }


      // for fetching all the reviews
      if (isset($_SESSION['user'])) {
        $sql = "select * from movies as m,reviews as r,users as u
  where m.m_id='$m_id' and r.m_id=m.m_id and u.u_id =r.u_id and r.u_id!='$u_id'";
      } else {
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
    }
      $str .= "
      </div>
    </section>
    </section>
    ";
      echo $str;
    }
  }
}




 // <div class='cast'>
      //   <h3> cast</h3>
      //   <div>
      //     <div class='cast_i'> <img src='c1.jpg' alt=''><span>James bond</span></div>
      //     <div class='cast_i'> <img src='c2.jpg' alt=''><span>James bond</span></div>
      //     <div class='cast_i'> <img src='c3.jpg' alt=''><span>James bond</span></div>
      //     <div class='cast_i'> <img src='c4.jpg' alt=''><span>James bond</span></div>
      //     <div class='cast_i'> <img src='c5.jpg' alt=''><span>James bond</span></div>
      //     </div>
      //     </div>


      // <ul class='other'>
    
      //         <li>
      //           <ul class='lan'>
      //             <li>Eng</li>
      //             <li>Hindi</li>
      //             <li>Tamil</li>
      //             </ul>
      //             </li>
      //             <li>
      //             <ul class='dim'>
      //             <li>2d</li>
      //             <li>3d</li>
      //           </ul>
      //           </li>
      //           </ul>