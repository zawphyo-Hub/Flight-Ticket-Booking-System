<?php
    
    //setcookie("user","01"); //("key","value") //$_SESSION ['user']='01';
    setcookie("user","01",time()+10); //10 means 10sec
    echo "<a href ='Nextcookie.php'>Next</a>";


?>