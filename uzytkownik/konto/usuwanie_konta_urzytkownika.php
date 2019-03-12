<?php
	
	SESSION_START();
	
	if (!isset($_SESSION['logged_id'])) 
	{
		header('Location: logowanie.php');
		exit();
	}
	
	$ok=true;
	
		require_once '../../polaczenie/database.php';
	
		
				if(isset($_POST['pass11']))
				{
				$rezultat3;
					
				$pass_from_db = $_SESSION['haslo'];
				$pass_from_form=$_POST['pass11'];
					
				$name1 = $_SESSION['login'];
				$name1_id=$_SESSION['id_uzytkownika'];
		
		
					if(!password_verify($pass_from_form,$pass_from_db))
					{
		
						$_SESSION['e_pass11']="nie poprawne haslo";
						$ok=false;
					}
		
					if(!isset($_POST['potwierdzenie_usuniecia']))
					{
			
						$_SESSION['e_potwierdzenie_usuniecia']="Trzeba zaakceptować potwierdzenie usuniecia";
						$ok=false;
			
					}

				
				$result5=$db->prepare("DELETE FROM uzytkownicy WHERE uzytkownicy.id_uzytkownika =:id AND uzytkownicy.login =:name1"); 
				$result5->bindParam(':id',$name1_id);
				$result5->bindParam(':name1',$name1);
			
				
				$usuniecie_zamowien=$db->prepare("DELETE FROM zamowienia WHERE zamowienia.id_uzytkownika =:id");
				$usuniecie_zamowien->bindParam(':id',$name1_id);
				
				$usuniecie_koszyka=$db->prepare("DELETE FROM koszyk WHERE id_uzytkownika=:id");
				$usuniecie_koszyka->bindParam(':id',$name1_id);
					
					if($ok==true)
					{
						if($usuniecie_zamowien->execute() && $usuniecie_koszyka->execute())
							{
								
								if($result5->execute())
								{echo "konto zostanie usuniete";}
							}
						else
							{
								echo "Error";
							}
						
						
						header('Location: logout.php');  // 
					}
				}
?>



<!doctype html>
<html lang="pl">
<head>
<title>E-Dur Sklep muzyczny</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type = "text/css" href="strona_uzytkownika.css">
	<link rel="stylesheet" type = "text/css" href="../../css/fontello.css">
	
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
		<p>Czy aby na pewno chcesz usunąć swoje konto?</p>
		<div id="usuwanie_konta">
			<form  method="POST" >
				<p><label for="pass11">Wpisz swoje hasło:</label></p>
				<input type="password" id="pass11" name="pass11">
				<?php
						if(isset($_SESSION['e_pass11']))
						{
							echo '<div class="error">'.$_SESSION['e_pass11'].'</div>';
							unset($_SESSION['e_pass11']);
						}
				
			?>
			<label>
				<input type="checkbox" name="potwierdzenie_usuniecia" /> Tak, chce usunąć konto
			</label>
			<?php
						if(isset($_SESSION['e_potwierdzenie_usuniecia']))
						{
							echo '<div class="error">'.$_SESSION['e_potwierdzenie_usuniecia'].'</div>';
							unset($_SESSION['e_potwierdzenie_usuniecia']);
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