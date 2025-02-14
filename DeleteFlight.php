<?php
session_start();
if (isset($_SESSION['admin'])){
include ("Connection.php");
$id = $_GET['scheduledetailid'];
$sql = "delete from flightdetails where scheduledetailid =$id";
if (mysqli_query($connection,$sql))
{
    echo "<script>
    alert('Successfully deleted');
    window.location.href = 'EditFlightInfo.php';
    </script>";
}}
else echo"<script> alert('Only Admin Can Delete'); </script>";


?>