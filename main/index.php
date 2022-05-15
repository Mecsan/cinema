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
</head>

<body>

<?php if(isset($_SESSION['booked'])){
  unset($_SESSION['booked']);
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    ticket booked succesully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}

?>
  

  
  <?php include '../compo/header.php'?>

  <!--  for moving corosoul -->
  <header>
   
    <div class="head_text">
      <!-- <h1>Welcome</h1>
      <p>
        Book any show anytime anywhere
      </p> -->
      <div id="carouselExampleIndicators" class="carousel slide" data-interval="2500" data-ride="carousel" >
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" ></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../img/kgf2.jpg" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="cor_st">KGF 2</h2>
              <p>...</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../img/thor.jpg" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="cor_st">
Thor: love and Thunder</h2>
              <p>...</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../img/fantastic.jpg" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="cor_st">Fantastic Beasts: The Secrets of Dumbledore </h2>
              <p>...</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
     
  </header>
 



  
  <?php include "../fetch/movies.php"?>


  <?php include "../fetch/upcoming_movies.php" ?>


  
  


  <?php include "../fetch/cinemas.php" ?>

  <?php include "../compo/footer.php" ?>






<script>
  let movie = document.querySelector('.movies');
let movie_list = movie.getElementsByClassName('m_item');
for(let i=0;i<movie_list.length;i++)
{
  let item = movie_list[i];
  let newname= item.querySelector('.m_name').innerHTML;

  item.addEventListener('click',function show_next()
  {
    location.href=`movie.php?name=${newname}`;
  });
}

let cinema = document.querySelector('.Cinema');
let cinema_list = cinema.getElementsByClassName('m_item');
for(let i=0;i<cinema_list.length;i++)
{
  let item = cinema_list[i];
  let id=  item.querySelector('.m_name').dataset.id
   

  item.addEventListener('click',function show_next()
  {
    location.href=`cinema.php?id=${id}`;
  });
}

let umovie = document.querySelector('.umovies');
let umovie_list = umovie.getElementsByClassName('m_item');
for(let i=0;i<umovie_list.length;i++)
{
  let item = umovie_list[i];
  let newname= item.querySelector('.m_name').innerHTML;
  console.log(item)

  item.addEventListener('click',function show_next()
  {
    location.href=`movie.php?name=${newname}`;
  });
}

let cot_item = document.getElementsByClassName('carousel-item');
Array.from(cot_item).forEach(e => {
  e.addEventListener('click',()=>{
    let new_url = e.querySelector('h2.cor_st').innerHTML;
    location.href=`movie.php?name=${new_url}`;
  })
  
});

 



 
</script>
</body>
<script src="../js/home.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>