<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
  <title>Home</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/home.css">
  <link rel="stylesheet" href="../css/movie.css">
  <link rel="stylesheet" href="../css/ticket.css">
  <link rel="stylesheet" href="../css/date_time_seat.css">
</head>

<body>
  <header>

    <?php include "../compo/header.php";
    // echo $name;
    ?>
  </header>

 <?php if (isset($_GET['name'])) {
     include "../fetch/moviedata.php"  ;
    include '../fetch/recomanded_movie.php' ;
 }else{
    include "../fetch/allmovies.php";
 }?>



  <?php include "../compo/footer.php" ?>
  <script>
    let activeContent = document.querySelector('.active .review_con');
    // console.log(activecontent);

    let editbtn = document.querySelector('.active .edit');
    let updatebtn = document.querySelector('.active .update');

    if (activeContent) {
      let text = activeContent.innerHTML;


      editbtn.addEventListener('click', () => {
        updatebtn.style.display = 'inline';
        editbtn.style.display = 'none';
        activeContent.contentEditable = true;

        activeContent.focus();
      })

      activeContent.parentElement.addEventListener('blur', () => {
        activeContent.contentEditable = false;
        updatebtn.style.display = 'none';
        editbtn.style.display = 'inline';
        activeContent.innerHTML = text;
      })

      updatebtn.addEventListener('click', () => {
        backForm = document.getElementById('back_form');
        backMsg = document.getElementById('back_msg');
        backMsg.value = activeContent.innerHTML;

        backForm.submit();
      })


    }

    function go(obj) {
      let curr = location.href;
      location.href = `${curr}&id=${obj}`;
    }


    let movie_list = document.getElementsByClassName('m_item');
    for (let i = 0; i < movie_list.length; i++) {
      let item = movie_list[i];
      // // console.log(item);
      // let name = item.querySelector('.m_name').innerHTML;
      // // console.log(name);
      // // name = name.replaceAll(" ","_");
      // let newname = "";
      // for (let i = 0; i < name.length - 1; i++) {
      //   if (name[i] == " ") {
      //     newname += "_";
      //     continue;
      //   }
      //   newname += name[i];
      // }
      // console.log(name,newname);
      let newname = item.querySelector('.m_name').innerHTML;

      item.addEventListener('click', function show_next() {
        location.href = `movie.php?name=${newname}`;
      });
    }
    
    
  </script>


</body>
<script src="../js/home.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>