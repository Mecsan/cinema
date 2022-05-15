<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/home.css">
  <link rel="stylesheet" href="../css/movie.css">
  <link rel="stylesheet" href="../css/ticket.css">
</head>

<body>



  <?php include '../compo/header.php' ?>

  <?php if (isset($_GET['id'])) {

    $id=$_GET['id'];

    include "../fetch/cinemadata.php";

    include "../fetch/connection.php";

    $sql = "select * from movies as m,cinema_movie as rel
where m.m_id=rel.m_id and rel.c_id='$id';";

    $result = mysqli_query($con, $sql);

    if (!$result) {
      die();
    } else {
      $str="";

      $len = mysqli_num_rows($result);
      if ($len > 0) {
        $str .= "
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
</style> <div class='section'>
          <section class='movies'>
              <div class='contain'>";

        while ($row = mysqli_fetch_assoc($result)) {
          $str .= "<div class='m_item' >
                  <div class='img' style='background-image: url(" . $row['path'] . ".jpg)'>
                  </div>
                  <div class='m_name'>" . $row['m_name'] . " </div>
                </div>";
        }
        $str .= " </div>
          </div>
          </section>
        </div>";
      }
      echo $str;
    }
  } else {
    include '../fetch/allcinemas.php';
  }
  ?>

  <?php include '../compo/footer.php' ?>

  <script>

let movie = document.querySelector('.movies');
if(movie){
  let id = location.href.split('cinema.php?');
  
  let movie_list = movie.getElementsByClassName('m_item');
  for(let i=0;i<movie_list.length;i++)
  {
    let item = movie_list[i];
    ;
    let newname= item.querySelector('.m_name').innerHTML;
    
    item.addEventListener('click',function show_next()
    {
      location.href=`movie.php?name=${newname}&${id[1]}`;
    });
  }
}
    let cinema = document.querySelector('.Cinema');
    if(cinema){

    
    let cinema_list = cinema.getElementsByClassName('m_item');
    for (let i = 0; i < cinema_list.length; i++) {
      let item = cinema_list[i];
      let id = item.querySelector('.m_name').dataset.id


      item.addEventListener('click', function show_next() {
        location.href = `cinema.php?id=${id}`;
      });
    }
  }
  </script>
</body>
<script src="../js/home.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>