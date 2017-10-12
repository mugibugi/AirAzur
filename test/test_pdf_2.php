<?php
// permet d'inclure la bibliothèque fpdf
require('../fpdf/fpdf.php');

// instancie un objet de type FPDF qui permet de créer le PDF
$pdf=new FPDF();
// ajoute une page
$pdf->AddPage();
// définit la police courante
$pdf->SetFont('Arial','B',16);
// affiche du texte
$pdf->Cell(40,10,'Voici un Pdf !');
// Enfin, le document est terminé et envoyé au navigateur grâce à Output().
$pdf->Image('../images/avion.jpg',10,10, 64, 48);
$pdf->Cell(40,10,'Allah Akbar');
//$pdf->Ln();
//$pdf->Cell(40,10,'je vends une fiat punto a 200 euros tout equiper');
$pdf->Output();
?>