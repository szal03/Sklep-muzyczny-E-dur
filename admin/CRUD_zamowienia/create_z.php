<?php 

 
	if($_POST) 
	{
		$id_uzytkownika_z=$_POST['id_z_u_c'];
		$id_produktu_z = $_POST['id_z_p_c'];
		$data_z=$_POST['data_z_c'];
		
 
		//$sql = "INSERT INTO zamowienia VALUES (NULL, '$id_uzytkownika_z', '$id_produktu_z', '$data_z')";
	
		
		require_once '../../polaczenie/database.php';

		
				
				$result5=$db->prepare("INSERT INTO zamowienia (id_uzytkownika, id_produktu, data) VALUES (:id_uzytkownik,:id_produkt,:data)"); //!!!!!!
					//$result5->bindParam("sssss",$username,$passwordhash,$name,$surname,$email);
				$result5->bindParam(':id_uzytkownik',$id_uzytkownika_z);
				$result5->bindParam(':id_produkt',$id_produktu_z);
				$result5->bindParam(':data',$data_z);
				
				//$result5->bindParam(':adres',$obrazki);
				$result5->execute();
				
				
				
					
					echo "<p>New Record Successfully Created</p>";
				
					echo "<a href='../index_z.php'><button type='button'>Back</button></a>";
					
					
					echo "<a href='../CRUD_koszyk/create_k2.php'><button type='button'>koszyk</button></a>";
					
			//tworzenie koszyka
				
				
	}
 
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Add Order</title>
 
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
    <legend>Add Product</legend>
    <form  method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>id_uzytkownika</th>
                <td><input type="text" name="id_z_u_c" /></td>
            </tr>     
            <tr>
                <th>id_produktu</th>
                <td><input type="text" name="id_z_p_c" /></td>
            </tr>
            <tr>
                <th>data</th>
                <td><input type="text" name="data_z_c"/></td>
            </tr>
            <tr>
                <td><button type="submit">Save Changes</button></td>
				
                <td><a href="../index_z.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
	 
 
</fieldset>
 
</body>
</html>