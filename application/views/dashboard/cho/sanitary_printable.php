<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();


$pdf->AddPage();
$pdf->SetTitle("Sanitary Permit Form");

//Variables or data
$date = $application->get_applicationDate();
// $year = $application->get_
$sanitaryPermitNum = $this->encryption->decrypt($application->get_applicationId());
$appBusinessName = utf8_decode($application->get_businessName());
$unitNum = $application->get_unitNum();
$street = utf8_decode($application->get_street());
$bldg = utf8_decode($application->get_bldgName());
$brgy = utf8_decode($application->get_barangay());
$regOwner = utf8_decode($application->get_FirstName() . " " . $application->get_MiddleName() . " " . $application->get_LastName());
$contactNum = $application->get_OwnertelNum();
$natBusi = $application->get_lineOfBusiness();
//
$maleEmp = $application->get_MaleEmployees();
$femaleEmp = $application->get_FemaleEmployees();
$pwdEmp = $application->get_PWDEmployees();
$lguEmp = $application->get_LGUEmployees();
$totEmp = $maleEmp + $femaleEmp + $pwdEmp + $lguEmp;
$laguna = utf8_decode("Biñan");
//
$physicalExam = $application2->get_AnnualEmployeePhysicalExam();
$watRes = $application2->get_typeLevelOfWaterSource();
//
$pdf->SetFont("Arial","I","7");

