<?php

require('fpdf/fpdf.php');
function  creerPdfReservation($reservation){
       
             
        // permet d'inclure la bibliothèque fpdf
        

        ob_get_clean();
      
        // instancie un objet de type FPDF qui permet de créer le PDF
        $pdf=new FPDF();
        // ajoute une page
        $pdf->AddPage();
        // définit la police courante
        $pdf->SetFont('Arial','B',16);
        // affiche du texte
        $pdf->Image('images/avion.jpg',10,10, 64, 48);    
        $pdf->Cell(40,10,'air azur');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(40,10, $reservation['nomClient']);
        $pdf->Ln();
        $pdf->Cell(40,10, $reservation['prenomClient']);
        $pdf->Ln();
        $pdf->Cell(40,10, $reservation['adresse']);
        $pdf->Ln();
        $pdf->Cell(40,10, $reservation['mail']);

        // Enfin, le document est terminé et envoyé au navigateur grâce à Output().
        $pdf->Output();
        include('vues/pdf_reservation.php');
}
?>