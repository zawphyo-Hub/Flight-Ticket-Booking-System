<?php
session_start();
if (isset($_SESSION['admin'])){
include ("Connection.php");
$id = $_GET['id'];
$sql = "delete from users where id =$id";
if (mysqli_query($connection,$sql))
{
    echo "<script>
    alert('Users Successfully deleted');
    window.location.href = 'userAccount.php';
    </script>";
}}
else echo"<script> alert('Only Admin Can Delete'); </script>";


?>