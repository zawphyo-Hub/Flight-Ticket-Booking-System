<?php
if (isset($_COOKIE['user'])){
    
    setcookie("user","",time()-1); 
    echo "<script>
        alert('Cookie is destroied.');
        
        </script>";

}
else {
    echo "<script>
        alert('It is expired.');
        
        </script>";
}
?>