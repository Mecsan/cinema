<!DOCTYPE html>
<?php
include '../fetch/connection.php';
session_start(); ?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/home.css">
  <link rel="stylesheet" href="../css/signin.css">

</head>

<body>
  <header>
    <div class="head">
      <div class="logo_title">
        <h1 class="title" onclick="home()">Cinema</h1>
      </div>
    </div>


    <div class="head_text" style="display: flex;
      background:linear-gradient(#1c171769,#121214c8,#000000),url('../img/img1.jpg');
      background-position: center;
  background-attachment: fixed;
  background-size: cover;;
    ">
      <div>
        <h1 style="display: inline;">Welcome</h1>
        <?php
        if (isset($_SESSION['user'])) {
          $id = $_SESSION['user'];
          $sql = "select name from users where u_id='$id'";
          $result = mysqli_query($con, $sql);

          $main = mysqli_fetch_assoc($result);
          echo "<span class='kuch'>" . $main['name'] . "</span>";
        }

        ?>

        <p>
          Book any show anytime anywhere
        </p>
      </div>

      <?php

      if (isset($_SESSION['user'])) {
        echo "<div class='kuch'>
        <a href='logout.php'>logout</a>
        
        </div>";
      } else {
        echo "
       
      <div class='login'>
        <h3>Log in to your Account</h3>
        <form method='POST' id='myform' autocomplete='off' onsubmit='return validate()'>
          <div class='form_co '>
            <input type='email' placeholder='Enter mail' name='mail' id='mail'>
            <span class='msg'>error</span>
          </div>
          <div class='form_co'>

            <input type='password' placeholder='Password' name='password' id='psd'>
            <span class='msg'>error</span>
          </div>";




        if (isset($_POST['submit'])) {


          $pass = $_POST['password'];
          $mail = $_POST['mail'];

          $sql = "select * from users where mail='$mail' and active='yes';";
          $result = mysqli_query($con, $sql);

          if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            if (password_verify($pass, $row['psd'])) {
              $_SESSION['user'] = $row['u_id'];

              // if (isset($_SESSION['msg'])){
              //   session_unset($_SESSION['msg']);
              // }
              if (isset($_SESSION['history'])) {
                header('location:'.$_SESSION['history']);
              } else {
                header('location:index.php');
              }
              // echo " successfully ";

            } else {
              echo 'password is incorrect';
            }
          } else {
            echo 'invalid email';
          }
        }



        // if (isset($_SESSION['msg'])) {
        //   echo "<div class='msg'>" . $_SESSION['msg'] . "</div>";
        // }



        echo " 
          <input type='submit' name='submit' value='log In'>
          <div class='or'>OR</div>
          <div class='sign'>
            <div>new user?</div>
            <a href='signin.php'>create Account</a>
          </div>
        </form>
      </div>";
      }
      ?>



    </div>


  </header>
  <script>
    function home() {
      location.href = "index.php";
    }

    function seterror(obj, msg) {
      let par = obj.parentElement;
      par.className = "form_co error";
      par.querySelector('span').innerText = msg;
    }

    function setsuccess(obj) {
      let par = obj.parentElement;
      par.className = "form_co success";
    }


    function validate() {
      let form = document.getElementById('myform');

      let mail = document.getElementById('mail');
      let pass = document.getElementById('psd');



      let valmail = /^[a-zA-Z0-9]+@[a-zA-Z]+.[a-zA-Z]{2,5}$/;
      if (!valmail.test(mail.value)) {
        seterror(mail, "enter correct format");
        return false;
      }
      setsuccess(mail);

      let valpsd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!#$%@^&*]{8,16}$/;
      if (pass.value.length < 8 || pass.value.length > 16) {
        seterror(pass, "password length should be in [8,16]")
        return false;
      } else if (!valpsd.test(pass.value)) {
        seterror(pass, "password must contain atleast 1 upper,1 lower,1 digit,1 special character");
        return false;
      }
      setsuccess(pass);
      return true;
    }
  </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>