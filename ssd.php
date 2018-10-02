<?php include ('register.php'); ?>
<?php include ('navbar.php'); ?>


<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
?>

<?php
$name;
$cap;
$dim;
$wei;
$spe;
$UASP;
$enc;
$sec;
$cer;
$ro;
$war;
$price;
$int;


	if(isset($_GET['ID_S'])){
		$ID = preg_replace('#[^0-9]#i', '', $_GET['ID_S']);
    $ID = $_GET['ID_S'];
    $db = mysqli_connect('localhost','root','','project');
    $productcount = mysqli_query($db, "SELECT * FROM `ssd` WHERE ID_S=$ID");
    $rows =  mysqli_num_rows ( $productcount );

		if($rows > 0){
			while ($row = mysqli_fetch_array($productcount)) {
        $name=$row['name'];
				$cap = $row['Capacity'];
				$int = $row['Interface'];
				$dim = $row['Dimension'];
				$wei = $row['Weight'];
				$spe = $row['Speed'];
				$UASP = $row['UASP'];
				$enc = $row['Encryption'];
				$sec = $row['Security'];
				$cer = $row['Certification'];
				$ro = $row['RoHS Compliance'];
				$price = $row['Price'];
        $war = $row['Warranty'];
			}

		}
		else{
			echo "Item does not exist";
		}
	}
	else{
		echo "No data present";
	}
?>      

<div class = "container mt-xl-4">
    <div class = "row pb-xl-4">
        <div class = "col-xl-6">
              <?php if($name == "Samsung T5 2TB"):?>
              <img src="images/ssd3.jpg" width="70%">
              <?php else:?>
                <img src="images/ssd2.jpg" width="70%">
            <?php endif ?>
        </div>

        <div class = "col-lg-6">
            <div class = "row">
                  <div class = "col-md-12">
                       <h1><?php echo $name; ?></h1>
                  </div>
            </div>

            <div class = "row pb-xl-4 border-bottom">
               <div class = "col-md-12">
                    <span class = "badge badge-secondary rounded-0 text-uppercase">SSD</span>
               </div>
            </div>

            <div class = "row pt-xl-4 pb-xl-4 border-bottom">
                <div class = "col-md-4">
                    <h3 class = "text-success">&#x20B9; <?php echo $price;?></h3>
                </div>

                <div class = "col-md-4">
                   <form action="displays.php?action=add&ID=<?php echo $ID?>" method="POST">
                <input type="submit" name="cart" value="Add to Cart" class="btn btn-primary">
            </form>
                </div>
             </div>
          </div>
      </div>
  </div>


      <div class = "container p-xl-3 text-center rounded" style = "background-color: #202AED; color: white">
          <span>Specifications</span>
        </div>

        <div class = "container mt-xl-4">
          <table class = "table table-striped table-dark">
            <tbody>

              <tr>
                <th scope = "row">Capacity</th>
                <td><?php echo $cap; ?></td>
              </tr> 

              <tr>
                <th scope = "row">Interface</th>
                <td><?php echo $int; ?></td>
              </tr>

              <tr>
                <th scope = "row">Dimension (WxHxD)</th>
                <td><?php echo $dim; ?></td>
              </tr>

              <tr>
                <th scope = "row">Weight</th>
                <td><?php echo $wei; ?></td>
              </tr>

              <tr>
                <th scope = "row">Transfer Speed</th>
                <td><?php echo $spe; ?></td>
              </tr>

              <tr>
                <th scope = "row">UASP Mode</th>
                <td><?php echo $UASP; ?></td>
              </tr>

              <tr>
                <th scope = "row">Encryption</th>
                <td><?php echo $enc; ?></td>
              </tr>

              <tr>
                <th scope = "row">Security</th>
                <td><?php echo $sec; ?></td>
              </tr>

              <tr>
                <th scope = "row">Certification</th>
                <td><?php echo $cer; ?></td>
              </tr>

              <tr>
                <th scope = "row">RoHS Compliance</th>
                <td><?php echo $ro; ?></td>
              </tr>

              <tr>
                <th scope = "row">Warranty</th>
                <td><?php echo $war; ?></td>
              </tr>

            </tbody>
          </table>
        </div>




