<?php
require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetTitle("Fire Permit Form");

$pdf->SetFont("Arial","","7");
// $pdf->SetY(10);
$pdf->Cell(0,4,"Republic of the Philippines",0,1,"C");
$pdf->Cell(0,4,"Department of the Interior and Local Government",0,1,"C");
$pdf->SetFont("Arial","B","8");
$pdf->Cell(0,4,"BUREAU OF FIRE PROTECTION",0,1,"C");
$bc = utf8_decode("BIÑAN CITY FIRE STATION");
$pdf->Cell(0,4,"$bc",0,1,"C");
$pdf->SetFont("Arial","","7");
$bcl = utf8_decode("Brgy. Poblacion, Biñan City Laguna");
$pdf->Cell(0,4,"$bcl",0,1,"C");
$pdf->Cell(0,4,"Tel Nos: (049) 511-9111",0,1,"C");

//
$y = $pdf->GetY();
$pdf->SetXY(160,$y+8);
$pdf->Cell(5,5,"Date",0,0,"C");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+25,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.2);
$pdf->Cell(24,5,"",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+8);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(35,5,"SUBJECT",0,0,"L");
$pdf->SetFont("Arial","","7");
$pdf->Cell(16,5,": Inspection of",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+110,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.2);
$pdf->Cell(109,5,"",0,0,"C");
$y = $pdf->GetY();
$pdf->SetXY(55,$y+6);
$at = utf8_decode("At Biñan City, owned by");
$pdf->Cell(27,5,"$at",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+87,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.2);
$pdf->Cell(86,5,"",0,0,"C");
$y = $pdf->GetY();

