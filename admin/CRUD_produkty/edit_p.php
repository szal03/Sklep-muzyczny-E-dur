<?php 
 
require_once '../../polaczenie/database.php';

 
if($_GET['id']) 
{
    $id = $_GET['id'];
	
 
   // $sql = "SELECT * FROM `uzytkownicy` WHERE `id_uzytkownika` = '$id'";
	
	$userQuery1 = $db->prepare('SELECT * FROM produkty WHERE id_produktu = :id2');
	$userQuery1->bindValue(':id2', $id, PDO::PARAM_STR);
	$userQuery1->execute();
	
	$data = $userQuery1->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
 
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
    <legend>Edit Product</legend>
 
    <form action="update_p.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>kategoria</th>
                <td><input type="text" name="kategoria_2" value="<?php echo $data['kategoria']?>"/></td>
            </tr>     
            <tr>
                <th>podkategoria</th>
                <td><input type="text" name="podkategoria_2"  value="<?php echo $data['podkategoria']?>"/></td>
            </tr>
            <tr>
                <th>nazwa produktu</th>
                <td><input type="text" name="nazwa_produktu_2" value="<?php echo $data['nazwa_produktu']?>"/></td>
            </tr>
            <tr>
                <th>producent</th>
                <td><input type="text" name="producent_2" value="<?php echo $data['producent']?>"/></td>
            </tr>
			 <tr>
                <th>cena</th>
                <td><input type="text" name="cena_2" value="<?php echo $data['cena']?>"/></td>
            </tr>
			 <tr>
                <th>obrazki</th>
                <td><input type="text" name="obrazki_2" value="<?php echo $data['obrazki']?>"/></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['id_produktu']?>"  />
				
                <td><button type="submit">Save Changes</button></td>
                <td><a href="../index_p.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>

 <?php
}
 ?>