<?php
SESSION_START();
	if (!isset($_SESSION['logged_id'])) {
		header('Location: logowanie.php');
		exit();
	}
	require_once '../polaczenie/database.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" type = "text/css" href="stats.css">
    <title>PHP CRUD</title>
</head>
<body>
<div class="manageMember">
    <a href="admin.php"><button type="button">Back</button></a>
    <h2>Najdroższy produkt</h2>
    <table border="1" cellspacing="0" cellpadding="0">
    <thead>
    	<tr>
            <th>id_produktu</th>
            <th>kategoria</th>
            <th>podkategoria</th>
            <th>nazwa_produktu</th>
    		<th>producent</th>
    		<th>cena</th>
    		
    		
		</tr>
	</thead>
	<tbody>
	<?php
            $sql1 = "SELECT MAX(cena) AS cena FROM `produkty` ORDER BY `id_produktu` LIMIT 1";
            $result1 = $db->query($sql1);
			$row = $result1->fetch();
			 $cena1=$row['cena'];
			
			
			$result11=$db->prepare('SELECT * FROM produkty WHERE cena=:cen'); //!!!!!!
					
				$result11->bindParam(':cen',$cena1);
				$result11->execute();
			
	
            if($result1) 
			{
                 foreach($result11 as $row)
				 {
                    echo "<tr>
               
						<td>".$row['id_produktu']."</td>
                        <td>".$row['kategoria']."</td>
                        <td>".$row['podkategoria']."</td>
			            <td>".$row['nazwa_produktu']."</td>
		            	<td>".$row['producent']."</td>
			            <td>".$cena1."</td> 
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
            ?>
        </tbody>
    </table>
    <h2>Najtańszy produkt</h2>
    <table border="1" cellspacing="0" cellpadding="0">
    <thead>
    	<tr>
            <th>id_produktu</th>
            <th>kategoria</th>
            <th>podkategoria</th>
            <th>nazwa_produktu</th>
    		<th>producent</th>
    		<th>cena</th>
    		
    		
		</tr>
	</thead>
	<tbody>
	<?php
            $sql2 = "SELECT *,MIN(cena) AS cena FROM `produkty` ORDER BY `id_produktu` LIMIT 1";
            $result2 = $db->query($sql2);
			$row = $result2->fetch();
			$cena2=$row['cena'];
			
			$result22=$db->prepare('SELECT * FROM produkty WHERE cena=:cen2'); //!!!!!!
					
				$result22->bindParam(':cen2',$cena2);
				$result22->execute();
			
            if($result2) 
			{
                 foreach($result22 as $row)
				 {
                    echo "<tr>
                        <td>".$row['id_produktu']."</td>
                        <td>".$row['kategoria']."</td>
                        <td>".$row['podkategoria']."</td>
			            <td>".$row['nazwa_produktu']."</td>
		            	<td>".$row['producent']."</td>
			            <td>".$cena2."</td>
			            
			           	   
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
            ?>
        </tbody>
    </table>
    
   
</div>
<div>
   
            
            
<h2>Wykres słupkowy cen w sklepie</h2>
<div class="contentWrap">
  <div class="chartWrap">
      <table class="chartTable">
        <tr><?php
    $sql5 = "SELECT cena FROM `produkty` ORDER BY `id_produktu`";
    $result5 = $db->query($sql5);
    if($result5) {
        foreach($result5 as $row){
			$popr=$row['cena']/100;
          echo "<th class=\"chartTableBars\"><div style=\"height: ".$popr."px;\" class=\"chartPingBar chartGreen\"><p>".$row['cena']."</p></div></th>";
                }
            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
            ?>
        </tr>
      </table>
  </div>
</div>
            
            
            
            
</div>
</body>
</html>