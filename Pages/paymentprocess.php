<?php
    include ('Connection.php');
    
    $firstname = isset($_GET['firstname']) ? $_GET['firstname'] : '';
    $middlename = isset($_GET['middlename']) ? $_GET['middlename'] : '';
    $lastname = isset($_GET['lastname']) ? $_GET['lastname'] : '';
    $passportno = isset($_GET['passportno']) ? $_GET['passportno'] : '';  
    $nationality = isset($_GET['nationality']) ? $_GET['nationality'] : '';
    $title = isset($_GET['title']) ? $_GET['title'] : '';


    
    $bookingID = isset($_GET['bookingID']) ? $_GET['bookingID'] : null; 
    
    $paymentOption = isset($_POST['paymentOption']) ? $_POST['paymentOption'] : null;
    $cardNumber = isset($_POST['cardnumber']) ? $_POST['cardnumber'] : null;
    $cardExpiryDate = isset($_POST['cardexpiry']) ? $_POST['cardexpiry'] : null;
    $cardCVV = isset($_POST['cardCVV']) ? $_POST['cardCVV'] : null;
    $cardHolderName = isset($_POST['cardholder']) ? $_POST['cardholder'] : null;
    $bankName = isset($_POST['bankname']) ? $_POST['bankname'] : null;
    $accountNumber = isset($_POST['accountnumber']) ? $_POST['accountnumber'] : null;
    $swiftCode = isset($_POST['swiftcode']) ? $_POST['swiftcode'] : null;
    $accHolderName = isset($_POST['accholder']) ? $_POST['accholder'] : null;


    $adults = isset($_GET['adults']) ? $_GET['adults'] : 0;
    $children = isset($_GET['children']) ? $_GET['children'] : 0;
    $infants = isset($_GET['infants']) ? $_GET['infants'] : 0;
    $totalPrice = isset($_GET['totalPrice']) ? floatval($_GET['totalPrice']) : 0;
    $departureFlightId = isset($_GET['departureFlight']) ? $_GET['departureFlight'] : null;
    $returnFlightId = isset($_GET['returnFlight']) ? $_GET['returnFlight'] : null;

    
    // $totalPassengers = $adults + $children + $infants;
    

    $totalPrice = isset($_GET['totalPrice']) ? floatval($_GET['totalPrice']) : 0;
    
    
    
    if ($paymentOption === 'banking' && $bankName == '0') {
        echo "<script>
        alert('Please select your bank');
        window.location.href = 'payment.php?bookingID=$bookingID&adults=$adults&children=$children&infants=$infants&departureFlight=$departureFlightId&returnFlight=$returnFlightId&totalPrice=$totalPrice&departurePrice=$departurePrice&returnPrice=$returnPrice&firstname=$firstname&middlename=$middlename&lastname=$lastname&passportno=$passportno&nationality=$nationality&title=$title';
        </script>";
        exit();
    }    
    
    $sql = "insert into payment (bookingid, CardNumber, CardExpiryDate, CCV, CardHolderName, bankname, accountno, swiftcode, AccHolderName, totalprice, paymentOption)
            values ('$bookingID'," . ($cardNumber ? "'$cardNumber'" : "NULL") . ", " . ($cardExpiryDate ? "'$cardExpiryDate'" : "NULL") . ", " . ($cardCVV ? "'$cardCVV'" : "NULL") . ",
            " . ($cardHolderName ? "'$cardHolderName'" : "NULL") . ", " . ($bankName ? "'$bankName'" : "NULL") . ", " . ($accountNumber ? "'$accountNumber'" : "NULL") . ",
             " . ($swiftCode ? "'$swiftCode'" : "NULL") . ", " . ($accHolderName ? "'$accHolderName'" : "NULL") . ",'$totalPrice' ,'$paymentOption')";
    if (mysqli_query($connection, $sql)) {
       
        echo "<script>
            alert('Successfully paid!!');
            window.location.href = 'Confirm.php?bookingID=$bookingID&adults=$adults&children=$children&infants=$infants&totalPrice=$totalPrice&departureFlight=$departureFlightId&returnFlight=$returnFlightId&firstname=$firstname&middlename=$middlename&lastname=$lastname&passportno=$passportno&nationality=$nationality&title=$title';
        </script>";
        
    }
    
        

?>