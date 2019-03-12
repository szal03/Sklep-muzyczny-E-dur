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
	 <a href="admin.php"><button type="button">Back</button></a>
    <a href="CRUD_zamowienia/create_z.php"><button type="button">Add order</button></a>
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>id_zamowienia</th>
                <th>id_uzytkownika</th>
                <th>id_produktu</th>
                <th>data</th>
				<th>akcja</th>
				
            </tr>
        </thead>
        <tbody>
              <?php
            $sql = "SELECT * FROM `zamowienia` ORDER BY `id_zamowienia`";
            $result = $db->query($sql);
		
            if($result) {
                foreach($result as $row)
				{
                    echo "<tr>
                        <td>".$row['id_zamowienia']."</td>
                        <td>".$row['id_uzytkownika']."</td>
                        <td>".$row['id_produktu']."</td>
						<td>".$row['data']."</td>
					    <td>
							<a href='CRUD_zamowienia/read_z.php?id=".$row['id_zamowienia']."'><button type='button'>Read</button></a>
							<a href='CRUD_zamowienia/see_z.php?id=".$row['id_uzytkownika']."'><button type='button'>see more</button></a>
                            <a href='CRUD_zamowienia/edit_z.php?id=".$row['id_zamowienia']."'><button type='button'>Edit</button></a>
                            <a href='CRUD_zamowienia/remove_z.php?id=".$row['id_zamowienia']."'><button type='button'>Remove</button></a>
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