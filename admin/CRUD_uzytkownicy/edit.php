<?php 
 
require_once '../../polaczenie/database.php';

 
if($_GET['id']) 
{
    $id = $_GET['id'];
	
 
   // $sql = "SELECT * FROM `uzytkownicy` WHERE `id_uzytkownika` = '$id'";
	
	$userQuery1 = $db->prepare('SELECT * FROM uzytkownicy WHERE id_uzytkownika = :id2');
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
 
    <form action="update.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>login</th>
                <td><input type="text" name="username_2" value="<?php echo $data['login']?>"/></td>
            </tr>     
            <tr>
                <th>hasło</th>
                <td><input type="password" name="password_2"  value="<?php echo $data['haslo']?>"/></td>
            </tr>
            <tr>
                <th>Imie</th>
                <td><input type="text" name="name_2" value="<?php echo $data['imie']?>"/></td>
            </tr>
            <tr>
                <th>Nazwisko</th>
                <td><input type="text" name="fname_2" value="<?php echo $data['nazwisko']?>"/></td>
            </tr>
			 <tr>
                <th>email</th>
                <td><input type="text" name="email_2" value="<?php echo $data['email']?>"/></td>
            </tr>
			 <tr>
                <th>adres</th>
                <td><input type="text" name="adress_2" value="<?php echo $data['adres']?>"/></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['id_uzytkownika']?>"  />
				
                <td><button type="submit">Save Changes</button></td>
                <td><a href="../index_a.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>

 <?php
}
 ?>