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
.error {color: #FF0000;}
}</STYLE> 
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
		
		
			
			
				<div id="content_kontakt">
			
				
				<div id="formularz_kontaktowy">
				<form method="post" action="admin/wiadomosci/wysylanie_wiadomosci.php">  
					E-mail: <input type="text" name="email">
					<br><br>
					Temat: <input type="text" name="temat_wiadomosc" >
					<br><br>
					<br><br>
					Wiadomość: <textarea name="wiadomosc" rows="5" cols="40"></textarea>
					<br><br>
					<br><br>
					<input type="submit" name="submit" value="Wyślij">  
				</form>
			
			
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