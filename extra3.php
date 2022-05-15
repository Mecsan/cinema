<!DOCTYPE html>
<?php session_start(); ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/ticket.css">
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
        <?php include "../compo/header.php"?>
    </header>
    <div class="back">
        
    <section class="selection">
        <div class="cin">
            <div>
                <h3>Time cienema</h3>
                <span>Anand</span>
            </div>
            <div class="rat">
                <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                <i class="fa fa-star-half-o" style="font-size: 2rem;"></i>
            </div>
        </div>
        <form action="./home.html">
            
            <input type="date" >
            <div class="language">
                <input type="radio" name="lan" ><button>Hindi</button>
                <input type="radio" name="lan" ><button>English</button>
            </div>
            <div class="dime">
                <input type="radio" name="dime" ><button>2D</button>
                <input type="radio" name="dime" ><button>3D</button>
            </div>
            <div class="time">
                <div class="time_i">9:30 AM</div>
                <div class="time_i">12:30 PM</div>
                <div class="time_i">3:00 PM</div>
                <div class="time_i">6:00 PM</div>
                <div class="time_i">9:00 PM</div>


            </div>
            <button type="submit" class="next">submit</button>

        </form>
    </section>
    </div>
    <div class="s_about">
        <h2>No way home</h2>
        <div class="left">
            <ul>
                <li>Action</li>
                <li>thriler</li>
                <li>scifi</li>
            </ul>
            <ul>
                <li>2h31m</li>
                <li>2021</li>
            </ul>

        </div>
        <div class="ratings">
            <span>4.5</span>
            <div>
                <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                <i class="fa fa-star-half-o" style="font-size: 2rem;"></i>
            </div>
        </div>

    </div>





    <!-- for Current movies section -->
    <section class="filter">
        <form>
            <select>
                <option value="city">city</option>
                <option value="anad">anand</option>
                <option value="nadiad">nadiad</option>
                <option value="baroda">Baroda</option>
            </select>
            <!-- <select >
            <option value="English"  >English</option>
            <option value="hindi">hindi</option>
            <option value="tamil">tami;</option>
            <option value="baroda">Baroda</option>
        </select> -->
        </form>
    </section>

    <section class="content">
        <h2>select cinema</h2>
        <div class="cinemalist">


            <div class="cinema_i" onclick="see_select()">
                <div>
                    <h3>dhwidhw</h3>
                    <span>vv nagar</span>
                </div>
                <div class="rat">
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star-half-o" style="font-size: 2rem;"></i>
                </div>
            </div>
            <div class="cinema_i"  onclick="see_select()">
                <div>
                    <h3>Time cienema</h3>
                    <span>Anand</span>
                </div>
                <div class="rat">
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star-half-o" style="font-size: 2rem;"></i>
                </div>
            </div>
            
            
             
            
            <div class="cinema_i"  onclick="see_select()">
                <div>
                    <h3>Rajhans</h3>
                    <span>Nadiad</span>
                </div>
                <div class="rat">
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star-half-o" style="font-size: 2rem;"></i>
                </div>
            </div>
            <div class="cinema_i"  onclick="see_select()">
                <div>
                    <h3>Gold</h3>
                    <span>Anand</span>
                </div>
                <div class="rat">
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star" aria-hidden="true" style="font-size: 2rem;"></i>
                    <i class="fa fa-star-half-o" style="font-size: 2rem;"></i>
                </div>
            </div>
        </div>
    </section>

    

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
    <!-- for fotter -->
    <?php include "../compo/footer.php" ?>
    <script>
        let select = document.querySelector('.selection');
        function see_select()
        {
            select.style.display='block';
            select.parentElement.style.display='block';
        }
 

    </script>







</body>
<script src="../js/home.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>

</html>