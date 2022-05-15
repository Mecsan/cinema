<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
  <title>Home</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/home.css">
  <link rel="stylesheet" href="../../css/movie.css">
</head>

<body>
  <header>
    <!-- <div class="head">
      <div class="logo_title">
        <img class="logo" src="img/img1.jpg">
        <h1 class="title" onclick="home()">Cinema</h1>
      </div>
      <nav>
        <button id='nav' onclick="open_nav(this)">|||</button>
        <ul class="nav closee">
          <li><a href="index.html">Home</a></li>
          <li><a href="#con">Contack</a></li>
          <li><a href="login.html">Log in</a></li>
        </ul>
      </nav>
    </div> -->
    <!-- for nav bar -->
    <?php include "../../compo/movieheader.php"?>
  </header>
<!-- 
  <section class="main">

    <section class="movie_content">
      <div class="width">

        <div class="smimg" style="background-image: url(spider.jpg);"></div>
        <div class="in">
          <div class="cotent">
            <h1>spiderman :No way home</h1>
            <span>2021</span>
            <ul class="tags">
              <li>Triller</li>
              <li>Action</li>
              <li>scifi</li>
            </ul>
            <span>2:30</span>
            <ul class="other">

              <li>
                <ul class="lan">
                  <li>Eng</li>
                  <li>Hindi</li>
                  <li>Tamil</li>
                </ul>
              </li>
              <li>
                <ul class="dim">
                  <li>2d</li>
                  <li>3d</li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="rat_book">

            <div class="rat">
              <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
              <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
              <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
              <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
              <i class="fa fa-star-half-o" style="font-size: 2rem;"></i>
            </div>
            <button id="book">Book tickets</button>
          </div>
        </div>
      </div>

    </section>
    <section class="main_about">
      <div class="about">
        <h3>About</h3>
        <div>
          With Spider-Man's identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong,
          dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be
          Spider-Man.
        </div>
      </div>

      <div class="cast">
        <h3> cast</h3>
        <div>
          <div class="cast_i"> <img src="c1.jpg" alt=""><span>James bond</span></div>
          <div class="cast_i"> <img src="c2.jpg" alt=""><span>James bond</span></div>
          <div class="cast_i"> <img src="c3.jpg" alt=""><span>James bond</span></div>
          <div class="cast_i"> <img src="c4.jpg" alt=""><span>James bond</span></div>
          <div class="cast_i"> <img src="c5.jpg" alt=""><span>James bond</span></div>
        </div>
      </div>

      
     




      <div class="review">

        <h3>Reviews</h3>
        <div class="new_review">
          Add review
          <button class="big" onclick="see_review_form(this)">+</button>
          <div class="add">
            <input type="text" name="name" class="re_name" placeholder="name">
            <textarea rows="3" class="re_con" placeholder="your review"></textarea>
            <button class="submit">Add</button>
          </div>
        </div>
        <div class="review_item">
          <div class="review_top">
            <div class="review_left">
              <div class="review_name">Sanket mecwan</div>
              <div class="review_date">12th june,2020</div>
            </div>
            <div class="review_rat">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o"></i>
            </div>
          </div>
          <div class="review_con">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo, asperiores qui, debitis accusantium, optio soluta eveniet totam quisquam ut voluptas cum ducimus nulla sapiente error aperiam perferendis facere! Autem, a?</div>
        </div>
        <div class="review_item">
          <div class="review_top">
            <div class="review_left">
              <div class="review_name">Sanket mecwan</div>
              <div class="review_date">12th june,2020</div>
            </div>
            <div class="review_rat">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o"></i>
            </div>
          </div>
          <div class="review_con"> res qui, debitis accusantium, optio soluta eveniet totam quisquam ut voluptas cum ducimus nulla sapiente error aperiam perferendis facere! Autem, a?</div>
        </div>

      </div>
    </section>
  </section> -->

  <?php include "../../fetch/onemovie.php"?>


  <div class="section">
    <section class="movies">
      <h2>Recommended movies</h2>
      <div class="slide">

        <button class="pre">
          << /button>
            <button class="nxt">></button>
            <div class="contain">
              <div class="m_item">
                <div class="img" style="background-image: url(spider.jpg);"">
          </div>
          <div class=" m_name">Spiderman: no way home </div>

              </div>
              <div class="m_item">
                <div class="img" style="background-image: url(puspa.jpg);">
                </div>
                <div class="m_name">Pushpa </div>

              </div>
              <div class="m_item">
                <div class="img" style="background-image: url(badhai.jpg);"">
          </div>
          <div class=" m_name">Badhai ho </div>

              </div>


            </div>
      </div>
    </section>
  </div>


  <!-- <footer class="footer">
    <div class="f_footer">

      <div class="left">
        <h6>Quick links</h6>
        <a href="home.html">Home</a>
        <a href="login.html">log in</a>
        <a href="nowayhome.html">no way home</a>
      </div>

      <div class="right" id="con">
        <table>
          <tr>
            <td>No :</td>
            <td>91-8469117814</td>
          </tr>
          <tr>
            <td>Mail :</td>
            <td><a href="mailto:mecwansanket333@gmail.com">here</a></td>
          </tr>
          <tr>
            <td valign="top">Main locaion : </td>
            <td>23,samrpa buliding<br>
              bakrol-vadtal road,<br>
              anand,388120
            </td>
          </tr>


        </table>
      </div>
    </div>
    <div style="background-color: transparent;
    display: flex;
    justify-content: center;
    padding: 20px;">
      <span style="padding: 5px; font-size: 1.5rem; color:white;">copyright</span>
      <span style="padding: 5px; font-size: 1.5rem; color:white;">&copy;</span>
      <span style="padding: 5px; font-size: 1.5rem; color:white;">reserved</span>
    </div>


  </footer> -->
  <?php include "../../compo/moviefooter.php" ?>



  <script>
  //   let url = location.href;
  //   let arr =url.split("cinema/");
  // url = arr[1];
  // arr = url.split(".php");
  // url=arr[0];
   
 

    
  </script>








</body>
<script src="../../js/home.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>