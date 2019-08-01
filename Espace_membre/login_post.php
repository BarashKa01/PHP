<?php	//LOGIN_POST

session_start();

isset ($_POST['mail']) AND isset($_POST['passw']);

	$mail = $_POST['mail'];
	$passw = $_POST['passw'];
	$userid = NULL;
	$passH = password_hash($passw, PASSWORD_DEFAULT);
	$passw = NULL;
	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'root', '',
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
	}
	catch (exception $e)
	{
		die('Erreur : ' .$e->getMessage());
	}
	$checkmail = $bdd->query("SELECT ID, mail FROM members");
	while($checkedmail = $checkmail->fetch())
	{
		if ($checkedmail['mail'] == $mail)
		{
			$userid = $checkedmail['ID'];
		}
		else
		{
			die("'$userid' ID '$checkedmail[mail]' MAIL <br/>
			<form action='login.php'>
			<p>Utilisateur ou mot de passe inconnu</p>
			<input type='submit' value='retour'>
			</form>");
		}
	}
	
	$checkpass = $bdd->prepare('SELECT usrname, pass FROM members WHERE id = :userid');
	$checkpass->execute (array (
	'userid' => $userid,
	));
	while ($checkedpass = $checkpass->fetch())
	{
			if ($checkedpass['pass'] == $passH)
		{
			$_SESSION['username'] = $checkedpass['usrname'];
			header ('location: account.php');
		}
		else
		{
			
			die("'$userid', '$checkedpass[pass]' ID PASS <br/>
			<form action='login.php'>
			<p>Utilisateur ou mot de passe inconnu</p>
			<input type='submit' value='retour'>
			</form>");
		}
	}
?>