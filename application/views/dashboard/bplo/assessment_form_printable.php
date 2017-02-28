<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetTitle("Assessment Form");

$pdf->SetFont("Arial","","8");

$y = $pdf->GetY();
$pdf->SetY($y+20);
$pdf->Cell(0,5,"TAX ORDER OF PAYMENT",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->SetFont("Arial","B","7.5");
$pdf->Cell(35,5,"BIN",0,0,"L");
$pdf->Cell(20,5,"Prev Stat",0,0,"L");
$pdf->Cell(13,5,"Status",0,0,"L");
$pdf->Cell(75,5,"Line/ Nature of Business",0,0,"L");
$pdf->Cell(45,5,"Bill No.",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->SetFont("Arial","","7.5");
$pdf->Cell(35,5,"243-00-2017-0000643",0,0,"L");
$pdf->Cell(20,5,"",0,0,"L");
$pdf->Cell(13,5,"NEW",0,0,"L");
$pdf->Cell(75,5,"RETAILER (ENTS)",0,0,"L");
$pdf->Cell(45,5,"012017-06885",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->SetFont("Arial","B","7.5");
$pdf->Cell(82,5,"Businesss Name",0,0,"L");
$pdf->Cell(90,5,"Business Address",0,0,"L");
$pdf->Cell(16,5,"Year",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->SetFont("Arial","","7.5");
$pdf->Cell(82,5,"EROS ENTERPRISE",0,0,"L");
$pdf->Cell(90,5,"TIMBAO . TIMBAO BINAN",0,0,"L");
$pdf->Cell(16,5,"2017",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->SetFont("Arial","B","7.5");
$pdf->Cell(60,5,"Owner/ Taxpayer",0,0,"L");
$pdf->Cell(30,5,"Last Payment",0,0,"L");
$pdf->Cell(49,5,"Prev Permit No.",0,0,"L");
$pdf->Cell(30,5,"Date Issued",0,0,"L");
$pdf->Cell(19,5,"Period",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->SetFont("Arial","","7.5");
$pdf->Cell(60,5,"VERNIDIO E. AMBOJIA",0,0,"L");
$pdf->Cell(30,5,"0.00",0,0,"L");
$pdf->Cell(49,5,"",0,0,"L");
$pdf->Cell(30,5,"1/26/2017",0,0,"L");
$pdf->Cell(19,5,"4th Qtr",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(140,$y+3.5);
$pdf->Cell(29,5,"No. of Emp",0,0,"L");
$pdf->Cell(29,5,"Capital",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(140,$y+3.5);
$pdf->Cell(29,5,"",0,0,"L");
$pdf->Cell(29,5,"",0,0,"L");

$y = $pdf->GetY();
$pdf->SetY($y+8);
$pdf->Cell(10,2.7,"YEAR",1,0,"C");
$pdf->Cell(15,2.7,"PERIOD",1,0,"C");
$pdf->Cell(51,2.7,"PARTICULARS",1,0,"C");
$pdf->Cell(27,2.7,"CAPITAL",1,0,"C");
$pdf->Cell(31,2.7,"DUE",1,0,"C");
$pdf->Cell(19,2.7,"SURCHARGE",1,0,"C");
$pdf->Cell(18,2.7,"INTEREST",1,0,"C");
$pdf->Cell(17,2.7,"TOTAL",1,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(10,5,"2017",0,0,"C");
$pdf->Cell(15,5,"F 1",0,0,"C");
$pdf->Cell(51,5,"TAX ON RETAILER(ENTS)",0,0,"L");
$pdf->Cell(27,5,"",0,0,"C");
$pdf->Cell(31,5,"50.00",0,0,"R");
$pdf->Cell(19,5,"0.00",0,0,"R");
$pdf->Cell(18,5,"0.00",0,0,"R");
$pdf->Cell(17,5,"50.00",0,0,"R");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->Cell(10,5,"2017",0,0,"C");
$pdf->Cell(15,5,"F 1",0,0,"C");
$pdf->MultiCell(51,5,"MAYORS PERMIT FEE (RETAILER (ENTS))",0,"L");
  $pdf->SetXY(86,$y+3.5);
$pdf->Cell(27,5,"",0,0,"C");
$pdf->Cell(31,5,"50.00",0,0,"R");
$pdf->Cell(19,5,"0.00",0,0,"R");
$pdf->Cell(18,5,"0.00",0,0,"R");
$pdf->Cell(17,5,"50.00",0,0,"R");

//
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(10,5,"2017",0,0,"C");
$pdf->Cell(15,5,"F 1",0,0,"C");
$pdf->Cell(51,5,"TAX ON RETAILER(ENTS)",0,0,"L");
$pdf->Cell(27,5,"",0,0,"C");
$pdf->Cell(31,5,"50.00",0,0,"R");
$pdf->Cell(19,5,"0.00",0,0,"R");
$pdf->Cell(18,5,"0.00",0,0,"R");
$pdf->Cell(17,5,"50.00",0,0,"R");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->Cell(10,5,"2017",0,0,"C");
$pdf->Cell(15,5,"F 1",0,0,"C");
$pdf->Cell(51,5,"TAX ON RETAILER(ENTS)",0,0,"L");
$pdf->Cell(27,5,"",0,0,"C");
$pdf->Cell(31,5,"50.00",0,0,"R");
$pdf->Cell(19,5,"0.00",0,0,"R");
$pdf->Cell(18,5,"0.00",0,0,"R");
$pdf->Cell(17,5,"50.00",0,0,"R");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->Cell(10,5,"2017",0,0,"C");
$pdf->Cell(15,5,"F 1",0,0,"C");
$pdf->Cell(51,5,"TAX ON RETAILER(ENTS)",0,0,"L");
$pdf->Cell(27,5,"",0,0,"C");
$pdf->Cell(31,5,"50.00",0,0,"R");
$pdf->Cell(19,5,"0.00",0,0,"R");
$pdf->Cell(18,5,"0.00",0,0,"R");
$pdf->Cell(17,5,"50.00",0,0,"R");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->Cell(10,5,"2017",0,0,"C");
$pdf->Cell(15,5,"F 1",0,0,"C");
$pdf->Cell(51,5,"TAX ON RETAILER(ENTS)",0,0,"L");
$pdf->Cell(27,5,"",0,0,"C");
$pdf->Cell(31,5,"50.00",0,0,"R");
$pdf->Cell(19,5,"0.00",0,0,"R");
$pdf->Cell(18,5,"0.00",0,0,"R");
$pdf->Cell(17,5,"50.00",0,0,"R");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->Cell(10,5,"2017",0,0,"C");
$pdf->Cell(15,5,"F 1",0,0,"C");
$pdf->Cell(51,5,"TAX ON RETAILER(ENTS)",0,0,"L");
$pdf->Cell(27,5,"",0,0,"C");
$pdf->Cell(31,5,"50.00",0,0,"R");
$pdf->Cell(19,5,"0.00",0,0,"R");
$pdf->Cell(18,5,"0.00",0,0,"R");
$pdf->Cell(17,5,"50.00",0,0,"R");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->Cell(10,5,"2017",0,0,"C");
$pdf->Cell(15,5,"F 1",0,0,"C");
$pdf->Cell(51,5,"TAX ON RETAILER(ENTS)",0,0,"L");
$pdf->Cell(27,5,"",0,0,"C");
$pdf->Cell(31,5,"50.00",0,0,"R");
$pdf->Cell(19,5,"0.00",0,0,"R");
$pdf->Cell(18,5,"0.00",0,0,"R");
$pdf->Cell(17,5,"50.00",0,0,"R");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->Cell(10,5,"2017",0,0,"C");
$pdf->Cell(15,5,"F 1",0,0,"C");
$pdf->MultiCell(51,5,"ZONING/LOCATIONAL CLEARANCE FEE",0,"L");
  $pdf->SetXY(86,$y+3.5);
$pdf->Cell(27,5,"",0,0,"C");
$pdf->Cell(31,5,"50.00",0,0,"R");
$pdf->Cell(19,5,"0.00",0,0,"R");
$pdf->Cell(18,5,"0.00",0,0,"R");
$pdf->Cell(17,5,"50.00",0,0,"R");

//
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(10,5,"2017",0,0,"C");
$pdf->Cell(15,5,"F 1",0,0,"C");
$pdf->Cell(51,5,"TAX ON RETAILER(ENTS)",0,0,"L");
$pdf->Cell(27,5,"",0,0,"C");
$pdf->Cell(31,5,"50.00",0,0,"R");
$pdf->Cell(19,5,"0.00",0,0,"R");
$pdf->Cell(18,5,"0.00",0,0,"R");
$pdf->Cell(17,5,"50.00",0,0,"R");

//
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(103,5,"Total:",0,0,"R");
$pdf->Cell(31,5,"50.00",0,0,"R");
$pdf->Cell(19,5,"0.00",0,0,"R");
$pdf->Cell(18,5,"0.00",0,0,"R");
$pdf->Cell(17,5,"50.00",0,0,"R");

//
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(37.6,5,"Due Date",1,0,"L");
$pdf->Cell(37.6,5,"First Quarter (???)",1,0,"C");
$pdf->Cell(37.6,5,"Second Quarter (???)",1,0,"C");
$pdf->Cell(37.6,5,"Third Quarter (???)",1,0,"C");
$pdf->Cell(37.6,5,"Fourth Quarter (???)",1,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(37.6,5,"Amount Due:",1,0,"L");
$pdf->Cell(37.6,5,"???",1,0,"R");
$pdf->Cell(37.6,5,"???",1,0,"R");
$pdf->Cell(37.6,5,"???",1,0,"R");
$pdf->Cell(37.6,5,"???",1,0,"R");

//
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(0,5,"This Statement is valid until ???",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->Cell(0,5,"Please disregard this statement if payment has been made. Thank you.",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(160.4,$y+10);
$pdf->Cell(37.6,5,"Assessed By:",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(160.4,$y+10);
$pdf->Cell(37.6,5,"RENE C. MANABAT",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(160.4,$y+3.5);
$pdf->Cell(37.6,5,"BPLO HEAD",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(25,5,"Prepared by:",0,0,"L");
$pdf->Cell(43,5,"Prepared by:",0,0,"L");
$pdf->Cell(25,5,"Date Printed:",0,0,"L");
$pdf->Cell(35,5,"???[Date & time]",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetY($y+3.5);
$pdf->Cell(25,5,"Received TOP:",0,0,"L");
$pdf->Cell(43,5,"",0,0,"L");
$pdf->Cell(25,5,"BY:",0,0,"L");
$pdf->Cell(35,5,"",0,0,"L");
$pdf->Output();
 ?>
