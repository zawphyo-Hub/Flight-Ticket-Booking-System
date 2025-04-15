<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="SAE.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Sky Asia Express</title>
</head>
<body  class="userbody">
<?php
        include('Navbar.php');
        include ("Connection.php");

        if (isset($_GET['scheduledetailid']) && isset($_GET['tripType']) && isset($_GET['departureDate'])) {
            $departureFlightId = $_GET['scheduledetailid'];
            $tripType = $_GET['tripType'];
            $departureDate = $_GET['departureDate'];
            $returnDate = $_GET['returnDate'];
            $adults = isset($_GET['adults']) ? (int)$_GET['adults'] : 0;
            $children = isset($_GET['children']) ? (int)$_GET['children'] : 0;
            $infants = isset($_GET['infants']) ? (int)$_GET['infants'] : 0;
           
            if ($tripType === "roundTrip") {
                
                $returnSelect = "SELECT flightdetails.*, flightschedules.airline from flightdetails
                JOIN flightschedules ON flightdetails.scheduleid = flightschedules.scheduleid 
                WHERE departureairport = (SELECT arrivalairport FROM flightdetails WHERE scheduledetailid = '$departureFlightId') AND arrivalairport = (SELECT departureairport FROM flightdetails WHERE scheduledetailid = '$departureFlightId') 
                AND departureDate = '$returnDate'";
        
                $returnResult = mysqli_query($connection, $returnSelect);
                $returnRow = mysqli_num_rows($returnResult);
        
                if ($returnRow == 0) {
                    echo "<script>
                        alert('No Retun Flight Available, Please Rechoose Return Date!');
                        window.location.href = 'flight.php';
                    </script>";
                } else {
                    
                    while ($returnRecord = mysqli_fetch_assoc($returnResult)) {
                        $id = $returnRecord['scheduledetailid'];
                        echo "<div class='flight-card'>";
                        echo "<div class='flight-details'>";
                        echo "<h4 class='returnHead'>Return Flight</h4>";
                        echo "<div class='icon'>";
                        
                        echo "<p class='airport1'>". $returnRecord['departureairport']. "</p>";
                        echo "<p class='airport'><i class='fa-solid fa-plane depar'></i> ----------{$returnRecord['class']}--------- <i class='fa-solid fa-plane depar'></i></p>";
                        echo "<p class='airport1'>". $returnRecord['arrivalairport'] ."</p>";
                        echo "</div>";
                        echo "<div class='flight-header'>";
                        echo "<h2 class='flight-number'><strong> Flight Number : </strong>" . $returnRecord['flightnumber'] . "</h2>";
                        echo "<p class='airline'> <strong> Airline : </strong>" . $returnRecord['airline'] . "</p>";
                        echo "</div>";
                        echo "<div class='flight-route'>";
                        echo "<div class='departure'>";
                        echo "<p class='airport'> <strong> Departure Airport : </strong>" . $returnRecord['departureairport'] . "</p>";
                        echo "<p class='datetime'><strong> Departure Date : </strong>" . $returnRecord['departuredate'] . "</p>";
                        echo "<p class='datetime'> <strong> Departure Time : </strong>" . $returnRecord['departuretime'] . "</p>";
                        echo "</div>";
                        echo "<div class='arrival'>";
                        echo "<p class='airport'><strong> Arrival Airport : </strong>" . $returnRecord['arrivalairport'] . "</p>";
                        echo "<p class='datetime'><strong> Arrival Date : </strong>" . $returnRecord['arrivaldate'] . "</p>";
                        echo "<p class='datetime'><strong> Arrival Time : </strong>" . $returnRecord['arrivaltime'] . "</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='flight-info'>";
                        // echo "<p class='seatno'> <strong> Seat Number : </strong> " . $returnRecord['seatno'] . "</p>";
                        echo "<p class='price'><strong>Price : $</strong> " . $returnRecord['price'] . "</p>";
                        echo "</div>";
                        echo "<a class='bookBTN' href='bookFlight.php?departureFlight={$departureFlightId}&returnFlight={$id}&adults=$adults&children=$children&infants=$infants&tripType=$tripType'>Select Return Flight</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            } else {
               
                echo "<script>
                    
                window.location.href = 'bookOneWay.php?flightId={$departureFlightId}&adults={$adults}&children={$children}&infants={$infants}&tripType={$tripType}';
                </script>";
            }
        } else {
            echo "<script>
                alert('Error!!');
                window.location.href = 'flight.php';
            </script>";
        }
    ?>
</body>
</html>