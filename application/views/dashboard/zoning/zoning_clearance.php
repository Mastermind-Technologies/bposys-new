<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetTitle("Zoning Clearance");

$pdf->Image('application/views/dashboard/zoning/binan_city_seal.jpg',17,10,25,25);
$pdf->SetFont("Arial","","7");
$pdf->Cell(0,5,"CPDO-006-0",0,0,"R");

$y = $pdf->GetY();
$pdf->SetY($y+15);
$pdf->SetFont("Times","","10");
$pdf->Cell(0,5,"Province of Laguna",0,0,"C");
$pdf->SetFont("Times","B","11");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$laguna = utf8_decode("BIÑAN");
$pdf->Cell(0,5,"CITY OF $laguna",0,0,"C");
$pdf->SetFont("Times","","10");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(0,5,"CITY PLANNING & DEVELOPMENT OFFICE",0,0,"C");

//
$pdf->SetFont("Times","UB","15");
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(0,5,"ZONING CLEARANCE",0,0,"C");
$pdf->SetFont("Times","B","10");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(0,5,"(For Business Permit)",0,0,"C");

$y = $pdf->GetY();
$pdf->SetY($y+12);
$pdf->Cell(0,63,"",1,0,"C");
$pdf->SetXY(12,$y+23);
$pdf->SetFont("Times","","13");
$pdf->Cell(40,5,"BUSINESS NAME:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+143,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$businessName = utf8_decode($application->get_businessName());
$pdf->Cell(142,5,"$businessName",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(12,$y+10);
$pdf->Cell(60,5,"TYPE OF ESTABLISHMENT: ",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+123,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$establishmentType = $application->get_LineOfBusiness();
$pdf->Cell(122,5,"$establishmentType",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(12,$y+10);
$pdf->Cell(24,5,"ADDRESS: ",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+159,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$address = utf8_decode($application->get_bldgName() . " " . $application->get_houseBldgNum() . " " . $application->get_unitNum() . " " . $application->get_street() . " " . $application->get_Subdivision() . " " . $application->get_barangay() . " " . $application->get_cityMunicipality() . " " . $application->get_province());
$pdf->Cell(158,5,"$address",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(12,$y+10);
$pdf->Cell(48,5,"ZONING PERMIT NO.: ",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+50,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$zoningPermitNum = $this->encryption->decrypt($application->get_applicationId());
$pdf->Cell(49,5,"$zoningPermitNum",0,0,"L");
$pdf->Cell(33,5,"DATE ISSUED: ",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+52,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.5);
$dateHolder = date('M d Y');
$pdf->Cell(51,5,"$dateHolder",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(12,$y+10);
$pdf->Cell(26,5,"DECISION -",0,0,"L");
$pdf->SetFont("Times","B","13");
$pdf->Cell(48,5,"ZONING CLEARANCE GRANTED",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(22,$y+24);
$pdf->Cell(48,5,"CONDITIONS:",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(27,$y+10);
$pdf->SetFont("Zapfdingbats","","10");
$pdf->Cell(8,5,"4",0,0,"C");
$pdf->SetFont("Times","","11");
$pdf->MultiCell(150,5,"All  conditions  stipulated  herein  from  part  of  this  clearance  and  are  subject  to  monitoring;",0,"L");

$y = $pdf->GetY();
$pdf->SetXY(27,$y);
$pdf->SetFont("Zapfdingbats","","10");
$pdf->Cell(8,5,"4",0,0,"C");
$pdf->SetFont("Times","","11");
$pdf->Cell(150,5,"No  activity  other  than  applied  for  shall  be  conducted  within  the  project  site;",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(27,$y+5);
$pdf->SetFont("Zapfdingbats","","10");
$pdf->Cell(8,5,"4",0,0,"C");
$pdf->SetFont("Times","","11");
$pdf->MultiCell(150,5,"No  major  expansion,  alteration  and/or  improvement  shall  be  introduced  without  prior  clearance  from  this  Office;",0,"L");

$y = $pdf->GetY();
$pdf->SetXY(27,$y);
$pdf->SetFont("Zapfdingbats","","10");
$pdf->Cell(8,5,"4",0,0,"C");
$pdf->SetFont("Times","","11");
$pdf->MultiCell(150,5,"Any  misrepresentation,  false  statements  or  allegations  material  to  the  issuance  of  this  decision  shall  be  sufficient  cause  of  its  revocation.",0,"L");

$y = $pdf->GetY();
$pdf->SetXY(60,$y+35);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+92,$y+3.7);
$pdf->SetXY(66,$y+5);
$pdf->SetFont("Times","B","13");
$pdf->Cell(80,5,"ENGR. ROBERTO F. HERNANDEZ",0,0,"C");
$y = $pdf->GetY();
$pdf->SetXY(61,$y+5);
$pdf->SetFont("Times","B","11");
$pdf->Cell(90,5,"City Planning & Dev't Coordinator/Zoning Administrator",0,0,"C");

$y = $pdf->GetY();
$pdf->SetY($y+35);
$pdf->SetFont("Times","","11");
$pdf->Cell(0,5,"(This must be displayed within public view)",0,0,"C");

$refNum = $this->encryption->decrypt($application->get_referenceNum());
$title = "zoning-clearance";
$fileName = "$title-$dateHolder-$refNum";
$pdf->Output('I',$fileName);
 ?>
