<?php
session_start();
require_once("admin/users.php");

$quizTitle = $tfQuest = $tfAns = '';
$quizTitle_err = $tfQuest_err = $tfAns_err = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
	

	if(empty(trim($_POST["quizTitle"]))){
        $quizTitle_err = "Please enter quiz title.";
    } else{
		$quizTitle = trim($_POST["quizTitle"]);
    }
	
	if(empty(trim($_POST["tfQuest"]))){
        $tfQuest_err = "Please enter your question.";
    } else{
		$tfQuest = trim($_POST["tfQuest"]);
	}
	
    if(!empty($_POST['radio'])) {
          $tfAns = $_POST['radio'];
        } else {
          $tfAns_err = "Please select the value.";
        }
		
	if(empty($quizTitle_err) && empty($tfQuest_err) &&  empty($tfAns_err)) {
		$sql = "INSERT INTO questionstf (quizTitle, tfQuest, tfAns) VALUES (?, ?, ?)";
		
		if($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "sss", $param_quizTitle, $param_tfQuest, $param_tfAns);
			
			$param_quizTitle = $quizTitle;
			$param_tfQuest = $tfQuest;
			$param_tfAns = $tfAns;
			
			if(mysqli_stmt_execute($stmt)){
				$_SESSION["tf"] = true;
			} else {
                echo '<script>alert("Oops! Something went wrong. Please try again later.");</script>';
            }
			mysqli_stmt_close($stmt);
		}
	}	
	mysqli_close($link);	
	
	$quizTitle = '';
	$tfQuest =  '';
	$tfAns = '';
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
	<h5>TRUE OR FALSE QUIZ</h5>
	<br><br>
	<div class ="flexPosition">
		<div class ="xtraSpace">
		</div>
		<div class ="quizArea">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
			<input type ="text" placeholder ="&#xf040;Your Quiz Title Here..." name ="quizTitle" value="<?php echo $quizTitle; ?>"
			style ="width: 60%;
					height: 25px;
					margin: 10px;
					padding: 12px 20px;
					border-radius: 4px;
					background: white;
					font-family:Poppins, FontAwesome">
					<span class="invalid-feedback"><?php echo $quizTitle_err; ?></span>
			<br><br><br>
			<input type ="text" placeholder ="&#xf128; Your Question Here..." name ="tfQuest" value="<?php echo $tfQuest; ?>"
			style ="width: 60%;
					height: 25px;
					margin: 0px 0px 0px 70px;
					border-radius: 4px;
					padding: 12px 20px; 
					background: white;
					font-family:Poppins, FontAwesome">
					<span class="invalid-feedback"><?php echo $tfQuest_err; ?></span>
			<br><br>
			<h4 style ="margin: 0px 0px 0px 70px;">Answer</h4>
			<span class="invalid-feedback"><?php echo $tfAns_err; ?></span>
			<input type ="radio" name ="radio" value ="true"
			style ="width: 10%;
					height: 25px;
					margin: 10px 0px 0px 110px;
					padding: 10px 18px;
					border-radius: 4px;
					background: white;
					font-family:Poppins, FontAwesome">
			<label for ="true">True</label>
			<br>
			<input type ="radio" name ="radio" value ="false"
			style ="width: 10%;
					height: 25px;
					margin: 10px 0px 0px 110px;
					padding: 10px 18px;
					border-radius: 4px;
					background: white;
					font-family:Poppins, FontAwesome">
			<label for ="false">False</label>
			<br><br><br>
			<center><input type ="submit" value ="&#xf055; ADD QUESTION"
			style ="
			border-radius: 20px;
			padding: 5px;	
			font-size: 30px;
			background-color: #FFC303;
			color: #fff;
			font-family:Poppins, FontAwesome">
			<br><br>
		</div>
		<div class ="xtraSpace">
			<a href ="menu.php">&#xf0c7; Save </a>
		</div>
	</div>
</body>
</html>