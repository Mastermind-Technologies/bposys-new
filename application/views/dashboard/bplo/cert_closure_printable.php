<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$referenceNumber = $this->encryption->decrypt($application->get_referenceNum());
$pdf->AddPage();
$pdf->SetTitle("Certificate of Closure");

$pdf->SetFont("Arial","","12");
$y = $pdf->GetY();
$pdf->SetY($y+20);
$pdf->Cell(0,5,"C E R T I F I C A T I O N",0,1,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+15);
$pdf->Cell(0,5,"TO WHOM IT MAY CONCERN:",0,1,"L");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+11,$y+15);
$pdf->Write(5,"This  is  to  certify that  ");

//
$businessName = utf8_decode($application->get_businessName());
$pdf->Write(5,"$businessName  ");

//
$ownerName =utf8_decode($application->get_firstName() ." ". $application->get_middleName() ." ". $application->get_lastName());
$pdf->Write(5,"owned  by  ");

//
$pdf->Write(5,"$ownerName  ");

//
$pdf->Write(5,"located  at  ");

//
$businessAddress = utf8_decode($application->get_barangay());
$binyan = utf8_decode("BIÑAN");
$pdf->Write(5,"$businessAddress,  $binyan,  LAGUNA  ");

//
$pdf->Write(5,"has RETIRE/CLOSE  its  Business Permit to this City Hall on ");

//
$dateHolder = date('M d Y');
$pdf->Write(5,"$dateHolder");

//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+15);
$pdf->Write(5,"This  certification  is  issued  upon  request  of  the  above  mentioned  establishment  for  whatever legal intent and purposes it may serve.");

//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+15);
$pdf->Write(5,"Issued this ");

//
$pdf->Write(5,"$dateHolder ");

//
$pdf->Write(5,"at CITY OF $binyan, LAGUNA.");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x-18,$y+30);
$pdf->MultiCell(50,5,"RENE C. MANABAT \tCHIEF, Business Permit & \tLicensing Office",0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+30);
$pdf->Cell(35,5,"O.R. No. ",0,0,"L");
$pdf->Cell(35,5,"__________",0,1,"L");
$pdf->Cell(35,5,"O.R. Date: ",0,0,"L");
$pdf->Cell(35,5,"__________",0,1,"L");
$pdf->Cell(35,5,"O.R. Amount ",0,0,"L");
$pdf->Cell(35,5,"__________",0,1,"L");

$referenceNumber = $this->encryption->decrypt($application->get_referenceNum());
$title = "certificate-of-closure";
$fileName = "$title-$dateHolder-$referenceNumber";
$pdf->Output('I',$fileName);
 ?>
