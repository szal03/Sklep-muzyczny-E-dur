<?php

SESSION_START();
	
	if (!isset($_SESSION['logged_id'])) 
{
	header('Location: logowanie.php');
	exit();
}

		echo "witaj adminie!";
		echo "<p> Witaj ".$_SESSION['imie'].'![<a href="../uzytkownik/konto/logout.php">Wyloguj sie!</a>]</p>'; 
		echo "<p> Baza danych".'[<a href="index_a.php">Użytkownicy</a>]</p>';
		echo "<p> Baza danych".'[<a href="index_p.php">Produkty</a>]</p>';
		echo "<p> Baza danych".'[<a href="index_z.php">Zamowienia</a>]</p>';
		//echo "<p> Pokaż baze".'[<a href="index_all.php">Wszystko</a>]</p>';
		echo "<p> Baza danych".'[<a href="index_k.php">koszyki</a>]</p>';
		//echo "<p> Baza danych".'[<a href="CRUD_koszyk/create_k.php">koszyki</a>]</p>';
		echo "<p> Baza danych".'[<a href="statystyki.php">statystyki</a>]</p>';
		

?>