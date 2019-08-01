<?php // EDIT USER PASSWORD INFO
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
					
				//VERIFICATION DES CHAMPS REMPLIS ET ATTRIBUTION DES UPDATE
			if ($passok AND isset($_SESSION['userID']))
			{
				if (!isset($_POST['newpassw']) AND !isset($_POST['newpasswordconf']))
				{
					$newpassw = $checkedlog['pass'];
				}
				// VERIFICATION SI NOUVEAU MDP
				if (isset($_POST['newpassw']) && isset($_POST['newpasswordconf']))
				{
					$newpassw = htmlspecialchars($_POST['newpassw']);
					$newpasswordconf = htmlspecialchars($_POST['newpasswordconf']);
					if ($newpassw == $newpasswordconf)
					{
						$newpassw = password_hash($newpassw, PASSWORD_DEFAULT);
					}
					else
					{
						echo("
							<form action='account.php'>
							<p>La mise à jour du mot de passe n'a pu s'effectuer. Vérifiez d'avoir correctement confirmé le mot de passe.</p>
							<input type='submit' value='retour'>
							</form>
							");
					}
				}
				
				
				// INTEGRATION DE LA MISE A JOUR DANS LA BASE
			
				$insertion = $userbdd->prepare('UPDATE members SET pass = :pass WHERE ID = :ID');
				$insertion->execute (array (
					'ID' => $_SESSION['userID'],
					'pass' => $newpassw,
					));
				$checklog->closeCursor();
				$insertion->closeCursor();
					header('location: account.php');
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