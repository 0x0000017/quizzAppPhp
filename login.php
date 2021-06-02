<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
require_once "admin/users.php";

$firstName = $email = $password =  "";
$email_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, firstName, email, password FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1)
				{                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $firstName, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
					{
                        if(password_verify($password, $hashed_password))
						{
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email; 
							$_SESSION["firstName"] = $firstName;
							
							if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
								if (isset($_SESSION["login_redirect"])){
									header("Location: " . $_SESSION["login_redirect"]);
									unset($_SESSION["login_redirect"]);
								}
								else 
								{
									header("Location: index.php");
								}
							}
							
                        } else
						{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                } else
				{
                    // email doesn't exist, display a generic error message
                    $login_err = "Account does not exist";
                }
            } else{
                echo '<script>alert("Oops! Something went wrong. Please check your login details and try again.");</script>';
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Close connection
    mysqli_close($link);
}
}
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Cache-control" content="no-cache">
	<title>Quizbeengo!</title>
	<link rel ="stylesheet" href ="style.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu+Mono">
</head>
<body>
	<?php require_once("header.php");?>
	<hr class = "divider"/>
	<div class = "containerbg">
	<center>
		<br>
		<br>
		<div class = "login">
			<br>
			<h3 class = "title">Log-in to your account</h3><br>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="form-group">
					<input type="text" placeholder ="&#xf007; Email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" style = "width: 50%; font-family:Arial, FontAwesome" required>
					<span class="invalid-feedback"><?php echo $email_err; ?></span>
				</div><br>
				<div class="form-group">
					<input type="password" placeholder ="&#xf023; Password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" style = "width: 50%; font-family:Arial, FontAwesome" required>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
				</div><br>
					<input type="submit" value="Login">
					<br>
			<br>
			<h5>Don't have an account yet? <a href ="register.php">Sign Up</a></h5>
			</div>
				<div class ="xtra">
				<!-- fuck this shit -->
				<br><br><br>
			</div>
	</div>
</body>
<html>