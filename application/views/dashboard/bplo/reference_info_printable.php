<?php
require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetTitle("Reference Information");

$referenceNumber = $this->encryption->decrypt($application->get_referenceNum());
$businessName = utf8_decode($application->get_businessName());
$nameOfOwner = utf8_decode($application->get_firstName() . " " . $application->get_middleName() . " " . $application->get_lastName());
$datePrinted = new DateTime('now');
$dateHolder = date('M d Y');
//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Image('application/views/dashboard/bplo/ref_bg.jpg',$x-10,$y-10,90,67);
// $pdf->Rect(10,10,90,67);

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont("Arial","B","30");
$pdf->Text($x-6,$y+21.5,"$referenceNumber");

$pdf->SetFont("Arial","","14");
$pdf->Text($x+21,$y+35,"$businessName");
$pdf->Text($x+7,$y+42.6,"$nameOfOwner");
$pdf->Text($x+17,$y+50.3,"$dateHolder");
$pdf->Output();
 ?>
