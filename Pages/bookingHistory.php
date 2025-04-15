<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="SAE.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Sky Asia Express</title>
</head>
<body>
    <?php
    include('Navbar.php');
    ?>

<div class="app-container">
    <div class="app-content">
        <h3>Booking Search</h3>

        <p class="bookp">In order to proceed with booking search, please fill the form below. So, we can easily check your booking.</p>

        <form action="BhistoryProcess.php" method="post">
           
            <div class="app-flex1">
               
              <div class="searchWrap">
               <label class="pro1">Email</label>
               <input type="text" name="emailSearch" placeholder="Enter Email" required> <br>
              </div>
              <div class="searchWrap">
              <button class="confirm1" type="submit" name="confirm">Search</button>

              </div>
               
               
            </div>
           
            
            
        
            
          
                                             
        </form>
       
    </div>
       
    </div>

    

        <?php include('footer.php')?>

 
</body>
</html>