$pdf->Cell(2,5,"(",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+6,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(6,5,"",0,0,"C");
//$pdf->SetXY($x+5.5,$y);

$pdf->Cell(7,5,"New/",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+5,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Cell(6,5,"",0,0,"C");
//$pdf->SetXY($x+4.5,$y);
$pdf->Cell(115,5,"Renewal)",0,0,"L");

$pdf->SetFont("Arial","B","10");
$pdf->Cell(54,5,"EHS Form 110",0,1,"C");

$status = $application->get_ApplicationType();
if($status == "New")
{
$pdf->SetXY(13.0125,10.70125);
$check = "4";
$pdf->SetFont('ZapfDingbats','', 10);
$pdf->Cell(4, 3, $check,0, 0);
}
else if($status == "Renewal")
{
  $pdf->SetXY(25.50125,10.70125);
$check = "4";
$pdf->SetFont('ZapfDingbats','', 10);
$pdf->Cell(4, 3, $check,0, 0);
}

$pdf->SetFont("Arial","B","7");
$y2 = $pdf->SetY(20);
$pdf->Cell(8,5,"Date:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.7,$x+27,$y+3.7);
$x = $pdf->GetX();
$pdf->SetXY($x,$y);
$pdf->Cell(27,5,"$date",0,0,"C");
//$pdf->Cell(20,5,"September 27",0,0,"C");
$x = $pdf->GetX();
$pdf->SetX($x+2);
$pdf->SetFont("Arial","IB","10");
$pdf->SetX($x);
// $pdf->Cell(2,5,",",0,0,"L");
// $pdf->SetFont("Arial","B","7");
// $pdf->Cell(5,5,"201",0,0,"C");
// $x = $pdf->GetX();
// $pdf->SetX($x);
// $pdf->Line($x,$y+3.7,$x+3,$y+3.7);
// $x = $pdf->GetX();
// $pdf->SetXY($x,$y);
// $pdf->Cell(3,5,"val",0,0,"C");

$pdf->SetX(132);
$pdf->Cell(66,30,"",1,0,"L");
$pdf->SetFont("Arial","I","7");
$y = $pdf->GetY();
$pdf->Text(135,$y+4,"For CHO staff:");
$pdf->SetFont("Arial","B","14");
$y = $pdf->GetY();
$pdf->Text(137,$y+15,"SANITARY PERMIT NO.");
$pdf->Line(139,$y+26,190,$y+26);
$pdf->SetXY(139,$y+21);
$pdf->Cell(51,5,"$sanitaryPermitNum",0,0,"C");
// $pdf->SetXY(150,$y+19);
// $pdf->Text(150,$y+25.5,"09271996");

//$pdf->SetXY(1,$y+15);
//$pdf->SetFont("Arial","B","9");
//$pdf->Text(11,$y+15,"DR. MIRABELLE M. BENJAMIN, MPH");
$pdf->SetXY(10,$y+11);
$pdf->SetFont("Arial","B","9");
$pdf->Cell(20,7,"DR. MIRABELLE M. BENJAMIN, MPH",0,1,"L");
$pdf->SetFont("Arial","","7");
$pdf->Cell(20,4,"City Health Officer",0,1,"L");
$pdf->Cell(20,4,"City of $laguna, Laguna",0,1,"L");

$y = $pdf->GetY();
$pdf->SetY($y+8);
$pdf->SetFont("Arial","B","7");
$pdf->Cell(20,4,"Thru: The Sanitation Inspector",0,1,"L");
$y = $pdf->GetY();
$pdf->SetY($y+1);
$pdf->Cell(0,4,"Re: ISSUANCE / RENEWAL OF SANITARY PERMIT",0,1,"C");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(1,4,"Dear Madam,",0,1,"L");

$y = $pdf->GetY();
$pdf->SetXY(20,$y+5);
$pdf->SetFont("Arial","","7");
$pdf->Cell(77,4,"I have the honor to apply for issuance/ Renewal of my establishment's ",0,0,"L");
$pdf->SetFont("Arial","B","7");
$pdf->Cell(25,4,"SANITARY PERMIT ",0,0,"L");
$pdf->SetFont("Arial","","7");
$pdf->Cell(5,4," Hereunder are the pertinent information to suppport my application:",0,1,"L");

$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetFont("Arial","B","7");
$pdf->Cell(10.5,4,"SEC/DTI",0,0,"L");
$pdf->Cell(33,4,"Approved Business Name:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+103,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.3);
$pdf->Cell(103,5,"$appBusinessName",0,0,"L");

$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetFont("Arial","","7");
$pdf->Cell(11,4,"Address: ",0,0,"L");
$pdf->SetFont("Arial","I","7");
$pdf->Cell(20.5,4,"(Unit No./Lot/Blk)",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+43,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.3);
$pdf->Cell(43,5,"$unitNum",0,0,"L");
$pdf->SetXY(84,$y);
$pdf->SetFont("Arial","I","7");
$pdf->Cell(19.5,4,"(Street/Avenue)",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+53,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.3);
$pdf->Cell(53,5,"$street",0,0,"L");

$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetFont("Arial","I","7");
$pdf->Cell(35.5,4,"(Industrial Park/Cmod/Building)",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+43,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.3);
$pdf->Cell(43,5,"$bldg",0,0,"L");
$pdf->SetXY(88,$y);
$pdf->SetFont("Arial","I","7");
$pdf->Cell(14,4,"(Barangay)",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+54.5,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.3);
$pdf->Cell(54.5,5,"$brgy",0,0,"L");

$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetFont("Arial","","7");
$pdf->Cell(22,4,"Registered Owner:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+63,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.3);
$pdf->Cell(63,5,"$regOwner",0,0,"L");
$pdf->SetXY(95,$y);
$pdf->Cell(16,4,"Contact Nos.",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+45.5,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.3);
$pdf->Cell(45.5,5,"$contactNum",0,0,"L");

$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetFont("Arial","B","7");
$pdf->Cell(31,4,"Nature/Line of Business:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+115.5,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.3);
$pdf->Cell(115.5,5,"$natBusi",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(18,$y+5);
$pdf->Cell(29,4,"Total No. Of Employees:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+20,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.3);
$pdf->Cell(20,5,"$maleEmp ",0,0,"C");
$pdf->SetX($x+20);
$pdf->Cell(8,4,"Male ;",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+5,$y+3.3,$x+25,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x+5,$y-.3);
$pdf->Cell(20,5,"$femaleEmp",0,0,"C");
$pdf->SetX(100);
$pdf->Cell(10,4,"Female",0,0,"L");
$pdf->SetX(130);
$pdf->Cell(5,4,"PWD's:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+5,$y+3.3,$x+24,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x+5,$y-.3);
$pdf->Cell(19,5,"$pwdEmp",0,0,"C");

//
$pdf->SetFont("Arial","","7");
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(76,4,"Annual Physical Exams for Employees are conducted(please check): ",0,0,"L");
$pdf->SetFont("Arial","B","7");
$pdf->Cell(1,4,"Yes",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+5,$y+3.3,$x+24,$y+3.3);
$x = $pdf->GetX();
$pdf->SetXY($x+5,$y-.3);
$pdf->Cell(19,5,"",0,0,"C");
$pdf->SetXY(111,$y);
$pdf->Cell(2,4,"; No",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+5,$y+3.3,$x+24,$y+3.3);
$x = $pdf->GetX();
$pdf->SetXY($x+5,$y-.3);
$pdf->Cell(19,5,"",0,0,"C");

//Checkbox Temporary
if($physicalExam == 0)
{
$pdf->SetXY(100.00125,113.6);
$check = "4";
$pdf->SetFont('ZapfDingbats','', 10);
$pdf->Cell(4, 3, $check,0, 0);
}
else if($physicalExam == 1)
{
  $pdf->SetXY(125,113.6);
$check = "4";
$pdf->SetFont('ZapfDingbats','', 10);
$pdf->Cell(4, 3, $check,0, 0);
}

$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetFont("Arial","","7");
$pdf->Cell(31,4,"Type or Level of Water Source:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+5,$y+3.3,$x+45,$y+3.3);
$x = $pdf->GetX();
$pdf->SetXY($x+5,$y-.3);
$pdf->Cell(40,5,"$watRes",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(18,$y+5);
$pdf->SetFont("Arial","B","7");
$pdf->Cell(31,4,"Attached are copies of requirements mandated by law. We understand that an inspection shall be conducted and we will also appreciate if you could",0,1,"L");
$pdf->Cell(0,4,"inform us of the result of the said inspection.",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(123,$y+10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x+7,$y+3.3,$x+66.5,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x+7,$y-.3);
$pdf->Cell(59.5,5,"",0,0,"C");
$pdf->Text($x+7,$y+6.5,"Signature of Owner or Representative (w/authorization)");

$y = $pdf->GetY();
$pdf->SetY($y+8);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Image('application/views/dashboard/cho/scissor2.png',$x,$y,5,5);
$pdf->Image('application/views/dashboard/cho/scissor2.png',$x+5,$y,5,5);
$pdf->Image('application/views/dashboard/cho/scissor2.png',$x+10,$y,5,5);
$pdf->Line($x+15,$y+3.3,$x+177,$y+3.3);

$y = $pdf->GetY();
$pdf->SetXY(167,$y+5);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(5,4,"EHS Form 110-A",0,0,"L");

$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(50,4,"SEC/DTI Approved Business Name:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+80,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.3);
$pdf->Cell(80,5,"",0,0,"L");
$pdf->SetX(140);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(9,4,"Date:",0,0,"L");
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+27,$y+3.3);
$pdf->SetFont("Arial","","7");
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.3);
$pdf->Cell(27,5,"",0,0,"C");
$pdf->SetX(176);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(9,4,", 2017",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(36,$y+10);
$pdf->SetFont("Arial","B","7");
$pdf->Cell(9,4,"Additional requirements for food and non-food pursuant to City Ordinance No. 04(2013)",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(36,$y+5);
$pdf->SetFont("Arial","","7");
$pdf->Cell(5,4,"1.",0,0,"L");
$pdf->SetFont("Arial","B","7");
$pdf->Cell(27,4,"Health Card/Certificate",0,0,"L");
$pdf->SetFont("Arial","","7");
$pdf->Cell(3,4,"(to be secured at the Health Center/One stop)",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(41,$y+5);
$pdf->SetFont("Arial","B","7");
$pdf->Cell(6,4,"* * *",0,0,"L");
$pdf->SetFont("Arial","I","7");
$pdf->Cell(3,4,"Result of Annual PE/ME (Chest Xray; Urinalysis; Fecalysis)",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(36,$y+5);
$pdf->SetFont("Arial","","7");
$pdf->Cell(5,4,"2.",0,0,"L");
$pdf->SetFont("Arial","B","7");
$pdf->Cell(19,4,"Water Analysis",0,0,"L");
$pdf->SetFont("Arial","","7");
$pdf->Cell(3,4,"(Physical/Chemical; Micro-Bacteriological Exams; Cert. of Portability from CHQ)",0,0,"L");

$y = $pdf->GetY();
$pdf->SetXY(36,$y+5);
$pdf->SetFont("Arial","","7");
$pdf->Cell(5,4,"3.",0,0,"L");
$pdf->SetFont("Arial","B","7");
$pdf->Cell(19,4,"Vermin and Rodent Control",0,0,"L");

$pdf->SetXY(25,$y-11);
$pdf->Cell(10,10,"",1,1,"");
// $pdf->Text(26,$y-5,"Check");
$pdf->SetX(25);
$pdf->Cell(10,5,"",1,1,"");
// $pdf->Text(26,$y+2.7,"Check");
$pdf->SetX(25);
$pdf->Cell(10,5,"",1,1,"");
// $pdf->Text(26,$y+7.7,"Check");

$y = $pdf->GetY();
$pdf->SetY($y+3);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+22,$y+3.3);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.3);
$pdf->Cell(22,5,"",0,0,"C");
$pdf->SetX(46);
$pdf->SetFont("Arial","","8");
$pdf->Cell(62.5,5,"lacking in essential requirements embodied in the",0,0,"L");
$pdf->SetFont("Arial","B","8");
$pdf->Cell(60,5," Sanitation Code of the Philippines and City",0,1,"L");
$pdf->SetX(46);
$pdf->Cell(33,5,"Ordinance No. 04-(2013),",0,0,"L");
$pdf->SetFont("Arial","","8");
$pdf->Cell(60,5," please submit the same within (15) fifteen days;",0,1,"L");

$y = $pdf->GetY();
$pdf->SetY($y+3);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Line($x,$y+3.3,$x+22,$y+3.3);
$x = $pdf->GetX();
$pdf->SetXY($x,$y-.3);
$pdf->Cell(22,5,"",0,0,"C");
$pdf->SetX(46);
$pdf->SetFont("Arial","B","10");
$pdf->Cell(32,5,"FOR INSPECTION.",0,0,"L");
$pdf->SetFont("Arial","","8");
$pdf->Cell(51,5,"In the interest of your public health, your",0,0,"L");
$pdf->SetFont("Arial","B","8");
$pdf->Cell(21.5,5,"Sanitary permit",0,0,"L");
$pdf->SetFont("Arial","","8");
$pdf->Cell(22,5,"will be issued",0,1,"L");
$pdf->SetX(46);
$pdf->Cell(22,5,"after the inspection.",0,1,"L");
$pdf->SetX(115);
$pdf->SetFont("Arial","B","8");
$pdf->Cell(22,5,"By: PAUL M. SARMIENTO",0,1,"L");
$pdf->SetX(121);
$pdf->SetFont("Arial","","8");
$pdf->Cell(22,5,"Sanitation Inspector",0,1,"L");

$y = $pdf->GetY();
$pdf->SetXY(23,$y+3);
$pdf->SetFont("Arial","","7");
$pdf->Cell(32,5,"For inquiries, please contact: ",0,0,"L");
$pdf->SetFont("Arial","IB","7");
$ce = utf8_decode("chobiñan_sanitation@yahoo.com");
$pdf->Cell(40.5,5,"$ce",0,0,"L");
$pdf->SetFont("Arial","I","7");
$pdf->Cell(42,5,"/ Smart: 0998-510-7301 /Landline: 049-511-8142",0,1,"L");
$y = $pdf->GetY();
$pdf->SetXY(23,$y+3);
$pdf->Cell(42,5,"*All offices of the City Government of $laguna are undergoing ISO Certification, please bear with us: Say no to FIXERS.*",0,0,"L");
$pdf->Output();

?>
