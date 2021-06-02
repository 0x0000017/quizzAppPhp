<?php
	session_start();
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Cache-control" content="no-cache">
	<title>Quizbeengo !</title>
	<link rel ="stylesheet" href ="style.css">
</head>
<body>
	<?php require_once("header.php");?>
	<hr class = "divider"/>
	<center>
	<body background ="img/banner.png">
	<br/><br/><br/><br/><br/>
	<h3>"Create your quiz with a buzz"</h3>
	<div class="start-btn">
		<a href ="auth.php">Create Quiz</a>
	</div>
	<br><br><br><br><br><br><br>
		<h2>OR</h2>
		<br><br>
		<a href ="quizList.php"
			style ="font-size: 25px;
					font-weight: 500;
					color: white;
					padding: 15px 30px;
					outline: none;
					border: none;
					border-radius: 5px;
					background: #906F04;
					cursor: pointer;
					text-decoration: none;"> Start Now</a>
	</center>
</body>
</html>
	