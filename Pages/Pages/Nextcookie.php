<?php
if(isset($_COOKIE['user'])){
    echo $_COOKIE['user'];
    echo "<a href = 'DestroyCookie.php'>Destroy</a>";
}
else {
    echo "It is expired.";
}
?>