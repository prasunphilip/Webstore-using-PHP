<?php include ('displaycard.php') ?>

<?php

	$name="";
		$ID = "";
		$price = "";
		$productcount = mysqli_query($db, "SELECT ID,name,Price FROM `graphic_cards`");
		while ($row = mysqli_fetch_array($productcount)) {
			$name = $row['name'];
			$price = $row['Price'];
			$ID = $row['ID'];
?>

<br>
<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
		  		<div class="card-body">
						<h5 class="card-title"><?php echo $name; ?></h5>
				    	<p class="card-text">&#x20B9;<?php echo $price;?></p>	
				    	<form action="displaycard.php?action=add&ID=<?php echo $ID?>" method="POST">	
				    		<input type="hidden" name="hidden_name" value="<?php echo $name;?>">
				    		<input type="hidden" name="hidden_price" value="<?php echo $price;?>">
				   			<input type="submit" name="spec" value="Spec" class="btn btn-primary">
				   			<input type="submit" name="cart" value="Add to Cart" class="btn btn-primary">
				   	</form>
   		    	</div>
   		    </div>


<?php
}
?>

?>