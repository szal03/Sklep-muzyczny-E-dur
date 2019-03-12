<?php
	require_once '../polaczenie/database.php';
?>	


<!DOCTYPE html>
<html lang="pl">
<head>
    <title>PHP CRUD</title>
 

 
</head>
<body>
 
<div class="manageMember">
	 <a href="admin.php"><button type="button">Back</button></a>
    <a href="CRUD_produkty/create_p.php"><button type="button">Add product</button></a>
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>id_produktu</th>
                <th>kategoria</th>
                <th>podkategoria</th>
                <th>nazwa_produktu</th>
				<th>producent</th>
				<th>cena</th>
				<th>obrazki</th>
				<th>akcja</th>
            </tr>
        </thead>
        <tbody>
              <?php
			  
			   if($_POST)
			 { 
			 
				$id = $_POST['id_prod'];
				//$sql_w = "SELECT * FROM uzytkownicy WHERE id_uzytkownika = '$id'";
				
				$userQuery2 = $db->prepare('SELECT * FROM produkty WHERE id_produktu = :id2');
				$userQuery2->bindValue(':id2', $id, PDO::PARAM_STR);
				$userQuery2->execute();
				
				//$result = $db->query($sql_w);
				//$result = $userQuery1->fetch();
		
				$ilosc_produktow=$userQuery2->rowCount();
			  
			  
			  
			  
			  
          //  $sql = "SELECT * FROM `produkty` ORDER BY `id_produktu`";
          //  $result = $db->query($sql);
		
            if($ilosc_produktow>0) 
			{
                 while($row=$userQuery2->fetch())
				{
                    echo "<tr>
                        <td>".$row['id_produktu']."</td>
                        <td>".$row['kategoria']."</td>
                        <td>".$row['podkategoria']."</td>
						<td>".$row['nazwa_produktu']."</td>
						<td>".$row['producent']."</td>
						<td>".$row['cena']."</td>
						<td>".$row['obrazki']."</td>
					
					    <td>
							<a href='CRUD_produkty/read_p.php?id=".$row['id_produktu']."'><button type='button'>Read</button></a>
                            <a href='CRUD_produkty/edit_p.php?id=".$row['id_produktu']."'><button type='button'>Edit</button></a>
                            <a href='CRUD_produkty/remove_p.php?id=".$row['id_produktu']."'><button type='button'>Remove</button></a>
                        </td>
					   
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
			 }

            ?>
        </tbody>
    </table>
</div>
 
</body>
</html>