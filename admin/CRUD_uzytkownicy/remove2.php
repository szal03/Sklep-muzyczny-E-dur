<?php 
 
require_once '../../polaczenie/database.php';
 
if($_POST) 
{
    $id = $_POST['id'];
 
	
	$userQuery1 = $db->prepare('DELETE FROM uzytkownicy WHERE id_uzytkownika = :id2');
	$userQuery1->bindValue(':id2', $id, PDO::PARAM_STR);
	$userQuery1->execute();
	
	$data = $userQuery1->fetch();
 
 
    //$sql = "DELETE FROM `uzytkownicy` WHERE `id_uzytkownika` = '$id'";
	
    
        echo "<p>Successfully removed!!</p>";
        echo "<a href='../index_a.php'><button type='button'>Back</button></a>";
    
 
   
}
 
?>