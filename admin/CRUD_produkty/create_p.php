<?php 

 
	if($_POST) 
	{
	
		$kategoria = $_POST['kategoria_1c'];
		$podkategoria = $_POST['podkategoria_1c'];
		$nazwa_produktu = $_POST['nazwa_produktu_1c'];
		$producent = $_POST['producent_1c'];
		$cena = $_POST['cena_1c'];
		$obrazki = $_POST['obrazki_1c'];
		
 
		//$sql = "INSERT INTO produkty VALUES (NULL, '$kategoria', '$podkategoria', '$nazwa_produktu','$producent','$cena','$obrazki')";
		$wszystko_ok1=true;
		
		
		require_once '../../polaczenie/database.php';
		
		
		
		
		if($wszystko_ok1==true)
		{
					
					//$q3="INSERT INTO uzytkownicy (id_uzytkownika, login, haslo, imie, nazwisko, email, adres) VALUES (NULL, '$login_1c', '$password_hash_1c', '$imie_1c','$nazwisko_1c','$email_1c','$adres_1c' );";
				$result5=$db->prepare("INSERT INTO produkty (kategoria, podkategoria, nazwa_produktu, producent, cena) VALUES (:kategoria,:podkategoria,:nazwa_produktu,:producent,:cena)"); //!!!!!!
					//$result5->bindParam("sssss",$username,$passwordhash,$name,$surname,$email);
				$result5->bindParam(':kategoria',$kategoria);
				$result5->bindParam(':podkategoria',$podkategoria);
				$result5->bindParam(':nazwa_produktu',$nazwa_produktu);
				$result5->bindParam(':producent',$producent);
				$result5->bindParam(':cena',$cena);
				//$result5->bindParam(':adres',$obrazki);
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
    <legend>Add Product</legend>
 
    <form  method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>kategoria</th>
                <td><input type="text" name="kategoria_1c" /></td>
            </tr>     
            <tr>
                <th>podkategoria</th>
                <td><input type="text" name="podkategoria_1c" /></td>
            </tr>
            <tr>
                <th>nazwa produktu</th>
                <td><input type="text" name="nazwa_produktu_1c"/></td>
            </tr>
            <tr>
                <th>producent</th>
                <td><input type="text" name="producent_1c"/></td>
            </tr>
			 <tr>
                <th>cena</th>
                <td><input type="text" name="cena_1c"/></td>
            </tr>
			 <tr>
                <th>obrazki</th>
                <td><input type="text" name="obrazki_1c"/></td>
            </tr>
            <tr>
                <td><button type="submit">Save Changes</button></td>
                <td><a href="../index_p.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>