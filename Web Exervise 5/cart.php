<?php
session_start();
require_once("functions.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByID = $db_handle->runQuery("SELECT * FROM rekuProducts WHERE ID='" . $_GET["ID"] . "'");
			$itemArray = array($productByID[0]["ID"]=>array('name'=>$productByID[0]["name"], 'ID'=>$productByID[0]["ID"], 'quantity'=>$_POST["quantity"], 'price'=>$productByID[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByID[0]["ID"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByID[0]["ID"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["ID"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<html>
<head>
<title>REKU Basket</title>
<link href="format.css" type="text/css" rel="stylesheet" />
</head>
<script language="javascript">
        function hoverhome(element) {
            element.setAttribute("src", "img/home2.png");}
        function unhoverhome(element) {
            element.setAttribute("src", "img/home1.png"); }
        function hovercart(element) {
            element.setAttribute("src", "img/empty2.png");}
        function unhovercart(element) {
            element.setAttribute("src", "img/empty1.png");}
        function hovercheckout(element) {
            element.setAttribute("src", "img/checkout2.png");}
        function unhovercheckout(element) {
            element.setAttribute("src", "img/checkout1.png");}

            </script>
<header>
    <br>
    <img id="banner" src="img/banner.png" alt="Website Banner" width="1920" height="200">

    </header>
    <br>
        <nav>
            <ul>
                <li><a href="home.php" >Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a class="active" href="cart.php">My Basket</a></li>

            </ul>
        </nav>
        </header>
<body>
<br><br><br>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th ><strong>Name</strong></th>
<th ><strong>Quantity</strong></th>
<th ><strong>Price</strong></th>
<th ><strong>Action</strong></th>
</tr>
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td ><strong><?php echo $item["name"]; ?></strong></td>
				<td ><?php echo $item["quantity"]; ?></td>
				<td ><?php echo "£".$item["price"]; ?></td>
				<td ><a id='b2' href="cart.php?action=remove&ID=<?php echo $item["ID"]; ?>">Remove</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td id="to" colspan="5"><strong>Total:</strong> <?php echo "£".$item_total; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
?>
</div>

<div id="product-grid">
<center><a id="b3" href="cart.php?action=empty">
<img id="i1" src="img/empty1.png" onmouseover="hovercart(this);" onmouseout="unhovercart(this);"></a>
&nbsp;&nbsp;&nbsp;&nbsp;
<a id="b3" href="checkout.html" >
<img id="i1" src="img/checkout1.png" onmouseover="hovercheckout(this);" onmouseout="unhovercheckout(this);"></a></center><br>
<a href ='home.php'><img id="i1" src="img/home1.png" onmouseover="hoverhome(this);" onmouseout="unhoverhome(this);"></a>
	
	<br><center><h3 id="h1">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM rekuProducts");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="cart.php?action=add&ID=<?php echo $product_array[$key]["ID"]; ?>">
			<div class="product-image"><img height ="100" width="80" src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo "£".$product_array[$key]["price"]; ?></div>
			<div><input id="txt" type="text" name="quantity" value="1" size="5" /><br><br><input id="b2" type="submit" value="Add to Basket"/></div>
			</form>
		</div>
	<?php
			}
	}
	?>
</div>
</BODY>
</HTML>