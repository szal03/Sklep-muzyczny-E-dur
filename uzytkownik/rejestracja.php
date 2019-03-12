<?php

	SESSION_START();
	
	if(isset($_POST['email']))
	{
		//udana walidacja, zakladam ze tak
		$wszystko_ok=true;
		
			if(isset($_POST['imie']))
			{
				$name=$_POST['imie'];
			}
			if(isset($_POST['nazwisko']))
			{
				$surname=$_POST['nazwisko'];
			}
		//sprawdzenie poprawnosci nazwy uzytkownika
		$username=$_POST['username'];
		//sprawdzenie dlugosci nazwy uzytkownika
		if((strlen($username)<3)||(strlen($username)>25))
		{
			$wszystko_ok=false;
			$_SESSION['e_username']="Nazwa użytkownika musi zawierać od 3 do 25 znaków";
		}
		
		if(ctype_alnum($username)==false)//sprawdzamy znaki w nazwie uzytkownika
		{
			$wszystko_ok=false;
			$_SESSION['e_username']="Nazwa użytkownika może składać się tylko z liter i cyfr(bez polskich znaków)";
		}
		//poprawnosc adresu email
		$email=$_POST['email'];
		$email2=filter_var($email, FILTER_SANITIZE_EMAIL);  //funkcja do walidacji maila - usuwa polskie znaki
		
		if((filter_var($email2,FILTER_SANITIZE_EMAIL)==false) || ($email2!=$email))
		{
			$wszystko_ok=false;
			$_SESSION['e_email']="Nie poprawny email";
		}
		
		//sprawdzenie poprawnosci hasel
		$password1=$_POST['password1'];
		$password2=$_POST['password2'];
		
		if((strlen($password1)<3)||(strlen($password1)>25))
		{
			$wszystko_ok=false;
			$_SESSION['e_password1']="Hasło musi zawierać od 3 do 25 znaków";
		}
		if($password1!=$password2)
		{
			$wszystko_ok=false;
			$_SESSION['e_password2']="Hasła nie są identyczne";
		}
		
		$passwordhash = password_hash($password1, PASSWORD_DEFAULT); // pohashuj hasela uzytkownikow xd
		
		//akceptacja rgulaminu
		if(!isset($_POST['regulamin']))
		{
			$wszystko_ok=false;
			$_SESSION['e_regulamin']="Trzeba zaakceptować regulamin";
		}
		
		
		//require_once "connect.php";
			//mysqli_report(MYSQLI_REPORT_STRICT); // zeby brzydkich bladow uzytkownikom nie wyrzucal php
		
			try{
				require_once '../polaczenie/database.php';
			
				//Czy email już istnieje?
				//$rezultat1 = $polaczenie->query("SELECT id_uzytkownika FROM uzytkownicy WHERE email='$email'");
				
				$qu1=$db->prepare('SELECT id_uzytkownika FROM uzytkownicy WHERE email=:email1');
				$qu1->bindValue(':email1', $email, PDO::PARAM_STR);
				$qu1->execute();
				
				
				//if (!$rezultat1) throw new Exception($polaczenie->error);
				$ilosc_maili=$qu1->rowCount();
				//$ilosc_maili = $db->num_rows;
				if($ilosc_maili>0)
				{
					$wszystko_ok=false;
					$_SESSION['e_email']="Istnieje konto z takim e-mailem";
				}
				//
				$rezultat1 = $db->prepare('SELECT id_uzytkownika FROM uzytkownicy WHERE login=:username1');
				$rezultat1->bindValue(':username1', $username, PDO::PARAM_STR);
				$rezultat1->execute();
				
				$ilosc_usern = $rezultat1->rowCount();
				if($ilosc_usern>0)
				{
					$wszystko_ok=false;
					$_SESSION['e_username']="Ta nazwa użytkownika jest zajęta";
				}
				if($wszystko_ok==true)
				{
					//wszystko ok wiec dodajemy osobe do bazy
					//$wstawianie=$db->query($q3);
					$result5=$db->prepare("INSERT INTO uzytkownicy (login, haslo, imie, nazwisko, email) VALUES (:username,:password,:name,:surname,:email)"); //!!!!!!
					//$result5->bindParam("sssss",$username,$passwordhash,$name,$surname,$email);
					$result5->bindParam(':username',$username);
					$result5->bindParam(':password',$passwordhash);
					$result5->bindParam(':name',$name);
					$result5->bindParam(':surname',$surname);
					$result5->bindParam(':email',$email);
					
					
					
					$result5->execute();
					
					
						$_SESSION['udanarejestracja']=true;
						
						header('Location: poRejestracji.php');
				
					
					
				}
				
				
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd servera!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
		
		
	}



?>


<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>E-Dur Sklep muzyczny</title>
	<link rel="stylesheet" type = "text/css" href="logowanie.css">
	<link rel="stylesheet" type = "text/css" href="css/fontello.css">

</head>
<STYLE> A {
text-decoration:none;

}</STYLE> 
<body>
	<div id="container">
		<div id="tytul_strony"><a style="color:white" href="../projekt2.php">Strona głowna</a><br><br>
			<a style="color:white" href="logowanie.php">Logowanie</a>
		</div>
		
			<div id="logo"><h1>Rejestracja</h1></div>
				<div id="panel"> 
					<form method="POST">
					<p><label for="username">Nazwa użytkownika:</label></p>
					<input type="text" id="username" name="username">
					<?php
						if(isset($_SESSION['e_username']))
						{
							echo '<div class="error">'.$_SESSION['e_username'].'</div>';
							unset($_SESSION['e_username']);
						}
					?>
					<p>Imię: </p>
					<input type="text" id="imie" name="imie">
					<p>Nazwisko: </p>
					<input type="text" id="nazwisko" name="nazwisko">
					<p>e-mail: </p>
					<input type="text" id="email" name="email">
					<?php
						if(isset($_SESSION['e_email']))
						{
							echo '<div class="error">'.$_SESSION['e_email'].'</div>';
							unset($_SESSION['e_email']);
						}
					?>
					<p><label for="password">Hasło:</label></p>
					<input type="password" id="password1" name="password1">
					<?php
						if(isset($_SESSION['e_password1']))
						{
							echo '<div class="error">'.$_SESSION['e_password1'].'</div>';
							unset($_SESSION['e_password1']);
						}
					?>
					<p><label for="password">Powtórz hasło:</label></p>
					<input type="password" id="password2" name="password2"></br></br>
					<?php
						if(isset($_SESSION['e_password2']))
						{
							echo '<div class="error">'.$_SESSION['e_password2'].'</div>';
							unset($_SESSION['e_password2']);
						}
					?>
					<label>
					<input type="checkbox" name="regulamin" /> Akceptuje regulamin
					</label>
					<?php
						if(isset($_SESSION['e_regulamin']))
						{
							echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
							unset($_SESSION['e_regulamin']);
						}
					?>
					<div class="przycisk_logowania"><p><input type="submit" value="Zarejestuj się"></p></div>
					</form>
				</div>
	
	
	</div>


</body>

</html>