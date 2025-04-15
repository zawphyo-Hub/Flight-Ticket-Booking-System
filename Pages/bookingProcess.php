<?php
include('Connection.php');
session_start();


    $tripType = isset($_GET['tripType']) ? mysqli_real_escape_string($connection, $_GET['tripType']) : '0';
    $adults = isset($_GET['adults']) ? (int)$_GET['adults'] : 0;
    $children = isset($_GET['children']) ? (int)$_GET['children'] : 0;
    $infants = isset($_GET['infants']) ? (int)$_GET['infants'] : 0;
    $totalPassengers = $adults + $children + $infants;

    $departureFlightId = isset($_GET['departureFlight']) ? $_GET['departureFlight'] : null;
    $returnFlightId = isset($_GET['returnFlight']) ? $_GET['returnFlight'] : null;
    $totalPrice = isset($_GET['totalPrice']) ? floatval($_GET['totalPrice']) : 0;

    
    $sql ="insert into booking(departureflightid, returnflightid, totalprice, passengernumber,triptype) 
        VALUES ('$departureFlightId', " . ($returnFlightId ? "'$returnFlightId'" : "NULL") . ", '$totalPrice', '$totalPassengers','$tripType')";

    if (mysqli_query($connection, $sql)) {
        $bookingID = mysqli_insert_id($connection);
        echo "<script>
            alert('Your Booking is Saved. Please Fill Out Your Personal Information.');
            window.location.href = 'passengerDetail.php?bookingID=$bookingID&adults=$adults&children=$children&infants=$infants&totalPrice=$totalPrice&departureFlight=$departureFlightId&returnFlight=$returnFlightId';
        </script>";
    } 

?>