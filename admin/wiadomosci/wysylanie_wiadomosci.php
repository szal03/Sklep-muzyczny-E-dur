<?php


if($_POST)
{
	if(isset($_POST['email']) && isset($_POST['temat_wiadomosc']) && isset($_POST['wiadomosc']))
	{
		$d=date('d-m-Y');
		$t=$_POST['temat_wiadomosc'];
		$tytul_wiadomosci=$t.$d;
		
		$zawartosc=$_POST['email'].'-'.$_POST['temat_wiadomosc'].'-'.$_POST['wiadomosc'];
		$x = 'message-'.$d.'-'.$t.'.txt';
		$y=fopen($x,"a+");
		fwrite($y,$zawartosc);
		fclose($y);
		
		
		
		header('Location: ../../kontakt.php');
		exit();
	}
	
}






?>