<?php 
 
require_once '../../polaczenie/database.php';
 
if($_POST) 
{
    $id = $_POST['id'];
 
	
	$userQuery1 = $db->prepare('DELETE FROM produkty WHERE id_produktu = :id2');
	$userQuery1->bindValue(':id2', $id, PDO::PARAM_STR);
	$userQuery1->execute();
	
	$data = $userQuery1->fetch();
 
        echo "<p>Successfully removed!!</p>";
        echo "<a href='../index_p.php'><button type='button'>Back</button></a>";
   
 
}
 
?>