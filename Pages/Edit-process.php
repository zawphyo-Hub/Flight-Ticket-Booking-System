<?php
include ("Connection.php");
$id = $_POST['id'];
$uname = $_POST['username'];
$email = $_POST['email'];
$phno = $_POST['phoneno'];
$dob = $_POST['dob'];
$regions = $_POST['regions'];


$sql = "update users set username = '$uname', email = '$email', phoneno ='$phno' ,
 regions = '$regions', dob='$dob' where id=$id";

if(mysqli_query($connection, $sql)){
    echo "<script>
    alert('Successfully Updated!');
    window.location.href=('userAccount.php');
    </script>";
    
}
else echo "<script>
alert('Error! something went wrong!');
window.location.href=('UsersEditForm.php');
</script>";

?>