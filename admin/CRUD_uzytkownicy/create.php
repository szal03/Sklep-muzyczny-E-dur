<?php 
 

 
	if($_POST) 
	{
	
		$login_1c = $_POST['username_1'];
		$password_1c = $_POST['password_1'];
		$imie_1c = $_POST['name_1'];
		$nazwisko_1c = $_POST['fname_1'];
		$email_1c = $_POST['email_1'];
		$adres_1c = $_POST['adress_1'];
		
		$wszystko_ok1=true;
		
		$password_hash_1c = password_hash($password_1c, PASSWORD_DEFAULT); // pohashuj hasela uzytkownikow xd
		
		require_once '../../polaczenie/database.php';
		
		$qu1=$db->prepare('SELECT id_uzytkownika FROM uzytkownicy WHERE email=:email1');
		$qu1->bindValue(':email1', $email_1c, PDO::PARAM_STR);
		$qu1->execute();
		
		$ilosc_maili=$qu1->rowCount();
		if($ilosc_maili>0)
		{
			$wszystko_ok1=false;
			$_SESSION['e_email']="Istnieje konto z takim e-mailem";
		}
		
		$rezultat1 = $db->prepare('SELECT id_uzytkownika FROM uzytkownicy WHERE login=:username1');
		$rezultat1->bindValue(':username1', $login_1c, PDO::PARAM_STR);
		$rezultat1->execute();
				
		$ilosc_usern = $rezultat1->rowCount();
		if($ilosc_usern>0)
		{
			$wszystko_ok1=false;
			$_SESSION['e_username']="Ta nazwa użytkownika jest zajęta";
		}
	
		//$sql = "INSERT INTO uzytkownicy VALUES (NULL, '$login_1c', '$password_hash_1c', '$imie_1c','$nazwisko_1c','$email_1c','$adres_1c')";
		
		if($wszystko_ok1==true)
		{
					
					//$q3="INSERT INTO uzytkownicy (id_uzytkownika, login, haslo, imie, nazwisko, email, adres) VALUES (NULL, '$login_1c', '$password_hash_1c', '$imie_1c','$nazwisko_1c','$email_1c','$adres_1c' );";
				$result5=$db->prepare("INSERT INTO uzytkownicy (login, haslo, imie, nazwisko, email, adres) VALUES (:username,:password,:name,:surname,:email,:adres)"); //!!!!!!
					//$result5->bindParam("sssss",$username,$passwordhash,$name,$surname,$email);
				$result5->bindParam(':username',$login_1c);
				$result5->bindParam(':password',$password_hash_1c);
				$result5->bindParam(':name',$imie_1c);
				$result5->bindParam(':surname',$nazwisko_1c);
				$result5->bindParam(':email',$email_1c);
				$result5->bindParam(':adres',$adres_1c);
				$result5->execute();
					
					echo "<p>New Record Successfully Created</p>";
					echo "<a href='../admin.php'><button type='button'>Back</button></a>";
		
		}
		else
		{
			echo "blad!";
		}
	}
 
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Add Member</title>
 
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
        }
 
        table tr th {
            padding-top: 20px;
        }
    </style>
 
</head>
<body>
 
<fieldset>
    <legend>Add Member</legend>
 
    <form  method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>login</th>
                <td><input type="text" name="username_1" /></td>
            </tr>
					<?php
						if(isset($_SESSION['e_username']))
						{
							echo '<div class="error">'.$_SESSION['e_username'].'</div>';
							unset($_SESSION['e_username']);
						}
					?>			
            <tr>
                <th>hasło</th>
                <td><input type="password" name="password_1" /></td>
            </tr>
            <tr>
                <th>Imie</th>
                <td><input type="text" name="name_1"/></td>
            </tr>
            <tr>
                <th>Nazwisko</th>
                <td><input type="text" name="fname_1"/></td>
            </tr>
			 <tr>
                <th>email</th>
                <td><input type="text" name="email_1"/></td>
            </tr>
			<?php
						if(isset($_SESSION['e_email']))
						{
							echo '<div class="error">'.$_SESSION['e_email'].'</div>';
							unset($_SESSION['e_email']);
						}
					?>
			 <tr>
                <th>adres</th>
                <td><input type="text" name="adress_1"/></td>
            </tr>
            <tr>
                <td><button type="submit">Save Changes</button></td>
                <td><a href="../index_a.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>