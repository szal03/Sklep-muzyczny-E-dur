<?php
SESSION_START();
require_once '../../../polaczenie/database.php';
if (!isset($_SESSION['logged_id'])) 
{
	header('Location: logowanie.php');
	exit();
}
		if($_GET['id']) 
		{
			
		
				$id_produktu_z = $_GET['id'];
				$id_uzytkownika_z = $_SESSION['id_uzytkownika'];
				$data_z=date('Y-m-d');
	
				$result5=$db->prepare("INSERT INTO zamowienia (id_uzytkownika, id_produktu, data) VALUES (:id_uzytkownik,:id_produkt,:data)"); //!!!!!!
					//$result5->bindParam("sssss",$username,$passwordhash,$name,$surname,$email);
				$result5->bindParam(':id_uzytkownik',$id_uzytkownika_z);
				$result5->bindParam(':id_produkt',$id_produktu_z);
				$result5->bindParam(':data',$data_z);
				
				$result5->execute();
				
				
				if($result5)
				{
					$res1=$db->prepare('SELECT * FROM zamowienia WHERE id_uzytkownika=:id1');
					$res1->bindParam(':id1',$id_uzytkownika_z);
					$res1->execute();
					
					$ilosc_zamowien=$res1->rowCount();
					
					if($ilosc_zamowien>1)
					{
					$result6=$db->prepare('SELECT SUM(cena) AS suma FROM produkty INNER JOIN zamowienia ON produkty.id_produktu=zamowienia.id_produktu WHERE zamowienia.id_uzytkownika=:id');
					$result6->bindParam(':id',$id_uzytkownika_z);
					$result6->execute();
					//$sumusia1=array();
					foreach($result6 as $row)
					{
					
					$sumusia1=$row['suma'];
					
				
					}
					
				
					$res2=$db->prepare("UPDATE koszyk SET suma=:sum1 WHERE id_uzytkownika=:id2");
					$res2->bindParam(':sum1',$sumusia1);
					$res2->bindParam(':id2',$id_uzytkownika_z);
					$res2->execute();
				
					
				//header('Location: ../index_k.php');
				
					}
					else
					{
				
						$res3=$db->prepare('SELECT cena FROM produkty WHERE id_produktu=:id_p');
						$res3->bindParam(':id_p', $id_produktu_z);
						$res3->execute();
						$data = $res3->fetch();
						
						$nowa=$data['cena'];
					
					
						$res4=$db->prepare('INSERT INTO koszyk (id_uzytkownika, suma) VALUES (:id_u, :summ)');
						$res4->bindParam(':id_u', $id_uzytkownika_z);
						$res4->bindParam(':summ', $nowa);
						$res4->execute();
					
					
						
						header('Location: ../nowe_zamowienia_uzytkownika.php');
						exit();
				
					}
					//else{
						
						//$usuniecie_koszyka=$db->prepare("DELETE FROM koszyk WHERE id_uzytkownika=:id");
						//$usuniecie_koszyka->bindParam(':id',$id_uzytkownika_z);
					//	$usuniecie_koszyka->execute();
							
						//	echo "brak zamowien do wyswietlenia";
						
					
	
			header('Location: ../nowe_zamowienia_uzytkownika.php');
			exit();
			}
			header('Location: ../nowe_zamowienia_uzytkownika.php');
			exit();
	}
	
	
	
	
	
?>