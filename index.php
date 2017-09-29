<?php 
include_once("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php include_once 'template/head.php';  ?>
  </head>

  <body>
    <?php include_once 'template/menu.php';  ?>
    <div class="container" align="center">

        <h1 style = "color:red"><b>Jaku</b></h1>
        <p>Jaku is youtube videostore/betting site !!! Try predict views on youtube video and be the best <span style = "color:red">JAKU!</span></p><br><br>
        <iframe width="420" height="315" src="https://www.youtube.com/embed/41MZr1klZuA"> </iframe><br>
        <h4>Not a member? <a href="public/register.php">Register</a>  </h4>
        <h4>Already a member? <a href="public/login.php">Log in</a>  </h4>

    </div><!-- /.container -->

	<?php include_once 'template/scripts.php'; ?>

  </body>
</html>

