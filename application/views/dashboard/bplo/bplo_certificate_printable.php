<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();


$pdf->AddPage();
$pdf->SetTitle("BPLO Certificate");

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Image('application/views/dashboard/bplo/Business_permit_certificate.jpg',$x-6,$y-6,200,289);

$type = $application->get_applicationType();
if($type == 'Renew')
{
  $pdf->SetXY(163,100);
  $pdf->SetFont("ZapfDingbats","B","12");
  $pdf->Cell(10,5,"4",0,0,"C");
}
else if($type == "New")
{
  $pdf->SetXY(163,91.5);
  $pdf->SetFont("ZapfDingbats","B","12");
  $pdf->Cell(10,5,"4",0,0,"C");
}



$pdf->SetXY(47,99.5);
$pdf->SetFont("Arial","B","12");
$appID = $this->encryption->decrypt($application->get_applicationId());
$pdf->Cell(26,5,"$appID",0,0,"C");
  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $pdf->SetXY($x-10,$y+14.5);
  $businessName = utf8_decode($application->get_businessName());
$pdf->Cell(70,5,"$businessName",0,0,"C");
  $y = $pdf->GetY();
  $pdf->SetXY($x-10,$y+19.5);
  // $application->get_bldgName() ." ". $application->get_houseBldgNum() ." ". $application->get_unitNum() ." ".  $application->get_street() ." ". $application->get_Subdivision() ." ".
  $busimessAddress =utf8_decode($application->get_barangay() ." ". $application->get_cityMunicipality() ." ". $application->get_province());
  $tempBusiAdd = "Daisy St. South City Homes Binyan, Laguna";
$pdf->Cell(70,5,"$tempBusiAdd",0,0,"C");
  $y = $pdf->GetY();
  $pdf->SetXY($x-10,$y+19.5);
  $applicantName = utf8_decode($application->get_FirstName() ." ". $application->get_MiddleName() ." ". $application->get_LastName());
$pdf->Cell(70,5,"$applicantName",0,0,"C");
  $y = $pdf->GetY();
  $pdf->SetXY($x-10,$y+18.5);
  $natureOfBusiness = $application->get_LineOfBusiness();
$pdf->Cell(70,5,"$natureOfBusiness",0,0,"C");
  $y = $pdf->GetY();
  $pdf->SetXY($x+7,$y+33);
$pdf->Cell(17,5,"2017",0,0,"C");
  $y = $pdf->GetY();
  $pdf->SetXY($x+19,$y+6);
  $pdf->SetFont("Arial","B","9");
$pdf->Cell(9,5,"10",0,0,"C");
  $y = $pdf->GetY();
  $pdf->SetXY($x+39.5,$y);
$pdf->Cell(20,5,"February",0,0,"C");

//
// $pdf->SetFont("Arial","","10");
  $y = $pdf->GetY();
  $pdf->SetXY($x+32.5,$y+6.4);
$pdf->Cell(30,5,"Paid under O.R.",0,0,"C");
  $y = $pdf->GetY();
  $pdf->SetXY($x+32.5,$y+5.1);
$pdf->Cell(30,5,"February 10, 2017",0,0,"C");
  $y = $pdf->GetY();
  $pdf->SetXY($x+32.5,$y+5);
$pdf->Cell(30,5,"P 1,000,000.00",0,0,"C");
$pdf->Output();
 ?>
