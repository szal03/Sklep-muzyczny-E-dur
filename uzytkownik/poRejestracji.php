<?php 

	SESSION_START();
	
	if(!isset($_SESSION['udanarejestracja']))//mozna to wkleic do kazdej strony gdy nie jest zalogowany uzytkownik
	{
		header('Location: logowanie.php'); //jesli nie jestes zalogowany to nie mozesz wejsc przez wpisanie adresu strony - do strony uzytkownika
		exit(); //wstrzymuje dalsze wykonywanie skryptu 
	}
	
	
?>
<!doctype html>
<html lang="pl">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E-Dur Sklep muzyczny</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type = "text/css" href="logowanie.css">
	
	
	
	
	
	
</head>
<STYLE> A {
text-decoration:none;
}</STYLE> 
<body>
<div id="container1l">
	<div class="sekcja1l">
	<div style="clear: both;"></div>
	<div id="przesun">
	<div class="obr2">
			<img src="obrazy/obraz2.png" class="image1" alt="podziękowanie"  width="728" height="90"/>
			<div class="overlay">
				<div class="text">Teraz możesz się zalogować</div>
			</div>
		</div>
		</div>
	</div>
	<div id="skecja2l">
	<div class="obr_log">
	<a style="color:white" href="logowanie.php"><img src="obrazy/zaloguj.png" class="image2" alt="zaloguj_sie"  width="700" height="90"/></a>
	</div>
	</div>
	
</div>

			<div id="footer">
				<h3>23.10.2018r. &copy;</h3>
			</div>
</body>
</html>