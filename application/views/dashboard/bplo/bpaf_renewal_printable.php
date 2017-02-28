<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetTitle("Business Permit Application Form - Renewal");

//Variables or data
// $appNum = $application->get_
$appDate = $application->get_applicationDate();
$appBusinessName = $application->get_businessName();
$telNum = $application->get_telNum();
//
$unitNum = $application->get_unitNum();
$street = $application->get_street();
$bldg = $application->get_bldgName();
$brgy = $application->get_barangay();

$businessAdd = $unitNum + $street + $bldg + $brgy;
// $regOwner = $application->get_owner_name();
$ownerTelNum = $application->get_OwnertelNum();
//
// $ownersBldgNum = $application->get_ownerhouseBldgNum();
// $ownersBldgName = $application->get_OwnerBldgName();
// $ownersUnitNum = $application->get_OwnerunitNum();
// $ownersStreet = $application->get_OwnerStreet();
// $ownersBrgy = $application->get_Ownerbarangay();
// $ownersSubd = $application->get_OwnerSubdivision();
// $ownersCity = $application->get_OwnercityMunicipality();
// $ownersProvince = $application->get_Ownerprovince();

// $ownersAdd =
//
// $paid = $application->get_
// $dateStarted = $application->get_
// $lineBusiOne
// $lineBusiTwo
// $capitalOne
// $capitalTwo
// $NumUnitsOne
// $NumUnitsTwo
// $GrossSalesOne
// $GrossSalesTwo
//
// $lessorLastName
// $lessorFirstName
// $lessorMiddleName
//
// $lessorName
// //
// $lessorAdd=
// $monthlyRental=

// $docNum
// $pageNum
// $bookNum
// $seriesOf

//
$pdf->SetFont("Arial","","7");
$pdf->Cell(0,5,"Republic of the Philippines",0,1,"C");
$pdf->Cell(0,5,"CITY OF BINAN",0,1,"C");

$y = $pdf->GetY();
$pdf->SetY($y+3);
$pdf->Cell(0,5,"BUSINESS PERMIT AND LICENSING OFFICE",0,1,"C");
$pdf->SetFont("Arial","B","9");
$pdf->Cell(0,5,"BUSINESS PERMIT APPLICATION FORM",0,1,"C");
$pdf->Cell(0,5,"RENEWAL",0,1,"C");

$y = $pdf->GetY();
$pdf->SetY($y+4);
$pdf->Cell(0,64,"",1,0,"");

$pdf->SetX(10);
$pdf->SetFont("Arial","","10");
$pdf->Cell(34,5,"Application Number:",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+4,$x+84,$y+4);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(84,5,"val",0,0,"L");
$pdf->SetX(130);
$pdf->Cell(29,5,"Application Date:",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+4,$x+34,$y+4);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(34,5,"val",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+6);
$pdf->Cell(34,5,"Business Name:",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+4,$x+84,$y+4);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(84,5,"val",0,0,"L");
$pdf->SetX(130);
$pdf->Cell(29,5,"Tel. No.",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+4,$x+34,$y+4);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(34,5,"val",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+6);
$pdf->Cell(34,5,"Business Address:",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+4,$x+149,$y+4);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(149,5,"val",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+6);
$pdf->Cell(34,5,"Owner's Name:",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+4,$x+84,$y+4);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(84,5,"val",0,0,"L");
$pdf->SetX(130);
$pdf->Cell(29,5,"Tel. No.",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+4,$x+34,$y+4);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(34,5,"val",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+6);
$pdf->Cell(34,5,"Owner's Address:",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+4,$x+149,$y+4);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(149,5,"val",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+6);
$pdf->Cell(34,5,"Paid Up to:",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+4,$x+84,$y+4);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(84,5,"val",0,0,"L");
$pdf->SetX(130);
$pdf->Cell(29,5,"Date Started:",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+4,$x+34,$y+4);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(6,5,"val",0,0,"C ");

$y = $pdf->GetY();
$pdf->SetXY(27,$y+11);
$pdf->SetFont("Arial","","9");
$pdf->Text(28,$y+14.5,"LINE OF BUSINESS");
$pdf->Text(85,$y+14.5,"LAST CAPITAL/GROSS");
$pdf->Text(95,$y+18.5,"DECLARED");
$pdf->Text(132,$y+14.5,"No. of");
$pdf->Text(133,$y+18.5,"Units");
$pdf->Text(170,$y+14.5,"GROSS");
$pdf->Text(163,$y+18.5,"SALES/RECEIPTS");