//
$pdf->SetXY(20,$y+7);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(35,5,"FOR",0,0,"L");
$pdf->Cell(65,5,": CINSP ANTONIO O SOBEJANA IV, BFP",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(55,$y+3.5);
$pdf->SetFont("Arial","i","8");
$pdf->Cell(35,5,"City Fire Marshal",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(20,$y+7);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(35,5,"ATTN",0,0,"L");
$pdf->SetFont("Arial","","8");
$pdf->Cell(65,5,":C, FSES",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(20,$y+7);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(35,5,"REFERENCE:",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(20,$y+3.5);
$pdf->SetFont("Arial","","8");
$pdf->Cell(37,5,"INSPECTIONS ORDER NO:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+42,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.2);
$pdf->Cell(41,5,"",0,0,"C");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y+.2);
$pdf->Cell(21,5,"DATE ISSUED:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+24.5,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(25,5,"",0,0,"C");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x-1,$y+.2);
$pdf->Cell(37,5,"DATE OF INSPECTION:",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.7,$x+25,$y+3.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+1,$y-.2);
$pdf->Cell(24,5,"",0,0,"C");

//
// $y = $pdf->GetY();
$pdf->SetXY(19,98.001257);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(103,5,"NATURE OF INSPECTION CONDUCTED: {Check Appropriate Box}",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->SetFont("Arial","","7");
$x=$pdf->GetX();
$y=$pdf->GetY();

//Checkbox
$cb = 0;
$cblength = count($cb);
for($i=0;$i<$cblength;$i++)
{
  if($cb[$i] == 1)
  {
    $pdf->SetXY(20,102.7);
    $check = "4";
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(4, 3, $check,0, 0);
  }
  else if($cb[$i] == 2)
  {
    $pdf->SetXY(115,102.7);
    $check = "4";
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(4, 3, $check,0, 0);
  }
  else if($cb[$i] == 3)
  {
    $pdf->SetXY(20,106.7);
    $check = "4";
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(4, 3, $check,0, 0);
  }
  else if($cb[$i] == 4)
  {
    $pdf->SetXY(115,106.7);
    $check = "4";
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(4, 3, $check,0, 0);
  }
  else if($cb[$i] == 5)
  {
    $pdf->SetXY(20,110.7);
    $check = "4";
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(4, 3, $check,0, 0);
  }
  else if($cb[$i] == 6)
  {
    $pdf->SetXY(115,110.7);
    $check = "4";
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(4, 3, $check,0, 0);
  }
  else if($cb[$i] == 7)
  {
    $pdf->SetXY(20,114.7);
    $check = "4";
    $pdf->SetFont('ZapfDingbats','', 10);
    $pdf->Cell(4, 3, $check,0, 0);
  }
}

//
$pdf->SetFont("Arial","","7");
$pdf->SetXY(20,102.00125);
$pdf->Cell(95,5,"[  ] Building under Construction",0,0,"L");
  // $pdf->SetXY(20.7,$y+5.2);
  // $pdf->Cell(4,3,"S",1,0,"L");
  $pdf->SetXY(115,102.00125);
$pdf->Cell(75,5,"[  ] Periodic Inspection of Occupancy",0,1,"L");
  // $pdf->SetXY(115.7,$y+5.2);
  // $pdf->Cell(4,3,"S",1,0,"L");
  // $y=$pdf->GetY();
  $pdf->SetXY(20,106.00125);
$pdf->Cell(95,5,"[  ] Application for Occupancy Permit",0,0,"L");
  // $y=$pdf->GetY();
  // $pdf->SetXY(20.7,$y+1.2);
  // $pdf->Cell(4,3,"S",1,0,"L");
  $pdf->SetXY(115,106.00125);
$pdf->Cell(75,5,"[  ] Verification of Inspection of Compliance to NTCV",0,1,"L");
  // $pdf->SetXY(115.7,$y+1.2);
  // $pdf->Cell(4,3,"S",1,0,"L");
  // $y=$pdf->GetY();
  $pdf->SetXY(20,110.00125);
$pdf->Cell(95,5,"[  ] Application for Business Permit",0,0,"L");
  // $y=$pdf->GetY();
  // $pdf->SetXY(20.7,$y+1.2);
  // $pdf->Cell(4,3,"S",1,0,"L");
  $pdf->SetXY(115,110.00125);
$pdf->Cell(75,5,"[  ] Verification of Inspection of Complaint Received",0,1,"L");
  // $pdf->SetXY(115.7,$y+1.2);
  // $pdf->Cell(4,3,"S",1,0,"L");
  // $y=$pdf->GetY();
  $pdf->SetXY(20,114.00125);
$pdf->Cell(26,5,"[  ] Others (Specify)",0,0,"L");
  // $y=$pdf->GetY();
  // $pdf->SetXY(20.7,$y+1.2);
  // $pdf->Cell(4,3,"S",1,0,"L");
  $pdf->SetX(43);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+2.7,$x+71.5,$y+2.7);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y-1.4);
$pdf->Cell(71.5,5,"",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+12);
$y = $pdf->GetY();
$pdf->SetFont("Arial","BU","8");
$pdf->Cell(0,5,"SMALL/GENERAL ESTABLISHMENT",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+7);
$y = $pdf->GetY();
$pdf->SetFont("Arial","B","8");
$pdf->Cell(43,5,"I. GENERAL INFORMATION",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+7);
$y = $pdf->GetY();
$pdf->SetFont("Arial","","8");
$pdf->Cell(23,5,"Name of Building",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+147,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$nb = utf8_decode($application->get_bldgName());
$pdf->Cell(147,5,"$nb",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(21,5,"Business Name",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+149,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$bn = utf8_decode($application->get_businessName());
$pdf->Cell(149,5,"$bn",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(12,5,"Address",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+158,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$add = utf8_decode($application->get_bldgName() . " " . $application->get_houseBldgNum() . " " . $application->get_unitNum() . " " . $application->get_street() . " " . $application->get_Subdivision() . " " . $application->get_barangay() . " " . $application->get_cityMunicipality() . " " . $application->get_province());
$pdf->Cell(158,5,"$add",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$nob = $application->get_LineOfBusiness();
$pdf->Cell(26,5,"Nature of Business",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+144,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(144,5,"$nob",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(36,5,"Name of Owner / Occupant",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+72,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$no = utf8_decode($application->get_FirstName() . " " . $application->get_MiddleName() . " " . $application->get_LastName());
$pdf->Cell(72,5,"$no",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(17,5,"Contact No.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+45,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$co1 = $application->get_OwnertelNum();
$pdf->Cell(45,5,"$co1",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(32,5,"Name of Representative",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+77,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$nor = utf8_decode($this->session->userdata['userdata']['firstName'] . " " . $this->session->userdata['userdata']['middleName'] . " " . $this->session->userdata['userdata']['lastName']);
$pdf->Cell(77,5,"$nor",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(17,5,"Contact No.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+44,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
// $co2 = $representative->get_contactNum();
$pdf->Cell(44,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(18,5,"No. of Storey",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+35,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$nos = $application2->get_storeys();
$pdf->Cell(35,5,"$nos",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(20,5,"Height of Bldg.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+33,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(33,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(24,5,"Portion Occupied",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+40,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$op = $application2->get_occupiedPortion();
$pdf->Cell(40,5,"$op",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(17,5,"Area per Flr.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+40,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$apf = $application2->get_areaPerFloor();
$pdf->Cell(40,5,"$apf",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(35,5,"sqm",0,0,"L");
$pdf->Cell(20,5,"Total Flr. Area",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+40,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(40,5,"",0,0,"L");
$pdf->Cell(4,5,"sqm",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(26,5,"Building Permit No.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+25,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(25,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(17,5,"Date Issued",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+19,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(19,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(30,5,"Occupancy Permit No.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+20,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(20,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(17,5,"Date Issued",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+15,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(15,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(40,5,"Latest FSIC Issued Control No.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+48,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(48,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(17,5,"Date Issued",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+29,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(29,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(11,5,"FC Fee",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+25,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(25,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(29,5,"Certificate of Fire Drill",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+57,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(57,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(17,5,"Date Issued",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+29,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(29,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(11,5,"FC Fee",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+27,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(27,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(59,5,"Latest Notice to Correct Violations Control No.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+53,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(53,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(17,5,"Date Issued",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+41,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(41,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(51,5,"Name of Fire Insurance Co / Co-Insurer",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+40,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(40,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(14,5,"Policy No.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+22,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(22,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(17,5,"Date Issued",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+26,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(26,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(37,5,"Latest Mayor's / Bus. Permit",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+15,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(15,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(17,5,"Date Issued",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+26,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(26,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(22,5,"City License No.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+14,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(14,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(17,5,"Date Issued",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+22,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(22,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(57,5,"Latest Certificate of Electrical Inspection No.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+58,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(58,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(17,5,"Date Issued",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+38,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(38,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(22,5,"Fire Code Fees:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+37,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(37,5,"Php",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(10,5,"OR No.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+45,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(45,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(17,5,"Date Issued",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+39,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(39,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(24,5,"Other Information",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+146,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(146,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+7);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(43,5,"BUILDING CONSTRUCTION",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+7);
$pdf->SetFont("Arial","","7");
$pdf->Cell(9,5,"Beams",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+36,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(36,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+5,$y);
$pdf->Cell(11,5,"Columns",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+46,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(46,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+5,$y);
$pdf->Cell(11,5,"Flooring",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+47,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(47,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->SetFont("Arial","","7");
$pdf->Cell(17,5,"Exterior Walls",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+28,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(28,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+5,$y);
$pdf->Cell(17,5,"Corridor Walls",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+40,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(40,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+5,$y);
$pdf->Cell(19,5,"Room Partitions",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+39,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(39,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->SetFont("Arial","","7");
$pdf->Cell(13,5,"Main Stair",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+32,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(32,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+5,$y);
$pdf->Cell(12,5,"Windows",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+45,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(45,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+5,$y);
$pdf->Cell(9,5,"Ceiling",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+49,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(49,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->SetFont("Arial","","7");
$pdf->Cell(13,5,"Main Door",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+32,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(32,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+5,$y);
$pdf->Cell(11,5,"Trusses",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+46,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(46,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+5,$y);
$pdf->Cell(7,5,"Roof",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+51,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+7);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(43,5,"II. SECTIONAL OCCUPANCY",0,0,"L");

//
$pdf->SetFont("Arial","","7");
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.5,$x+170,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(169,5,"",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.5,$x+170,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(169,5,"",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.5,$x+170,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(169,5,"",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.5,$x+170,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(169,5,"",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+1,$y+3.5,$x+170,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(169,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+7);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(43,5,"III. MEANS OF EGGRESS",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(25,$y+4);
$pdf->SetFont("Arial","","7");
$pdf->Cell(19.5,5,"a)     No. of exits",0,0,"L");

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+39,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(39,5,"",0,0,"L");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(9.5,5,"Widths",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+97,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(10,5,"",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(30.5,$y+4);
$pdf->Cell(57,5,"Exits accessible?                            [  ] Yes [  ] No",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(24,5,"Termination of Exits",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+78.5,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(67,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(30.5,$y+4);
$pdf->Cell(57,5,"Enclosure Provided?                      [  ] Yes [  ] No",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(27.5,5,"Enclosure Construction",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+75,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(68,5,"",0,0,"L");
//
$pdf->AddPage();
$x = $pdf->GetX();
$pdf->SetX($x+20);

//
$pdf->SetFont("Arial","","7");
$pdf->Cell(28,5,"Are Fire Doors Provided",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+51,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(9.5,5,"Widths",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+10,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(10,5,"",0,0,"L");

//
//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(15.5,5,"Construction",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+46,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(46,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(30,$y+4);
$pdf->Cell(66,5,"Enclosure provided? [  ] Yes [  ] No",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(27,5,"Enclosure Construction",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+67,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(67,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(30,$y+4);
$pdf->Cell(66,5,"Are Fire Provided?    [  ] Yes [  ] No",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(26,5,"Fire door Construction",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+68,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(68,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(30,$y+4);
$pdf->Cell(16,5,"Other details:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+144,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(144,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+8);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(0,5,"IV. FIRE PROTECTION EQUIPMENT",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(25,$y+4);
$pdf->SetFont("Arial","","7");
$pdf->Cell(81,5,"a)     Emergency Lights provided? [  ] Yes [  ] No",0,0,"L");
$x = $pdf->GetX();
$pdf->SetX($x);
$pdf->Cell(56,5,"Illuminated exits sign provided?   [  ] Yes [  ] No",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(25,$y+4);
$pdf->SetFont("Arial","","7");
$pdf->Cell(32.5,5,"b)     No. of Fire extinguisher",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+24,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(24,5,"",0,0,"L");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(7,5,"Type",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+40,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(40,5,"",0,0,"L");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(11,5,"Capacity",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+30,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(30,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(31,$y+4);
$pdf->SetFont("Arial","","7");
$pdf->Cell(75,5,"Accessible? [  ] Yes [  ] No",0,0,"L");
$pdf->Cell(75,5,"Conspicuous Location? [  ] Yes [  ] No",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(25,$y+4);
$pdf->SetFont("Arial","I","7");
$pdf->Cell(81,5,"c)     Is bldg. equipped with fire alarm? [  ] Yes [  ] No",0,0,"L");
$pdf->Cell(75,5,"Detectors?                     [  ] Yes [  ] No",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(31,$y+4);
$pdf->SetFont("Arial","","7");
$pdf->Cell(29,5,"Location of control panel",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+44,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(44,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+2,$y);
$pdf->Cell(75,5,"Functional?                    [  ] Yes [  ] No",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+8);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(0,5,"V. FLAMMABLES",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(25,$y+4);
$pdf->SetFont("Arial","","7");
$pdf->Cell(91,5,"a)     Presence of hazardous materials? [  ] Yes [  ] No",0,0,"L");
$x = $pdf->GetX();
$pdf->SetX($x);
$pdf->Cell(56,5,"Properly stored and handled?   [  ] Yes [  ] No",0,0,"L");

//
//
$y = $pdf->GetY();
$pdf->SetXY(31,$y+4);
$pdf->Cell(30,5,"Kinds",0,0,"L");
$pdf->Cell(50,5,"Container",0,0,"L");
$pdf->Cell(34,5,"Volume",0,0,"L");
$pdf->Cell(35,5,"Location",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$pdf->Cell(3.5,5,"1.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+25,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(25,5,"",0,0,"L");

//
$x = $pdf->GetX();
$pdf->Line($x+4,$y+3.5,$x+47,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x+4,$y-.2);
$pdf->Cell(43,5,"",0,0,"L");

//
$x = $pdf->GetX();
$pdf->Line($x+4,$y+3.5,$x+45,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x+4,$y-.2);
$pdf->Cell(43,5,"",0,0,"L");

//
$x = $pdf->GetX();
$pdf->Line($x+4,$y+3.5,$x+45,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x+4,$y-.2);
$pdf->Cell(32,5,"",0,0,"L");

//
//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$pdf->Cell(3.5,5,"2.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+25,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(25,5,"",0,0,"L");

//
$x = $pdf->GetX();
$pdf->Line($x+4,$y+3.5,$x+47,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x+4,$y-.2);
$pdf->Cell(43,5,"",0,0,"L");

//
$x = $pdf->GetX();
$pdf->Line($x+4,$y+3.5,$x+45,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x+4,$y-.2);
$pdf->Cell(43,5,"",0,0,"L");

//
$x = $pdf->GetX();
$pdf->Line($x+4,$y+3.5,$x+45,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x+4,$y-.2);
$pdf->Cell(32,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$pdf->Cell(3.5,5,"3.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+25,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(25,5,"",0,0,"L");

//
$x = $pdf->GetX();
$pdf->Line($x+4,$y+3.5,$x+47,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x+4,$y-.2);
$pdf->Cell(43,5,"",0,0,"L");

//
$x = $pdf->GetX();
$pdf->Line($x+4,$y+3.5,$x+45,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x+4,$y-.2);
$pdf->Cell(43,5,"",0,0,"L");

//
$x = $pdf->GetX();
$pdf->Line($x+4,$y+3.5,$x+45,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x+4,$y-.2);
$pdf->Cell(32,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(79,5,"Storage Permit for Flammables/Combustibles Covered by BFP Permit?",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+89.5,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(32,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->Cell(36,5,"Clearance of stocks from ceiling",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+132.5,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(132.5,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->SetFont("Arial","I","7");
$pdf->Cell(101,5,"Minimum Ceiling Clearance: 1.0m for flammable liquids and 0.5m for combustible materials",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$pdf->SetFont("Arial","","7");
  $var = '"No Smoking"';
$pdf->Cell(58,5,"$var sign provided?           [  ] Yes [  ] No",0,0,"L");
$pdf->Cell(78,5,"Is smoking permitted? [  ] Yes [  ] No",0,0,"L");
$pdf->Cell(13,5,"No Where",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+20,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(20,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$pdf->Cell(24,5,"Storage construction",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+39,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(39,5,"val",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(60,5,"Safety device for LPG tank provided? [  ] Yes [  ] No",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(25,$y+4);
$pdf->Cell(24,5,"b)    Oven/stove used",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+35,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(35,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(14,5,"Kind of fuel",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+91,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(91,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(29,$y+4);
$pdf->Cell(16,5,"Smoke hood?",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+29,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(29,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(17,5,"Spark arrester",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+22,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(22,5,"",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y);
$pdf->Cell(25,5,"Partition Construction",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+51,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+8);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(0,5,"VI. FINDINGS NOTED DURING INSPECTION",0,0,"L");

//
$pdf->SetFont("Arial","","7");
$y = $pdf->GetY();
$pdf->SetXY(21,$y+5);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+8);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(0,5,"VII. RECOMMENDATIONS",0,0,"L");

//
$pdf->SetFont("Arial","","7");
$y = $pdf->GetY();
$pdf->SetXY(21,$y+5);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+168,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+8);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(0,5,"ACKNOWLEDGED BY:",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+10);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+70,$y+3.5);

//
$pdf->Line($x+85,$y+3.5,$x+150,$y+3.5);

//
$y = $pdf->GetY();
$pdf->SetXY(20,$y+4);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont("Arial","","8");
$pdf->Text($x,$y+2.5,"Signature over Printed Name of Owner/Representative");
$pdf->Text($x+103,$y+2.5,"Fire Safety Inspector/s");

//
$y = $pdf->GetY();
$pdf->SetXY(28,$y+4);
$pdf->Cell(17,5,"Date & Time",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+40,$y+3.5);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(51,5,"",0,0,"L");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+9.2,$y+8);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+64.5,$y+3.5);
$pdf->Text($x+23,$y+6.5,"Team Leader");

//
$pdf->Text($x,$y+15.5,"RECOMMEND ISSUANCE OF FSIC/NTC/NTCV:");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y+25);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+64.5,$y+3.5);
$pdf->Text($x+8,$y+6.5,"SFO2 Perfecto Elmor A Cardinez, BFP");
$pdf->Text($x+27,$y+10.5,"C,FSES");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y+15);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Text($x,$y+6.5,"APPROVED/DISAPPROVED:");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x,$y+15);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.5,$x+64.5,$y+3.5);
$pdf->Text($x+12,$y+6.5,"FCI ANTONIO O SOBEJANA IV");
$pdf->Text($x+22,$y+10.5,"City Fire Marshal");

//
$pdf->SetXY(20,258);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Cell(42,15,"",1,0,"");

$pdf->SetFont("Arial","","7");
$pdf->Text($x+2,$y+4,"Original (BFP copy)");
$pdf->Text($x+2,$y+8,"Duplicate (BO/BPLO copy)");
$pdf->Text($x+2,$y+12,"Triplicate (Applicant/Owner's copy)");

$dateHolder = date('M d Y');
$title = "bfp-form";
$refNum = $this->encryption->decrypt($application->get_referenceNum());
$fileName = "$title-$dateHolder-$refNum";
$pdf->Output('I',$fileName);
 ?>
