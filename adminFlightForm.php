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

        
    ?>
    
    <div class="app-container">
    <div class="app-content">
        <h3>Flights Schedules</h3>

        <form action="flightFormProcess.php" method="post">
            <div class="app-input">
            <div class="app-wrap">
            <div class="app-flex">
               
               <label class="pro">Flight Number</label>
               <input type="text" name="flightnumber" placeholder="Enter Flight Number" required><br>

               <label class="pro">Airline</label>
               <input type="text" name="airline" placeholder="Enter Airline" required> <br>
              
               <label class="pro">Departure Airport</label>
               <input type="text" name="departureairport" placeholder="Enter Depature Airport" required> <br>
              
               <label class="pro">Departure Date</label>
               <input type="date" name="departuredate" placeholder="Enter Depature Date" required> <br>

               
            </div>
            <div class="app-flex">

                <label class="pro">Departure Time</label>
                <input type="text" name="departuretime" placeholder="Enter Depature Time" required> <br>
               
                <label class="pro">Arrival Airport</label>
                <input type="text" name="arrivalairport" placeholder="Enter Arrival Airport" required> <br>
               
                <label class="pro">Arrival Date</label>
                <input type="date" name="arrivaldate" placeholder="Enter Arrival Date" required> <br>

                <label class="pro">Arrival Time</label>
                <input type="text" name="arrivaltime" placeholder="Enter Arrival Time" required> <br>

                
            </div>
            <div class="app-flex">
               
                <label class="pro">Seat Number</label>
                <input type="text" name="seatno" placeholder="Enter Seat Number" required> <br>

                <label class="pro">Class</label>
                <input type="text" name="class" placeholder="Enter Class" required> <br>

                <label class="pro">Total Price</label>
                <input type="text" name="price" placeholder="Total Price" required><br>
               
                
                
            </div>
            
            </div>
            <button class="confirm" type="submit" name="confirm">CONFIRM</button>
           
            </div>  
                                     
        </form>
       
    </div>
       
    </div>

    

    <?php } ?>
</body>
</html>