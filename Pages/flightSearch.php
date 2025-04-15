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

        if (isset($_POST['search'])) {
            $from = $_POST['from'];
            $destination = $_POST['destination'];
            $departureDate = $_POST['departureDate'];
            $class = $_POST['class'];
            $tripType = $_POST['tripType'];
            

            $adults = isset($_POST['adults']) ? (int)$_POST['adults'] : 0;
            $children = isset($_POST['children']) ? (int)$_POST['children'] : 0;
            $infants = isset($_POST['infants']) ? (int)$_POST['infants'] : 0;

        $returnDate = null;   
        if ($tripType == "roundTrip" && isset($_POST['returnDate'])) {
            $returnDate = $_POST['returnDate'];
        }   
            
        $select = "select flightdetails.*, flightschedules.airline from flightdetails 
        JOIN flightschedules ON flightdetails.scheduleid = flightschedules.scheduleid
        where departureairport LIKE '%$from%' AND arrivalairport LIKE '%$destination%' AND
        class LIKE '%$class%'  AND departureDate LIKE '%$departureDate%' ";

        if ($class != "0") {
            $select .= " AND class = '$class'";
        }else{
            echo "<script>
            alert('Please Choose Cabin Type!');
            window.location.href=('flight.php');
            </script>";
        }
        if ($_POST['tripType'] == "0"){
            echo "<script>
            alert('Please Choose Trip Type!');
            window.location.href=('flight.php');
            </script>";
        }
        
       
        if ($adults == 0 && $children == 0 && $infants == 0) {
            echo "<script>
                alert('Please choose passenger!');
                window.location.href = 'flight.php';
                </script>";
            
        }
 
        $result = mysqli_query($connection,$select);
        $row = mysqli_num_rows($result);

        if ($row == 0){
            echo "<script>
            alert('No Flight Departure!');
            window.location.href=('flight.php');
            </script>";
        }

        

        else {
            for($i=0;$i<$row;$i++){
            $passRecord = mysqli_fetch_assoc($result);
           
            $id = $passRecord['scheduledetailid'];

            echo "<div class='flight-card'>";

            echo "<div class='flight-details'>";
            echo "<h4 class='returnHead'>Departure Flight</h4>";

            echo "<div class='icon'>";
            echo "<p class='airport1'>". $passRecord['departureairport']. "</p>";
            echo "<p class='airport'><i class='fa-solid fa-plane depar'></i> ----------{$passRecord['class']}--------- <i class='fa-solid fa-plane depar'></i></p>";
            echo "<p class='airport1'>". $passRecord['arrivalairport'] ."</p>";
            echo "</div>";

            echo "<div class='flight-header'>";
            echo "<h2 class='flight-number'><strong> Flight Number : </strong>" . $passRecord['flightnumber'] . "</h2>";
            echo "<p class='airline'> <strong> Airline : </strong>" . $passRecord['airline'] . "</p>";
            echo "</div>";

            echo "<div class='flight-route'>";
            echo "<div class='departure'>";
            echo "<p class='airport'> <strong> Departure Airport : </strong>" . $passRecord['departureairport'] . "</p>";
            echo "<p class='datetime'><strong> Departure Date : </strong>" . $passRecord['departuredate'] . "</p>";
            echo "<p class='datetime'> <strong> Departure Time : </strong>" . $passRecord['departuretime'] . "</p>";
            echo "</div>";
    
            echo "<div class='arrival'>";
            echo "<p class='airport'><strong> Arrival Airport : </strong>" . $passRecord['arrivalairport'] . "</p>";
            echo "<p class='datetime'><strong> Arrival Date : </strong>" . $passRecord['arrivaldate'] . "</p>";
            echo "<p class='datetime'><strong> Arrival Time : </strong>" . $passRecord['arrivaltime'] . "</p>";
            echo "</div>";
            echo "</div>";

            echo "<div class='flight-info'>";
            // echo "<p class='seatno'> <strong> Seat Number : </strong> " . $passRecord['seatno'] . "</p>";
            echo "<p class='price'><strong>Price : $</strong> " . $passRecord['price'] . "</p>";
            echo "</div>";
           
            
            echo "<a class='bookBTN' href='flightForReturn.php?scheduledetailid=$id&tripType=$tripType&departureDate=$departureDate&returnDate=$returnDate&adults=$adults&children=$children&infants=$infants'>Select Flight</a>";

            echo "</div>";
           

            echo "</div>";

            
            }
           
        }
    }

    
    ?>
    <script src="SAE.js"></script>
</body>
</html>