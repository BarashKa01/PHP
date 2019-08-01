<?php
if (session_status() == PHP_SESSION_NONE)
{
	 session_start();
}
?>

<!DOCTYPE = html>

<?php 

if (!isset($_SESSION['username']))
	
{
?>
	<div class="signup">
		<a href="signup.php">S'inscrire</a>
	</div>
<?php
}

?>
	<div class="titre">
		<h1>Numeric Native</h1>
	</div>
<?php 
if (isset ($_SESSION['username']))
	
{	
?>
	<div class="usracc">
		<a href="account.php"><?php echo ("$_SESSION[username]"); ?></a><br />
		<a href="logout.php">Deconnexion</a>
	</div>
<?php
}

else
	
{
?>
	<div class="usracc">
		<a href="login.php">Connexion</a>
	</div>
<?php
}

echo session_status();
?>





