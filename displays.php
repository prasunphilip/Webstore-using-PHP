<?php include ('register.php'); ?>
<?php include ('navbar.php'); ?>

<?php
		$db = mysqli_connect('localhost','root','','project');
		if (isset($_POST['spec']) || isset($_POST['cart'])) 
		{
			if(isset($_SESSION["ssd"]))
			{
				$item_array_ID = array_column($_SESSION["ssd"], "item_ID");
				if (!in_array($_GET['ID'], $item_array_ID)) 
				{
					$count = count($_SESSION["ssd"]);
					$item_array = array(
						'id' => $_GET['ID'],
						'item_name' => $_POST['hidden_name'],
						'item_price' => $_POST['hidden_price'],
					);
					$_SESSION["ssd"][$count] = $item_array;
					if(isset($_POST['spec']))
					{
						foreach ($_SESSION["ssd"] as $keys => $values) 
						{
							header("Location:ssd.php?ID_S=$values[id]");
						}
					}
					else
					{
						foreach ($_SESSION["ssd"] as $keys => $values) 
						{
							header("Location:cart.php?ID_S=$values[id]");
						}
					}
				}
			}
			else{
				$item_array = array(
					'id' => $_GET['ID'],
					'item_name' => $_POST['hidden_name'],
					'item_price' => $_POST['hidden_price'],
				);
				$_SESSION["ssd"][0] = $item_array;
			}
		}

		$name="";
		$ID = "";
		$price = "";
		$productcount = mysqli_query($db, "SELECT ID_S,name,Price FROM `ssd`");
		while ($row = mysqli_fetch_array($productcount)) {
			$name = $row['name'];
			$price = $row['Price'];
			$ID = $row['ID_S'];
?>

<br>
<div class="card-deck">
<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
		  		<div class="card-body">
		  			<?php if($name == "Samsung T5 2TB"):?>
              <img src="images/ssd3.jpg" width="70%">
              <?php else:?>
                <img src="images/ssd2.jpg" width="70%">
            <?php endif ?>
						<h5 class="card-title"><?php echo $name; ?></h5>
				    	<p class="card-text">&#x20B9;<?php echo $price;?></p>	
				    	<form action="displays.php?action=add&ID=<?php echo $ID?>" method="POST">
				    		
				    		<input type="hidden" name="hidden_name" value="<?php echo $name;?>">
				    		<input type="hidden" name="hidden_price" value="<?php echo $price;?>">
				   			<input type="submit" name="spec" value="Spec" class="btn btn-primary">
				   			<input type="submit" name="cart" value="Add to Cart" class="btn btn-primary">
				   	</form>
   		    	</div>
   		    </div>
   		</div>


<?php
}
?>