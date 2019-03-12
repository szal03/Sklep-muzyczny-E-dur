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
<html>
<head>
    <title>Remove Product</title>
</head>
<body>
 
<h3>Do you really want to remove ?</h3>
<form action="remove2_p.php" method="post">
 
    <input type="hidden" name="id" value="<?php echo $data['id_produktu'] ?>" />
    <button type="submit">Save Changes</button>
    <a href="index_p.php"><button type="button">Back</button></a>
</form>
 
</body>
</html>
 
