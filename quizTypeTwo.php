<?php
session_start();
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
			<input type ="text" placeholder ="&#xf040;Your Quiz Title Here..." name ="quizTitle" id="quizTitle"
			style ="width: 60%;
					height: 25px;
					margin: 10px;
					padding: 12px 20px;
					border-radius: 4px;
					background: white;
					font-family:Poppins, FontAwesome">
			<br><br><br>
			<input type ="text" placeholder ="&#xf128; Your Question Here..." name ="tfQuest id="tfQuest"
			style ="width: 60%;
					height: 25px;
					margin: 0px 0px 0px 70px;
					border-radius: 4px;
					padding: 12px 20px; 
					background: white;
					font-family:Poppins, FontAwesome">
			<br><br>
			<h4 style ="margin: 0px 0px 0px 70px;">Answer</h4>
			<input type ="radio" value ="true" name ="tf" id="true"
			style ="width: 10%;
					height: 25px;
					margin: 10px 0px 0px 110px;
					padding: 10px 18px;
					border-radius: 4px;
					background: white;
					font-family:Poppins, FontAwesome">
			<label for ="true">True</label>
			<br>
			<input type ="radio" value ="false" name ="tf" id="false"
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