$y = $pdf->GetY();
$pdf->SetY($y);
$pdf->Line(13,$y+15,80,$y+15);
$x = $pdf->GetX();
$pdf->SetXY($x+3,$y+11);
$pdf->Cell(67,5,"val",0,0,"C");
$pdf->Line(85,$y+15,120,$y+15);
$x = $pdf->GetX();
$pdf->SetXY($x+5,$y+11);
$pdf->Cell(35,5,"val",0,0,"C");;
$pdf->Line(131,$y+15,147,$y+15);
$x = $pdf->GetX();
$pdf->SetXY($x+11,$y+11);
$pdf->Cell(16,5,"val",0,0,"C");;
$pdf->Line(156,$y+15,198,$y+15);
$x = $pdf->GetX();
$pdf->SetXY($x+9,$y+11);
$pdf->Cell(42,5,"val",0,0,"C");;

$y = $pdf->GetY();
$pdf->SetY($y);
$pdf->Line(13,$y+10,80,$y+10);
$x = $pdf->GetX();
$pdf->SetXY($x+3,$y+6);
$pdf->Cell(67,5,"val",0,0,"C");;
$pdf->Line(85,$y+10,120,$y+10);
$x = $pdf->GetX();
$pdf->SetXY($x+5,$y+6);
$pdf->Cell(35,5,"val",0,0,"C");;
$pdf->Line(131,$y+10,147,$y+10);
$x = $pdf->GetX();
$pdf->SetXY($x+11,$y+6);
$pdf->Cell(16,5,"val",0,0,"C");;
$pdf->Line(156,$y+10,198,$y+10);
$x = $pdf->GetX();
$pdf->SetXY($x+9,$y+6);
$pdf->Cell(42,5,"val",0,0,"C");;

$y = $pdf->GetY();
$pdf->SetY($y+6);
$pdf->Cell(190,25,"",1,0,"");
$y = $pdf->GetY();
$pdf->SetXY(10,$y+5);
$pdf->Cell(85,5,"If place of business is Rented, please specify the following",0,0,"");
$y = $pdf->GetY();
$pdf->SetXY(13,$y+5);
$pdf->Cell(25,5,"LESSOR NAME",0,0,"");
$pdf->SetX(45);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+75,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(75,5,"val",0,0,"L");
$pdf->SetX(130);
$pdf->Cell(31,5,"MONTHLY RENTAL",0,0,"");
$pdf->SetX(167);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+30,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(30,5,"val",0,0,"L");
$y = $pdf->GetY();
$pdf->SetXY(13,$y+6);
$pdf->Cell(31,5,"LESSOR ADDRESS",0,0,"");
$pdf->SetX(45);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+75,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(75,5,"val",0,0,"L");

$y = $pdf->GetY();
$pdf->SetY($y+9.1);
$pdf->Cell(190,52,"",1,0,"");
$y = $pdf->GetY();
$pdf->SetX(115);
$x = $pdf->GetX();
$pdf->Line($x-4,$y+11,$x+82,$y+11);
$x = $pdf->GetX();
$pdf->SetXY($x,$y+7.1);
$pdf->Cell(78,5,"val",0,0,"C");
$pdf->Text($x,$y+14,"SIGNATURE OF APPLICANT OVER PRINTED NAME");
$pdf->Line($x-4,$y+21,$x+82,$y+21);
$pdf->SetX(115);
$x = $pdf->GetX();
$pdf->SetXY($x,$y+17);
$pdf->Cell(78,5,"val",0,0,"C");
$pdf->Text($x+25,$y+24,"POSITION/TITLE");
$y = $pdf->GetY();
$pdf->SetY($y+18.1);
$pdf->Cell(100,5,"For corporation, only responsible person if resident. Chief  Accountant  and  Corporate  Secretary  should  sign  the  form  in  case  of",0,1,"");
$pdf->Cell(100,5,"person  Officer  or  any  authorized  representative  kindly  present  an  authorization  letter  signed  by  the  identified  responsible",0,1,"");
$pdf->Cell(100,5,"person  of  the  corporation.",0,1,"");

