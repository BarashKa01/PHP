<?php // EDIT MAIL

session_start();
		
			$oldpassword = htmlspecialchars($_POST['oldpassw']);
			
				try
				{
					$userbdd = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'Utilisateur', 'Utilisat');
				}
				catch (Exception $e)
				{
					die("Erreur : ".$e->getMessage());
				}
				//VERIFICATION DU MDP ET PREPARATION DES INFO USER
					$checklog = $userbdd->prepare('SELECT pass, mail FROM members WHERE ID = :ID');
					$checklog->execute (array (
						'ID' => $_SESSION['userID'],
						));
					$checkedlog = $checklog->fetch();
					
					$passok = password_verify($oldpassword, $checkedlog['pass']);

				//VERIFICATION SI NOUVEAU MAIL

				if (isset($_POST['mail']))
				{
					$usrmail = htmlspecialchars($_POST['mail']);
					
						if ($usrmail != $checkedlog['mail'])
						{
							$newmail = $usrmail;
						}

						else
						{
							echo("
								<form action='account.php'>
								<p>L'e-mail existe déjà !</p>
								<input type='submit' value='retour'>
								</form>
								");
						}
					// INTEGRATION DE LA MISE A JOUR DANS LA BASE
			
				$insertion = $userbdd->prepare('UPDATE members SET mail = :mail  WHERE ID = :ID');
				$insertion->execute (array (
					'ID' => $_SESSION['userID'],
					'mail' => $newmail,
					));
				$checklog->closeCursor();
				$insertion->closeCursor();
								echo ("
				<form action='account.php'>
				<p>Mise à jour effectuée.</p>
				<input type='submit' value='retour'>
				</form>
					");
					echo $newmail;
			}
			else
			{
				echo ("
				<form action='account.php'>
				<p>La mise à jour n'a pu s'effectuer.Vous n'avez renseigné aucune coordonnée.</p>
				<input type='submit' value='retour'>
				</form>
					");
			echo $_SESSION['userID'];
			echo $passok;
			}

?>