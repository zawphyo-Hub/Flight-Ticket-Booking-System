<?php
session_start();
if (isset($_SESSION['admin'])){
    include('Connection.php');
    
    

    $flightnumber = $_POST['flightnumber'];
    $airline = $_POST['airline'];
    $departureairport = $_POST['departureairport'];
    $departuredate = $_POST['departuredate'];
    $departuretime = $_POST['departuretime'];

    $arrivalairport = $_POST['arrivalairport'];
    $arrivaldate = $_POST['arrivaldate'];
    $arrivaltime = $_POST['arrivaltime'];
    $seatno = $_POST['seatno'];
    $class = $_POST['class'];
    $price = $_POST['price'];


    $sql = "insert into  flightschedule(flightnumber,airline,departureairport,departuredate,departuretime, arrivalairport,
    arrivaldate, arrivaltime, seatno, class, price)
    values('$flightnumber', '$airline','$departureairport','$departuredate','$departuretime','$arrivalairport',
    '$arrivaldate','$arrivaltime','$seatno', '$class', '$price')";
    
    if (mysqli_query($connection, $sql)) {
        $flightScheduleId = mysqli_insert_id($connection);
        echo "<script>
            alert('Successfully Saved');
                    
            window.location.href = 'DetailForm.php?id=$flightScheduleId';
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