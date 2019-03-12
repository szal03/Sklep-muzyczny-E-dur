<?php 
 
require_once '../../polaczenie/database.php';
 
if($_GET['id']) 
{
    $id_k = $_GET['id'];
	
	$userQuery1 = $db->prepare('SELECT * FROM koszyk WHERE id_koszyka = :id2');
	$userQuery1->bindValue(':id2', $id_k, PDO::PARAM_STR);
	$userQuery1->execute();
	
	$data = $userQuery1->fetch();
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Remove</title>
</head>
<body>
 
<h3>Do you really want to remove ?</h3>
<form action="remove2_k.php" method="post">
 
    <input type="hidden" name="id" value="<?php echo $data['id_koszyka'] ?>" />
    <button type="submit">Save Changes</button>
    <a href="../index_k.php"><button type="button">Back</button></a>
</form>
 
</body>
</html>
 
