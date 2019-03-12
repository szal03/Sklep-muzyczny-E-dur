<?php
	
	require_once 'polaczenie/database.php';
	
	
	$sql = 'SELECT * FROM produkty WHERE kategoria = "instrumenty" LIMIT 2';
	$stmt = $db->query($sql);
	$row = $stmt->fetch();
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
	<script type="text/javascript" src="galeria.js"></script>
	
	
	
	
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
		<div id="content_instrumenty">
			<div id="obr_w_tab_instrumenty">
				 <table id="instrumenty_tab" >
				<thead>
				<tr>
					
					<th>nazwa_produktu</th>
					<th>producent</th>
					<th>cena</th>
					<th>foto</th>
				</tr>
			</thead>
			<tbody>
			
				<?php
					
					  $sql = 'SELECT * FROM produkty WHERE kategoria = "akcesoria"';
					  $stmt = $db->query($sql);
					    
							 while($row = $stmt->fetch()) 
							{
								
								echo "<tr>
								<td>
								<a style='color:white' href=produkty_3.php?id=".$row['id_produktu'].">".$row['nazwa_produktu']."</a>
								</td>
								<td>".$row['producent']."</td>
								<td>".$row['cena']."</td>
								<td> 
								<img src=".$row['obrazki']." alt=".$row['nazwa_produktu']." width='120px' height='220px'/>
								</td>
								</tr>";
								
								
							}
					  ?>
			
					  </tbody>
					</table>
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
		<div class="sekcja4">
			<div class="box1">
			<h7>TOP3</h7>
				<div id="tab_instrumenty_s4">

				<?php
					$sql = 'SELECT * FROM produkty WHERE kategoria = "instrumenty" LIMIT 3';
					  $stmt = $db->query($sql);
					    
							 while($row = $stmt->fetch()) 
							 {
								$nazwa=$row['nazwa_produktu'];
								echo '<div class="zdj"><img src="'.$row['obrazki'].'" alt="'.$row['nazwa_produktu'].'" width="125" height="200"/><br><a style="color:white"href="produkty_1.php?id='.$row['id_produktu'].'">'.$nazwa.'</a></div>';
								
								
							 }
								?>
				
				</div>
			</div>
			<div class="box2">
			<h6>Nowosci</h6>
				<div id="gal1">
			
				<div class="zdj_w_galeri">
				<ul id="gal_ul">
				<?php
				$sql1 = 'SELECT * FROM produkty WHERE kategoria = "elektronika" LIMIT 5';
				$stmt1 = $db->query($sql1);
				while($row = $stmt1->fetch())
				{
					echo '<li><div id="zdj_galeria"><img src="'.$row['obrazki'].'" alt="'.$row['nazwa_produktu'].'" width="220" height="220" /></div></li>
						<div>
							<p><a style="color:black" href="produkty_2.php?id='.$row['id_produktu'].'">'.$row['nazwa_produktu'].'</a></p>
						</div>';
					
					
				}
		
				?>
				<ul>
				</div>
			</div>
			
			</div>
		</div>
		
		
		<div style="clear: both;"></div>
			<div id="footer">
				<h3>23.10.2018r. &copy;</h3>
			</div>
	</div>



</body>
</html>