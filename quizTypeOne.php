<?php
session_start();
require_once "admin/users.php";

$quizTitle = $quizQuest = $quizAns1 = $quizAns2 = $quizAns3 = $quizAns4 = $quizCorrectAns = '';
$quizTitle_err = $quizQuest_err = $quizAns1_err = $quizAns2_err = $quizAns3_err = $quizAns4_err = $quizCorrectAns_err ='';

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
 	// validate quiz title
	if(empty(trim($_POST["quizTitle"]))){
        $quizTitle_err = "Please enter quiz title.";
    } else{
		$quizTitle = trim($_POST["quizTitle"]);
    }
	
	// validate question
	if(empty(trim($_POST["quizQuest"]))){
        $quizQuest_err = "Please enter your question.";
    } else{
		$quizQuest = trim($_POST["quizQuest"]);
	}
	
	// validate answers
	if(empty(trim($_POST["quizAns1"]))){
        $quizAns1_err = "Please enter an answer.";
    } else{
		$quizAns1 = trim($_POST["quizAns1"]);
	}
	
	if(empty(trim($_POST["quizAns2"]))){
        $quizAns2_err = "Please enter an answer.";
    } else{
		$quizAns2 = trim($_POST["quizAns2"]);
	}
	
	if(empty(trim($_POST["quizAns3"]))){
        $quizAns3_err = "Please enter an answer.";
    } else{
		$quizAns3 = trim($_POST["quizAns3"]);
	}
	
	if(empty(trim($_POST["quizAns4"]))){
        $quizAns4_err = "Please enter an answer.";
    } else{
		$quizAns4 = trim($_POST["quizAns4"]);
	}
	
	if(empty(trim($_POST["quizCorrectAns"]))){
        $quizCorrectAns_err = "Please enter a correct answer.";
    } else{
		$quizCorrectAns = trim($_POST["quizCorrectAns"]);
	}
	
	if(empty($quizTitle_err) && empty($quizQuest_err) &&  empty($quizAns1_err) && empty($quizAns2_err) && empty($quizAns3_err) && empty($quizAns4_err) && empty($quizCorrectAns)) {
		$sql = "INSERT INTO questionsmchoice (quizTitle, quizQuest, quizAns1, quizAns2, quizAns3, quizAns4, quizCorrectAns)
		VALUES (?, ?, ?, ?, ?, ?, ?)";
		
		if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_quizTitle, $param_quizQuest, $param_quizAns1, $param_quizAns2,  $param_quizAns3, $param_quizAns4,  $param_quizCorrectAns);
			
			$param_quizTitle = $quizTitle;
			$param_quizQuest = $quizQuest;
			$param_quizAns1 = $quizAns1;
			$param_quizAns2 = $quizAns2;
			$param_quizAns3 = $quizAns3;
			$param_quizAns4 = $quizAns4;
			$param_quizCorrectAns = $quizCorrectAns;
			
			if(mysqli_stmt_execute($stmt)){
				$_SESSION["multiple"] = true;
			} else {
                echo '<script>alert("Oops! Something went wrong. Please try again later.");</script>';
            }
			mysqli_stmt_close($stmt);
		}
	}
	mysqli_close($link);
}
?>


<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quizbeengo!</title>
	<link rel ="stylesheet" href ="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu+Mono">
