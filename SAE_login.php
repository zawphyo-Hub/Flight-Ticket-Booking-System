<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="SAE.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <title>Sky Asia Express</title>
</head>
<body class="logback">

    <?php 
    include('Navbar.php'); 
    if(isset($_COOKIE['logfail'])){
        echo "Your Login is Blocked! Try Again Later.";
      }
      else {
    ?>  

    <div class="logContainer">
        <div class="loginForm">
        <form action="loginProcess.php" method="post">
            <div class="logPhoto1">
                    
                <h2>Login Form</h2>
                <input type="text" name="username" placeholder="Username" required>
                <div class="eyePassword">
                     <input type="password" id="password" name="password" placeholder="Password" required>
                     <i class="fa-solid fa-eye" id="eyeToggle"></i>
                </div>
                    
                <button class="buttonlog" type="submit">Login</button>
            </div> 
            
        </form>
        
     
        <span id="span">Already have an account? <a href="SAE_register.php"> Register now </a></span>
        
        </div>
    </div>
    <?php }  ?>

    <script >
        
        const togglePassword = document.querySelector('#eyeToggle');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle the eye slash icon (optional for visual feedback)
            this.classList.toggle('fa-eye-slash');
        });

    </script>
       

    

</body>
</html>    