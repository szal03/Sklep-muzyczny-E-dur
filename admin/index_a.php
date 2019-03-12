<?php

SESSION_START();
	
	if (!isset($_SESSION['logged_id'])) 
	{
		header('Location: logowanie.php');
		exit();
	}
	
	require_once '../polaczenie/database.php';
	
		
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <title>PHP CRUD</title>
</head>
<body>
 
<div class="manageMember">
	 <a href="../admin/admin.php"><button type="button">Back</button></a>
    <a href="CRUD_uzytkownicy/create.php"><button type="button">Add Member</button></a>
	wyszukiwanie id
	<form action="wyszukaj.php" method="post">
		 <input type="text" name="id_uzyt" />
		 <button type="submit">szukaj</button>
	</form>
	sortowanie:
	 <a href="sort1_name.php"><button type="button">imie</button></a>
	<a href="sort1_fname.php"><button type="button">nazwisko</button></a>
	
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
            $sql = "SELECT * FROM `uzytkownicy` ORDER BY `id_uzytkownika`";
			
           // $result = $db->query($sql);
			
			$stmt = $db->query('SELECT * FROM uzytkownicy');
			
			//$ilosc_uzytkownikow=$sql->rowCount();
			
            if($stmt) 
			{
               // while($row = $result->fetch_assoc()) 
				   foreach($stmt as $row)
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

            ?>
        </tbody>
    </table>
</div>
 
</body>
</html>