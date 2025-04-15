<?php
session_start();
if (isset($_SESSION['admin'])){
    include('Connection.php');
    
    
    $airline = $_POST['airline'];
    $capacity = $_POST['capacity'];
    $route = $_POST['route'];
   

    $sql = "insert into  flightschedules(airline,capacity,flightroute)
        values('$airline', '$capacity','$route')";
    
    if (mysqli_query($connection, $sql)) {
        $scheduleid = mysqli_insert_id($connection);
        echo "<script>
            alert('Successfully Saved');
                    
            window.location.href = 'DetailForm.php?scheduleid=$scheduleid';
            </script>";
    } 
    else {
         echo "Error, Unsuccessful" ;
    }
}
else {
        echo "<script>
            alert('Only Admin Can Enter');
            
            </script>";
}

           
        



?>