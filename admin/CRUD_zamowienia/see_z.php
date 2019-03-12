<?php

SESSION_START();
	
	if (!isset($_SESSION['logged_id'])) 
	{
		header('Location: logowanie.php');
		exit();
	}
	
	require_once '../../polaczenie/database.php';
	
?>
	
		

<!DOCTYPE html>
<html lang="pl">
<head>
    <title>PHP CRUD</title>
</head>
<body>
 
<div class="manageMember">
	 <a href="../index_z.php"><button type="button">Back</button></a>
   
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>id_zamowienia</th>
                <th>id_uzytkownika</th>	
				<th>imie</th>
				<th>nazwisko</th>
				<th>id_produktu</th>
				<th>nazwa produktu</th>	
				<th>producent</th>
				<th>cena</th>
				
				
            </tr>
        </thead>
        <tbody>
		 <?php
		 if($_GET['id']) 
			{
				$id = $_GET['id'];
				
				$result1=$db->prepare('SELECT * FROM zamowienia INNER JOIN uzytkownicy ON zamowienia.id_uzytkownika = uzytkownicy.id_uzytkownika INNER JOIN produkty ON zamowienia.id_produktu = produkty.id_produktu INNER JOIN koszyk ON uzytkownicy.id_uzytkownika=koszyk.id_uzytkownika WHERE zamowienia.`id_uzytkownika` =:id'); //!!!!!!
					
				$result1->bindParam(':id',$id);
				$result1->execute();
		
				
            if($result1) 
			{
                foreach($result1 as $row)
				{
					$d1=$row['id_zamowienia'];
                    echo "<tr>
                        <td>".$row['id_zamowienia']."</td>
                        <td>".$row['id_uzytkownika']."</td>
						<td>".$row['imie']."</td>
						<td>".$row['nazwisko']."</td>
						<td>".$row['id_produktu']."</td>
						<td>".$row['nazwa_produktu']."</td>
						<td>".$row['producent']."</td>
						<td>".$row['cena']."</td>
						 </tr>";	
						 
				}
				 	
				//<td>".$row['suma']."</td>
				$r1=$db->prepare('SELECT * FROM zamowienia INNER JOIN uzytkownicy ON zamowienia.id_uzytkownika = uzytkownicy.id_uzytkownika INNER JOIN produkty ON zamowienia.id_produktu = produkty.id_produktu INNER JOIN koszyk ON uzytkownicy.id_uzytkownika=koszyk.id_uzytkownika WHERE id_zamowienia=:id_z');
				$r1->bindParam(':id_z',$d1);
				$r1->execute();
				$r2=$r1->fetch();
				
				echo " <td>suma: ".$r2['suma']."</td>";
            } 
			else
				{
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
			//INNER JOIN koszyk ON uzytkownicy.id_uzytkownika=koszyk.id_uzytkownika
			//echo $_SESSION['cena1'];
		
			
			}
            ?>
		 </tbody>
    </table>
</div>
 
</body>
</html>			
										
						