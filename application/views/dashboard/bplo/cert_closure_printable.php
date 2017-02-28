<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();


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
$pdf->Write(5,"RDB-EIGHT  AUTO  SUPPLY  ");

//
$pdf->Write(5,"owned  by  ");

//
$pdf->Write(5,"RONEL D. BURAGA  ");

//
$pdf->Write(5,"located  at  ");

//
$pdf->Write(5,"BARANGAY  CANLALAY,  BINAN,  LAGUNA  ");

//
$pdf->Write(5,"has RETIRE/CLOSE  its  Business Permit to this City Hall on ");

//
$pdf->Write(5,"January 27, 2017");

//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+15);
$pdf->Write(5,"This  certification  is  issued  upon  request  of  the  above  mentioned  establishment  for  whatever legal intent and purposes it may serve.");

//
$y = $pdf->GetY();
$pdf->SetXY(21,$y+15);
$pdf->Write(5,"Issued this ");

//
$pdf->Write(5,"31st day of January, 2017 ");

//
$pdf->Write(5,"at CITY OF BINAN, LAGUNA.");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x-18,$y+30);
$pdf->MultiCell(50,5,"RENE C. MANABAT \tCHIEF, Business Permit & \tLicensing Office",0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+30);
$pdf->Cell(35,5,"O.R. No. ",0,0,"L");
$pdf->Cell(35,5,"0796619",0,1,"L");
$pdf->Cell(35,5,"O.R. Date: ",0,0,"L");
$pdf->Cell(35,5,"1/27/2017",0,1,"L");
$pdf->Cell(35,5,"O.R. Amount ",0,0,"L");
$pdf->Cell(35,5,"P 4,030.00",0,1,"L");

//
//2nd Page
$pdf->AddPage();
$y = $pdf->GetY();
$pdf->SetY($y+21);

$pdf->SetFont("Arial","","9");
$pdf->Cell(0,5,"Business Name: ",0,1,"L");
$pdf->Cell(0,5,"Business Address: ",0,1,"L");
$pdf->Cell(0,5,"Owner's Name: ",0,1,"L");
$pdf->Cell(0,5,"Owner's Address: L14 B5 STAGE 3 MARINDUQUE ST MACARIA VILL,  CANLALAY,  BINAN CITY",0,1,"L");

//
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetFont("Arial","B","9");
  $y = $pdf->GetY();
$pdf->Text(28,$y+5,"LINE OF BUSINESS");
$pdf->Text(76,$y+5,"LAST CAPITAL/GROSS");
$pdf->Text(120.5,$y+5,"NO. OF");
$pdf->Text(147.5,$y+5,"GROSS");

//
$pdf->Text(85,$y+10,"DECLARED");
$pdf->Text(121.5,$y+10,"UNITS");
$pdf->Text(140.5,$y+10,"SALES/RECEIPT");

//
$y = $pdf->GetY();
$pdf->SetY($y+15);
$pdf->SetFont("Arial","","10");
  $y = $pdf->GetY();
$pdf->Cell(64,5,"CARINDERIA/EATERY",1,"L");
  $x = $pdf->GetX();
  $pdf->SetXY($x,71.00125);
$pdf->Cell(43,5,"",1,0,"L");
$pdf->Cell(19.5,5,"",1,0,"L");
$pdf->Cell(35,5,"",1,0,"L");

//
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->SetFont("Arial","B","9");
$pdf->Cell(0,5,"REASON FOR RETIREMENT / CLOSURE OF BUSINESS");

//
$y = $pdf->GetY();
$pdf->SetY($y+20);
$pdf->SetFont("Arial","","9");
$pdf->Cell(0,5,"For corporation, only responsible person (President, Chief Accountant and Corporate Secretary) should sign",0,1,"L");
$pdf->Cell(0,5,"the form. In case of Liason Officer or any authorized representative, kindly present an authorization letter",0,1,"L");
$pdf->Cell(0,5,"signed by the identified responsible person of the corporation.",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetY($y+20);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+98,$y+3.7,$x+173,$y+3.7);
$pdf->Text($x+97,$y+7.3,"SIGNATURE OF APPLICANT OVER PRINTED NAME");

//
$y = $pdf->GetY();
$pdf->SetY($y+20);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+98,$y+3.7,$x+173,$y+3.7);
$pdf->Text($x+115,$y+7.3,"POSITION/TITLE");

//
$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(0,5,"SUBSCRIBED AND SWORN BEFORE ME THIS 31st DAY OF JANUARY, 2017 AT THE CITY HALL OF BINAN",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(31,$y+10);
$pdf->Cell(25,5,"APPROVED BY:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+36,$y+3.7);
  $x = $pdf->GetX();
  $pdf->SetXY($x,$y-.3);
  $pdf->Cell(36,5,"val",0,0,"C");
//
$x = $pdf->GetX();
$pdf->SetXY($x+5,$y);
$pdf->Cell(15,5,"AFFIANT",0,0,"L");
  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $pdf->Line($x,$y+3.7,$x+36,$y+3.7);
  $x = $pdf->GetX();
  $pdf->SetXY($x,$y-.3);
  $pdf->Cell(36,5,"val",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+15);
$pdf->Cell(15,5,"DOC NO.",0,0,"L");
  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $pdf->Line($x,$y+3.7,$x+19,$y+3.7);
  $x = $pdf->GetX();
  $pdf->SetXY($x,$y-.3);
  $pdf->Cell(19,5,"val",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(17,5,"PAGE NO.",0,0,"L");
  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $pdf->Line($x,$y+3.7,$x+17,$y+3.7);
  $x = $pdf->GetX();
  $pdf->SetXY($x,$y-.3);
  $pdf->Cell(17,5,"val",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(17,5,"BOOK NO.",0,0,"L");
  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $pdf->Line($x,$y+3.7,$x+17,$y+3.7);
  $x = $pdf->GetX();
  $pdf->SetXY($x,$y-.3);
  $pdf->Cell(17,5,"val",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(23,5,"SERIES OF 20",0,0,"L");
  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $pdf->Line($x,$y+3.7,$x+3,$y+3.7);
  $x = $pdf->GetX();
  $pdf->SetXY($x,$y-.3);
  $pdf->Cell(3,5,"##",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+5);
  $y = $pdf->GetY();
  $pdf->Line(102,$y+3.7,177,$y+3.7);
  $pdf->Text(125,$y+7.3,"Administering Officer");

//
$y = $pdf->GetY();
$pdf->SetY($y+40);
  $y = $pdf->GetY();
  $pdf->SetFont("Arial","B","9");
$pdf->Text(30.5 ,$y,"RENE C. MANABAT");
$y = $pdf->GetY();
$pdf->SetY($y+5);
  $y = $pdf->GetY();
  $pdf->SetFont("Arial","","9");
$pdf->Text(10,$y-1,"CITY CHIEF, Business Permit and Licensing Office");
$pdf->Output();
 ?>
