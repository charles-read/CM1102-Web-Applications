<?php session_start(); $servername="csmysql.cs.cf.ac.uk" ; $username="c1646151" ; $password="bocnukdeg5" ; $databaseName="c1646151" ; $connection=m ysqli_connect($servername, $username, $password, $databaseName); ?>
<?php extract($_POST); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>REKU.COM</title>
    <link rel="stylesheet" type="text/css" href="format.css">
    <script language="javascript">
        function hoverbasket(element) {
            element.setAttribute("src", "img/basket2.png");
        }

        function unhoverbasket(element) {
            element.setAttribute("src", "img/basket1.png");
        }

        function hoverExp(element) {
            element.setAttribute("src", "img/expensive2.png");
        }

        function unhoverExp(element) {
            element.setAttribute("src", "img/expensive1.png");
        }

        function hoverCheap(element) {
            element.setAttribute("src", "img/cheap2.png");
        }

        function unhoverCheap(element) {
            element.setAttribute("src", "img/cheap1.png");
        }
    </script>
</head>
<header>
    <br>
    <img id="banner" src="img/banner.png" alt="Website Banner" width="1920" height="200">

</header>
<br>
<nav>
    <ul>
        <li><a class="active" href="home.php">Home</a>
        </li>
        <li><a href="about.html">About</a>
        </li>
        <li><a href="basket.html">My Basket</a>
        </li>

    </ul>
</nav>
<img id="banner2" src="img/banner2.png" alt="Website Banner" width="1920" height="325">

<body>
    <hr>


    <div class="rightness">
        <a href="cart.php">
            <img id="my-img" src="img/basket1.png" onmouseover="hoverbasket(this);" onmouseout="unhoverbasket(this);"> </a>
        <br>
        <br>
        <a href="indexExp.php">
            <img id="my-img" src="img/expensive1.png" onmouseover="hoverExp(this);" onmouseout="unhoverExp(this);">
        </a>
        &nbsp;&nbsp;
        <a href="indexCheap.php">
            <img id="my-img" src="img/cheap1.png" onmouseover="hoverCheap(this);" onmouseout="unhoverCheap(this);">
        </a>
        &nbsp;&nbsp;
        <a href="home.php">
            <img id="my-img" src="img/sortname1.png">
        </a>
        <br>
        <br>
        <form action="search.php" method="POST">
            <input type="text" name="search">
            <input type="submit" value="search">
        </form>



        <?php $query="SELECT * FROM `rekuProducts` WHERE name like '%$search%'" ; $result=m ysqli_query($connection, $query); if ($search !="" ){ if (mysqli_num_rows($result)> 0) { while($row = mysqli_fetch_assoc($result)) { echo '
        <table>'; echo'
            <div class="shopTable">'; echo'
                <tr>'; echo'
                    <td><img src="'.$row[" image "].'" class="img">
                    </td>'; echo '
                    <td>
                        <br>
                        <h1 class="nameClass">'.$row["name"].'</h2>';
            echo ' <h2 class="priceClass"> £'.$row["price"].'</h2>';
             echo' <p class="descpClass">' .$row["description"].'</t>';
              echo'<br><br>';
              echo'<a href="desc.php?i_id='.$row['ID'].'"'.'>View Details</a>';
              echo'&nbsp;&nbsp;&nbsp;&nbsp;';
              echo'  <a href="cart.php">Go to Shop</a>
              <br><br>
            </tr>
          </div>
        </table>';
          }
        }
        else {
            echo "<h5>Could not find the item. Please Try Again </h5>";
        }
}
        else {
            echo "<h5> Could not find the item. Please Try Again</h5>";
    }
      mysqli_close($connection);
      ?>


        <br><br>
        </body>   
        <footer>Copyright © REKU 2017</footer>

</html>