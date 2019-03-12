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
			
		
				$id_zamowienia = $_GET['id'];
				$id_uzytkownika_z = $_SESSION['id_uzytkownika'];
				
	
				$result5=$db->prepare("DELETE FROM zamowienia WHERE id_zamowienia = :id2"); //!!!!!!
					
				$result5->bindParam(':id2',$id_zamowienia);
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
				
				
						}
						elseif($ilosc_zamowien==1)
						{
							
							$row1=$res1->fetch();
							$id_jednynego_zamowienia=$row1['id_zamowienia'];
							$id_uzytkownika_jedynego_zamowienia=$row1['id_uzytkownika'];
							$id_zamowionego_produktu=$row1['id_produktu'];
							
							
							$res3=$db->prepare('SELECT cena FROM produkty WHERE id_produktu=:id_p');
							$res3->bindParam(':id_p', $id_zamowionego_produktu);
							$res3->execute();
							$data = $res3->fetch();
						
							$nowa=$data['cena'];
					
					
							$res4=$db->prepare('UPDATE koszyk SET suma=:sum1 WHERE id_uzytkownika = :id1');
							$res4->bindParam(':id1', $id_uzytkownika_jedynego_zamowienia);
							$res4->bindParam(':sum1', $nowa);
							$res4->execute();
					
					
						
							header('Location: ../zamowienia_uzytkownika.php');
							exit();
				
						}
						else
						{
								
								$usuniecie_koszyka=$db->prepare("DELETE FROM koszyk WHERE id_uzytkownika=:id");
								$usuniecie_koszyka->bindParam(':id',$id_uzytkownika_z);
								$usuniecie_koszyka->execute();
							
								echo "brak zamowien do wyswietlenia";
							
							
						}
	
				header('Location: ../zamowienia_uzytkownika.php');
				exit();
				}
				header('Location: ../zamowienia_uzytkownika.php');
				exit();
	}
	
	
	
	
	
?>