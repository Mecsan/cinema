<div class="head">
  <div class="logo_title">

    <h1 class="title" onclick="home()"> Cinema</h1>
  </div>
  <nav>
    <button id='nav' onclick="open_nav(this)">|||</button>
    <ul class="nav closee">
      <li><a href="index.php">Home</a></li>
      <li><a href="#con">Contact</a></li>
      <?php
      
      if (isset($_SESSION['user'])) {
        echo "<li><a href='login.php'>acc</a></li>";
      } else {
        echo "<li><a href='login.php'>Log in</a></li>";
      }
      ?>
    </ul>
  </nav>
</div>