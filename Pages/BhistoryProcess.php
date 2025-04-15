<?php
include('Connection.php');
include('Navbar.php');

if (isset($_POST['emailSearch'])) {
   
    $email = $_POST['emailSearch'];

 
    $select = "
    SELECT 
        b.bookingid, 
        b.totalprice, 
        pd.firstname,
        pd.middlename,
        pd.lastname,
        fd_departure.departureairport AS departure_airport,
        fd_arrival.arrivalairport AS arrival_airport,
        fd_return.arrivalairport AS return_airport
    FROM passengersinfo pd
    JOIN booking b ON pd.bookingid = b.bookingid
    JOIN flightdetails fd_departure ON b.departureflightid = fd_departure.scheduledetailid
    JOIN flightdetails fd_arrival ON b.departureflightid = fd_arrival.scheduledetailid
    LEFT JOIN flightdetails fd_return ON b.returnflightid = fd_return.scheduledetailid
    WHERE pd.Email = ?
    ";

    if ($stmt = $connection->prepare($select)) {
        
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            echo "<div class='historyResult'>";
            echo "<table border='1'>
                    <tr>
                        <th>Booking ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Departure Airport</th>
                        <th>Arrival Airport</th>
                        <th>Return Airport (Round Trip)</th>
                        <th>Total Price</th>
                    </tr>";
            
            while ($passRecord = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$passRecord['bookingid']}</td>
                        <td>{$passRecord['firstname']}</td>
                        <td>{$passRecord['middlename']}</td>
                        <td>{$passRecord['lastname']}</td>
                        <td>{$passRecord['departure_airport']}</td>
                        <td>{$passRecord['arrival_airport']}</td>
                        <td>" . ($passRecord['return_airport'] ?? '') . "</td>
                        <td>{$passRecord['totalprice']}</td>
                      </tr>";
            }
            echo "</table>";
            echo "</div>";
        } else {
            echo "<script>
            alert('No booking history found for this email.');
            window.location.href = 'bookingHistory.php';
            </script>";
        }
    }
}

?>
