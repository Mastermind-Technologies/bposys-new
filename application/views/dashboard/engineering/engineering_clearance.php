<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetTitle("Engineering Clearance");

$pdf->image('application/views/dashboard/engineering/binan_city_seal.png',42,58,128,105);
$pdf->SetFont("Times","I","7");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(0,5,"CEO-006-0",0,0,"R");

//
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->SetFont("Times","I","11");
$pdf->Cell(0,5,"Republic of the Philippines",0,0,"C");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(0,5,"Province of Laguna",0,0,"C");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$enye = utf8_decode("Biñan");
$pdf->Cell(0,5,"City of $enye",0,0,"C");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(0,5,"Office of the Building Official",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+18);
$pdf->SetFont("Times","B","26");
$pdf->Cell(0,5,"ENGINEERING CLEARANCE",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+18);
$pdf->SetFont("Times","","11");
$pdf->Cell(45,5,"CONTROL NUMBER:",0,0,"L");
$pdf->Cell(45,5,"",0,0,"L");
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(45,5,"APPLICANT STATUS:",0,0,"L");
$applicationStatus = $application->get_applicationType();
$pdf->Cell(45,5,"$applicationStatus",0,0,"L");
$y = $pdf->GetY();
$pdf->SetY($y+15);
$pdf->Cell(45,5,"BUSINESS NAME:",0,0,"L");
$pdf->SetFont("Times","B","16");
$businessName = utf8_decode($application->get_businessName());
$pdf->Cell(45,5,"$businessName",0,0,"L");
$pdf->SetFont("Times","","11");
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(45,5,"OWNER NAME:",0,0,"L");
$pdf->SetFont("Times","B","16");
$ownerName = utf8_decode($application->get_firstName() ." ". $application->get_middleName() ." ". $application->get_lastName());
$pdf->Cell(45,5,"$ownerName",0,0,"L");
$pdf->SetFont("Times","","11");
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(45,5,"BUSINESS LINE:",0,0,"L");
$businessLine = $application->get_LineOfBusiness();
$pdf->Cell(45,5,"$businessLine",0,0,"L");
$y = $pdf->GetY();
$pdf->SetY($y+8);
$pdf->Cell(45,5,"BUSINESS ADDRESS:",0,0,"L");

$address = utf8_decode($application->get_bldgName() . " " . $application->get_houseBldgNum() . " " . $application->get_unitNum() . " " . $application->get_street() . " " . $application->get_Subdivision() . " " . $application->get_barangay() . " " . $application->get_cityMunicipality() . " " . $application->get_province());
$pdf->MultiCell(100,5,"$address",0,"L");
$y = $pdf->GetY();
$pdf->SetY($y+8);
$pdf->Cell(45,5,"DATE ISSUED:",0,0,"L");
$dateHolder = date('M d Y');
$pdf->Cell(45,5,"$dateHolder",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(28,$y+20);
$pdf->Cell(25,5,"Noted by:",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(50,$y+20);
$pdf->SetFont("Times","B","16");
$pdf->Cell(101,5,"ENGR. WILFREDO F. ALINTANAHIN",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(50,$y+5);
$pdf->SetFont("Times","","11");
$pdf->Cell(101,5,"City Engineer/ Building Official",0,0,"C");

$refNum = $this->encryption->decrypt($application->get_referenceNum());
$title = "engineering-clearance";
$fileName = "$title-$dateHolder-$refNum";
$pdf->Output('I',$fileName);
 ?>
