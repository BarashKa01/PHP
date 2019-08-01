

<?php 
	
			isset($_POST['pseudo']) AND isset($_POST['passw']) AND isset($_POST['passwordconf']) AND isset($_POST['mail']);
			
			$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
			$_POST['passw'] = htmlspecialchars($_POST['passw']);
			$_POST['passwordconf'] = htmlspecialchars($_POST['passwordconf']);
			$_POST['mail'] = htmlspecialchars($_POST['mail']);
			
				if (preg_match("#^[a-zA-Z0-9]+$#", $_POST['pseudo']))
				{
					$pseudo = $_POST['pseudo'];
				}
				else
				{
					echo("
					<form action='login.php'>
					<p>pseudo invalide</p>
					<input type='submit' value='retour'>
					</form>
					");
				}
				
				$password = $_POST['passw'];
				$passwordconf = $_POST['passwordconf'];
				
				if(preg_match("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))
				{
					$usrmail = $_POST['mail'];
				}
				else
				{
						echo("
					<form action='login.php'>
					<p>Utilisateur ou mot de passe inconnu</p>
					<input type='submit' value='retour'>
					</form>
					");
				}

			
			
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'root', '');
				}
				catch (Exception $e)
				{
					die("Erreur : ".$e->getMessage());
				}
				$checkmail = $bdd->query('SELECT mail FROM members');

					while ($checkedmail = $checkmail->fetch())
					{
						if ($checkedmail['mail'] == $usrmail)
						{
		?>
							<div id="signuperror">
							<p>
								<?php echo $checkedmail['mail'];
								die ("L'email $usrmail renseigné lors de votre inscription est déjà utilisé");
								?>
							</p>
							</div>
		<?php
						}
						
					}
		?>			
		<?php			
				
				$checkpseudo = $bdd->query('SELECT usrname FROM members');
					while ($checkedpseudo = $checkpseudo->fetch())
					{
					if ($checkedpseudo['usrname'] == $pseudo)
						{
		?>
							<div id="signuperror">
							<p>
								<?php
								die ("Ce nom d'utilisateur est déjà pris ! Choisissez en un différent (Lettres et chiffres acceptés)");
								?>
							</p>
							</div>
		<?php
						}
					}
		?>			
		<?php		
					if ($password != $passwordconf)
					{
		?>
						<div id="signuperror">
						<p>
							<?php
							die ("La confirmation du mot de passe ne correspond pas, ressaisissez les mots de passe");
							?>
						</p>
						</div>
		<?php
					}
					
					else
					{
						$passwordH = password_hash($password, PASSWORD_DEFAULT);
						$insertion = $bdd->prepare('INSERT INTO members (usrname, pass, mail, subscribe_date) VALUES (:pseudo, :password , :mail, CURDATE())');
						$insertion -> execute(array(
						'pseudo' => $pseudo,
						'password' => $passwordH,
						'mail' => $usrmail,
						));				
					}
					session_start();
					$_SESSION['username'] = $pseudo;
					header('location: account.php');
			

		?>