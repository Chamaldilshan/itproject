<?php require_once('conect.php'); ?>
<?php
if(isset($_GET['equipmentID'])){
  $sqlx = "SELECT * FROM stock WHERE equipmentID =".$_GET['equipmentID'];
  $resultx = mysqli_query($connection,$sqlx);
  $row=mysqli_fetch_assoc($resultx);
  if($resultx){

  }
  //echo "Sucessfull";
  else{
  echo"failed";
  }

  }

if(isset($_POST['update'])){
    $sqly = "UPDATE stock SET category = '".$_POST['category']."',equipmentID = '".$_POST['equipmentID']."',supplier = '".$_POST['equipmentID']."',invoiceno = '".$_POST['invoiceno']."' WHERE equipmentID ='".$_POST['equipmentID']."'";
  $resulty = mysqli_query($connection,$sqly);

  $sqlz = "SELECT * FROM stock WHERE equipmentID =".$_POST['equipmentID'];
  $resultz = mysqli_query($connection,$sqlz);
  $row=mysqli_fetch_assoc($resultz);
  echo"<script> alert('Updated Sucessfully') </script>";

  }
  if(!isset($_GET['equipmentID'])&&!isset($_POST['update'])){
  header("Location: viewstock.php");
  }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>STOCK DETAILS</title>
        <link rel="stylesheet" href="../css/stocks.css" type="text/css">
        <link href="../css/Hover-master/css/hover-min.css" rel="stylesheet">

        <style>
            input[type=text], select {
              width: 90%;
              padding: 12px 20px;
              margin: 8px 50px 10px 50px;
              display: inline-block;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
            }

            input[type=submit] {
              width: 26%;
              background-color:#07547a;
              color: white;
              padding: 14px 20px;
              margin: 8px 30px 10px 50px;
              border: none;
              border-radius: 4px;
              cursor: pointer;
            }
            button[type=button] {
              width: 26%;
              background-color:#07547a;
              color: white;
              padding: 14px 20px;
              margin: 8px 30px 10px 50px;
              border: none;
              border-radius: 4px;
              cursor: pointer;
            }
            </style>


    </head>
    <body>
        <div class="wrapper">
            <div class="topbar">
                <a href="operator.php"><img src="../img/backarr.png" width="30px" height="30p" class="hvr-float shadow"></a>
                <h1 align="center">   STOCK</h1>
            </div>



            <div class="form">
              <form action='stock.php' method ='POST'>


              <?php
                echo "<label>EquipmentID</label>";
                echo "<input type='text' name='equipmentID' placeholder='EquipmentID...' required value =".$row['equipmentID']." readonly>";
                echo "<label>Category</label>";
                echo "<input type='text' name='category' placeholder='Category...' required value =".$row['category']." readonly>";
                echo "<label>SerialNO</label>";
                echo "<input type='text' name='serialno' placeholder='Serial NO...'  value =".$row['serialno']." >";

                echo "<label>Supplier</label>";
                echo "<input type='text' name='supplier' placeholder='Supplier' required value =".$row['supplier']." >";
                echo "<label>InvoiceNO</label>";
                echo "<input type='text' name='invoiceno' placeholder='Invoice NO' required value =".$row['invoiceno']." >";

              ?>
                <!-- buttons -->
                <input type="submit" value="Update" name='update'>
                <input type="submit" value="Add New" name='add'>
                <a href="viewstock.php"><button type="button" class="submit">View</button></a>
              </form>
            </div>
        </div>

    </body>
</html>


<?php
	if(isset($_POST['add'])){

	$sql = "INSERT INTO `stock` (`equipmentID`, `category`, `serialno`, `supplier`, `invoiceno`) VALUES ('".$_POST['equipmentID']."','".$_POST['category']."','".$_POST['serialno']."','".$_POST['supplier']."','".$_POST['invoiceno']."')";

	$result = mysqli_query($connection,$sql);
	if($result)
  echo"<script> alert('ADDED SUCESSFULLY') </script>";
  else
  echo"failed";

}



?>
