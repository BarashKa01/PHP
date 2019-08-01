<!DOCTYPE = html>
<html>
	<head>
		<meta charset="utf8" />
		<link rel="stylesheet" href="Style.css" />
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
		<div id="accinfo">
			<div class="wlcomeusr">
			
				<p>Bienvenue <?php echo ("$_SESSION[username]"); ?> sur</p>
				<h4>Numeric Native</h4>
				<div class="accinfo"
					<p>Les projets que vous suivez attirent l'attention de :<br />
					projet+usr name des 3 derniers comm</p>
				</div>
				<p>Liste des projets suivis :</p>
				<p></p>
			</div>
			<div class="empty"></div>
			<div class="edit">
				<h4>Editer vos informations</h4>
					<div class="accedit_form">
						<form method="post" action="edituserpw.php">
							<div class="password"><label for="oldpassw"><strong>Ancien mot de passe</strong> :</label>
							<input type="password" name="oldpassw" id="oldpassw" required />
							<strong>A renseigner pour pouvoir effectuer une modification</strong></div>							
							<div class="password"><label for="newpassw">Nouveau mot de passe :</label>
							<input type="password" name="newpassw" id="newpassw" required /></div>
							<div class="passwordconf"><label for="newpasswordconf">Confirmez votre mot de passe :</label>
							<input type="password" name="newpasswordconf" id="newpasswordconf" required /></div><br />
							<input type="submit" value="Mettre à jour vos informations" /></div>
						</form><p></p>
						<form method="post" action="editusermail.php">
							<div class="password"><label for="oldpassw"><strong>Ancien mot de passe</strong> :</label>
							<input type="password" name="oldpassw" id="oldpassw" required />
							<strong>A renseigner pour pouvoir effectuer une modification</strong></div>
							<div class="mail"><label for="newmail">Votre adresse e-mail :</label>
							<input type="text" name="newmail" id="newmail" required /></div><br />
							<input type="submit" value="Mettre à jour vos informations" /></div>
						</form>
					</div>
			</div>
		</div>
		</section>
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>