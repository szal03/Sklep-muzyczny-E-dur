<?php 
 
	require_once '../../polaczenie/database.php';
 
	if($_POST) 
	{
		$id_u_z=$_POST['id_uzytkownika_z_u'];
		$id_p_z=$_POST['id_produktu_z_u'];
		$data_z=$_POST['data_z_u'];
		
 
		$id = $_POST['id'];
 
		//$sql_u = "UPDATE `zamowienia` SET id_uzytkownika = '$id_u_z', id_produktu = '$id_p_z', data = '$data_z' WHERE id_zamowienia = {$id}";
		
		
		
		$result5=$db->prepare("UPDATE zamowienia SET id_uzytkownika=:iduzyt, id_produktu=:idprodukt, data=:data WHERE id_zamowienia = :id"); //!!!!!!
					
			$result5->bindParam(':id',$id);
			$result5->bindParam(':iduzyt',$id_u_z);
			$result5->bindParam(':idprodukt',$id_p_z);
			$result5->bindParam(':data',$data_z);
		
			$result5->execute();
		
			echo "<p>Succcessfully Updated</p>";
			echo "<a href='edit_z.php?id=".$id."'><button type='button'>Back</button></a>";
			echo "<a href='../index_z.php'><button type='button'>Home</button></a>";
		} 
		else 
		{
			echo "Erorr while updating record : ". $db->error;
		}
 
    
 

 
?>