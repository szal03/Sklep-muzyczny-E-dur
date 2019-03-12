<?php 

	SESSION_START();
	
	if (!isset($_SESSION['logged_id'])) 
	{
		header('Location: logowanie.php');
		exit();
	}
	
	require_once '../../polaczenie/database.php';
	
	
	if(isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['pass3']) )
	{	
		$first_password = $_SESSION['haslo'];
		$name1 = $_SESSION['login'];
		$name1_id=$_SESSION['id_uzytkownika'];
		
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$pass3 = $_POST['pass3'];
	
		$jest_ok = true;
		
		
		//$zapytanie_update = "UPDATE `uzytkownicy` SET `haslo` = '$pass_hash' WHERE `uzytkownicy`.`id_uzytkownika` = '$name1_id' AND `uzytkownicy`.`login` = '$name1';";
		$rezultat11;
		//bool password_verify($password1,$first_password)
	
		//$password1_hash = password_hash($password1, PASSWORD_DEFAULT); // pohashuj hasela uzytkownikow xd
	
	
		if(!password_verify($pass1,$first_password))
		{
		
			$_SESSION['e_pass1']="nie poprawne haslo";
			$jest_ok=false;
		}
	
		if($pass1==$pass2)
		{
			$_SESSION['e_pass2']="nowe haslo jest takie same jak stare!";
			$jest_ok=false;
		}
		
		if($pass2!=$pass3)
		{
			$_SESSION['e_pass3']="nowe haslo zostalo zle powtorzone";
			$jest_ok=false;
		}
		
		if($jest_ok==true)
		{
			echo "wszystko sie zgadza - nastapi zmiana hasla";
			
			$pass_hash = password_hash($pass2, PASSWORD_DEFAULT); // pohashuj hasela uzytkownikow xd
			
			$zapytanie_update = "UPDATE `uzytkownicy` SET `haslo` = '$pass_hash' WHERE `uzytkownicy`.`id_uzytkownika` = '$name1_id' AND `uzytkownicy`.`login` = '$name1';";
			if($rezultat11 = $db->query($zapytanie_update))
			{
				echo "udana zamiana hasla!";
			}
			else
			{
				echo "Error";
			}
			
			header('Location: stronaUzytkownika.php');  // 
		}
	
		
	}
		
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
<div id="zmiana_danych">
	<form  method="POST" >
		<p>Zmień swoje hasło:</p>
		<p><label for="pass1">Wpisz swoje obecne hasło:</label></p>
		<input type="password" id="pass1" name="pass1">
		<?php
						if(isset($_SESSION['e_pass1']))
						{
							echo '<div class="error">'.$_SESSION['e_pass1'].'</div>';
							unset($_SESSION['e_pass1']);
						}
				
		?>
		<p><label for="pass2">Wpisz nowe hasło:</label></p>
		<input type="password" id="pass2" name="pass2">
		<?php
						if(isset($_SESSION['e_pass2']))
						{
							echo '<div class="error">'.$_SESSION['e_pass2'].'</div>';
							unset($_SESSION['e_pass2']);
						}
					
		?>

		<p><label for="pass3">Powtorz nowe hasło:</label></p>
		<input type="password" id="pass3" name="pass3">
			<?php
						if(isset($_SESSION['e_pass3']))
						{
							echo '<div class="error">'.$_SESSION['e_pass3'].'</div>';
							unset($_SESSION['e_pass3']);
						}
						
		?>
		<div class="przycisk_zatwierdzenia"><p><input type="submit" value="Zatwierdz"></p></div>
	</form>
	</div>
	</div>
	<footer>
    <p class="main">
       23.10.2018r. &copy;
    </p>
</footer>
</body>
</html>

