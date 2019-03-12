<?php

SESSION_START();
if (!isset($_SESSION['logged_id'])) 
{
	header('Location: logowanie.php');
	exit();
}

	$id = $_SESSION['id_uzytkownika'];
	$path = "../../admin/uploads/$id";//foler gdzie będzie plik
	if (!file_exists($path)) 
	{
		mkdir($path, 0777, true);
	}
		



$target_dir = "../../admin/uploads/$id/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$file_name = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) 
	{
        $uploadOk = 1;
    } else {
       $_SESSION['e_upload'] = 'Wgraj poprawny plik!';
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "taki plik już istnieje";
    $uploadOk = 0;
}
// Check file size
//if ($_FILES["fileToUpload"]["size"] > 500000) {
  //  echo "Sorry, your file is too large.";
  //  $uploadOk = 0;
//}
// Allow certain file formats
if($imageFileType != "pdf" ) {
    echo "tylko format pdf";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		header('Location: zamowienia_uzytkownika.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>