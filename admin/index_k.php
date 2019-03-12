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
	wyszukiwanie id
	<form action="wyszukaj_k.php" method="post">
		 <input type="text" name="id_k" />
		 <button type="submit">szukaj</button>
	</form>
	
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
            $sql = "SELECT * FROM `koszyk` ORDER BY `id_koszyka`";
            $result = $db->query($sql);
		
            if($result) 
			{
                 foreach($result as $row)
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

            ?>
        </tbody>
    </table>
</div>
 
</body>
</html>