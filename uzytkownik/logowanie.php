<?php
SESSION_START();
if (isset($_SESSION['logged_id'])) 
{
	header('Location: stronaUzytkownika.php');
	exit();
}

?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>E-Dur Sklep muzyczny</title>
	<link rel="stylesheet" type = "text/css" href="logowanie.css">
	<link rel="stylesheet" type = "text/css" href="css/fontello.css">

</head>
<STYLE> A {
text-decoration:none;

}</STYLE> 
<body>
	<div id="container">
		<div id="tytul_strony" ><a style="color:white" href="../projekt2.php">Strona głowna</a></div>
			<div id="logo"><h1>Logowanie</h1></div>
				<div id="panel"> 
					<form action="zaloguj.php" method="post">
						<p><label for="username">Nazwa użytkownika:</label></p>
						<input type="text" id="username" name="username">
						<p><label for="password">Hasło:</label></p>
						<input type="password" id="password" name="password">
						<div class="przycisk_logowania"><p><input type="submit" value="Zaloguj się"></p></div>
					</form>
					<div id="rej">
						<h2>Nie masz jeszcze konta?</h2>
					</div>
					<a href="rejestracja.php"><input type="submit" value="Zarejestruj się"/></a><br/>
					
				</div>
			
	
	
	</div>
<?php
	if (isset($_SESSION['bad_attempt'])) 
	{
		echo '<p>Niepoprawny login lub hasło!</p>';
		unset($_SESSION['bad_attempt']);
	}
?>

</body>

</html>