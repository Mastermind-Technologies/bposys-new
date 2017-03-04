<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetTitle("Zoning Clearance");

$pdf->Image('application/views/dashboard/bfp/dilg_logo.png',19,3,35,33);
$y = $pdf->GetY();
$pdf->SetY($y-5);
$pdf->SetFont("Arial","","10");
$pdf->Cell(0,5,"Republic of the Philippines",0,0,"C");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(0,5,"Department of the Interior and Local Government",0,0,"C");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(0,5,"BUREAU OF FIRE PROTECTION",0,0,"C");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(0,5,"Region 4-A CALABARZON",0,0,"C");
$y = $pdf->GetY();
$pdf->SetXY(73,$y+5);
$pdf->Cell(20,5,"Province of",0,0,"C");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+45,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$pdf->SetFont("Arial","B","10");
$pdf->Cell(44,5,"Laguna",0,0,"C");
$pdf->SetFont("Arial","","10");

$y = $pdf->GetY();
$pdf->SetXY(76,$y+7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+37,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$pdf->SetFont("Arial","B","10");
$bcf = utf8_decode("Biñan City Fire");
$pdf->Cell(36,5,"$bcf",0,0,"C");
$pdf->SetFont("Arial","","10");
$pdf->Cell(24,5,"Fire Station",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(69,$y+7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+74,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$pdf->SetFont("Arial","B","10");
$pdf->Cell(73,5,"Tel Nos. (049) 511-9111",0,0,"C");
//
$y = $pdf->GetY();
$pdf->SetXY(10,$y+10);
$pdf->SetFont("Arial","B","11.5");
$pdf->Cell(20,5,"NUMBER:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+52,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$pdf->Cell(51,5,"",0,0,"C");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+12);
$pdf->SetFont("Arial","B","22");
$pdf->Cell(0,5,"FIRE SAFETY INSPECTION CERTIFICATE",0,0,"C");

$y = $pdf->GetY();
$pdf->SetXY(157,$y+13);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+42,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$dateHolder = date('M d Y');
$pdf->SetFont("Arial","B","10");
$pdf->Cell(41,5,"$dateHolder",0,0,"C");

$y = $pdf->GetY();
$pdf->SetXY(158,$y+4.5);
$pdf->SetFont("Arial","","10");
$pdf->Cell(41,5,"Date",0,0,"C");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+8);
$pdf->SetFont("Arial","B","11.5");
$pdf->Cell(41,5,"TO WHOM IT MAY CONCERN:",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(23.5  ,$y+8);
$pdf->SetFont("Arial","","11.5");
$pdf->Write(5,"By  virtue  of  the  provisions  of  Republic  Act  No.  9514,  otherwise  known  as  the  Fire  Code  of   the   Philippines   of   2008   the   application   for   FIRE   SAFETY   INSPECTION   CERTIFICATE  of    ");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+4,$x+119,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$businessName = utf8_decode($application->get_businessName());
$pdf->Cell(118,5,"$businessName",0,0,"C");
$pdf->Write(5,"    owned    and    managed    by");

$y = $pdf->GetY();
$pdf->SetXY(50,$y+5);
$pdf->Cell(40,5,"(Name of Establishment)",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+8);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.5,$x+72,$y+3.5);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$nameOfOwner = utf8_decode($application->get_firstName() ." ". $application->get_middleName() ." ". $application->get_lastName());
$pdf->Cell(71,5,"$nameOfOwner",0,0,"C");
$pdf->Write(5,"with  postal  address  at ");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+4,$x+72,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$address = utf8_decode($application->get_barangay() ." ". $application->get_cityMunicipality());
$pdf->Cell(71,5,"$address",0,0,"C");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+4.4);
$pdf->Cell(71,5,"(Name of Owner/Representative)",0,0,"C");

$x = $pdf->GetX();
$pdf->SetX($x+47);
$pdf->Cell(71,5,"(Location of Establishment)",0,0,"C");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+7);
$pdf->Write(5,"is hereby granted this FIRE SAFETY INSPECTION CERTIFICATE after said building or occupancy has been duly inspected for fire safety with the finding that it has substantially complied with the fire safety and protection requirements of the Fire Code of the Philippines of 2008 and its Implementing Rules and Regulations.");

$y = $pdf->GetY();
$pdf->SetXY(20,$y+8);
$pdf->Write(5,"This certificate is issued on condition that all Fire Code provisions now adopted, or shall thereafter be adopted, shall continue to be complied with.");

$y = $pdf->GetY();
$pdf->SetXY(20,$y+8);
$pdf->Write(5,"This certification is valid for ");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+4,$x+128,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$validDate = date('d M');
$vdYear = date('Y')+1;
$certificationFor = "BUSINESS PERMIT (Valid until $validDate $vdYear)";
$pdf->Cell(127,5,"$certificationFor",0,0,"C");
$y = $pdf->GetY();
$pdf->SetXY(71,$y+5);
$pdf->Cell(126,5,"(state if for application of occupancy permit & business permit)",0,0,"C");

$y = $pdf->GetY();
$pdf->SetXY(20,$y+8);
$pdf->Write(5,"Violation of Fire Code provisions shall ipso facto cause this certificate null and void, and shall hold the owner of the building liable to the penalties provided for by the said Fire Code. ");

$y = $pdf->GetY();
$pdf->SetXY(109,$y+10);
$pdf->SetFont("Arial","B","11.5");
$pdf->Write(5,"RECOMMEND APPROVAL:");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+5);
$pdf->SetFont("Arial","","11.5");
$pdf->Write(5,"Fire Code Fees:");
$y = $pdf->GetY();
$pdf->SetXY(10,$y+7);
$pdf->Write(5,"Amount Paid: ");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+4,$x+31,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$pdf->Cell(71,5,"",0,0,"C");
$y = $pdf->GetY();
$pdf->SetXY(10,$y+7);
$pdf->Write(5,"O.R. Number: ");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+4,$x+30.5,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$pdf->Cell(71,5,"",0,0,"C");
$y = $pdf->GetY();
$pdf->SetXY(10,$y+7);
$pdf->SetFont("Arial","","11.5");
$pdf->Write(5,"Date: ");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+4,$x+45.6,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$pdf->Cell(44.6,5,"$dateHolder",0,0,"C");

