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
	<div class="sekcja_tworzenia_zamowienia">
		<div id="content_zam_u">
			<div id="obr_w_tab_instrumenty">
				 <table id="instrumenty_tab" >
				<thead>
				<tr>
					
					<th>nazwa_produktu</th>
					<th>producent</th>
					<th>cena</th>
					<th>foto</th>
					<th>dodaj<th>
				</tr>
			</thead>
			<tbody>
			
				<?php
					 if($_SESSION['id_uzytkownika']) 
					{
						$id = $_SESSION['id_uzytkownika'];
				
						require_once '../../polaczenie/database.php';
					
						$sql = 'SELECT * FROM produkty';
						$stmt = $db->query($sql);
					    
							 while($row = $stmt->fetch()) 
							{
								
								echo "<tr>
								<td>
								".$row['nazwa_produktu']."
								</td>
								<td>".$row['producent']."</td>
								<td>".$row['cena']."</td>
								<td> 
								<img src=../../".$row['obrazki']." alt=".$row['nazwa_produktu']." width='120px' height='220px'/>
								</td>
								<td>
									<div class='kaf1'>
									<a style='color:cornflowerblue' href='towrzenie_zamowienia/create_z.php?id=".$row['id_produktu']."'><i class='demo-icon icon-cart-plus'></i></a>
									</div>
								</td>
								</tr>";
								
								
							}
					}
					  ?>
						
					  </tbody>
					</table>
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