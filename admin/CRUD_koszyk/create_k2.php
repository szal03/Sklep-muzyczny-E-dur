<?php 
require_once '../../polaczenie/database.php';

 if($_POST)
 {
		$id_uzytkownika_z=$_POST['id_uzytk'];
		$id_produktu_z=$_POST['id_pro'];
		
		//$res8=$db->prepare('SELECT id_produktu FROM zamowienia WHERE id_uzytkownika=:id11');
	//	$res8->bindParam(':id11',$id_uzytkownika_z);
		//$res8->execute();
		
		//$data = $res8->fetch();
		
		//$id_produktu_z = $data['id_produktu'];
		//$data_z=$_POST['data_z_c'];
		echo "   ";
		echo $id_produktu_z;
		echo "   ";
		//sprawdz czy jest wiecej zamowien - jesli tak to sumuj - jesli nie to wprowadz cene wybranego produktu jako sumke
		
		$res1=$db->prepare('SELECT * FROM zamowienia WHERE id_uzytkownika=:id1');
		$res1->bindParam(':id1',$id_uzytkownika_z);
		$res1->execute();
		
	
		
		$ilosc_zamowien=$res1->rowCount();
		if($ilosc_zamowien>0)
		{
				$result6=$db->prepare('SELECT SUM(cena) AS suma FROM produkty INNER JOIN zamowienia ON produkty.id_produktu=zamowienia.id_produktu WHERE zamowienia.id_uzytkownika=:id');
				$result6->bindParam(':id',$id_uzytkownika_z);
				$result6->execute();
				//$sumusia1=array();
				foreach($result6 as $row)
				{
					echo $row['suma'];
					$sumusia1=$row['suma'];
					echo " ";
				
				}
				echo "suma";
				echo $sumusia1;
				
				$res2=$db->prepare("UPDATE koszyk SET suma=:sum1 WHERE id_uzytkownika=:id2");
				$res2->bindParam(':sum1',$sumusia1);
				$res2->bindParam(':id2',$id_uzytkownika_z);
				$res2->execute();
				
				echo "<p>Succcessfully Updated</p>";
				echo "<a href='../index_z.php'><button type='button'>Back</button></a>";
				//header('Location: ../index_k.php');
				
		}
		else{
			
			$res3=$db->prepare('SELECT cena FROM produkty WHERE id_produktu=:id_p');
			$res3->bindParam(':id_p', $id_produktu_z);
			$res3->execute();
			$data = $res3->fetch();
			echo "   ";
			$nowa=$data['cena'];
			echo $nowa;
			echo "   ";
			
			$res4=$db->prepare('INSERT INTO koszyk (id_uzytkownika, suma) VALUES (:id_u, :summ)');
			$res4->bindParam(':id_u', $id_uzytkownika_z);
			$res4->bindParam(':summ', $nowa);
			$res4->execute();
			echo "<p>Succcessfully INSERT</p>";
			echo "<a href='../index_z.php'><button type='button'>Back</button></a>";
			//header('Location: ../index_k.php');
			
		}
 }	
 
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Add Order</title>
 
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
    <legend>koszyk</legend>
    <form  method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>id_uzytkownika</th>
                <td><input type="text" name="id_uzytk" /></td>
            </tr>     
			 <tr>
                <th>id_produktu</th>
                <td><input type="text" name="id_pro" /></td>
            </tr>  
                <td><button type="submit">Save Changes</button></td>
				
                <td><a href="../index_z.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
	 
 
</fieldset>
 
</body>
</html>


