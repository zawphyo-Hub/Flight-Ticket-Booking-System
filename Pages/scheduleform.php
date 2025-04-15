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
        <h3>Flight Schedules</h3>

        <form action="scheduleProcess.php" method="post">
            <div class="app-input">
            <div class="app-wrap1">
            <div class="app-flex">
               
              
               <label class="pro">Airline</label>
               <input type="text" name="airline" placeholder="Enter Airline" required> <br>
              
               <label class="pro">Capacity</label>
               <input type="text" name="capacity" placeholder="Enter Capacity" required> <br>

               <label class="pro">Flight Route</label>
               <input type="text" name="route" placeholder="Enter Flight Route" required> <br>
                            

               
            </div>
            
            
            </div>
            <button class="confirm" type="submit" name="confirm">CONFIRM</button>
           
            </div>  
                                     
        </form>
       
    </div>
       
    </div>

    

    <?php } ?>
    <script src="SAE.js"></script>
</body>
</html>