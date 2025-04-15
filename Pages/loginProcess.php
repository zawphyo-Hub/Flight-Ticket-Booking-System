<?php
    session_start();
    include("Connection.php");
    
    if (isset($_SESSION['counter']))
    {
        $counter = $_SESSION['counter'];
        if($counter==2){
            echo "<script>window.location.href='timerLogin.php'</script>";
            setcookie("logfail","fail",time()+60*10); // 60*10 = 10mins
        }
        
    }
    else {
        $counter = 0; //first time fail
    }
    

    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $select = "select * from users where username = '$uname'";
    $result = mysqli_query($connection,$select);
    $row = mysqli_num_rows($result);

    if ($row == 0){
        echo "<script>
              alert('Username Incorrect!!');
              window.location.href = 'SAE_login.php';
              </script>";
    }
    else {
        $passRecord = mysqli_fetch_assoc($result);
        $hashPass = $passRecord['password'];
        if (password_verify($pass,$hashPass)){

            if($passRecord['role']=='admin')
            {
                $_SESSION['admin'] = 'admin';
                echo "<script>
                alert('Login Successful As Admin');
                window.location.href = 'userAccount.php';
                </script>";
                
            }
            else{
                echo "<script>
                alert('Login Successful!');
                window.location.href = 'SAE_Home.php';
                </script>";

            }
                     
        }
        else 
        {
            echo "<script>
            alert('Incorrect Password!!');
            window.location.href = 'SAE_login.php';
            </script>";
            $counter++;
            $_SESSION['counter'] = $counter;
            echo $counter;

        }    
    }


?>