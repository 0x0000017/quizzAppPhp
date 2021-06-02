<div class="header">
  <a href="index.php" class ="logo"><img src = "img/logo2.png"></a>
  <div class="header-right">
	<?php
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
		{
			echo '<h4 
					style ="color: black;
					padding: 12px;
					border-radius: 4px;
					line-height: 25px;
					width: 15%;">Hello, ',htmlspecialchars($_SESSION["firstName"]),'!
				</h4>
				<a href = "logout.php"
					style ="color: black;
						background-color: #e61919;
						text-decoration: none;
						padding: 12px;
						border-radius: 4px;
						line-height: 25px;">Logout
				</a>';
		} else {
			echo '<a href = "login.php" 
				style ="color: black;
						text-decoration: none;
						background-color: #FFC200; 
						padding: 12px;
						border-radius: 4px;
						line-height: 25px;">Sign In</a>
				<a href = "register.php"
				style ="color: black;
						background-color: #36d165;
						text-decoration: none;
						padding: 12px;
						border-radius: 4px;
						line-height: 25px;">Sign Up</a>';
		} ?>
	</div>
</div>