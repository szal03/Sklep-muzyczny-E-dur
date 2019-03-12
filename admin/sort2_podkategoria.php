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
    <a href="CRUD_produkty/create_p.php"><button type="button">Add product</button></a>
	wyszukiwanie id
	<form action="wyszukaj_p.php" method="post">
	
		 <input type="text" name="id_prod" />
		 <button type="submit">szukaj</button>
	</form>
	sortowanie
	<a href="index_p.php"><button type="button">id</button></a>
	<a href="sort2_kat.php"><button type="button">kategoria</button></a>
	<a href="sort2_cena.php"><button type="button">cena</button></a>
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
            $sql = "SELECT * FROM `produkty` ORDER BY `podkategoria`";
            $result = $db->query($sql);
		
            if($result) 
			{
                 foreach($result as $row)
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

            ?>
        </tbody>
    </table>
</div>
 
</body>
</html>