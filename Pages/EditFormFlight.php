<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="SAE.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Sky Asia Express</title>
</head>
<body class="editBody">
    <?php
     session_start();
     if (isset($_SESSION['admin'])){
     include ("Connection.php");
     include('adminNavbar.php');
     $id = $_GET['scheduledetailid'];
     $sql = "select * from flightdetails where scheduledetailid=$id";
     $result = mysqli_query($connection,$sql);
     $passRecord = mysqli_fetch_assoc($result);


    ?>
    <div class="detailContainer">
    <div class="detailForm">
        <h2>Edit Flight Information</h2>
        <form id="editFlightInfoForm" action="EditFormFlight-process.php" method="post">
            
            <div class="app-input">
                <div class="app-wrap">
                    <div class="app-flex">
                       
                       <input type="hidden" name="scheduledetailid" value="<?php echo $passRecord['scheduledetailid']; ?>">
                        <label class="detailLabel">Flight Number:</label>
                        <input type="text" name="flightnumber" value="<?php echo $passRecord['flightnumber']; ?>" required>

                        <label class="detailLabel">Departure Airport:</label>
                        <input type="text" name="departureairport" value="<?php echo $passRecord['departureairport']; ?>" required>

                        <label class="detailLabel">Arrival Airport:</label>
                        <input type="text" name="arrivalairport" value="<?php echo $passRecord['arrivalairport']; ?>" required>

                       
                    </div>

                    <div class="app-flex">

                         <label class="detailLabel">Departure Date:</label>
                        <input type="date" name="departuredate" value="<?php echo $passRecord['departuredate']; ?>" required>

                        <label class="detailLabel">Arrival Date:</label>
                        <input type="date" name="arrivaldate" value="<?php echo $passRecord['arrivaldate']; ?>" required>

                        <label class="detailLabel">Departure Time:</label>
                        <input type="text" name="departuretime" value="<?php echo $passRecord['departuretime']; ?>" required>

                     
                    </div>

                    <div class="app-flex">

                    <label class="detailLabel">Arrival Time:</label>
                        <input type="text" name="arrivaltime" value="<?php echo $passRecord['arrivaltime']; ?>" required>

                        <label class="detailLabel">Price:</label>
                        <input type="number" name="price" value="<?php echo $passRecord['price']; ?>" required>
                        

                        <label class="detailLabel">Class:</label>
                        <input type="text" name="class" value="<?php echo $passRecord['class']; ?>" required>
                    </div>
                </div>
            </div>

            <button class="buttonreg" type="submit">Update</button>
        </form>
    </div>
    </div>
    <?php } ?>


</body>
</html>