<?php 
 
require_once '../../polaczenie/database.php';

 
if($_GET['id']) 
{
    $id = $_GET['id'];
	
 
   // $sql = "SELECT * FROM `uzytkownicy` WHERE `id_uzytkownika` = '$id'";
	
	$userQuery1 = $db->prepare('SELECT * FROM zamowienia WHERE id_zamowienia = :id2');
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
    <legend>Edit Member</legend>
 
    <form action="update_z.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>id_uzytkownika</th>
                <td><input type="text" name="id_uzytkownika_z_u" value="<?php echo $data['id_uzytkownika']?>"/></td>
            </tr>     
            <tr>
                <th>id_produktu</th>
                <td><input type="text" name="id_produktu_z_u"  value="<?php echo $data['id_produktu']?>"/></td>
            </tr>
            <tr>
                <th>data</th>
                <td><input type="text" name="data_z_u" value="<?php echo $data['data']?>"/></td>
            </tr>
          
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['id_zamowienia']?>"  />
				
                <td><button type="submit">Save Changes</button></td>
                <td><a href="../index_z.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>

 <?php
}
 ?>