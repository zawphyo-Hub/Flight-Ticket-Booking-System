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
    //activating color and line as proceed to next page
    $PageNow = 'confirmation';
    $currentStep = 4; 

    if ($PageNow == 'flightSelection') {
        $currentStep = 1;
    } elseif ($PageNow == 'passengerDetail') {
        $currentStep = 2;
    } elseif ($PageNow == 'paymentDetail') {
        $currentStep = 3;
    } elseif ($PageNow == 'confirmation') {
        $currentStep = 4;
    }


   
    $bookingID = $_GET['bookingID'];
    $departureFlightId = isset($_GET['departureFlight']) ? $_GET['departureFlight'] : null;
    $returnFlightId = isset($_GET['returnFlight']) ? $_GET['returnFlight'] : null;
    

    // fetch departure flight info
    $select = "SELECT flightdetails.*, flightschedules.airline from flightdetails
            JOIN flightschedules ON flightdetails.scheduleid = flightschedules.scheduleid 
            WHERE scheduledetailid = '$departureFlightId'";
    $result = mysqli_query($connection, $select);
    $passRecord = mysqli_fetch_assoc($result);

    // fetch return flight info
    // $select = "SELECT flightdetails.*, flightschedules.airline from flightdetails
    //         JOIN flightschedules ON flightdetails.scheduleid = flightschedules.scheduleid 
    //         WHERE scheduledetailid = '$returnFlightId'";
    // $result = mysqli_query($connection, $select);
    // $returnRecord = mysqli_fetch_assoc($result);

    //fetch passenger number 
    $adults = isset($_GET['adults']) ? (int)$_GET['adults'] : 0;
    $children = isset($_GET['children']) ? (int)$_GET['children'] : 0;
    $infants = isset($_GET['infants']) ? (int)$_GET['infants'] : 0;

    $totalPassengers = $adults + $children + $infants;
   

    $firstname = isset($_GET['firstname']) ? $_GET['firstname'] : '';
    $middlename = isset($_GET['middlename']) ? $_GET['middlename'] : '';
    $lastname = isset($_GET['lastname']) ? $_GET['lastname'] : '';
    $passportno = isset($_GET['passportno']) ? $_GET['passportno'] : '';  
    $nationality = isset($_GET['nationality']) ? $_GET['nationality'] : '';
    $title = isset($_GET['title']) ? trim($_GET['title']) : '';

    $seatRow1 = range('A', 'Z');
    $seatNo1 = range(1, 10);
    $totalSeat = 0;

    // Fetching passenger information from data base
    $passInfoSelect = "SELECT title, firstname, middlename, lastname, passportno, nationality 
                       FROM passengersinfo WHERE bookingID = '$bookingID'";
    $passResult = mysqli_query($connection, $passInfoSelect);
    $passengers = mysqli_fetch_all($passResult, MYSQLI_ASSOC);  


    foreach ($passengers as $passenger) {

        $firstname = $passenger['firstname'];
        $middlename = $passenger['middlename'];
        $lastname = $passenger['lastname'];
        $passportno = $passenger['passportno'];
        $nationality = $passenger['nationality'];
        $title = $passenger['title'] ;

        $seatRow = $seatRow1[$totalSeat % count($seatRow1)];
        $seatNo = $seatNo1[floor($totalSeat / count($seatRow1))% count($seatNo1)];
   
    // flight ticket display
    echo '<div class="containerConfirm2">';
    echo '<div class="containerConfirm1">';
    echo '<div class="containerConfirm">';

    echo "<div class='flightAll'>";

    echo "<div class='flightCardContainer'>";
    
    echo "<div class='flight-card3'>";

    echo "<div class='flight-details1'>";

    echo "<div class='flightTicketHead1'>";
    echo "<div class='flightTicket'>";
    echo '<i class="fa-solid fa-plane-departure"></i>';
    echo "</div>";
    echo "<div class='flightTicket2'>";
    echo "<h4 class='returnHead1'>Boarding Pass Ticket</h4>";
    echo "</div>";
    echo "</div>";


    

    echo "<div class='iconWrapUp'>";
    echo "<div class='iconForTicket'>";
    echo "<p class='airport1'>". $passRecord['departureairport']. "</p>";
    echo "<p class='airport'><i class='fa-solid fa-arrow-right arrowRight'></i></p>";
    echo "<p class='airport1'>".  $passRecord['arrivalairport'] ."</p>";
    echo "</div>";
    echo "<div class='flight-headerForTicket'>";
    echo "<p><span class='sp'> Flight Number : </span>"  .  $passRecord['flightnumber'] ."</p>";
    echo "<p><span class='sp'> Airline : </span>" .  $passRecord['airline'] . "</p>";
    echo "<p class='sp1'><span class='sp1'> Seat No: </span>" .  $seatRow . $seatNo . "</p>";
    
    echo "</div>";
    echo "</div>";


    echo "<div class='flight-routeForTicket'>";
    echo "<div class='departure'>";
    
    echo "<h4 class='datetime'><p class='sp'> Passenger Name  </p>" .  $title . " " .$firstname . " " . $middlename . " " . $lastname . "</h4>";
    echo "</div>";

    echo "<div class='arrival'>";
    
    
    echo "<h4 class='datetime'><p class='sp'> Passport Number </p>" . $passportno . "</h4>";
    echo "</div>";

    echo "<div class='arrival'>";
    
    echo "<h4 class='datetime'> <p class='sp'> Nationality  </p>" . $nationality . "</h4>";
    echo "</div>";

   


    echo "</div>";


    echo "<div class='flight-routeForTicket'>";
    echo "<div class='departure'>";
    
    echo "<p class='datetime'><p class='sp'> Departure Date  </p>" . $passRecord['departuredate'] . "</p>";
    echo "<p class='datetime'> <p class='sp'> Departure Time  </p>" . $passRecord['departuretime'] . "</p>";
    echo "</div>";

    echo "<div class='arrival'>";
    
    echo "<p class='datetime'><p class='sp'> Arrival Date  </p>" . $passRecord['arrivaldate'] . "</p>";
    echo "<p class='datetime'><p class='sp'> Arrival Time  </p>" . $passRecord['arrivaltime'] . "</p>";
    echo "</div>";

    echo "<div class='arrival3'>";
    
    echo " <img class='QRimg' src='images/QRCode.png' alt='QR code'>";
    echo "<p class='sp'> QR Scan </p>";
    echo "</div>";

   


    echo "</div>";
    // echo '<div class="note-section">';
    //             echo '<p><strong>Note:</strong> Please check all the information is correct before proceeding.</p>';
    //             echo '<p>If you notice any incorrect information, including name changes or other details, please contact us immediately.</p>';
    //             echo '<p>You can reach us at:</p>';
    //             echo '<p>Email: <a href="mailto:support@skyasia.com">support@skyasia.com</a></p>';
    //             echo '<p>Phone: +1-234-567-890</p>';
    //             echo '</div>';

    //             echo ' <button class="confirm-button" onclick="confirmTicket()">Confirm</button>';

    
    // echo "</div>";
   
    echo "</div>";
   
    echo "</div>";
    
   
    echo "</div>";
    echo "</div>";
   
    $totalSeat++; 
    }

    
    ?>
    </div>

    <div class="containerConfirm5">
    <div class="note-section">
        <p><strong>Note:</strong> Please check all the information is correct before proceeding.</p>
        <p>If you notice any incorrect information, including name changes or other details, please contact us immediately.</p>
        <p>You can reach us at:</p>
        <p>Email: support@skyasia.com</p>
        <p>Phone: +66 991405542</p>

        <a href='SAE_Home.php' class="confirmButton "  onclick="confirm()">I Confirm All the Information Is Correct</a>
        <script>
            function confirm() {
            
            alert("Your flight ficket is successfully booked. The issued tickets will be sent out to your email within 3 hours.");
            window.location.href = 'SAE_Home.php'; 
        }
        </script>
    </div>
    </div>
    </div>
    </div>

    
    <script>StepByStep(<?php echo $currentStep; ?>);</script>
    <script src="SAE.js"> </script>
</body>
</html>