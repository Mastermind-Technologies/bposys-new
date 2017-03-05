<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$referenceNumber = $this->encryption->decrypt($application->get_referenceNum());
$pdf->AddPage();
$pdf->SetTitle("Certificate of Closure Form");

$y = $pdf->GetY();
$pdf->SetY($y+21);

$binyan = utf8_decode("BIÑAN");
$businessName = utf8_decode($application->get_businessName());
$businessAddress = utf8_decode($application->get_bldgName() . " " . $application->get_houseBldgNum() . " " . $application->get_unitNum() . " " . $application->get_street() . " " . $application->get_Subdivision());
 $ownerName = utf8_decode($application->get_firstName()." ".$application->get_middleName()." ".$application->get_lastName());
$ownersAdd = utf8_decode($application->get_OwnerHouseBldgNo() ." ". $application->get_OwnerbldgName() ." ". $application->get_OwnerunitNum() ." ". $application->get_Ownerstreet() ." ". $application->get_Ownerbarangay() ." ". $application->get_Ownersubdivision() ." ". $application->get_OwnercityMunicipality() ." ". $application->get_Ownerprovince());
// $gross =number_format($activity->previousGross[0]->essentials + $activity->previousGross[0]->nonEssentials, 2);
$pdf->SetFont("Arial","","9");
$pdf->Cell(0,5,"Business Name: $businessName",0,1,"L");
$pdf->Cell(0,5,"Business Address: $businessAddress",0,1,"L");
$pdf->Cell(0,5,"Owner's Name: $ownerName",0,1,"L");
$pdf->Cell(0,5,"Owner's Address: $ownersAdd",0,1,"L");

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
  $lineOfBusiness = $application->get_LineOfBusiness();
  $capital = $application->get_capital();
$pdf->Cell(64,5,"$lineOfBusiness",1,"L");
  $x = $pdf->GetX();
  $pdf->SetXY($x,71.00125);
$pdf->Cell(43,5,"$capital",1,0,"R");
$pdf->Cell(19.5,5,"",1,0,"R");
$pdf->Cell(35,5,"",1,0,"R");

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
$dateHolder = date('M d Y');
$pdf->Cell(0,5,"SUBSCRIBED AND SWORN BEFORE ME THIS $dateHolder AT THE CITY HALL OF $binyan",0,0,"L");

//
$y = $pdf->GetY();
$pdf->SetXY(31,$y+10);
$pdf->Cell(25,5,"APPROVED BY:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+36,$y+3.7);
  $x = $pdf->GetX();
  $pdf->SetXY($x,$y-.3);
  $pdf->Cell(36,5,"",0,0,"C");
//
$x = $pdf->GetX();
$pdf->SetXY($x+5,$y);
$pdf->Cell(15,5,"AFFIANT",0,0,"L");
  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $pdf->Line($x,$y+3.7,$x+36,$y+3.7);
  $x = $pdf->GetX();
  $pdf->SetXY($x,$y-.3);
  $pdf->Cell(36,5,"",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+15);
$pdf->Cell(15,5,"DOC NO.",0,0,"L");
  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $pdf->Line($x,$y+3.7,$x+19,$y+3.7);
  $x = $pdf->GetX();
  $pdf->SetXY($x,$y-.3);
  $pdf->Cell(19,5,"",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(17,5,"PAGE NO.",0,0,"L");
  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $pdf->Line($x,$y+3.7,$x+17,$y+3.7);
  $x = $pdf->GetX();
  $pdf->SetXY($x,$y-.3);
  $pdf->Cell(17,5,"",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(17,5,"BOOK NO.",0,0,"L");
  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $pdf->Line($x,$y+3.7,$x+17,$y+3.7);
  $x = $pdf->GetX();
  $pdf->SetXY($x,$y-.3);
  $pdf->Cell(17,5,"",0,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(23,5,"SERIES OF 20",0,0,"L");
  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $pdf->Line($x,$y+3.7,$x+3,$y+3.7);
  $x = $pdf->GetX();
  $pdf->SetXY($x,$y-.3);
  $pdf->Cell(3,5,"",0,0,"C");

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

$referenceNumber = $this->encryption->decrypt($application->get_referenceNum());
$title = "certificate-of-closure-form";
$fileName = "$title-$dateHolder-$referenceNumber";
$pdf->Output('I',$fileName);
?>