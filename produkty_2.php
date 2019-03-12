<?php
	
	require_once 'polaczenie/database.php';
	
	if($_GET['id'])
	{
			$id_1=$_GET['id'];
			$pQuery1 = $db->prepare('SELECT * FROM produkty WHERE id_produktu = :id2');
			$pQuery1->bindValue(':id2', $id_1, PDO::PARAM_STR);
			$pQuery1->execute();
	
			$data = $pQuery1->fetch();
	}
		
?>
<!doctype html>
<html lang="pl">
<head>
<title>E-Dur Sklep muzyczny</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type = "text/css" href="projekt2.css">
	<link rel="stylesheet" type = "text/css" href="css/fontello.css">
	
	
	
	<script src="jquery-3.2.1.min.js"></script>
	<script src="projekt2.js"></script>
	
</head>
<STYLE> A {
text-decoration:none;

}</STYLE> 
<!--<script>
$('.podmenukwadracik').click(function(){$('.podkategorie').css('display','block')});
</script>-->
<body>
	<div id="container">
		<div class="sekcja1">
			<div id="logo">
				<h1><a style="color:white" href="projekt2.php">Sklep muzyczny E-Dur</a></h1>
			</div>
			<div id="wyszukiwanie">
				
			</div>
			<div class="funkcje1">
				<div class="kafelek1"><a style="color:cornflowerblue" href="kontakt.php"><i class="demo-icon icon-mail"></i></a></div>
			
				<div class="kafelek1"><a style="color:cornflowerblue" href="uzytkownik/logowanie.php"><i class="demo-icon icon-user"></i></a></div>
				<div style="clear: both;"></div>
			</div>
			<div style="clear: both;"></div>
		</div>
		<div style="clear: both;"></div>
		<div class="sekcja2">
		<div id="kategorie1">
			<div id="menu1"  class="menu1">
				<input type="button" class="b_kategorie" id="b_kategorie" value="Menu">
					<br/>
						<div id="menu2" class="podmenu">
							<div><a href="instrumenty.php"><input type="button" class="podmenu_przycisk" id="p_podmenu" value="Instrumenty"></a>
							
							</div>
							<div><a href="elektronika.php"><input type="button" class="podmenu_przycisk" id="p_podmenu" value="Elektronika"></a>
							
							</div>
							<div><a href="akcesoria.php"><input type="button" class="podmenu_przycisk" id="p_podmenu" value="Akcesoria"></a>
							
							</div>
							
						</div>
				</div>
			</div>
		
		
			
			
			<div id="content_produkty">
			
			<div class="kafelek12"><a style="color:cornflowerblue" href="elektronika.php"><i class="demo-icon icon-left-big"></i></a></div>
			
		
				<div id="obrazek_produktu1"><?php
				echo '<div id="zdj1_produktu"><img src="'.$data['obrazki'].'" alt="'.$data['nazwa_produktu'].' width="200" height="340"/></div>'; ?>
				</div>
				<div id="info_o_produkcie">
				<div id="tekst_produkt">
				<p>Nazwa produktu: <?php echo $data['nazwa_produktu']?></p>
				<p>Producent: <?php echo $data['producent']?></p>
				<p>id produktu: <?php echo $data['id_produktu']?></p>
				<p><h5>cena: <?php echo $data['cena']?> złotych</h5></p>
				
				</div>
				</div>
			
			
		</div>
		</div>
		
		<div class="sekcja3">
			<div class="kwadrat3"></br>Najczęściej zadawane pytania</br>
				</br>
					<a href="#">Jaki instrument wybrać?</a></br>
					<a href="#">Na co warto zwrócić uwagę?</a></br>
					<a href="#">Materiały dla początkujących</a></br>
			
				</div>
				
		</div>
		
		
		
		<div style="clear: both;"></div>
			<div id="dol_strony">
				<div id="footer">
					<h3>23.10.2018r. &copy;</h3>
				</div>
			</div>
		</div>
	



</body>
</html>