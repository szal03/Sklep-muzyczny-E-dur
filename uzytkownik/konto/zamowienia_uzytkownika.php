<?php
SESSION_START();
if (!isset($_SESSION['logged_id'])) 
{
	header('Location: logowanie.php');
	exit();
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
	<div id="sekcja1u_zamowienia">
	
	<p>Twoje zamówienia: </p>
	<div id="tab_zamowienia">
	 <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>id_zamowienia</th>
                <th>id_uzytkownika</th>	
				<th>imie</th>
				<th>nazwisko</th>
				<th>id_produktu</th>
				<th>nazwa produktu</th>	
				<th>producent</th>
				<th>cena</th>
				<th>akcja</th>
				
				
            </tr>
        </thead>
        <tbody>
	<?php
	
		 if($_SESSION['id_uzytkownika']) 
			{
				$id = $_SESSION['id_uzytkownika'];
				
				require_once '../../polaczenie/database.php';
				
				$result1=$db->prepare('SELECT * FROM zamowienia INNER JOIN uzytkownicy ON zamowienia.id_uzytkownika = uzytkownicy.id_uzytkownika INNER JOIN produkty ON zamowienia.id_produktu = produkty.id_produktu INNER JOIN koszyk ON uzytkownicy.id_uzytkownika=koszyk.id_uzytkownika WHERE zamowienia.`id_uzytkownika` =:id'); //!!!!!!
					
				$result1->bindParam(':id',$id);
				//$result1->execute();
		
				
            if($result1->execute()) 
			{
                foreach($result1 as $row)
				{
					$d1=$row['id_zamowienia'];
                    echo "<tr>
                        <td>".$row['id_zamowienia']."</td>
                        <td>".$row['id_uzytkownika']."</td>
						<td>".$row['imie']."</td>
						<td>".$row['nazwisko']."</td>
						<td>".$row['id_produktu']."</td>
						<td>".$row['nazwa_produktu']."</td>
						<td>".$row['producent']."</td>
						<td>".$row['cena']."</td>
						<td>
							<a href='towrzenie_zamowienia/anuluj_z.php?id=".$row['id_zamowienia']."'><button class='button1' type='button'>anuluj</button></a>
						</td>
						 </tr>";	
						 
				}
				 	
				//<td>".$row['suma']."</td>
				$r1=$db->prepare('SELECT * FROM zamowienia INNER JOIN uzytkownicy ON zamowienia.id_uzytkownika = uzytkownicy.id_uzytkownika INNER JOIN produkty ON zamowienia.id_produktu = produkty.id_produktu INNER JOIN koszyk ON uzytkownicy.id_uzytkownika=koszyk.id_uzytkownika WHERE id_zamowienia=:id_z');
				$r1->bindParam(':id_z',$d1);
				$r1->execute();
				$r2=$r1->fetch();
				
				echo " <td>suma: ".$r2['suma']."</td>";
				
				$re=$db->prepare('SELECT * FROM uzytkownicy WHERE id_uzytkownika=:id'); //!!!!!!
					
				$re->bindParam(':id',$id);
				$re->execute();
				$em=$re->fetch();
				
					//$res1=$db->prepare('SELECT * FROM zamowienia WHERE id_uzytkownika=:id1');
					//$res1->bindParam(':id1',$id_uzytkownika_z);
				//	$res1->execute();
					
				//	$ilosc_zamowien=$res1->rowCount();
				//	if($ilosc_zamowien==0)
				//	{
						
				//	}
            } 
			else
				{
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
		
			}
            ?>
	
	
			</tbody>
		</table>
	</div>
	
	
	<div id="sekcja2u">
	<form action="generuj_pdf.php" method="post" target="_blank">
		
		<input type="hidden" name="id_k" value="<?php echo $r2['id_koszyka']?>"  />
		<input type="hidden" name="id_u" value="<?php echo $r2['id_uzytkownika']?>"  />
		<input type="hidden" name="imie" value="<?php echo $r2['imie']?>"  />
		<input type="hidden" name="nazwisko" value="<?php echo $r2['nazwisko']?>"  />
		<input type="hidden" name="adres" value="<?php echo $r2['adres']?>"  />
		<input type="hidden" name="email" value="<?php echo $em['email']?>"  />
		<input type="hidden" name="id_p" value="<?php echo $r2['id_produktu']?>"  />
		<input type="hidden" name="producent" value="<?php echo $r2['producent']?>"  />
		<input type="hidden" name="cena" value="<?php echo $r2['cena']?>"  />
		<input type="hidden" name="suma" value="<?php echo $r2['suma']?>"  />
		
		<a href="generuj_pdf.php" ><button class="button2" type="submit">generuj plik pdf z zamowieniem</button></a>

		
	</form>
		
		<div id="dodawanie_pliku">
			<p>Jeśli chcesz wykonać ponownie zamowienie mozesz dodać plik z zamowieniem</p>
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<p>Wybierz plik do przesłania</p>
					<input type="file" name="fileToUpload" class="inputfile" id="fileToUpload">
					<p></p>
					<input id="b2" type="submit" value="Prześlij" name="upload_1">
				</form>
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