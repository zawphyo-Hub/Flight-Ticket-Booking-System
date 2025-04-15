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

    $select = "select * from users where role!= 'admin'";
    $result = mysqli_query($connection,$select);
    $row = mysqli_num_rows($result);

    if ($row == 0){
        echo "No user found,try again!!";
    }
    else {
        // for($i=0;$i<$row;$i++){
        // $passRecord = mysqli_fetch_assoc($result);
        

        echo "<div class='usertb'>";
        echo "<table border='1' cellspacing='0' cellpadding='5'>";
        echo "<tr>";
        echo "<th class='nametb'>ID No:</th>";
        echo "<th class='nametb'>Name</th>";
        echo "<th class='nametb'>Email</th>";
        echo "<th class='nametb'>Phone Number</th>";
        echo "<th class='nametb'>Region</th>";
        echo "<th class='nametb'>Gender</th>";
        echo "<th class='nametb'>Date Of Birth</th>";
        echo "<th class='nametb' colspan='2'>Action</th>";
        
        echo "</tr>";

        while ($passRecord = mysqli_fetch_assoc($result)) {
        
        $id = $passRecord['id'];
        echo "<tr>";
        echo "<td class='nametb'>" . $passRecord['id']."</td>";
        echo "<td class='nametb'>" . $passRecord['username'] . "</td>";
        echo "<td class='nametb'>" . $passRecord['email'] . "</td>";
        echo "<td class='nametb'>" . $passRecord['phoneno'] . "</td>";
        echo "<td class='nametb'>" . $passRecord['regions'] . "</td>";
        echo "<td class='nametb'>" . $passRecord['gender'] . "</td>";
        echo "<td class='nametb'>" . $passRecord['dob'] . "</td>";
        echo " <td> <a  class='actiontb' href='#' onclick='showConfirm(".$id.")'>Delete</a>". "</td>";
        echo " <td> <a  class='actiontb' href='UsersEditForm.php?id=$id'>Edit</a>" . "</td>";
        
        echo "</tr>";
        }

        echo "</table>";
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
            
            window.location.href="Delete-userlist.php?id="+id ;
        }
    }
</script>

    
</body>
</html>