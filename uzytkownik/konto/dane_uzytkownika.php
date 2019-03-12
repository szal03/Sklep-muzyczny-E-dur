<?php
SESSION_START();
if (!isset($_SESSION['logged_id'])) 
{
	header('Location: logowanie.php');
	exit();
}

require_once '../../polaczenie/database.php';

		$id=$_SESSION['id_uzytkownika'];
		$result1=$db->prepare('SELECT * FROM uzytkownicy WHERE id_uzytkownika =:id'); //!!!!!!
					
		$result1->bindParam(':id',$id);
		$result1->execute();
		
		$row = $result1->fetch();


?>

<!doctype html>
<html lang="pl">
<head>
<title>E-Dur Sklep muzyczny</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type = "text/css" href="strona_uzytkownika.css">
	<link rel="stylesheet" type = "text/css" href="../css/fontello.css">
	
	<script src="../../jquery-3.2.1.min.js"></script>
	<script src="strona_uzytkownika.js"></script> 
	
</head>
<STYLE> A {
text-decoration:none;
}</STYLE> 
<body>
	<nav class="nav">
	<ul>
		<li><a href="stronaUzytkownika.php">Strona głowna</a>
		<li><a href="zamowienia_uzytkownika.php">zobacz zamowienia</a>
		<li><a href="nowe_zamowienia_uzytkownika.php">stworz zamowienie</a>
		
		<li class="drop"><a href="#">Opcje</a>
			<ul class="dropdown">
				<li><a href="dane_uzytkownika.php">Moje dane</a></li>
				<li><a href="zmiana_hasla_uzytkownika.php">Zmiana hasła</a></li>
				<li><a href="dodaj_adres_uzytkownika.php">Dodaj adres</a></li>
				<li><a href="zmiana_danych_uzytkownika.php">Inne</a></li>
			</ul>
		</li>
		<li><a href="logout.php">Wyloguj się</a>

	</ul>
	</nav>
	<div class="sekcja_srodkowa">
	<div id="sekcja1u">
		<div id="dane_uzytkownika">
		<?php
		echo "<p> Login: ".$row['login'].'</p>'; 
		echo "<p> Imię: ".$row['imie'].'</p>'; 
		echo "<p> Nazwisko: ".$row['nazwisko'].'</p>'; 
		echo "<p> email: ".$row['email'].'</p>'; 
		echo "<p> adres: ".$row['adres'].'</p>'; 
		
		?>
		</div>
	</div>
	</div>
<footer>
    <p class="main">
       23.10.2018r. &copy;
    </p>
</footer>

	
</body>
</html>