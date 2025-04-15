<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="SAE.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Sky Asia Express</title>
</head>
<body class="userbody">
    <?php

    session_start();

    include('adminNavbar.php');

    // echo "<input type='text' name='keyword' placeholder='Enter'>";

    if (isset($_SESSION['admin'])){
     
    include("Connection.php");

    $select = "select * from flightdetails";
    $result = mysqli_query($connection,$select);
    $row = mysqli_num_rows($result);

    if ($row == 0){
        echo "No flight found,try again!!";
    }
    else {
        // for($i=0;$i<$row;$i++){
        // $passRecord = mysqli_fetch_assoc($result);
        
        echo "<div class='usertb-container'>";
        echo "<div class='usertb3'>";
        echo "<table class='table1' border='1' cellspacing='0' cellpadding='5'>";
        echo "<tr>";
        
        echo "<th class='nametb3'>ID</th>";
        echo "<th class='nametb3'>Flight Number</th>";
        echo "<th class='nametb3'>Departure Airport</th>";
        echo "<th class='nametb3'>Departure Date</th>";
        echo "<th class='nametb3'>Departure Time</th>";
        echo "<th class='nametb3'>Arrival Airport</th>";
        echo "<th class='nametb3'>Arrival Date</th>";
        echo "<th class='nametb3'>Arrival Time</th>";
        echo "<th class='nametb3'>Class</th>";
        echo "<th class='nametb3'>Price</th>";
        echo "<th class='nametb3' colspan='2'>Action</th>";
        echo "</tr>";

        while ($passRecord = mysqli_fetch_assoc($result)) {
        
        $id = $passRecord['scheduledetailid'];
        echo "<tr>";
        echo "<td class='nametb3'>" . $passRecord['scheduledetailid'] . "</td>";
        echo "<td class='nametb3'>" . $passRecord['flightnumber'] . "</td>";
        echo "<td class='nametb3'>" . $passRecord['departureairport'] . "</td>";
        echo "<td class='nametb3'>" . $passRecord['departuredate'] . "</td>";
        echo "<td class='nametb3'>" . $passRecord['departuretime'] . "</td>";
        echo "<td class='nametb3'>" . $passRecord['arrivalairport'] . "</td>";
        echo "<td class='nametb3'>" . $passRecord['arrivaldate'] . "</td>";
        echo "<td class='nametb3'>" . $passRecord['arrivaltime'] . "</td>";
        echo "<td class='nametb3'>" . $passRecord['class'] . "</td>";
        echo "<td class='nametb3'>" . $passRecord['price'] . "</td>";
        echo " <td> <a  class='actiontb' href='#' onclick='showConfirm(".$id.")'>Delete</a>". "</td>";
        echo " <td> <a  class='actiontb' href='EditFormFlight.php?scheduledetailid=$id'>Edit</a>" . "</td>";
        
        echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
        echo "</div>";
        
        
        }

    }
    else {
        echo "<script>
        alert('Administrator only!');
        </script>";
    }

?>

<script>
    
    function showConfirm(id){
        if(confirm("are you sure you want to delete?")){
            
            window.location.href="DeleteFlight.php?scheduledetailid="+id ;
        }
    }
</script>

    
</body>
</html>