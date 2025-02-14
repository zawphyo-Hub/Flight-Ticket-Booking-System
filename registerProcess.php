<?php
    include ('Connection.php');

            
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['confirm_pass'];
    $phno = $_POST['phoneno'];
    $dob = $_POST['dob'];

    if ($_POST['regions'] == 0) {
        echo "<script>
        alert('Please select regions');
        window.location.href = 'SAE_register.php';
        </script>";
    } 
    if ($_POST['gender'] == 0){
        echo "<script>
        alert('Please select gender');
        window.location.href = 'SAE_register.php';
        </script>";
    }
    else {
        $regions = $_POST['regions'] ;
        $gender = $_POST['gender'] ;
        // if (strlen($pass) < 8 || !preg_match("/[A-Z]/", $pass) || !preg_match("/[a-z]/", $pass)) {
        //     echo "<script>
        //     alert('Please ensure the password has 8 letters with Upper and Lower case');
        //     window.location.href = 'SAE_register.php';
        //     </script>";
        // }
        // Change in documentation too.
        if ($cpass == $pass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $select = "select * from users where username = '$uname'";
            $result = mysqli_query($connection,$select);
            $row = mysqli_num_rows($result);
    
            if ($row == 0){
    
                $sql = "insert into users(username,password,email,phoneno,regions, gender, dob,
                role)
                values('$uname','$hash','$email','$phno','$regions', '$gender', '$dob', 'user')";
    
                if (mysqli_query($connection, $sql)) {
                    echo "<script>
                    alert('Successfully registered! Please Login again');
                    
                    window.location.href = 'SAE_login.php';
                    </script>";
                } else {
                    echo "Unsuccessful " ;
                }
            }
            else {
            echo "<script>
            alert('username already exit! Please register with another username');
            window.location.href = 'SAE_register.php';
                   
            </script>";
            }
            
        }
        else {
            echo "<script>
            alert('Password incorrect!');
            window.location.href = 'SAE_register.php';
        </script>";
        }
    

    }
        

?>