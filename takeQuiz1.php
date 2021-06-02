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
	<br>
	<div class ="flexPosition">
		<div class ="xtraSpace">
		</div>
		<div class ="quizArea">
			<h2 style ="margin: 0px 0px 0px 15px;">Multiple Choice Test</h2>
			<p style ="margin: 0px 0px 0px 15px;">
				Please pick the correct answer</p>
				<br><br>
					<?php
						$conn = mysqli_connect("localhost", "root", "", "quizbeengo");
						$sql = mysqli_query($conn, "SELECT * from questionsmchoice");
						
						while($rw = mysqli_fetch_array($sql)){
							$id = $rw['id'];
							$quizTitle = $rw['quizTitle'];
							$quizQuest = $rw['quizQuest'];
							$quizAns1 = $rw['quizAns1'];
							$quizAns2 = $rw['quizAns2'];
							$quizAns3 = $rw['quizAns3'];
							$quizAns4 = $rw['quizAns4'];
							$quizCorrectAns = $rw['quizCorrectAns'];
							
							echo '
							<form method ="POST">
								<h3 style ="margin: 0px 0px 0px 15px;">',$quizTitle,'</h3>
								<p style ="font-size: 15px; margin: 0px 0px 0px 15px;">',$quizQuest,'</p>
								<p style ="margin: 0px 0px 0px 15px;">
								<input type ="radio" name ="',$id,'" value ="',$quizAns1,'">
									<label for ="',$quizAns1,'">',$quizAns1,'</label><br>
								<input type ="radio" name ="',$id,'" value ="',$quizAns2,'">
									<label for ="',$quizAns2,'">',$quizAns2,'</label><br>
								<input type ="radio" name ="',$id,'" value ="',$quizAns3,'">
									<label for ="',$quizAns3,'">',$quizAns3,'</label><br>
								<input type ="radio" name ="',$id,'" value ="',$quizAns4,'">
									<label for ="',$quizAns4,'">',$quizAns4,'</label><br>
									<br><br>
								',
								$answer = isset($_POST['$id']);
								$currentPoints = '';
								if ($answer == $quizCorrectAns) {
									$currentPoints += 1;
									$_SESSION["currentPoints"] = $currentPoints;
										
								}'
									<br><br>
							</form> ';
						}
							
					?>
						<input type ="submit" value ="Result" name ="Result">
						<?php include "redirect.php";?>
		</div>
		</div class ="xtraSpace">
		</div>
	</div>
</body>
</html>