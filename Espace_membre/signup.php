<!DOCTYPE = html>
<html>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style.css">
		<title>L'ambition au service de l'autonomie</title>
	</head>
	<body>
	<header>
			<?php include "header.php"; ?>
		</header>
		<nav>
			<?php include "nav.php"; ?>
		</nav>
		<section> 
			<div id="signup_form">
				<form method="post" action="signup_post.php">
					<label for="pseudo">Nom d'utilisateur :</label>
					<input type="text" name="pseudo" id="pseudo" maxlength="30" required autofocus />
					<div class="password"><label for="passw">Mot de passe :</label>
					<input type="password" name="passw" id="passw" required /></div>
					<div class="passwordconf"><label for="passwordconf">Confirmez votre mot de passe :</label>
					<input type="password" name="passwordconf" id="passwordconf" required /></div>
					<div class="mail"><label for="mail">Votre adresse e-mail :</label>
					<input type="text" name="mail" id="mail" required /></div>
					
					<input type="submit" value="S'inscrire" /></div>
				</form>
			</div>
		</section>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
		
	</body>
</html>