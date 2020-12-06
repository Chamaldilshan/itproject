<?php require_once('conect.php'); ?>

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

            input[type=button] {
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
                <h1 align="center">   STOCK</h1><br>
<h2> EquipmentRegister</h2>
<br>

            </div>

            <div class="form">
              <form action='stock.php' method ='POST'>

                <!-- text areas -->
                <label>EquipmentID</label>
                <input type='text'  name='equipmentID' placeholder="EquipmentID..." required>

                <label>Category</label>
                <input type='text' name='category' placeholder="Category..." required>
<br>
                <label>Serial NO</label>
                <input type='text' name='serialno' placeholder="Serial NO...">

                <label>Supplier</label>
                <input type='text'  name='supplier' placeholder="Supplier...">
<br>
                <label>Invoice NO</label>
                <input type='text'  name='invoiceno' placeholder="Invoice NO">

                <!-- buttons -->
                <input type="submit" value="Update" name='update'>
                <input type="submit" value="Add New" name='add'>
                <input type="button" value="View" name='view' onClick="parent.location='viewstock.php'">
              </form>
            </div>
        </div>
        <!-- page wrapper -->
    </body>
</html>

<!-- add items to db -->
<?php
	if(isset($_POST['add'])){

	$sql = "INSERT INTO `stock` (`equipmentID`, `category`, `serialno`, `supplier`, `invoiceno`) VALUES ('".$_POST['equipmentID']."','".$_POST['category']."','".$_POST['serialno']."','".$_POST['supplier']."','".$_POST['invoiceno']."')";

	$result = mysqli_query($connection,$sql);
	if($result)
    echo"<script> alert('ADDED SUCESSFULLY') </script>";
  else
    echo"failed";

}

// update items
  if(isset($_GET['category'])){
    $sql1 = "SELECT * FROM stock WHERE category='".$_GET['category']."'";
    $result=mysqli_query($connection,$sql1);
    $row=mysqli_fetch_assoc($result);
  }

  if (isset($_POST['update'])){
    $sql2= "UPDATE stock SET serialno = '".$_POST['serialno']."',supplier='".$_POST['supplier']."',invoiceno='".$_POST['invoiceno']."' WHERE equipmentID='".$_POST['equipmentID']."'";
    $result2=mysqli_query($connection,$sql2);

    $sql3="SELECT * FROM stock WHERE equipmentID='".$_POST['equipmentID']."'";
    $result3=mysqli_query($connection,$sql3);
    $row=mysqli_fetch_assoc($result3);
    echo "<script> alert(' STOCK UPDATE SUCESSFULLY')</script>";
  }




?>
