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
                <th>id</th>
                <th>login</th>
                <th>haslo</th>
                <th>imie</th>
				<th>nazwisko</th>
				<th>e-mail</th>
				<th>adres</th>
				<th>akcja</th>
            </tr>
        </thead>
        <tbody>
              <?php
			 if($_POST)
			 { 
			 
				$id = $_POST['id_uzyt'];
				//$sql_w = "SELECT * FROM uzytkownicy WHERE id_uzytkownika = '$id'";
				
				$userQuery2 = $db->prepare('SELECT * FROM uzytkownicy WHERE id_uzytkownika = :id2');
				$userQuery2->bindValue(':id2', $id, PDO::PARAM_STR);
				$userQuery2->execute();
				
				//$result = $db->query($sql_w);
				//$result = $userQuery1->fetch();
		
				$ilosc_uzytkownikow=$userQuery2->rowCount();
		
				if($ilosc_uzytkownikow>0) 
				{
					while($row=$userQuery2->fetch())
					{
						echo "<tr>
							<td>".$row['id_uzytkownika']."</td>
							<td>".$row['login']."</td>
							<td>".$row['haslo']."</td>
							<td>".$row['imie']."</td>
							<td>".$row['nazwisko']."</td>
							<td>".$row['email']."</td>
							<td>".$row['adres']."</td>
					
							<td>
							<a href='CRUD_uzytkownicy/read.php?id=".$row['id_uzytkownika']."'><button type='button'>Read</button></a>
                            <a href='CRUD_uzytkownicy/edit.php?id=".$row['id_uzytkownika']."'><button type='button'>Edit</button></a>
                            <a href='CRUD_uzytkownicy/remove.php?id=".$row['id_uzytkownika']."'><button type='button'>Remove</button></a>
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