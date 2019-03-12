<?php
require_once '../../polaczenie/database.php';
 
if($_GET['id']) 
{
    $id = $_GET['id'];
	
	$userQuery1 = $db->prepare('SELECT * FROM produkty WHERE id_produktu = :id2');
	$userQuery1->bindValue(':id2', $id, PDO::PARAM_STR);
	$userQuery1->execute();
	
	$data = $userQuery1->fetch();
}


?>
 
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a Product</h3>
                    </div>
                     
                    <div class="form-horizontal" >
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
							</tr>
						</thead>
						 <tbody>
						 <?php
						  echo "<tr>
                        <td>".$data['id_produktu']."</td>
                        <td>".$data['kategoria']."</td>
                        <td>".$data['podkategoria']."</td>
						<td>".$data['nazwa_produktu']."</td>
						<td>".$data['producent']."</td>
						<td>".$data['cena']."</td>
						<td>".$data['obrazki']."</td>
					   
                    </tr>";
						 
						 
						 ?>

						 </tbody>
					
					
                        <div class="form-actions">
                          <a class="btn" href="../index_p.php">Back</a>
						</div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