//
$x = 109;
$y = 208;
$pdf->SetXY($x,$y);
$pdf->Line($x+1,$y+4,$x+88,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+6.5,$y-.5);
$pdf->SetFont("Arial","B","10");
$pdf->Write(5,"FO3 Noel John B. Canotaje, BFP");
$pdf->SetFont("Arial","","11.5");
$pdf->SetXY($x+27,$y+5);
$pdf->Write(5,"CHIEF, FSES");
$y = $pdf->GetY();
$pdf->SetXY($x,$y+8);
$pdf->SetFont("Arial","B","11.5");
$pdf->Write(5,"APPROVED:");
$pdf->SetXY($x,$y+20);
$y = $pdf->GetY();
$pdf->Line($x+1,$y+4,$x+88,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+13,$y-.5);
$pdf->SetFont("Arial","B","10");
$pdf->Write(5,"FSI JEFFREY M. ATIENZA, BFP");
$pdf->SetFont("Arial","","11.5");
$y = $pdf->GetY();
$pdf->SetXY($x+6.5,$y+4.5);
$pdf->SetFont("Arial","","11.5");
$pdf->Write(5,"CITY/MUNICIPAL FIRE MARSHAL");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+8);
$pdf->SetFont("Arial","BI","11.5");
$pdf->Write(5,"Note");
$pdf->SetFont("Arial","I","10");
$pdf->Write(5,":This Certificate does not take the place of any license required by law and is not transferable. Any change in the use of occupancy of the premises shall require a new certificate. ");

$y = $pdf->GetY();
$pdf->SetXY(56,$y+10);
$pdf->SetFont("Times","B","15");
$pdf->Cell(0,5,'"FIRE SAFETY IS OUR MAIN CONCERN"');

$y = $pdf->GetY();
$pdf->SetXY(10,$y+5.9);
$pdf->Cell(50,10,"",1,0,"C");
$pdf->SetXY(10,$y+6);
$pdf->SetFont("Arial","","7");
$pdf->Write(5,"Original (Applicant/Owner's Copy)");
$y = $pdf->GetY();
$pdf->SetXY(10,$y+2.9);
$pdf->Write(5,"Duplicate (BO/BPLO, as the case may be)");
$y = $pdf->GetY();
$pdf->SetXY(10,$y+2.9);
$pdf->Write(5,"Triplicate (BFP copy)");

$pdf->SetXY(71,266);
$pdf->SetFont("Arial","","10.5");
$pdf->MultiCell(125,3.6,'"PAALALA: MAHIGPIT NA IPINAGBABAWAL NG PAMUNUAN NG BUREAU OF FIRE PROTECTION SA MGA KAWANI NITO ANG MAGBENTA O MAGREKOMENDA NG ANUMBANG BRAND NG FIRE"',0,"L");
//
$refNum = $this->encryption->decrypt($application->get_referenceNum());
$title = "fire-inspection-certificate";
$fileName = "$title-$dateHolder-$refNum";
$pdf->Output('I',$fileName);
 ?>
