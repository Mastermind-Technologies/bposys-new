<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetTitle("Sanitary Permit");

$pdf->Image('application/views/dashboard/cho/doh_logo.png',0,22,35,30);
$pdf->Image('application/views/dashboard/cho/binan_city_seal.jpg',173,22,27,30);
$pdf->SetFont("Arial","","7");
$pdf->Cell(0,5,"EHS Form No. 101",0,0,"R");
$pdf->SetFont("Times","B","9");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+18);
$x = $pdf->GetX();
$pdf->Cell(0,5,"REPUBLIC OF THE PHILIPPINES",0,0,"C");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(0,5,"DEPARTMENT OF HEALTH",0,0,"C");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(0,5,"FIELD OPERATIONS",0,0,"C");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(0,5,"REGIONAL HEALTH OFFICE NO. IV",0,0,"C");
$y = $pdf->GetY();
$pdf->SetY($y+5);

//
$pdf->SetFont("Times","B","13");
$pdf->Cell(0,5,"OFFICE OF THE CITY HEALTH OFFICER",0,0,"C");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetFont("Times","B","12");
$laguna = utf8_decode("BIÑAN");
$pdf->Cell(0,5,"CITY OF $laguna",0,0,"C");
$y = $pdf->GetY();
$pdf->SetXY($x+43.8,$y+10);

//
$pdf->SetFont("Times","B","17");
$pdf->Cell(102,10,"SANITARY PERMIT TO OPERATE",1,0,"C");
$pdf->SetFont("Times","","11");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+23);
$pdf->Cell(44,5,"Issued to,",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+124,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$pdf->SetFont("Times","B","13");
$ownerName = utf8_decode($application->get_firstName() ." ". $application->get_middleName() ." ". $application->get_lastName());
$pdf->Cell(123,5,"$ownerName",0,0,"C");
$pdf->SetFont("Times","I","11");
$pdf->Text(90,84,"(Registered Name)");

//
$pdf->SetFont("Times","","11");
$y = $pdf->GetY();
$pdf->SetXY(10,$y+20);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+168,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$establishmentType = $application->get_LineOfBusiness();
$pdf->SetFont("Times","B","13");
$pdf->Cell(167,5,"$establishmentType",0,0,"C");
$pdf->SetFont("Times","I","11");
$pdf->Text(87,104 ,"(Type of Establishment)");

//
$pdf->SetFont("Times","","11");
$y = $pdf->GetY();
$pdf->SetXY(10,$y+10);
$pdf->Cell(50,5,"Address:",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(10,$y+11.5);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+168,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$address = utf8_decode($application->get_bldgName() . " " . $application->get_houseBldgNum() . " " . $application->get_unitNum() . " " . $application->get_street() . " " . $application->get_Subdivision() . " " . $application->get_barangay() . " " . $application->get_cityMunicipality() . " " . $application->get_province());
$pdf->Cell(167,5,"$address",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(10,$y+10);
$pdf->Cell(36,5,"Sanitary Permit No.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+62,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$sanitaryPermitNum = $this->encryption->decrypt($application->get_applicationId());
$pdf->Cell(61,5,"$sanitaryPermitNum",0,0,"C");

$x = $pdf->GetX();
$pdf->SetX($x);
$pdf->Cell(24,5,", Date Issued",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+46,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$dateHolder = date('M d Y');
$pdf->Cell(45,5,"$dateHolder",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetXY(10,$y+10);
$pdf->Cell(34,5,"Date of Expiration:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+64,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);

$dateHolder = date('Y');
$expDate = "December 31," ." ". $dateHolder;
$pdf->Cell(63,5,"$expDate",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+18);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Text($x+2,$y,"This  permit  is  not  transferable  and  will  be  revoked  for  violation  of  the  Sanitary Rules, ");
$pdf->Text($x-9,$y+5,"Laws  or  Regulations  of  P.D.  522  &  P.D.  856  and  Pertinent  Local  Ordinances.");

//
$y = $pdf->GetY();
$pdf->SetXY(10,$y+20);
$pdf->SetFont("Arial","B","16");
$pdf->Cell(54,5,"Recommending Approval:",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+18);
$pdf->SetFont("Times","U","11");
$pdf->Cell(54,5,"JOSEPHINE T. ENDRINAL",0,0,"L");
$pdf->SetFont("Times","","10");
$y = $pdf->GetY();
$pdf->SetXY(18,$y+4);
$pdf->Cell(54,5,"Acting  Sanitary  Inspector  CHO-2",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+25);
$pdf->SetFont("Times","B","11");
$pdf->Cell(54,5,"Approved:",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(18,$y+20);
$pdf->SetFont("Times","U","11");
$pdf->Cell(54,5,"MIRABELLE M. BENJAMIN, MD, MPH",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(31,$y+6);
$pdf->SetFont("Times","","11");
$pdf->Cell(54,5,"City Health Officer",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+25);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont("Arial","","20");
$pdf->Text($x,$y,"(THIS MUST BE DISPLAYED WITHIN PUBLIC VIEW)");

$refNum = $this->encryption->decrypt($application->get_referenceNum());
$title = "sanitary-permit";
$fileName = "$title-$dateHolder-$refNum";
$pdf->Output('I',$fileName); ?>
