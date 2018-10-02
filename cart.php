<?php include ('register.php'); ?>
<?php include ('navbar.php'); ?>

<?php
			if(isset($_SESSION["cart"]))
			{   
				if(isset($_GET['ID']))
				{
    				$ID = $_GET['ID'];
					$result = mysqli_query($db, "SELECT name,Price FROM `graphic_cards` WHERE ID=$ID");
					while ($row = mysqli_fetch_array($result)) 
					{
						$name = $row['name'];
						$price = $row['Price'];
					}

					$item_array_ID = array_column($_SESSION["cart"], "item_name");
					if (!in_array($name, $item_array_ID)) 
					{
						$count = count($_SESSION["cart"]);
						$item_array = array(
							'id' => $ID,
							'item_name' => $name,
							'item_price' => $price,
						);
						$_SESSION["cart"][$count] = $item_array;
					}
					else
					{
						echo '<script>alert("Item already added")</script>';
						echo '<script>window.location="cart.php"</script>';
					}
				}

				if(isset($_GET['ID_M']))
				{
    				$ID = $_GET['ID_M'];
					$result = mysqli_query($db, "SELECT name,Price FROM `m` WHERE ID_M=$ID");
					while ($row = mysqli_fetch_array($result)) 
					{
						$name = $row['name'];
						$price = $row['Price'];
					}

					$item_array_ID = array_column($_SESSION["cart"], "item_name");
					if (!in_array($name, $item_array_ID)) 
					{
						$count = count($_SESSION["cart"]);
						$item_array = array(
							'id' => $ID,
							'item_name' => $name,
							'item_price' => $price,
						);
						$_SESSION["cart"][$count] = $item_array;
					}
					else
					{
						echo '<script>alert("Item already added")</script>';
						echo '<script>window.location="cart.php"</script>';
					}
				}

				if(isset($_GET['action']))
				{
						if($_GET['action'] == "delete")
						{
							foreach ($_SESSION["cart"] as $keys => $values) 
							{
								if($values["item_name"] == $_GET['name'])
								{
									unset($_SESSION["cart"][$keys]);
									echo '<script>alert("Item Removed")</script>';
									echo '<script>window.location="cart.php"</script>';
								}
							}
						}
				}
			}
			else
			{
				$item_array = array(
					'id' => $ID,
					'item_name' => $name,
					'item_price' => $price,
				);
				$_SESSION["cart"][0] = $item_array;
			}
		

?>

<div style="clear: both;"></div>
<br>
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th width="40%">Product Name</th>
			<th width="20%">Price</th>
			<th width="15%">Total</th>
			<th width="5%">Action</th>
		</tr>
		<?php 

		if(empty($_SESSION["cart"]))
               echo "<h1><center>EMPTY CART</center></h1>";
           else
           	echo "<h1><center>CART</center></h1>";

        echo "<br>";

		if (!empty($_SESSION["cart"])) {
			$total = 0;
			foreach ($_SESSION["cart"] as $keys => $values) {
		?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td>&#x20B9;<?php echo $values["item_price"]; ?></td>
						<td>&#x20B9;<?php echo number_format($values["item_price"], 2); ?></td>
						<td><a href="cart.php?action=delete&name=<?php echo $values["item_name"];?>"><span class="text-danger">Remove</span></a></td>
					</tr>
		<?php	

			$total = $total + ($values["item_price"]);			
		}
		?>

		<tr>
			<td colspan="2" align="right">Total</td>
			<td align="left">&#x20B9;<?php echo number_format($total, 2) ?></td>
		</tr>

		<?php
	}
		?>

	</table>
	
</div>


<?php if(isset($_SESSION["cart"])) :?>
	<button type="button" class="btn btn-success" href="checkout.php">Checkout</button>
<?php else: ?>
	<button type="button" class="btn btn-success" href="checkout.php">Checkout<?php echo '<scrpit>alert("Cart Empty")</scrpit>' ?></button>
<?php endif ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">