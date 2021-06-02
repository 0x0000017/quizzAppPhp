<?php
session_start();
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quizbeengo!</title>
	<link rel ="stylesheet" href ="style.css">
</head>
<body>
	<?php require_once("header.php");?>
	<hr class = "divider"/>
	<center>
	<h2 class ="title"> Choose your type of quiz !</h2>
	<br><br><br><br>
	<div class ="flexPosition">
		<div class ="xtraSpace">
		</div>
		<div class ="multipleChoice">
			<a href ="quizTypeOne.php">MULTIPLE<BR>CHOICE</a>
		</div>
		<div class ="centerSpace">
		</div>
		<div class ="trueOrFalse">
			<a href ="quizTypeTwo.php">TRUE <BR>OR<BR>FALSE</a>
		</div>
		<div class ="xtraSpace">
		</div>
	</div>
	</center>
</body>
</html>
		
	