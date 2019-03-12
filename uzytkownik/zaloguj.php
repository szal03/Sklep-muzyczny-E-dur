<?php 

	SESSION_START();
	
	require_once '../polaczenie/database.php';

if (!isset($_SESSION['logged_id'])) {

	if (isset($_POST['username'])) {
		
		$login = filter_input(INPUT_POST, 'username');
		$password = filter_input(INPUT_POST, 'password');
		
		//echo $login . " " .$password;
		
		$userQuery = $db->prepare('SELECT id_uzytkownika, login, haslo, imie, nazwisko, email, adres FROM uzytkownicy WHERE login = :login');
		$userQuery->bindValue(':login', $login, PDO::PARAM_STR);
		$userQuery->execute();
		
		//echo $userQuery->rowCount();
		
		$user = $userQuery->fetch();
		
		//echo $user['id'] . " " . $user['password'];
		
		if ($user && password_verify($password, $user['haslo'])) {
			
			
			$_SESSION['logged_id'] = $user['id_uzytkownika'];
			//$id1=$user['id_uzytkownika'];
			//$q2=$db->prepare('SELECT * FROM uzytkownicy WHERE id_uzytkownika= :id1');
			//$q2->bindValue(':id1', $id1, PDO::)
			
			
			$_SESSION['id_uzytkownika']=$user['id_uzytkownika'];
			$imie=$user['imie'];
			$_SESSION['haslo']=$user['haslo'];
			
			$_SESSION['login']=$user['login'];
			
			$_SESSION['imie']=$user['imie'];
			$_SESSION['email']=$user['email'];
			$_SESSION['nazwisko']=$user['nazwisko'];
			$_SESSION['adres']=$user['adres'];
			
			unset($_SESSION['bad_attempt']);
			
			header('Location: konto/stronaUzytkownika.php');
		} else {
			$_SESSION['bad_attempt'] = true;
			header('Location: logowanie.php');
			exit();
		}
			
	} else {
		
		header('Location: logowanie.php');
		exit();
	}
}

//$usersQuery = $db->query('SELECT * FROM uzytkownicy');
//$users = $usersQuery->fetchAll();

//print_r($users);

?>
	