$y = $pdf->GetY();
$pdf->SetY($y+2);
$pdf->Cell(190,35,"",1,0,"");
$pdf->SetXY(13,$y+5);
$pdf->Cell(71,5,"SUBSCRIBED AND SWORN BEFORE ME THIS",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+15,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(15,5,"val",0,0,"C");
$x = $pdf->GetX();
$pdf->SetX($x);
$pdf->Cell(14,5,"DAY OF",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+25,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(25,5,"val",0,0,"C");
$x = $pdf->GetX();
$pdf->SetX($x);
$pdf->Cell(6,5,",20",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+8,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(8,5,"val",0,0,"C");
$x = $pdf->GetX();
$pdf->SetX($x);
$pdf->Cell(45,5,"at THE CITY HALL OF BINAN",0,0,"");
$y = $pdf->GetY();
$pdf->SetXY(42,$y+5);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+33,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(33,5,"val",0,0,"C");
$x = $pdf->GetX();
$pdf->SetX($x+4);
$pdf->Cell(14,5,"AFFIANT",0,0,"");
$pdf->SetX(101);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+33,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(33,5,"val",0,0,"C");
$pdf->SetX(139);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+33,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(33,5,"val",0,0,"C");
$y = $pdf->GetY();
$pdf->SetXY(13,$y+5);
$pdf->Cell(16,5,"DOC. NO.",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+14,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(14,5,"val",0,0,"C ");
$y = $pdf->GetY();
$pdf->SetXY(13,$y+5);
$pdf->Cell(17,5,"PAGE NO.",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+13,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(13,5,"val",0,0,"C ");
$y = $pdf->GetY();
$pdf->SetXY(13,$y+5);
$pdf->Cell(17,5,"BOOK NO.",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+13,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(13,5,"val",0,0,"C ");
$y = $pdf->GetY();
$pdf->SetXY(13,$y+5);
$pdf->Cell(23,5,"SERIES OF 20",0,0,"");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+8,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(8,5,"val",0,0,"C ");
$pdf->SetXY(120,$y-6);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+65,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.2);
$pdf->Cell(65,5,"val",0,0,"C");
$pdf->Text($x+17,$y+6.5,"Administering Officer");

//
$y = $pdf->GetY();
$pdf->SetY($y+15);
$pdf->Cell(95,58,"",1,0,"");
$pdf->Cell(95,58,"",1,0,"");

//
$pdf->SetXY(11,$y+18.5);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Text($x,$y,"INSPECTED BY:");
$pdf->Text($x+95,$y,"APPROVED BY:");

//
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+7.5,$y+15,$x+85,$y+15);
$x = $pdf->GetX();
$pdf->SetXY($x+7,$y+11);
$pdf->SetFont("Arial","B","10");
$pdf->Cell(78,5,"ENGR. WILFREDO F. ALINTANAHIN",0,0,"C");
$pdf->SetFont("Arial","","9");
$pdf->Text($x+33,$y+18,"CITY ENGINEER");

//
$y = $pdf->GetY();
$pdf->SetXY(0,$y);
$pdf->Line($x+7.5,$y+20,$x+85,$y+20);
$x = $pdf->GetX();
$pdf->SetXY($x+18.5,$y+16);
$pdf->Cell(77.5,5,"val",0,0,"C");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Text($x-60,$y+7,"CITY CHIEF FIRE STATION");

//
$y = $pdf->GetY();
$pdf->SetXY(10,$y);
$x = $pdf->GetX();
$pdf->Line($x+7.5,$y+20,$x+85,$y+20);
$x = $pdf->GetX();
$pdf->SetXY($x+7.5,$y+16);
$pdf->SetFont("Arial","B","10");
$pdf->Cell(77.5,5,"ENGR. ROBERTO F. HERNANDEZ",0,0,"C");
$y = $pdf->GetY();
$pdf->SetXY(10,$y);
$pdf->SetFont("Arial","","9");
$pdf->Text($x+7.8,$y+7,"CITY PLANNING DEVELOPMENT OFFICE / ZONING");

//
$pdf->SetXY(105,240);
$pdf->SetFont("Arial","B","10");
$pdf->Cell(95,5,"RENE C. MANABAT",0,0,"C");
$pdf->SetXY(105,244);
$pdf->SetFont("Arial","","9");
$pdf->Cell(95,5,"CITY CHIEF, Business Permit and Licensing Office",0,0,"C");

//
$pdf->SetXY(105,262.5);
$pdf->SetFont("Arial","B","10");
$pdf->Cell(95,5,"ATTY. WALFREDO R. DIMAGUILA JR.",0,0,"C");
$pdf->SetXY(105,266.5);
$pdf->SetFont("Arial","","9");
$pdf->Cell(95,5,"CITY MAYOR",0,0,"C");
$pdf->Output();
 ?>
