<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetTitle("Environmental Clearance");

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont("Arial","B","11.5");
$pdf->Text($x+5,$y-5,"#####-006-0");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetY($y-4);
$pdf->Cell(0,5,"Republic of the Philippines",0,1,"C");
$pdf->Cell(0,5,"Province of Laguna",0,1,"C");
$pdf->Cell(0,5,"City of Binan",0,1,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+3);
$pdf->SetFont("Times","B","14.5");
$pdf->Cell(0,5,"CITY ENVIRONMENT AND NATURAL RESOURCES OFFICE",0,1,"C");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Image('application/views/dashboard/cenro/environmental_clearance.png',$x+32,$y+6,130,6.5);

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y+20);
$pdf->SetFont("Arial","B","10.5");
$pdf->Cell(0,5,"Issued to",0,1,"C");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+15,$y+20);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+4.3,$x+160,$y+4.3);
$x = $pdf->GetX();
$pdf->SetXY($x-1,$y-.5);
$pdf->SetFont("Arial","","10.5");
$registeredName = utf8_decode($application->get_firstName() ." ". $application->get_middleName() ." ". $application->get_lastName());
$pdf->Cell(159,5,"$registeredName",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+6);
$pdf->SetFont("Arial","B","10.5");
$pdf->Cell(0,5,"(Registered Name)",0,1,"C");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y+20);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+4.3,$x+90,$y+4.3);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.5);
$pdf->SetFont("Arial","","10.5");
 $establishmentType = $application->get_zoneType();
$pdf->Cell(90,5,"$establishmentType",0,0,"C");
$pdf->Text($x+24.7,$y+9,"(Type of Establishment)");
//
$pdf->SetX(110);
$x = $pdf->GetX();
$pdf->Line($x,$y+4.3,$x+90,$y+4.3);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.5);
//Sample data
$address = utf8_decode($application->get_barangay() ." ". "Biñan, Laguna");
$pdf->Cell(90,5,"$address",0,0,"C");
$pdf->Text($x+24.7,$y+9,"Address");

//
$y = $pdf->GetY();
$pdf->SetXY(10,$y+20);
$ecNumber = $this->encryption->decrypt($application->get_applicationId());
$pdf->Cell(17,5,"EC No.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+50,$y+3.3);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-1.5);
$pdf->SetFont("Arial","","10.5");
$pdf->Cell(50,5,"$ecNumber",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetXY(11,$y+10);
$pdf->Cell(23,5,"Date Issued",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+43,$y+3.3);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-1.5);
$dateHolder = date('M d Y');
$pdf->SetFont("Arial","","10.5");
$pdf->Cell(43,5,"$dateHolder",0,0,"C");

//
//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+34,$y+1.5);
$pdf->Cell(39,5,"Date of Expiration",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+50,$y+3.3);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-1.5);
$pdf->SetFont("Arial","","10.5");
$expYear = date('Y');
$expDate = "December 31,";
$pdf->Cell(50,5,"$expDate $expYear",0,0,"C");

//
$pdf->SetY($y+5);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Text($x,$y+8,"This Clearance is granted in compliance to national and local environmental clearance laws, rules and regulations.");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+70,$y+20);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+50,$y+3.3);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont("Times","B","14.5");
$pdf->Text($x+4,$y+7.5,"RODELIO V. LEE");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont("Times","B","13.5");
$pdf->Text($x+13,$y+11.5,"City ENRO");

$referenceNumber = $this->encryption->decrypt($application->get_referenceNum());
$title = "environmental-clearance";
$fileName = "$title-$dateHolder-$referenceNumber";
$pdf->Output('I',$fileName);
 ?>
