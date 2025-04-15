<?php
include('Connection.php');
session_start();

if (isset($_SESSION['admin'])) {
    if (isset($_POST['save'])) {
        
        $scheduleid = isset($_POST['scheduleid']) ? $_POST['scheduleid'] : '';

        $flightnumber = isset($_POST['flightnumber']) ? $_POST['flightnumber'] : '';
        $departureairport = isset($_POST['departureairport']) ? $_POST['departureairport'] : '';
        $departuredate = isset($_POST['departuredate']) ? $_POST['departuredate'] : '';
        $arrivalairport = isset($_POST['arrivalairport']) ? $_POST['arrivalairport'] : '';
        $arrivaldate = isset($_POST['arrivaldate']) ? $_POST['arrivaldate'] : '';
        $departuretime = isset($_POST['departuretime']) ? $_POST['departuretime'] : '';
        $arrivaltime = isset($_POST['arrivaltime']) ? $_POST['arrivaltime'] : '';
        $class = isset($_POST['class']) ? $_POST['class'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';

        if (empty($scheduleid) || empty($flightnumber) || empty($departureairport) || empty($departuredate) || empty($arrivalairport) || empty($arrivaldate) || empty($departuretime) || empty($arrivaltime) || empty($class) || empty($price)) {
           
            echo "<script>
            alert('All fields must be filled out.');
            window.location.href = 'DetailForm.php?scheduleid=$scheduleid';
            </script>";
        } else{

        foreach ($scheduleid as $i => $scheduleid1) {
            $flightnumber1 = $flightnumber[$i];
            $departureairport1 =$departureairport[$i];
            $departuredate1 = $departuredate[$i];
            $departuretime1 =  $departuretime[$i];
            $arrivalairport1 =  $arrivalairport[$i];
            $arrivaldate1 =  $arrivaldate[$i];
            $arrivaltime1 =  $arrivaltime[$i];
            $price1 =  $price[$i];
            $class1 =  $class[$i];

                

        $sql = "INSERT INTO flightdetails (scheduleid, flightnumber, departureairport, departuredate, departuretime, arrivalairport, arrivaldate, arrivaltime, price, class)
                VALUES ('$scheduleid1', '$flightnumber1', '$departureairport1', '$departuredate1', '$departuretime1', '$arrivalairport1', '$arrivaldate1', '$arrivaltime1', '$price1','$class1')";

        if (mysqli_query($connection, $sql)) {
            echo "<script>
                alert('Schedule Detail Added Successfully');
                window.location.href = 'scheduleform.php';
            </script>";
        }
    }
  }
}
}
else {
    echo "<script>
        alert('Only Admin Can Enter');
        
        </script>";
}
?>