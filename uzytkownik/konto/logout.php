<?php
	
	SESSION_START();
	
	unset($_SESSION['logged_id']);
	header('Location: ../logowanie.php');


?>