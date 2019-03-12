<?php

SESSION_START();
if (!isset($_SESSION['logged_id'])) 
{
	header('Location: logowanie.php');
	exit();
}
	
require('../tfpdf/tfpdf.php');

		
$pdf = new tFPDF();
$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);

// Load a UTF-8 string from a file and print it



// Select a standard font (uses windows-1252)
$pdf->SetFont('DejaVu','',14);
$pdf->Ln(10);
$pdf->Write(5,'Sklep muzyczny E-dur');
$pdf->Ln(15);
$pdf->Write(5,'Zamowienie użytkownika: ');

if($_POST) 
	{
		$id_k = $_POST['id_k'];
		$id_u = $_POST['id_u'];
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		$adres = $_POST['adres'];
		$id_p = $_POST['id_p'];
		$email = $_POST['email'];
		$sum = $_POST['suma'];
		
		
		$pdf->Write(5,$imie);
		$pdf->Write(5,' ');
		$pdf->Write(5, $nazwisko);
		$pdf->Write(5,' ');
		$pdf->Write(5,'id: ');
		$pdf->Write(5, $id_u);
		
		$pdf->Ln(10);
		$pdf->Write(5, 'dane uzytkownika: ');
		$pdf->Ln(10);
		$pdf->Write(5, $adres);
		$pdf->Ln(10);
		$pdf->Write(5, $email);
		$pdf->Ln(10);
		$pdf->Write(5, 'dane zamowienia: ');
		$pdf->Write(5, 'id koszyka: ');
		$pdf->Write(5, $id_k);
		$pdf->Ln(10);
		$pdf->Write(5, 'suma zamowienia: ');
		$pdf->Write(5, $sum);
		$pdf->Write(5, ' złotych');
		
	}


header("Content-Type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=generuj_pdf.pdf"); 
$pdf->Output();


?>