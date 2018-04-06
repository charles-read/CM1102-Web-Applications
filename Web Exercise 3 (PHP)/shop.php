<?php
session_start();
$servername = "csmysql.cs.cf.ac.uk"; $username = "c1646151"; $password = "bocnukdeg5"; $databaseName = "c1646151";
$connection = mysqli_connect($servername, $username, $password, $databaseName);
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>New and Upcoming</title>
    <link rel="stylesheet" type="text/css" href="format.css"/>
  </head>
        <img id="banner" src="banner.png" alt="Website Banner" width="1920" height="500"/>
        <header></header>
  <body>
    	<h3><u>New and Upcoming Switch Games</u></h3>
        <?php
        	$query = "SELECT * FROM `Games` LIMIT 0, 30";
        	$result = mysqli_query($connection, $query);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <table>
          <div class="shopTable">
            <tr>
              <td><img src="<?php echo $row["Image"]; ?>" class="imgages"></td>
              <td><br><h1 class="nameClass"> <?php echo $row["Name"]; ?></h2>
              <h2 class="priceClass"> £<?php echo $row["Price"]; ?></h2>
              <p class="descpClass"> <?php echo $row["Description"]; ?></t2>
            </tr>
          </div>
        </table>
        <?php
          }
        }
      mysqli_close($connection);?>
 </body>
 <footer>Copyright © Charlie Read 2017</footer>
</html>
