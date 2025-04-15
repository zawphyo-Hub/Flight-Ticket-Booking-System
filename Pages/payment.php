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
      $PageNow = 'payment';
      $currentStep = 3; 

    if ($PageNow == 'flightSelection') {
        $currentStep = 1;
    } elseif ($PageNow == 'passengerDetail') {
        $currentStep = 2;
    } elseif ($PageNow == 'payment') {
        $currentStep = 3;
    } elseif ($PageNow == 'confirmation') {
        $currentStep = 4;
    }

    $firstname = isset($_GET['firstname']) ? $_GET['firstname'] : '';
    $middlename = isset($_GET['middlename']) ? $_GET['middlename'] : '';
    $lastname = isset($_GET['lastname']) ? $_GET['lastname'] : '';
    $passportno = isset($_GET['passportno']) ? $_GET['passportno'] : '';  
    $nationality = isset($_GET['nationality']) ? $_GET['nationality'] : '';
    $title = isset($_GET['title']) ? $_GET['title'] : '';


    $bookingID = isset($_GET['bookingID']) ? $_GET['bookingID'] : null; 
    $departureFlightId = isset($_GET['departureFlight']) ? $_GET['departureFlight'] : null;
    $returnFlightId = isset($_GET['returnFlight']) ? $_GET['returnFlight'] : null;
    

    // fetch departure flight info
    $select = "SELECT flightdetails.*, flightschedules.airline from flightdetails
            JOIN flightschedules ON flightdetails.scheduleid = flightschedules.scheduleid 
            WHERE scheduledetailid = '$departureFlightId'";
    $result = mysqli_query($connection, $select);
    $passRecord = mysqli_fetch_assoc($result);

    // fetch return flight info
    $select = "SELECT flightdetails.*, flightschedules.airline from flightdetails
            JOIN flightschedules ON flightdetails.scheduleid = flightschedules.scheduleid 
            WHERE scheduledetailid = '$returnFlightId'";
    $result = mysqli_query($connection, $select);
    $returnRecord = mysqli_fetch_assoc($result);

    //fetch passenger number and price
    $departurePrice = isset($passRecord['price']) ? floatval($passRecord['price']) : 0;
    $returnPrice = isset($returnRecord['price']) ? floatval($returnRecord['price']) : 0;

    
    $adults = isset($_GET['adults']) ? (int)$_GET['adults'] : 0;
    $children = isset($_GET['children']) ? (int)$_GET['children'] : 0;
    $infants = isset($_GET['infants']) ? (int)$_GET['infants'] : 0;

    $totalPassengers = $adults + $children + $infants;
    $totalPrice = isset($_GET['totalPrice']) ? floatval($_GET['totalPrice']) : 0;
    

    

    ?>

    <div class="Thewholepayment">

    <div class="paymentContainer1">
    <div class="paymentContainer">
    <form action="paymentprocess.php?bookingID=<?php echo $bookingID; ?>&adults=<?php echo $adults; ?>&children=<?php echo $children; ?>&infants=<?php echo $infants; ?>&totalPrice=<?php echo $totalPrice; ?>&departureFlight=<?php echo $departureFlightId; ?>&returnFlight=<?php echo $returnFlightId; ?>&firstname=<?php echo urlencode($firstname); ?>&middlename=<?php echo urlencode($middlename); ?>&lastname=<?php echo urlencode($lastname); ?>&passportno=<?php echo urlencode($passportno); ?>&nationality=<?php echo urlencode($nationality); ?> &title=<?php echo urlencode($title); ?>" method="POST" id="paymentForm">

            <div class='Allpassenger2'>
                <input type='hidden' name='bookingID' value='<?php echo $bookingID; ?>' readonly>
                <div class='passengerInput2'>
                    <h2 class="forpaymentHead">Choose Payment Method</h2>
                    <select name='paymentOption' id='paymentOption' required>
                        
                        <option value='card'>Credit/Debit Card</option>
                        <option value='banking'>Bank Transfer</option>
                    </select>
                </div>

                <div id='cardinfo'>
                <h2  class="forpaymentHead">Credit/Debit Card Information</h2>
                    <div class='passengerInput1'>
                    <div class='passengerInput'>
                        <label class='LforPassenger'>Card Number:</label>
                        <input type='number' name='cardnumber' id='cardnumber' maxlength="16" >
                    </div>
                    <div class='passengerInput'>
                        <label class='LforPassenger'>Card Expiry Date:</label>
                        <input type='month' name='cardexpiry' id='cardexpiry' >
                    </div>
                    </div>
                    <div class='passengerInput1'>
                    <div class='passengerInput'>
                        <label class='LforPassenger'>CVV:</label>
                        <input type='number' name='cardCVV' id='cardCVV' maxlength="3" >
                    </div>

                    <div class='passengerInput'>
                        <label class='LforPassenger'>Card Holder Name:</label>
                        <input type='text' name='cardholder' id='cardholder' >
                    </div>
                    </div>
                </div>

                
                <div id='bankinfo' style='display: none;'>
                <h2 class="forpaymentHead" >Bank Information</h2>
                    <div class='passengerInput1'>
                    <div class='passengerInput'>
                    <label class='LforPassenger'>Bank:</label>
                    <select name="bankname" id="bankname" >
                        <option value="0">Select your bank</option>

                        <optgroup label="USA Banks">
                        <option value="HSBC">HSBC</option>
                        <option value="Citibank">Citibank</option>
                        <option value="Standard Chartered">Standard Chartered</option>
                        <option value="Chase Bank">Chase Bank</option>
                        </optgroup>

                        <optgroup label="UK Banks">
                        <option value="Barclays">Barclays</option>
                        <option value="Deutsche Bank">Deutsche Bank</option>
                        <option value="BNP Paribas">BNP Paribas</option>
                        <option value="DBS Bank">DBS Bank</option>
                        <option value="OCBC Bank">OCBC Bank</option>
                        </optgroup>
                        
                        <optgroup label="Asia Banks">
                        <option value="DBS">DBS Bank (Singapore)</option>
                        <option value="OCBC">OCBC Bank (Singapore)</option>
                        <option value="UOB">UOB (Singapore)</option>
                        <option value="BOC">Bank of China (China)</option>
                        <option value="ICBC">ICBC (China)</option>
                        <option value="MUFG">MUFG (Japan)</option>
                        <option value="SMBC">SMBC (Japan)</option>
                        <option value="Bangkok Bank">Bangkok Bank (Thailand)</option>
                        </optgroup>
                    </select>
                    </div>

                    <div class='passengerInput'>
                        <label class='LforPassenger'>Account Number:</label>
                        <input type='text' name='accountnumber' id='accountnumber'>
                    </div>
                    </div>
                    <div class='passengerInput1'>
                    <div class='passengerInput'>
                        <label class='LforPassenger'>Swift Code:</label>
                        <input type='text' name='swiftcode' id='swiftcode' >
                    </div>
                    <div class='passengerInput'>
                        <label class='LforPassenger'>Acc Holder Name:</label>
                        <input type='text' name='accholder' id='accholder'>
                    </div>
                    </div>
                    <div class='passengerInput3 ' id="toAcc">
                    <h2 class="forpaymentHead1">To SkyAsia Account</h2>
                    <input type="text" placeholder="4012 5523 6654 2211" readonly>
                    </div>

                </div>
                
               
            </div>

            <div class="paymentInstruction">
        <p class="instruHead">Payment Instruction</p>
        
        <div class="instruInfo">
        
        <ol>
            <li>Verify that all information is accurate before submitting.</li>
            <li>Expired or unsupported card will be notified during payment process.</li>
            <li>SkyAsia Express does not take benefits for additional charges. For more information, please contact your bank.</li>
            <li>SkyAsia Express reserves the right to cancel the successfulbooking. However, customer will not get the full prices as they paid.</li>
            <li>Click the "Confirm" button to complete your payment. You will receive a confirmation of your payment shortly.</li>
        </ol>
        <p >If you have any questions or need assistance with your payment, please contact our support team at [SAE24@gmail.com] or [+66 991201324].</p>
        <p class="pinstruction">By clicking confirm button, you have agreed to the terms and conditions of SAE.</p>
        </div>
        <div class='subButton'>
            <button class='submitPdetail' type='submit'>Confirm</button>
        </div>

        
        </div>
       
            
        </form>



    </div>

    

    </div>


    <div class="paymentContainer1">
    <?php
    
    echo "<div class='flightCheckOut1'>";
    echo "<h2 class='pdetail'>Price Detail</h2>";

    echo "<div class='flexPrice'>";
    echo "<p class='priceInfo'>Departure Ticket </p>";
    echo "<p class='priceInfo'> $ $departurePrice </p>";
    echo "</div>";
    
    echo "<div class='flexPrice'>"; 
    echo "<p class='priceinfo'>Return Ticket  </p>";
    echo "<p class='priceInfo'>  $ $returnPrice </p>";

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

       
    echo "</div>";
     
    echo "<div class='flightCheckOut2'>";
    echo "<h2 class='pdetail'>Flight Summary</h2>";
   
    echo "<div class='CombinedSummary'>";
    echo "<div class='iconWrapUp1'>";
    echo "<p class='airport2'>Departure Flight</p>";
    echo "<div class='icon2'>";
    echo "<p class='airport1'>". $passRecord['departureairport']. "</p>";
    echo "<p class='airport'><i class='fa-solid fa-arrow-right arrowRight'></i></p>";
    echo "<p class='airport1'>".  $passRecord['arrivalairport'] ."</p>";
    echo "</div>";
    echo "<div class='flight-header2'>";
    echo "<p><span class='sp'> Flight Number : </span>"  .  $passRecord['flightnumber'] ."</p>";
    echo "<p><span class='sp'> Airline : </span>" .  $passRecord['airline'] . "</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    if ($returnRecord){
    
    echo "<div class='iconWrapUp1'>";
    echo "<p class='airport2'>Return Flight</p>";
    echo "<div class='icon2'>";
    echo "<p class='airport1'>". $returnRecord['departureairport']. "</p>";
    echo "<p class='airport'><i class='fa-solid fa-arrow-right arrowRight'></i></p>";
    echo "<p class='airport1'>".  $returnRecord['arrivalairport'] ."</p>";
    echo "</div>";
    echo "<div class='flight-header2'>";
    echo "<p><span class='sp'> Flight Number : </span>"  .  $returnRecord['flightnumber'] ."</p>";
    echo "<p><span class='sp'> Airline : </span>" .  $returnRecord['airline'] . "</p>";
    echo "</div>";
    
    }
    else{
    echo "<div class='iconWrapUp1'>";
    echo "<p class='airport2'>Return Flight</p>";
    echo "<div class='icon2'>";
    echo "<p class='airport1'>No Return Flight Selected!</p>";
    echo "</div>";
    echo "</div>";

    }
    echo "</div>"; 
    
    


    ?>
    </div>
    </div>

    <script src="SAE.js"> </script>
    <script> 
        StepByStep(<?php echo $currentStep; ?>); 
        document.getElementById('paymentOption').addEventListener('change', function () {
        const paymentOption = this.value;
        const cardinfo = document.getElementById('cardinfo');
        const bankinfo = document.getElementById('bankinfo');

        // Show Credit Card fields if "card" is selected, hide Bank Transfer fields
        if (paymentOption === 'card') {
            cardinfo.style.display = 'block';
            bankinfo.style.display = 'none';
            // Set required attribute for Credit Card fields
            document.getElementById('cardnumber').required = true;
            document.getElementById('cardexpiry').required = true;
            document.getElementById('cardCVV').required = true;
            document.getElementById('cardholder').required = true;

            // Remove required attribute for Bank Transfer fields
            document.getElementById('bankname').required = false;
            document.getElementById('accountnumber').required = false;
            document.getElementById('swiftcode').required = false;
            document.getElementById('accholder').required = false;
            document.getElementById('toAcc').required = false;
        }
        // Show Bank Transfer fields if "banking" is selected, hide Credit Card fields
        else if (paymentOption === 'banking') {
            cardinfo.style.display = 'none';
            bankinfo.style.display = 'block';
            // Set required attribute for Bank Transfer fields
            document.getElementById('bankname').required = true;
            document.getElementById('accountnumber').required = true;
            document.getElementById('swiftcode').required = true;
            document.getElementById('accholder').required = true;
            document.getElementById('toAcc').required = true;

            // Remove required attribute for Credit Card fields
            document.getElementById('cardnumber').required = false;
            document.getElementById('cardexpiry').required = false;
            document.getElementById('cardCVV').required = false;
            document.getElementById('cardholder').required = false;
            
        }
    });
    </script>
</body>
</html>