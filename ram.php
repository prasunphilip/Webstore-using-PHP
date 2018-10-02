<?php include ('register.php'); ?>
<?php include ('navbar.php'); ?>


<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>

<?php

$name;
$se;
$mem;
$cap;
$kit;
$spe;
$lat;
$vol;
$reg;
$err;
$spds;
$spdv;
$price;
$fan;
$hei;
$war;
$fea;
$not;


  if(isset($_GET['ID_R'])){
    $ID = preg_replace('#[^0-9]#i', '', $_GET['ID_R']);
    $ID = $_GET['ID_R'];
    $db = mysqli_connect('localhost','root','','project');
    $productcount = mysqli_query($db, "SELECT * FROM `ram` WHERE ID_R=$ID");
    $rows =  mysqli_num_rows ( $productcount );

    if($rows > 0){
      while ($row = mysqli_fetch_array($productcount)) {
        $name=$row['name'];
        $mem = $row['Memory'];
        $cap = $row['Capacity'];
        $kit = $row['Kit'];
        $spe = $row['Speed'];
        $vol = $row['Voltage'];
        $reg = $row['Reg'];
        $err = $row['Error'];
        $spds = $row['SPDSpeed'];
        $spdv = $row['SPDVoltage'];
        $fan = $row['Fan'];
        $hei = $row['Height'];
        $price = $row['Price'];
        $war = $row['Warranty'];
        $fea = $row['Features'];
        $not = $row['Notes'];
        $se = $row['Series'];
        $lat = $row['Latency'];
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
              <img src="images/ram2.jpg" width="70%">
        </div>

        <div class = "col-lg-6">
            <div class = "row">
                  <div class = "col-md-12">
                       <h1><?php echo $name; ?></h1>
                  </div>
            </div>

            <div class = "row pb-xl-4 border-bottom">
               <div class = "col-md-12">
                    <span class = "badge badge-secondary rounded-0 text-uppercase">RAM</span>
               </div>
            </div>

            <div class = "row pt-xl-4 pb-xl-4 border-bottom">
                <div class = "col-md-4">
                    <h3 class = "text-success">&#x20B9; <?php echo $price;?></h3>
                </div>

                <div class = "col-md-4">
                   <form action="displayr.php?action=add&ID=<?php echo $ID?>" method="POST">
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
                <th scope = "row">Series</th>
                <td><?php echo $se; ?></td>
              </tr> 

              <tr>
                <th scope = "row">Memory Type</th>
                <td><?php echo $mem; ?></td>
              </tr>

              <tr>
                <th scope = "row">Capacity</th>
                <td><?php echo $cap; ?></td>
              </tr>

              <tr>
                <th scope = "row">Multi-Channel Kit</th>
                <td><?php echo $kit; ?></td>
              </tr>

              <tr>
                <th scope = "row">Tested Speed</th>
                <td><?php echo $spe; ?></td>
              </tr>

              <tr>
                <th scope = "row">Tested Latency</th>
                <td><?php echo $lat; ?></td>
              </tr>

              <tr>
                <th scope = "row">Tested Voltage</th>
                <td><?php echo $vol; ?></td>
              </tr>

              <tr>
                <th scope = "row">Registered/Unbuffered</th>
                <td><?php echo $reg; ?></td>
              </tr>

              <tr>
                <th scope = "row">Error Checking</th>
                <td><?php echo $err; ?></td>
              </tr>

              <tr>
                <th scope = "row">SPD Speed</th>
                <td><?php echo $spds; ?></td>
              </tr>

              <tr>
                <th scope = "row">SPD Voltage</th>
                <td><?php echo $spdv; ?></td>
              </tr>

              <tr>
                <th scope = "row">Fan lncluded</th>
                <td><?php echo $fan; ?></td>
              </tr>

              <tr>
                <th scope = "row">Height</th>
                <td><?php echo $hei; ?></td>
              </tr>

              <tr>
                <th scope = "row">Warranty</th>
                <td><?php echo $war; ?></td>
              </tr>

              <tr>
                <th scope = "row">Features</th>
                <td><?php echo $fea; ?></td>
              </tr>

              <tr>
                <th scope = "row">Additional Notes</th>
                <td><?php echo $not; ?></td>
              </tr>

            </tbody>
          </table>
        </div>




