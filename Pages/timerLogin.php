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

        <div id="blockTime">
        
        </div>
        
        <script>
          
        <?php session_start()  ?>
        var month = new Date().getMonth() + 1;   
        var day = new Date().getDate();
        var year = new Date().getFullYear();
        var hour = new Date().getHours();
        var minutes = new Date().getMinutes() + 10; //10 minutes
        var second = new Date().getSeconds() + 2;
        var time = hour + ":" + minutes + ":" + second;
        
        var ResetTime = new Date(month + " " + day + ", " + year + " " + time).getTime();
     
        var x = setInterval(function() {
         
            var now = new Date().getTime(); 
            var distance = ResetTime - now; 
           
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
     
            document.getElementById('blockTime').innerHTML = "<h3>Your Login is blocked, Try again later.</h3>" + minutes + "m " + seconds + "s ";
           
     
            if (distance < 0) {
                clearInterval(x);
                document.getElementById('blockTime').innerHTML = "<?php session_destroy();  ?>";
                window.location.href = 'SAE_login.php';
            }
        }, 1000);//1 sec = 1000 milisecond
        </script>
    
     
    
</body>
</html>