<?php
session_start();
session_destroy();
$admin = "sae12345";
$hash = password_hash($admin,PASSWORD_DEFAULT);
echo $hash;

?>