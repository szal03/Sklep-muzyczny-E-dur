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
				<h1>Sklep muzyczny E-Dur</h1>
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
		
			<div id="content_glowna">
				<div id="galeria_glowna" style="padding:0px; margin:0px; background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
					<style>
					.jssorl-009-spin img{animation-name:jssorl-009-spin;animation-duration:1.6s;animation-iteration-count:infinite;animation-timing-function:linear}@keyframes jssorl-009-spin{from{transform:rotate(0);}to{transform:rotate(360deg);}}.jssorb051 .i{position:absolute;cursor:pointer}.jssorb051 .i .b{fill:#fff;fill-opacity:.5}.jssorb051 .i:hover .b{fill-opacity:.7}.jssorb051 .iav .b{fill-opacity:1}.jssorb051 .i.idn{opacity:.3}.jssora051{display:block;position:absolute;cursor:pointer}.jssora051 .a{fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10}.jssora051:hover{opacity:.8}.jssora051.jssora051dn{opacity:.5}.jssora051.jssora051ds{opacity:.3;pointer-events:none}
					</style>
					<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
					<!-- Loading Screen -->
					<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
					<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
					</div>
					<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
					<div>
					<img data-u="image" src="img/013.jpg" />
					</div>
					<div>
					<img data-u="image" src="img/014.jpg" />
					</div>
					<div>
					<img data-u="image" src="img/015.jpg" />
					</div>
					<div>
					<img data-u="image" src="img/016.jpg" />
					</div>
					<div>
					<img data-u="image" src="img/017.jpg" />
					</div>
					<div>
					<img data-u="image" src="img/018.jpg" />
					</div>
					<div>
					<img data-u="image" src="img/019.jpg" />
					</div>
					<div>
					<img data-u="image" src="img/020.jpg" />
					</div>
					<div>
					<img data-u="image" src="img/021.jpg" />
					</div>
					<div>
					<img data-u="image" src="img/022.jpg" />
					</div>
					<div>
					<img data-u="image" src="img/023.jpg" />
					</div>
					<div>
					<img data-u="image" src="img/024.jpg" />
					</div>
					</div>
					<!-- Bullet Navigator -->
					<div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
					<div data-u="prototype" class="i" style="width:16px;height:16px;">
					<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
					<circle class="b" cx="8000" cy="8000" r="5800"></circle>
					</svg>
					</div>
					</div>
					<!-- Arrow Navigator -->
					<div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
					<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
					<polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
					</svg>
					</div>
					<div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
					<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
					<polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
					</svg>
					</div>
					</div>
					<script type="text/javascript">jssor_1_slider_init();</script>
					
					
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
							<p><a style="color:black" href="produkty_1.php?id='.$row['id_produktu'].'">'.$row['nazwa_produktu'].'</a></p>
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