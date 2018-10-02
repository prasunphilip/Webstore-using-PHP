<?php include ('register.php'); ?>
<?php include ('navbar.php'); ?>


<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
?>

<?php
  $name="";
	$ID = "";
	$model = "";
	$chip = "";
	$pci = "";
	$msize = "";
	$mtype = "";
	$minterface = "";
	$direct ="";
	$ports = "";
	$res = "";
	$cooler = "";
	$software = "";
	$package = "";
	$gpuc = "";
	$sli = "";
	$war = "";
	$price = "";
	$manu = "";


	if(isset($_GET['ID'])){
		$ID = preg_replace('#[^0-9]#i', '', $_GET['ID']);
    $ID = $_GET['ID'];
    $db = mysqli_connect('localhost','root','','project');
    $productcount = mysqli_query($db, "SELECT * FROM `graphic_cards` WHERE ID=$ID");
    $rows =  mysqli_num_rows ( $productcount );

		if($rows > 0){
			while ($row = mysqli_fetch_array($productcount)) {
        $name=$row['name'];
				$model = $row['Model'];
				$chip = $row['Chipset'];
				$pci = $row['PCI'];
				$msize = $row['MSize'];
				$mtype = $row['MType'];
				$minterface = $row['MInterface'];
				$direct = $row['DirectX'];
				$ports = $row['Ports'];
				$res = $row['Resolution'];
				$cooler = $row['Cooler'];
				$software = $row['Software'];
				$package = $row['Package'];
				$gpuc = $row['GPUCore'];
				$sli = $row['SLI'];
				$war = $row['Warranty'];
				$price = $row['Price'];
				$manu = $row['Manufacturer'];
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
              <img src = "{{ charger.Image.url }}" width = "70%">
        </div>

        <div class = "col-lg-6">
            <div class = "row">
                  <div class = "col-md-12">
                       <h1><?php echo $name; ?></h1>
                  </div>
            </div>

            <div class = "row pb-xl-4 border-bottom">
               <div class = "col-md-12">
                    <span class = "badge badge-secondary rounded-0 text-uppercase">Graphic card</span>
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
                <th scope = "row">Manufacturer</th>
                <td><?php echo $manu; ?></td>
              </tr>

              <tr>
                <th scope = "row">Model Name</th>
                <td><?php echo $model; ?></td>
              </tr> 

              <tr>
                <th scope = "row">Chip</th>
                <td><?php echo $chip; ?></td>
              </tr>

              <tr>
                <th scope = "row">PCI</th>
                <td><?php echo $pci; ?></td>
              </tr>

              <tr>
                <th scope = "row">Memory Size</th>
                <td><?php echo $msize; ?></td>
              </tr>

              <tr>
                <th scope = "row">Memeory Type</th>
                <td><?php echo $mtype; ?></td>
              </tr>

              <tr>
                <th scope = "row">Memory Interface</th>
                <td><?php echo $minterface; ?></td>
              </tr>

              <tr>
                <th scope = "row">DirectX</th>
                <td><?php echo $direct; ?></td>
              </tr>

              <tr>
                <th scope = "row">Ports</th>
                <td><?php echo $ports; ?></td>
              </tr>

              <tr>
                <th scope = "row">Resolution</th>
                <td><?php echo $res; ?></td>
              </tr>

              <tr>
                <th scope = "row">Cooler</th>
                <td><?php echo $cooler; ?></td>
              </tr>

              <tr>
                <th scope = "row">Software</th>
                <td><?php echo $software; ?></td>
              </tr>

              <tr>
                <th scope = "row">Package</th>
                <td><?php echo $package; ?></td>
              </tr>

              <tr>
                <th scope = "row">GPU Core(Cuda Core)</th>
                <td><?php echo $gpuc; ?></td>
              </tr>

              <tr>
                <th scope = "row">SLI</th>
                <td><?php echo $sli; ?></td>
              </tr>

              <tr>
                <th scope = "row">Warranty Duration</th>
                <td><?php echo $war; ?></td>
              </tr>

            </tbody>
          </table>
        </div>




