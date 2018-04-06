<?php
$servername = "csmysql.cs.cf.ac.uk"; $username = "c1646151"; $password = "bocnukdeg5"; $databaseName = "c1646151";
$connection = mysqli_connect($servername, $username, $password, $databaseName);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>REKU Sportswear</title>
        <link rel="stylesheet" type="text/css" href="format.css">
        <script language="javascript">
        
        function hoverbasket(element) {
            element.setAttribute("src", "img/basket2.png");}
        function unhoverbasket(element) {
            element.setAttribute("src", "img/basket1.png");}
        function hoversortname(element) {
            element.setAttribute("src", "img/sortname2.png");}
        function unhoversortname(element) {
            element.setAttribute("src", "img/sortname1.png");}
        function hoverCheap(element) {
            element.setAttribute("src", "img/cheap2.png"); }
        function unhoverCheap(element) {
            element.setAttribute("src", "img/cheap1.png");}


    </script>
    </head>
    <header>
    <br>
    <img id="banner" src="img/banner.png" alt="Website Banner" width="1920" height="200">

    </header>
    <br>
        <nav>
            <ul>
                <li><a class="active" href="home.php" >Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="cart.php">My Basket</a></li>

            </ul>
        </nav>        
        <img id="banner2" src="img/banner2.png" alt="Website Banner" width="1920" height="325">
        
        <body>
        <hr>

        <div class = "rightness" >
        <a href="cart.php">
        <img id="my-img" src="img/basket1.png" onmouseover="hoverbasket(this);" onmouseout="unhoverbasket(this);"> </a>
        <br><br>
        <a href="indexExp.php">
        <img id="my-img" src="img/expensive2.png" onmouseover="hoverExp(this);" onmouseout="unhoverExp(this);">
        </a>
        &nbsp;&nbsp;
        <a href="indexCheap.php">
        <img id="my-img" src="img/cheap1.png" onmouseover="hoverCheap(this);" onmouseout="unhoverCheap(this);">
        </a>
        &nbsp;&nbsp;
        <a href="home.php">
        <img id="my-img" src="img/sortname1.png" onmouseover="hoversortname(this);" onmouseout="unhoversortname(this);">
        </a>
        <br><br>
        <form action="search.php" method="POST">
        <input type="text" name="search">
        <input type="submit" value="search">
        </form>

    
        <?php
            $query = "SELECT * FROM `rekuProducts` ORDER BY `price` desc; ";
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
              <p class="descpClass"> <?php echo $row["description"]; ?></t>
              <br><br>
              <?php echo '<a href="desc.php?i_id='.$row['ID'].'"'.'>View Details</a>'?>
              &nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo '<a href="cart.php?i_id='.$row['ID'].'"'.'>Go to shop</a>'?>
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
