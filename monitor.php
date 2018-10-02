<?php include ('register.php'); ?>
<?php include ('navbar.php'); ?>


<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
?>

<?php
$name;
$dis;
$vid;
$aud;
$hot;
$i;
$freq;
$po;
$mech;
$sec;
$dim;
$we;
$price;
$img;


	if(isset($_GET['ID_M'])){
		$ID = preg_replace('#[^0-9]#i', '', $_GET['ID_M']);
    $ID = $_GET['ID_M'];
    $db = mysqli_connect('localhost','root','','project');
    $productcount = mysqli_query($db, "SELECT * FROM `m` WHERE ID_M=$ID");
    $rows =  mysqli_num_rows ( $productcount );

		if($rows > 0){
			while ($row = mysqli_fetch_array($productcount)) {
        $name=$row['name'];
				$dis = $row['Display'];
				$vid = $row['Video'];
				$aud = $row['Audio'];
				$hot = $row['Hotkey'];
				$i = $row['i/o'];
				$freq = $row['Frequency'];
				$po = $row['Power'];
				$mech = $row['Mech'];
				$sec = $row['Security'];
				$dim = $row['Dimensions'];
				$we = $row['weigth'];
				$price = $row['Price'];
        $img = $row['mimage'];
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
              <img src = "ASUS ROG SWIFT PG279Q.jpg" width = "70%">
        </div>

        <div class = "col-lg-6">
            <div class = "row">
                  <div class = "col-md-12">
                       <h1><?php echo $name; ?></h1>
                  </div>
            </div>

            <div class = "row pb-xl-4 border-bottom">
               <div class = "col-md-12">
                    <span class = "badge badge-secondary rounded-0 text-uppercase">Monitor</span>
               </div>
            </div>

            <div class = "row pt-xl-4 pb-xl-4 border-bottom">
                <div class = "col-md-4">
                    <h3 class = "text-success">&#x20B9; <?php echo $price;?></h3>
                </div>

                <div class = "col-md-4">
                   <button type = "button" class = "btn btn-outline-primary">Add To Cart</button>
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
                <th scope = "row">Display</th>
                <td><?php echo $dis; ?></td>
              </tr> 

              <tr>
                <th scope = "row">Video Feature</th>
                <td><?php echo $vid; ?></td>
              </tr>

              <tr>
                <th scope = "row">Audio Feature</th>
                <td><?php echo $aud; ?></td>
              </tr>

              <tr>
                <th scope = "row">Convinent Hotkey</th>
                <td><?php echo $hot; ?></td>
              </tr>

              <tr>
                <th scope = "row">I/O Ports</th>
                <td><?php echo $i; ?></td>
              </tr>

              <tr>
                <th scope = "row">Signal Frequency</th>
                <td><?php echo $freq; ?></td>
              </tr>

              <tr>
                <th scope = "row">Power Consumption</th>
                <td><?php echo $po; ?></td>
              </tr>

              <tr>
                <th scope = "row">Mechanical Design</th>
                <td><?php echo $mech; ?></td>
              </tr>

              <tr>
                <th scope = "row">Security</th>
                <td><?php echo $sec; ?></td>
              </tr>

              <tr>
                <th scope = "row">Dimensions</th>
                <td><?php echo $dim; ?></td>
              </tr>

              <tr>
                <th scope = "row">Weight</th>
                <td><?php echo $we; ?></td>
              </tr>

            </tbody>
          </table>
        </div>




