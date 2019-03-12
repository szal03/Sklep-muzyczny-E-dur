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
	 <a href="index_a.php"><button type="button">Back</button></a>
   
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                 <th>id_koszyka</th>
                <th>id_uzytkownika</th>
                <th>suma</th>
				<th>akcja</th>
            </tr>
        </thead>
        <tbody>
              <?php
			 if($_POST)
			 { 
			 
				$id_kosz = $_POST['id_k'];
				//$sql_w = "SELECT * FROM uzytkownicy WHERE id_uzytkownika = '$id'";
				
				$userQuery2 = $db->prepare('SELECT * FROM koszyk WHERE id_koszyka = :id2');
				$userQuery2->bindValue(':id2', $id_kosz, PDO::PARAM_STR);
				$userQuery2->execute();
				
				//$result = $db->query($sql_w);
				//$result = $userQuery1->fetch();
		
				$ilosc_uzytkownikow=$userQuery2->rowCount();
		
				if($ilosc_uzytkownikow>0) 
				{
					while($row=$userQuery2->fetch())
					{
						echo "<tr>
							  <td>".$row['id_koszyka']."</td>
								<td>".$row['id_uzytkownika']."</td>
								<td>".$row['suma']."</td>
					
							<td>
							<a href='CRUD_koszyk/read_k.php?id=".$row['id_koszyka']."'><button type='button'>Read</button></a>
                            <a href='CRUD_koszyk/edit_k.php?id=".$row['id_koszyka']."'><button type='button'>Edit</button></a>
                            <a href='CRUD_koszyk/remove_k.php?id=".$row['id_koszyka']."'><button type='button'>Remove</button></a>
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