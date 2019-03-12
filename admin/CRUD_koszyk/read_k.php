<?php

	
require_once '../../polaczenie/database.php';
 
if($_GET['id']) 
{
    $id = $_GET['id'];
	
	$userQuery1 = $db->prepare('SELECT * FROM koszyk WHERE id_koszyka = :id2');
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
                        <h3>Read a Customer</h3>
                    </div>
                     
                    <div class="form-horizontal" >
					<table border="1" cellspacing="0" cellpadding="0">
						<thead>
							<tr>
							 <th>id_koszyka</th>
							<th>id_uzytkownika</th>
							<th>suma</th>
							
							</tr>
						</thead>
						 <tbody>
						 <?php
						  echo "<tr>
                         <td>".$data['id_koszyka']."</td>
                        <td>".$data['id_uzytkownika']."</td>
                        <td>".$data['suma']."</td>
					   
                    </tr>";
						 
						 
						 ?>

						 </tbody>
					
					
                        <div class="form-actions">
                          <a class="btn" href="../index_k.php">Back</a>
						</div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
