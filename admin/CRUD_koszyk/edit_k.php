<?php 
 
require_once '../../polaczenie/database.php';

 
if($_GET['id']) 
{
    $id = $_GET['id'];
	
 
   // $sql = "SELECT * FROM `uzytkownicy` WHERE `id_uzytkownika` = '$id'";
	
	$userQuery1 = $db->prepare('SELECT * FROM koszyk WHERE id_koszyka = :id2');
	$userQuery1->bindValue(':id2', $id, PDO::PARAM_STR);
	$userQuery1->execute();
	
	$data = $userQuery1->fetch();
    

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Member</title>
 
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
        }
 
        table tr th {
            padding-top: 20px;
        }
    </style>
 
</head>
<body>
 
<fieldset>
    <legend>Edit</legend>
 
    <form action="update_k.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>id_uzytkownika</th>
                <td><input type="text" name="username_k" value="<?php echo $data['id_uzytkownika']?>"/></td>
            </tr>     
            <tr>
                <th>suma</th>
                <td><input type="text" name="suma_k"  value="<?php echo $data['suma']?>"/></td>
            </tr>
            
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['id_koszyka']?>"  />
				
                <td><button type="submit">Save Changes</button></td>
                <td><a href="../index_k.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>

 <?php
}
 ?>