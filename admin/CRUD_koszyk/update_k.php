<?php 
 
	require_once '../../polaczenie/database.php';
	
 
	if($_POST) 
	{
		$user_id = $_POST['username_k'];
		$suma1 = $_POST['suma_k'];
		
		
 
		$id_k = $_POST['id'];
 
		///$sql_u = "UPDATE `uzytkownicy` SET login = '$login_1u', haslo = '$password_1u', imie = '$imie_1u', nazwisko = '$nazwisko_1u', email = '$email_1u', adres = '$adres_1u' WHERE id_uzytkownika = {$id}";
		
		$result5=$db->prepare("UPDATE koszyk SET id_uzytkownika=:username, suma=:sum1 WHERE id_koszyka = :id"); //!!!!!!
					//$result5->bindParam("sssss",$username,$passwordhash,$name,$surname,$email);
			//$result5->bindParam("ssssssi",$login_1u,$password_1u,$imie_1u,$nazwisko_1u,$email_1u,$adres_1u,$id);	
			$result5->bindParam(':id',$id_k);
			$result5->bindParam(':username',$user_id);
			$result5->bindParam(':sum1',$suma1);
			
			$result5->execute();
		
		
		
		
		//if($db->query($sql_u) == TRUE) 
		//{
			echo "<p>Succcessfully Updated</p>";
			echo "<a href='edit_k.php?id=".$id_k."'><button type='button'>Back</button></a>";
			echo "<a href='../index_k.php'><button type='button'>Home</button></a>";
		//} 
		//else 
		//{
			//echo "Erorr ";
		//}
		
		//else echo "Updated {$result5->affected_rows} rows";
 
		
 
	}
 
?>