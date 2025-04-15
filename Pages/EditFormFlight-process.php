<?php
include ("Connection.php");
$id = $_POST['scheduledetailid'];
$flightNumber = $_POST['flightnumber'];
$departureAirport = $_POST['departureairport'];
$arrivalAirport = $_POST['arrivalairport'];
$departureDate = $_POST['departuredate'];
$arrivalDate = $_POST['arrivaldate'];
$departureTime = $_POST['departuretime'];
$arrivalTime = $_POST['arrivaltime'];
$price = $_POST['price'];
$class = $_POST['class'];


$sql = "UPDATE flightdetails SET 
            flightnumber = '$flightNumber', 
            departureairport = '$departureAirport', 
            arrivalairport = '$arrivalAirport', 
            departuredate = '$departureDate', 
            arrivaldate = '$arrivalDate', 
            departuretime = '$departureTime', 
            arrivaltime = '$arrivalTime', 
            price = '$price', 
            class = '$class' 
        WHERE scheduledetailid = $id";

if(mysqli_query($connection, $sql)){
    echo "<script>
    alert('Successfully Updated!');
    window.location.href=('EditFlightInfo.php');
    </script>";
    
}
else echo "<script>
alert('Error! something went wrong!');
window.location.href=('EditFormFlight.php');
</script>";

?>