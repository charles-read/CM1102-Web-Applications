<?php
//session_start();
$servername = "csmysql.cs.cf.ac.uk"; $username = "c1646151"; $password = "bocnukdeg5"; $databaseName = "c1646151";
$connection = mysqli_connect($servername, $username, $password, $databaseName);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>REKU.COM</title>
        <link rel="stylesheet" type="text/css" href="format.css">
        <script language="javascript">
        
        function hoverbasket(element) {
            element.setAttribute("src", "img/basket2.png"); }
        function unhoverbasket(element) {
            element.setAttribute("src", "img/basket1.png");}
        function hoverhome(element) {
            element.setAttribute("src", "img/home2.png");}
        function unhoverhome(element) {
            element.setAttribute("src", "img/home1.png"); }

    </script>
    </head>
    <header>
    <br>
    <img id="banner" src="img/banner.png" alt="Website Banner" width="1920" height="200">

    </header>
    <br>
        <nav>
            <ul>
                <li><a href="home.php" >Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="cart.php">My Basket</a></li>

            </ul>
        </nav>        
        <img id="banner2" src="img/banner2.png" alt="Website Banner" width="1920" height="325">
        
        <body>
        <hr>


        <div class = "rightness" >
        <a href="home.php">
        <img id="my-img" src="img/home1.png" onmouseover="hoverhome(this);" onmouseout="unhoverhome(this);"> </a> &nbsp;&nbsp;

        <a href="cart.php">
        <img id="my-img" src="img/basket1.png" onmouseover="hoverbasket(this);" onmouseout="unhoverbasket(this);"></a>

        </div>

        <br>


        <?php
            $id=$_GET['i_id'];
            $query = "SELECT * FROM `rekuProducts` WHERE ID=$id;";
            $result = mysqli_query($connection, $query);

          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <table>
          <div class="shopTable">
            <tr>
              <td><img src="<?php echo $row["image"]; ?>" class="img"></td>
              <td><br><h1 class="nameClass"> <?php echo $row["name"]; ?></h2>
              <h2 class="priceClass"> £<?php echo $row["price"]; ?></h2>
              <p class="descpClass"> <?php echo $row["longDescription"]; ?></t>
              <br><br>
                <?php echo '<a href="cart.php?i_id='.$row['ID'].'"'.'>Go to Shop</a>'?>
              <br><br>
            </tr>
          </div>
        </table>
        
        <?php
          }
        }
      mysqli_close($connection);?>
        

        <br><br>
       
        </body>   
        <footer>Copyright © REKU 2017</footer>

</html>
