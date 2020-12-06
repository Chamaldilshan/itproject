<?php require_once('conect.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Repair</title>
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
<h2> EquipmentRepair</h2>
<br>

            </div>
            <!-- top bar -->


            <div class="form">
              <form action='vieworder.php' method ='POST'>

                <!-- text areas -->
                <label>EquipmentID</label>
                <input type='text'  name='eid' placeholder="EquipmentID..." required>  <br>

                <label>Date</label> <br>
                <input type='text' name='date' placeholder="Category..." required> <br>

                <label>Repair</label> <br>
                <input type='text' name='repair' placeholder="Repair..."> <br>

                <label>Cost</label> <br>
                <input type='text'  name='cost' placeholder="Cost..."> <br>

                <label>InoiceAttachment</label>    <br>

                <input type='text'  name='attachment' placeholder="InoiceAttachment">
                <br>

                <!-- buttons -->

                <input type="submit" value="Add" name='add1'>
                <input type="button" value="View" name='view' onClick="parent.location='vieworder1.php'">
              </form>
            </div>
        </div>
        <!-- page wrapper -->
    </body>
</html>

<!-- add items to db -->
<?php
	if(isset($_POST['add1'])){

	$sql = "INSERT INTO `repair` (`eid`, `date`, `repair`, `cost`, `attachment`) VALUES ('".$_POST['eid']."','".$_POST['date']."','".$_POST['repair']."','".$_POST['cost']."','".$_POST['attachment']."')";

	$result = mysqli_query($connection,$sql);
	if($result)
    echo"<script> alert('ADDED SUCESSFULLY') </script>";
  else
    echo"failed";

}







?>
