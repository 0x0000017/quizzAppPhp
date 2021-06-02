<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo '<script>alert("You are already logged in ! Redirecting you to homepage")</script>';
	header("refresh: 2; url=index.php");
    exit;
}
// Include config file
require_once "admin/users.php";
require_once "header.php";

// variables
$firstName = $lastName = $email = $password = $confirm_password = '';
$firstName_err = $lastName_err = $email_err = $password_err = $confirm_password_err = '';
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
 	// validate first name	
	if(empty(trim($_POST["firstName"]))){
        $firstName_err = "Please enter your first name.";
    } else{
		$firstName = trim($_POST["firstName"]);
    }
	
	// validate last name
	if(empty(trim($_POST["lastName"]))){
        $lastName_err = "Please enter your last name.";
    } else{
		$lastName = trim($_POST["lastName"]);
	}
	
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else{
        $sql = "SELECT id FROM users WHERE email = ?";
	
        if($stmt = mysqli_prepare($link, $sql)){
            // bind as parameter
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // exec
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($firstName_err) && empty($lastName_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_firstName, $param_lastName, $param_email, $param_password);
            
            // Set parameters
			$param_firstName = $firstName;
			$param_lastName = $lastName;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
				
                // autologin and redirect to homepage
				$_SESSION["loggedin"] = true;
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
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quizbeengo!</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
	<!-- bootstrap's fking up my layout-->
	
	<style>
	body {
		background: #FFD75A 0% 0% no-repeat padding-box;
		opacity: 1;
	}
	</style>
</head>
<body>
	<?php require_once("header.php");?>
	<hr class = "divider"/>
	<div class = "containerbg">
	<center>
		<br><BR>
		<div class ="register"> 
        <h2 class ="title">Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
		
			<!-- First Name -->
			<div class="form-group">
                <input type="text" placeholder ="First Name" name="firstName" class="form-control <?php echo (!empty($firstName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $firstName; ?>"
					style = "width: 45%; 
							border: 2px solid black;
							border-radius: 15px;
							height: 40px;"><br>
                <span class="invalid-feedback"><?php echo $firstName_err; ?></span>
            </div>   
			<br>
			<!--Last Name-->
			<div class="form-group">
                <input type="text" placeholder ="Last Name" name="lastName" class="form-control <?php echo (!empty($lastName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastName; ?>" 
					style = "width: 45%;
							border: 2px solid black;
							border-radius: 15px;
							height: 40px;"><br>
                <span class="invalid-feedback"><?php echo $lastName_err; ?></span>
            </div>   
			<br>
			<!--Email-->
			<div class="form-group">
                <input type="text" placeholder ="Email Address "name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" 
					style = "width: 45%;
							border: 2px solid black;
							border-radius: 15px;
							height: 40px;" ><br>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div> 
			<br>
			<!--Password-->
            <div class="form-group">
                <input type="password" placeholder ="Password "name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" 
					style = "width: 45%;
							border: 2px solid black;
							border-radius: 15px;
							height: 40px;" ><br>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
			<br>
			<!--Verify Password-->
            <div class="form-group">
                <input type="password" placeholder ="Confirm Password"name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" 
					style = "width: 45%;
							border: 2px solid black;
							border-radius: 15px;
							height: 40px;">
						<br>
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
			<br>
            <div class="form-group">
                <input type="submit" value="Submit"
					style ="border-radius: 20px;
							width: 100px;
							background-color: #FFC200;
							font-size: 20px;">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
			</form>
		</div>   
	</div>
</body>
</html>