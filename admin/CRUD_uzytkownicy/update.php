<?php 
 
	require_once '../../polaczenie/database.php';
	
 
	if($_POST) 
	{
		$login_1u = $_POST['username_2'];
		$password_1u = $_POST['password_2'];
		$imie_1u = $_POST['name_2'];
		$nazwisko_1u = $_POST['fname_2'];
		$email_1u = $_POST['email_2'];
		$adres_1u = $_POST['adress_2'];
		
 
		$id = $_POST['id'];
 
		///$sql_u = "UPDATE `uzytkownicy` SET login = '$login_1u', haslo = '$password_1u', imie = '$imie_1u', nazwisko = '$nazwisko_1u', email = '$email_1u', adres = '$adres_1u' WHERE id_uzytkownika = {$id}";
		
		$result5=$db->prepare("UPDATE uzytkownicy SET login=:username, haslo=:password, imie=:name, nazwisko=:surname, email=:email, adres=:adres WHERE id_uzytkownika = :id"); //!!!!!!
					//$result5->bindParam("sssss",$username,$passwordhash,$name,$surname,$email);
			//$result5->bindParam("ssssssi",$login_1u,$password_1u,$imie_1u,$nazwisko_1u,$email_1u,$adres_1u,$id);	
			$result5->bindParam(':id',$id);
			$result5->bindParam(':username',$login_1u);
			$result5->bindParam(':password',$password_1u);
			$result5->bindParam(':name',$imie_1u);
			$result5->bindParam(':surname',$nazwisko_1u);
			$result5->bindParam(':email',$email_1u);
			$result5->bindParam(':adres',$adres_1u);
			$result5->execute();
		
		
		
		
		//if($db->query($sql_u) == TRUE) 
		//{
			echo "<p>Succcessfully Updated</p>";
			echo "<a href='edit.php?id=".$id."'><button type='button'>Back</button></a>";
			echo "<a href='../index_a.php'><button type='button'>Home</button></a>";
		//} 
		//else 
		//{
			//echo "Erorr ";
		//}
		
		//else echo "Updated {$result5->affected_rows} rows";
 
		
 
	}
 
?>