</head>
<body>
	<?php require_once("header.php");?>
	<hr class = "divider"/>
	<h5>MULTIPLE CHOICE QUIZ</h5>
	<br>
	<div class ="flexPosition">
		<div class ="xtraSpace">
		</div>
		<div class ="quizArea">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
		
		<div class="form-group">
			<input type ="text" value="<?php echo $quizTitle; ?>" class="form-control <?php echo (!empty($quizTitle_err)) ? 'is-invalid' : ''; ?>" placeholder ="&#xf040;Your Quiz Title Here..." name ="quizTitle"
			style ="width: 60%;
					height: 25px;
					margin: 10px;
					padding: 12px 20px;
					border-radius: 4px;
					background: white;
					font-family:Poppins, FontAwesome"
					>
			<span class="invalid-feedback"><?php echo $quizTitle_err; ?></span>
			</div>
			
			<br><br><br>
			<div class="form-group">
			<input type ="text" class="form-control <?php echo (!empty($quizQuest_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quizQuest; ?>" placeholder ="&#xf128; Your Question Here..." name ="quizQuest"
			style ="width: 60%;
					height: 25px;
					margin: 0px 0px 0px 35px;
					border-radius: 4px;
					padding: 12px 20px;
					background: white;
					font-family:Poppins, FontAwesome">
			<span class="invalid-feedback"><?php echo $quizQuest_err; ?></span>
			</div>
			
			<div class="form-group">
			<input type ="text" class="form-control <?php echo (!empty($quizAns1_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quizAns1; ?>" placeholder ="&#xf040; Type an answer..." name ="quizAns1"
			style ="width: 52%;
					height: 25px;
					margin: 10px 0px 0px 100px;
					padding: 10px 18px;
					border-radius: 4px;
					background: white;
					font-family:Poppins, FontAwesome">
			<span class="invalid-feedback"><?php echo $quizAns1_err; ?></span>
			</div>
			
			<div class="form-group">
			<input type ="text" class="form-control <?php echo (!empty($quizAns2_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quizAns2; ?>" placeholder ="&#xf040; Type an answer..." name ="quizAns2"
			style ="width: 52%;
					height: 25px;
					margin: 10px 0px 0px 100px;
					padding: 10px 18px;
					border-radius: 4px;
					background: white;
					font-family:Poppins, FontAwesome">
			<span class="invalid-feedback"><?php echo $quizAns2_err; ?></span>	
			</div>
			
			<div class="form-group">
			<input type ="text" class="form-control <?php echo (!empty($quizAns3_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quizAns3; ?>" placeholder ="&#xf040; Type an answer..." name ="quizAns3"
			style ="width: 52%;
					height: 25px;
					margin: 10px 0px 0px 100px;
					padding: 10px 18px;
					border-radius: 4px;
					background: white;
					font-family:Poppins, FontAwesome">
			<span class="invalid-feedback"><?php echo $quizAns3_err; ?></span>	
			</div>
			
			<div class="form-group">
			<input type ="text" class="form-control <?php echo (!empty($quizAns4_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quizAns4; ?>" placeholder ="&#xf040; Type an answer..." name ="quizAns4"
			style ="width: 52%;
					height: 25px;
					margin: 10px 0px 0px 100px;
					padding: 10px 18px;
					border-radius: 4px;
					background: white;
					font-family:Poppins, FontAwesome">
			<span class="invalid-feedback"><?php echo $quizAns4_err; ?></span>		
			</div>
			
			<br><br>
			<h4 style ="margin: 0px 0px 0px 35px;">Answer</h4>
			<div class="form-group">
			<input type ="text" class="form-control <?php echo (!empty($quizCorrectAns_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quizCorrectAns; ?>" placeholder ="&#xf058; Type the correct answer..." name ="quizCorrectAns"
			style ="width: 52%;
					height: 25px;
					margin: 10px 0px 0px 100px;
					padding: 10px 18px;
					border-radius: 4px;
					background: white;
					font-family:Poppins, FontAwesome">
			<span class="invalid-feedback"><?php echo $quizCorrectAns_err; ?></span>	
			</div>
			
			<br><br><br>
			<center>
			<div class="form-group">
				<input type ="submit" value ="&#xf055; ADD QUESTION"
				style ="
					border-radius: 20px;
					padding: 5px;	
					font-size: 30px;
					background-color: #FFC303;
					color: #fff;
					font-family:Poppins, FontAwesome">
			</div>
			
			</center>
			<br><br><br>
		</div>
		<div class ="xtraSpace">
			<input type ="submit" value ="&#xf0c7; Save Quiz"
				style ="
						border-radius: 20px;
						float: left;
						padding: 5px;	
						font-size: 15px;
						background-color: #FFC303;
						color: #fff;
						position: fixed;
						bottom: 20px;
						right: 250px;
						font-family:Poppins, FontAwesome">
		</div>
	</div>
</body>
</html>