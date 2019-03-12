<?php 
 
require_once '../../polaczenie/database.php';
 
if($_GET['id']) 
{
    $id = $_GET['id'];
	
	$userQuery1 = $db->prepare('SELECT * FROM zamowienia WHERE id_zamowienia = :id2');
	$userQuery1->bindValue(':id2', $id, PDO::PARAM_STR);
	$userQuery1->execute();
	
	$data = $userQuery1->fetch();
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Remove Order</title>
</head>
<body>
 
<h3>Do you really want to remove ?</h3>
<form action="remove2_z.php" method="post">
 
    <input type="hidden" name="id" value="<?php echo $data['id_zamowienia'] ?>" />
    <button type="submit">Save Changes</button>
    <a href="../index_z.php"><button type="button">Back</button></a>
</form>
 
</body>
</html>
 
