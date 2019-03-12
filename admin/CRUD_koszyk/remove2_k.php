<?php 
 
require_once '../../polaczenie/database.php';
 
if($_POST) 
{
    $id_k = $_POST['id'];
 
	
	$userQuery1 = $db->prepare('DELETE FROM koszyk WHERE id_koszyka = :id2');
	$userQuery1->bindValue(':id2', $id_k, PDO::PARAM_STR);
	$userQuery1->execute();
	
	$data = $userQuery1->fetch();
 
 
    
	
    
        echo "<p>Successfully removed!!</p>";
        echo "<a href='../index_k.php'><button type='button'>Back</button></a>";
    
 
   
}
 
?>