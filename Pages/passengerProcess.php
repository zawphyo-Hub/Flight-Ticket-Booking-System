<?php
    include ('Connection.php');
    
    
    $bookingID = isset($_GET['bookingID']) ? $_GET['bookingID'] : null; 
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $dateofbirth = $_POST['dateofbirth'];
    $nationality = $_POST['nationality'];
    $passportno = $_POST['passportno'];
    $issuedate = $_POST['issuedate'];
    $expireddate = $_POST['expireddate'];
    $email = $_POST['email'];
    $countrycode = $_POST['countryCode'];
    $phno = $_POST['phno'];
    $meals = $_POST['meals'];
    $title = $_POST['title'];

    $departurePrice = isset($_GET['departurePrice']) ? floatval($_GET['departurePrice']) : 0;
    $returnPrice = isset($_GET['returnPrice']) ? floatval($_GET['returnPrice']) : 0;
    $departureFlightId = isset($_GET['departureFlight']) ? $_GET['departureFlight'] : null;
    $returnFlightId = isset($_GET['returnFlight']) ? $_GET['returnFlight'] : null;
    

    $adults = isset($_GET['adults']) ? $_GET['adults'] : 0;
    $children = isset($_GET['children']) ? $_GET['children'] : 0;
    $infants = isset($_GET['infants']) ? $_GET['infants'] : 0;
    $form = isset($_GET['form']) ? (int)$_GET['form'] : 1;

    $totalPassengers = $adults + $children + $infants;
    

    $totalPrice = isset($_GET['totalPrice']) ? floatval($_GET['totalPrice']) : 0;
    

    $passengertype = '';
    if ($form <= $adults) {
        $passengertype = 'adult';
    } elseif ($form <= $adults + $children) {
        $passengertype = 'child';
    } else {
        $passengertype = 'infant';
    }
    
    
    
    if ($title == '0') {
        echo "<script>
        alert('Please select a title');
        window.location.href = 'passengerDetail.php?form=$form&adults=$adults&children=$children&infants=$infants&bookingID=$bookingID&departureFlight=$departureFlightId&returnFlight=$returnFlightId&totalPrice=$totalPrice&firstname=$firstname&middlename=$middlename&lastname=$lastname&passportno=$passportno&nationality=$nationality&title=$title';
        </script>";
        exit();
    }    
    if ($nationality == '0') {
            echo "<script>
            alert('Please select your nationality');
            window.location.href = 'passengerDetail.php?form=$form&adults=$adults&children=$children&infants=$infants&bookingID=$bookingID&departureFlight=$departureFlightId&returnFlight=$returnFlightId&totalPrice=$totalPrice&firstname=$firstname&middlename=$middlename&lastname=$lastname&passportno=$passportno&nationality=$nationality&title=$title';
            </script>";
            exit();
            
    }
    if ($meals == '0') {
        echo "<script>
        alert('Please select a preferred meal');
        window.location.href = 'passengerDetail.php?form=$form&adults=$adults&children=$children&infants=$infants&bookingID=$bookingID&departureFlight=$departureFlightId&returnFlight=$returnFlightId&totalPrice=$totalPrice&firstname=$firstname&middlename=$middlename&lastname=$lastname&passportno=$passportno&nationality=$nationality&title=$title';
        </script>";
        exit();
       
    }
    if ($countrycode == '0') {
        echo "<script>
        alert('Please select your country code');
        window.location.href = 'passengerDetail.php?form=$form&adults=$adults&children=$children&infants=$infants&bookingID=$bookingID&departureFlight=$departureFlightId&returnFlight=$returnFlightId&totalPrice=$totalPrice&firstname=$firstname&middlename=$middlename&lastname=$lastname&passportno=$passportno&nationality=$nationality&title=$title';
        </script>";
        exit();
       
    }
    
    $sql = "insert into passengersinfo (bookingid, title, firstname, middlename, lastname, dateofbirth, nationality, passportno, issuedate, expireddate, email, countrycode, phnumber,  meals, passengertype)
            values ('$bookingID', '$title', '$firstname', " . ($middlename ? "'$middlename'" : "NULL") . ", '$lastname', '$dateofbirth', '$nationality', '$passportno', '$issuedate', '$expireddate', '$email', '$countrycode', '$phno','$meals', '$passengertype')";
    if (mysqli_query($connection, $sql)) {
        $nextform = $form + 1;

        if ($nextform > $adults + $children + $infants) {
            
            echo "<script>
            alert('Successfully saved! Please Fill Up Payment Information');
            window.location.href = 'payment.php?bookingID=$bookingID&adults=$adults&children=$children&infants=$infants&departureFlight=$departureFlightId&returnFlight=$returnFlightId&totalPrice=$totalPrice&firstname=$firstname&middlename=$middlename&lastname=$lastname&passportno=$passportno&nationality=$nationality&title=$title';
            </script>";
        }
        echo "<script>
        
        alert('Your Passenger Information Is Saved!!');
        window.location.href = 'passengerDetail.php?form=$nextform&adults=$adults&children=$children&infants=$infants&bookingID=$bookingID&departureFlight=$departureFlightId&returnFlight=$returnFlightId&totalPrice=$totalPrice&firstname=$firstname&middlename=$middlename&lastname=$lastname&passportno=$passportno&nationality=$nationality&title=$title';       
        </script>";
        
    }
    
        

?>