<?php 
require_once '../../polaczenie/database.php';
 
if($_POST) 
{
    $id = $_POST['id'];
 
	
	$userQuery1 = $db->prepare('DELETE FROM zamowienia WHERE id_zamowienia = :id2');
	$userQuery1->bindValue(':id2', $id, PDO::PARAM_STR);
	$userQuery1->execute();
	
	
        echo "<p>Successfully removed!!</p>";
        echo "<a href='../index_z.php'><button type='button'>Back</button></a>";
  
 
    
}
 
?>