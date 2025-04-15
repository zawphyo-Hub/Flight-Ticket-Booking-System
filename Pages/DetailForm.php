<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="SAE.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Sky Asia Express</title>
</head>
<body class="appbody">
    
    <?php 
    include('adminNavbar.php');
    include('Connection.php');
    session_start();
    if (isset($_SESSION['admin'])){


    $scheduleid = $_GET['scheduleid'];
    
    
    $select = "SELECT airline 
    FROM flightschedules WHERE scheduleid = $scheduleid";
    $result = mysqli_query($connection, $select);
    


    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
                
        $airline = $row['airline'];
        
    } 
    
    
    ?>
    
    <div class="detailContainer">
    <div class="detailForm">
        <h2>Schedule Detail Form</h2>
        <form id="scheduleDetailForm" action="detailFormProcess.php?scheduleid=<?php echo $scheduleid; ?>" method="post">

            <div class="app-input">
            <div class="app-wrap">
            <div class="app-flex">
                <label class="detailLabel">Flight Schedule ID:</label>
                <input type="text" name="scheduleid" value="<?php echo $scheduleid; ?>" readonly>

                <label class="detailLabel">Airline:</label>
                <input type="text" name="airline" value="<?php echo $airline; ?>" readonly>

                <label class="detailLabel">Flight Number:</label>
                <input type="text" name="flightnumber" placeholder="Enter Flight Number" required>

                
                <label class="detailLabel">Departure Airport:</label>
                <input type="text" name="departureairport" placeholder="Enter Departure Airport" required>

                

                
            </div>
            <div class="app-flex">

                <label class="detailLabel">Arrival Airport:</label>
                <input type="text" name="arrivalairport" placeholder="Enter Arrival Airport" required>

                <label class="detailLabel">Departure Date:</label>
                <input type="date" name="departuredate" required>

                <label class="detailLabel">Arrival Date:</label>
                <input type="date" name="arrivaldate" required>

                <label class="detailLabel">Departure Time:</label>
                <input type="text" name="departuretime" placeholder="Enter Departure Time" required>

                

            </div>

            <div class="app-flex">
                <label class="detailLabel">Arrival Time:</label>
                <input type="text" name="arrivaltime" placeholder="Enter Arrival Time" required>

                <label class="detailLabel">Price: </label>
                <input type="number" name="price" placeholder="Enter Price" required>

                <label class="detailLabel">Class: </label>
                <input type="text" name="class" placeholder="Enter Class" required>

                

            </div>
            
            </div>
            </div>
            <button type="button" class="confirm" name="confirm" onclick="addSchedule()">Add Schedule</button>

        </form>
    </div>
    </div>

    <div class='usertb1'>
    <form id="scheduleTableForm" action="detailFormProcess.php?scheduleid=<?php echo $scheduleid; ?>" method="post">
    <input type="hidden" name="scheduleid" value="<?php echo $scheduleid; ?>" >
        <table id="scheduledisplay" border="1" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th class='nametb1'>ID</th>
                    <th class='nametb1'>Airline</th>
                    <th class='nametb1'>Flight Number</th>
                    <th class='nametb1'>Departure Airport</th>
                    <th class='nametb1'>Departure Date</th>
                    <th class='nametb1'>Departure Time</th>
                    <th class='nametb1'>Arrival Airport</th>
                    <th class='nametb1'> Arrival Date</th>
                    <th class='nametb1'>Arrival Time</th>
                    <th class='nametb1'>Class</th>
                    <th class='nametb1'>Price</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <button type="submit" class="confirm" name="save">Save Schedules</button>
    </form>
    </div>
    
    <script src="SAE.js"> </script>
    <?php  } ?>
    
</body>
</html>