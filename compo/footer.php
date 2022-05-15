<footer class="footer">
  <div class="f_footer">

    <div class="left">
      <h6>Quick links</h6>
      <a href="index.php">Home</a>
      <?php

      if (isset($_SESSION['user'])) {
        echo "<a href='logout.php'>log out</a>";
      } else {
        echo "<a href='login.php'>Log in</a>";
      }
      ?>
      <a href="movie.php?name=Spiderman no way home">no way home</a>
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
  <div class="copy">
    copyright
    &copy;
    reserved
  </div>


</footer>

<script>
  function home() {
    location.href = "index.php";
  }
</script>