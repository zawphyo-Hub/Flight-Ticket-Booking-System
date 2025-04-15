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
    include('NavBookingSteps.php');
    include('Connection.php');

    $departureFlightId = isset($_GET['flightId']) ? $_GET['flightId'] : null;
    $tripType = isset($_GET['tripType']) ? mysqli_real_escape_string($connection, $_GET['tripType']) : '0';

    // fetch departure flight info
    $select = "SELECT flightdetails.*, flightschedules.airline from flightdetails
            JOIN flightschedules ON flightdetails.scheduleid = flightschedules.scheduleid 
            WHERE scheduledetailid = '$departureFlightId'";
    $result = mysqli_query($connection, $select);
    $passRecord = mysqli_fetch_assoc($result);

    

    //fetch passenger number and price
    $departurePrice = isset($passRecord['price']) ? floatval($passRecord['price']) : 0;
    

    
    $adults = isset($_GET['adults']) ? (int)$_GET['adults'] : 0;
    $children = isset($_GET['children']) ? (int)$_GET['children'] : 0;
    $infants = isset($_GET['infants']) ? (int)$_GET['infants'] : 0;

    $totalPassengers = $adults + $children + $infants;
    $totalPrice = $departurePrice  * $totalPassengers;

    

   
    //departure flight ticket display
    echo "<div class='flightAll'>";

    echo "<div class='flightCardContainer'>";
    
    echo "<div class='flight-card1'>";

    echo "<div class='flight-details1'>";
    echo "<h4 class='returnHead1'>Departure Flight</h4>";

    echo "<div class='iconWrapUp'>";
    echo "<div class='icon1'>";
    echo "<p class='airport1'>". $passRecord['departureairport']. "</p>";
    echo "<p class='airport'><i class='fa-solid fa-arrow-right arrowRight'></i></p>";
    echo "<p class='airport1'>".  $passRecord['arrivalairport'] ."</p>";
    echo "</div>";
    echo "<div class='flight-header1'>";
    echo "<p><span class='sp'> Flight Number : </span>"  .  $passRecord['flightnumber'] ."</p>";
    echo "<p><span class='sp'> Airline : </span>" .  $passRecord['airline'] . "</p>";
    echo "</div>";
    echo "</div>";

    echo "<div class='flight-route'>";
    echo "<div class='departure'>";
    
    echo "<p class='datetime'><p class='sp'> Departure Date : </p>" . $passRecord['departuredate'] . "</p>";
    echo "<p class='datetime'> <p class='sp'> Departure Time : </p>" . $passRecord['departuretime'] . "</p>";
    echo "</div>";

    echo "<div class='arrival'>";
    
    echo "<p class='datetime'><p class='sp'> Arrival Date : </p>" . $passRecord['arrivaldate'] . "</p>";
    echo "<p class='datetime'><p class='sp'> Arrival Time : </p>" . $passRecord['arrivaltime'] . "</p>";
    echo "</div>";

    echo "<div class='arrival'>";
    
    echo "<p class='baggageInfo'> <i class='fa-solid fa-suitcase'></i> Cabin Baggage: <p class='binfo'>7KG</p></p>";
    echo "<p class='baggageInfo'> <i class='fa-solid fa-person-walking-luggage lag'></i> Checked Baggage: <p class='binfo'>30KG</p> </p>";
    echo "<p class='baggageInfo'> Baggage Allowance: <p class='binfo'>1 For Checked Baggage</p> <p class='binfo'>2 For Cabin Baggage </p> </p>";
    echo "<p class='baggageInfo'> Additional Weight(+5kg): <p class='binfo'>$40 per kg</p> </p>";
    echo "<p class='baggageInfo'>Estimated Ticket Issued: <p class='binfo'><2 hours</p> </p>";
    echo "</div>";

    echo "</div>";

    echo "<div class='flight-info'>";
    
    echo "<p class='price'><strong>Price : $</strong> " . $passRecord['price'] . "</p>";
    echo "</div>";

    echo "</div>";
    echo "</div>";
    echo "</div>";
   
   
    
    //display check out with total price
    echo "<div class='flightCheckOut'>";
    echo "<h2 class='pdetail'>Price Detail</h2>";

    echo "<div class='flexPrice'>";
    echo "<p class='priceInfo'>Departure Ticket </p>";
    echo "<p class='priceInfo'> $ $departurePrice </p>";
    echo "</div>";
    
    
       
    echo "<div class='flexPrice'>";
    echo "<p class='priceinfo'> Adults  </p>";
    echo "<p class='priceInfo'>  $adults Pax </p>";
    echo "</div>";

    echo "<div class='flexPrice'>";
    echo "<p class='priceinfo'> Children  </p>";
    echo "<p class='priceInfo'>  $children Pax </p>";
    echo "</div>";

    echo "<div class='flexPrice'>";
    echo "<p class='priceinfo'> Infants  </p>";
    echo "<p class='priceInfo'>  $infants Pax </p>";
    echo "</div>";

    echo "<div class='flexPrice'>";
    echo "<p class='priceinfo'> Total Passenger  </p>";
    echo "<p class='priceInfo'>  $totalPassengers </p>";
    echo "</div>";
    

    echo "<div class='flexPrice1'>";
    echo "<p class='pdetail1'> Total Price  </p>";
    echo "<p class='pdetail1'>  $ $totalPrice </p>";
    echo "</div>";

    echo "<a class='checkOutBTN' href='bookingProcess.php?adults=$adults&children=$children&infants=$infants&departureFlight=$departureFlightId&tripType=$tripType&totalPrice=$totalPrice'>Check Out</a>";
    echo "<a class='checkOutBTN1' onclick='ConfirmChangeFlight()'>Change Flight</a>";
      
    
    echo "</div>";
    

    echo "</div>";
   
    
    ?>
    
    <script src="SAE.js"></script>
</body>
</html>