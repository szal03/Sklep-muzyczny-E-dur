<?php 
 
	require_once '../../polaczenie/database.php';
 
	if($_POST) 
	{
		$kategoria_2u = $_POST['kategoria_2'];
		$podkategoria_2u = $_POST['podkategoria_2'];
		$nazwa_produktu_2u = $_POST['nazwa_produktu_2'];
		$producent_2u = $_POST['producent_2'];
		$cena_2u = $_POST['cena_2'];
		$obrazki_2u = $_POST['obrazki_2'];
		
 
		$id = $_POST['id'];
 
		//$sql_u = "UPDATE `produkty` SET kategoria = '$kategoria_2u', podkategoria = '$podkategoria_2u', nazwa_produktu = '$nazwa_produktu_2u', producent = '$producent_2u', cena = '$cena_2u', obrazki = '$obrazki_2u' WHERE id_produktu = {$id}";
		
		$result5=$db->prepare("UPDATE produkty SET kategoria=:kategoria, podkategoria=:podkategoria, nazwa_produktu=:nazwa_produktu, producent=:producent, cena=:cena, obrazki=:obrazki WHERE id_produktu = :id"); //!!!!!!
					//$result5->bindParam("sssss",$username,$passwordhash,$name,$surname,$email);
			//$result5->bindParam("ssssssi",$login_1u,$password_1u,$imie_1u,$nazwisko_1u,$email_1u,$adres_1u,$id);	
			$result5->bindParam(':id',$id);
			$result5->bindParam(':kategoria',$kategoria_2u);
			$result5->bindParam(':podkategoria',$podkategoria_2u);
			$result5->bindParam(':nazwa_produktu',$nazwa_produktu_2u);
			$result5->bindParam(':producent',$producent_2u);
			$result5->bindParam(':cena',$cena_2u);
			$result5->bindParam(':obrazki',$obrazki_2u);
			$result5->execute();
		
		
			echo "<p>Succcessfully Updated</p>";
			echo "<a href='../index_p.php?id=".$id."'><button type='button'>Back</button></a>";
			echo "<a href='../admin.php'><button type='button'>Home</button></a>";
		
		
 
   
 
}
 
?>