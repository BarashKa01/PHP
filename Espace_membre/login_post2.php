<?php	//LOGIN_POST



isset ($_POST['mail']) AND isset($_POST['passw']);

$_POST['mail'] = htmlspecialchars($_POST['mail']);
$_POST['passw'] = htmlspecialchars ($_POST['passw']);
	
		if (preg_match("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))
		{
			$mail = $_POST['mail'];
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
	$passw = $_POST['passw'];
	$userid = NULL;

	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'root', '',
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
	}
	catch (exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
	
	$checklog = $bdd->prepare('SELECT ID, usrname, pass FROM members WHERE mail = :mail');
	$checklog->execute (array (
		'mail' => $mail,
		));
	$checkedlog = $checklog->fetch();
	
	$passok = password_verify($passw, $checkedlog['pass']);
	
		if (!$checkedlog)
		{
			echo("
			<form action='login.php'>
			<p>Utilisateur ou mot de passe inconnu</p>
			<input type='submit' value='retour'>
			</form>
			");
		}
		else
		{
			if($passok)
			{
			$userid = $checkedlog['ID'];
			session_start();
			$_SESSION['userID'] = $checkedlog['ID'];
			$_SESSION['username'] = $checkedlog['usrname'];
			$checklog->closeCursor();
			header ('location: account.php');
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
	}
?>