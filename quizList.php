<?php
	session_start();
	require_once("admin/users.php");
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Cache-control" content="no-cache">
	<title>Quizbeengo !</title>
	<link rel ="stylesheet" href ="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu+Mono">
</head>
<body>
	<?php require_once("header.php");?>
	<hr class = "divider"/>
	<br>
	<div class ="flexPosition">
		<div class ="xtraSpace">
		</div>
		<div class ="quizArea">
			<center><h2 style ="text-decoration: underline;">Available Quizes to take </h2></center>
			<br><br><br>
			<h3 style ="padding-left: 15px;">Multiple Choice Quiz</h3><br>
			<p style ="padding-left: 15px;">
			Difficulty: Easy<br>
			Number of items: <b>
				<?php 
					$result = mysqli_query($link,"SELECT * FROM questionsmchoice");
					$cnt = mysqli_num_rows($result); 
					echo $cnt;?></b><br>
			<a href ="takeQuiz1.php" 
				style ="font-family:Poppins, FontAwesome;
						border-radius: 10px;
						margin: 0px 0px 0px 300px;
						text-decoration: none;
						padding: 10px;	
						font-size: 15px;
						box-shadow: 5px 5px;
						background-color: #FFC303;
						color: #000;">Take this quiz &#xf061;</a>
						<br><br><br>
			<h3 style ="padding-left: 15px;">True or False Quiz</h3><br>
			<p style ="padding-left: 15px;">
			Difficulty: Easy<br>
			Number of items: <b>
				<?php 
					$resulttf = mysqli_query($link, "SELECT * FROM questionstf");
					$cntt = mysqli_num_rows($resulttf); 
					echo $cntt;?></b><br>
			<a href ="takeQuiz2.php" 
				style ="font-family:Poppins, FontAwesome;
						border-radius: 10px;
						margin: 0px 0px 0px 300px;
						text-decoration: none;
						padding: 10px;	
						font-size: 15px;
						box-shadow: 5px 5px;
						background-color: #FFC303;
						color: #000;">Take this quiz &#xf061;</a>
			<br><br><br><br>
		</div>
		<div class ="xtraSpace">
		</div>
	</div>
</body>
</html>
	