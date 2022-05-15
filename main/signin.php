<?php
session_start();



if (isset($_POST['submit'])) {
  include "../fetch/connection.php";


  $name = $_POST['name'];
  $pass = $_POST['password'];
  $mail = $_POST['mail'];


  $sql = " select * from users where mail = '$mail'";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "mail aleady registered";
  } else {
    
    $token =bin2hex( random_bytes(20));

    $hash = password_hash($pass,PASSWORD_BCRYPT);

    $sql = "INSERT INTO `users` (`u_id`, `name`, `mail`, `psd`, `l_movie`, `l_the` , `active`,`token`)
     VALUES (NULL, '$name', '$mail', '$hash', '', '' , 'yes','$token');";

    $result = mysqli_query($con, $sql);
    if (!$result) {
      die();
    }
    else{
       $_SESSION['msg']="check your mail for confirmation";
       header("location:login.php");
    }
  }
}

?>



<!DOCTYPE html>
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
    
    <?php
       
      if (isset($_SESSION['user'])) {
         header("location:login.php");
      } else {
        echo "
        <div>
        <h1>Welcome</h1>
        <p>
          Book any show anytime anywhere
        </p>
      </div>
      <div class='login'>
        <h3>Create your Account</h3>
        <form method='POST' autocomplete='off' onsubmit='return validate()' id='myform'>
          <div class='form_co'>
            <input type='text' placeholder='Name' name='name' id='name'>
            <span class='msg'>error</span>
          </div>
          <div class='form_co '>
            <input type='email' placeholder='Enter mail' name='mail' id='mail'>
            <span class='msg'>error</span>
          </div>
          <div class='form_co'>

            <input type='password' placeholder='Password' name='password' id='psd'>
            <span class='msg'>error</span>
          </div>
          <div class='form_co'>


            <input type='password' placeholder='confirm Password' name='cpass' id='cpsd'>
            <span class='msg'>error</span>
          </div>

          <input type='submit' name='submit' value='Sign In'>
          <div class='or'>OR</div>
          <div class='sign'>
            <div>Have account?</div>
            <a href='login.php'>Log in</a>
          </div>
        </form>
      </div>
      </div>
         ";
      }?>
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
      let name = document.getElementById('name');
      let mail = document.getElementById('mail');
      let pass = document.getElementById('psd');
      let cpass = document.getElementById('cpsd');

      let valname = /^[a-zA-Z]{3,}$/;

      if (name.value.length < 3) {
        seterror(name, "atleast 3 alphabet require");
        return false;
      } else if (!valname.test(name.value)) {
        seterror(name, "only alphabets allowed in name");
        return false;
      }
      setsuccess(name);

      let valmail = /^[a-zA-Z0-9]+@[a-zA-Z]+.[a-zA-Z]{2,5}$/;
      if (!valmail.test(mail.value)) {
        seterror(mail, "enter correct format");
        return false;
      }
      setsuccess(mail);

      let valpsd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!#$%@^&*]{8,16}$/;
      if (pass.value.length < 8 || pass.value.length > 16) {
        seterror(pass, "password length should be in [8,10]")
        return false;
      } else if (!valpsd.test(pass.value)) {
        seterror(pass, "password must contain atleast 1 upper,1 lower,1 digit,1 special character");
        return false;
      }
      setsuccess(pass);


      if (pass.value != cpass.value) {
        seterror(cpass, "password didnt match");
        return false;
      }
      setsuccess(cpass);
      return true;
    }
  </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>