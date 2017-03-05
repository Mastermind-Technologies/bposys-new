<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetTitle("Assessment Form");

$pdf->SetFont("Arial","B","11");

$y = $pdf->GetY();
$pdf->SetY($y);
$pdf->Cell(0,5,"TAX ORDER OF PAYMENT",0,0,"C");

$y = $pdf->GetY();
$pdf->SetY($y+8);
$pdf->SetFont("Arial","B","9");
$pdf->Cell(37.6,5,"Name of Business",0,0,"L");
$pdf->Cell(37.6,5,"Line of Business",0,0,"L");
$pdf->Cell(37.6,5,"Status",0,0,"L");
$pdf->Cell(37.6,5,"Bill No.",0,0,"L");
$pdf->Cell(37.6,5,"Year",0,0,"L");

//
$businessName = utf8_decode($application->get_businessName());
$lineOfBusiness = $application->get_LineOfBusiness();
$status = $application->get_ApplicationType();
$billNumber = $application->get_Assessment()->assessmentId;
$year = date('Y', strtotime($application->get_Assessment()->createdAt));
$y = $pdf->GetY();
$pdf->SetY($y+5);
$y = $pdf->GetY();
$pdf->SetFont("Arial","","7");
$pdf->SetXY(47.6,$y);
$pdf->Cell(37.6,5,"$lineOfBusiness",0,0,"L");
$pdf->Cell(37.6,5,"$status",0,0,"L");
$pdf->Cell(37.6,5,"$billNumber",0,0,"L");
$pdf->Cell(37.6,5,"$year",0,0,"L");
$pdf->SetXY(10,$y);
$pdf->MultiCell(37.6,5,"$businessName",0,"L");

//
$y = $pdf->GetY();
$pdf->SetY($y+2);
$pdf->SetFont("Arial","B","9");
$pdf->Cell(37.6,5,"Owner/Taxpayer",0,0,"L");
$pdf->Cell(37.6,5,"Business Address",0,0,"L");
$pdf->Cell(37.6,5,"Capital",0,0,"L");
$pdf->Cell(37.6,5,"Date Issued",0,0,"L");
$pdf->Cell(37.6,5,"Mode of Payment",0,0,"L");

//
$ownerName = utf8_decode($application->get_FirstName()." ".strtoupper(substr($application->get_MiddleName(),0,1)).". ".$application->get_LastName());
$businessAddress = utf8_decode($application->get_barangay().", Biñan City, Laguna");
$capital = "PHP ".number_format($application->get_capital(), 2);
$dateIssued = date('F j, o',strtotime($application->get_Assessment()->createdAt));
$modeOfPayment = $application->get_modeOfPayment();
$y = $pdf->GetY();
$pdf->SetY($y+5);
$y = $pdf->GetY();
$pdf->SetFont("Arial","","7");
$pdf->SetXY(47.6,$y);
$pdf->Cell(37.6,5,"$businessAddress",0,0,"L");
$pdf->Cell(37.6,5,"$capital",0,0,"L");
$pdf->Cell(37.6,5,"$dateIssued",0,0,"L");
$pdf->Cell(37.6,5,"$modeOfPayment",0,0,"L");
$pdf->SetXY(10,$y);
$pdf->MultiCell(37.6,5,"$ownerName",0,"L");

//
$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetFont("Arial","B","6");
$pdf->Cell(16,5,"Year",1,0,"C");
$pdf->Cell(18,5,"Period",1,0,"C");
$pdf->Cell(80,5,"Particulars",1,0,"C");
$pdf->Cell(16,5,"Due",1,0,"C");
$pdf->Cell(20,5,"Surcharge",1,0,"C");
$pdf->Cell(19,5,"Interest",1,0,"C");
$pdf->Cell(19,5,"Total",1,0,"C");

//
$y = $pdf->GetY();
$pdf->SetY($y+5.1);
// $y = $pdf->GetY();
// $pdf->MultiCell(16,5,"",1,"C");
// $pdf->SetXY(26,$y);
// $pdf->MultiCell(18,5,"",1,"C");
// $pdf->SetXY(44,$y);
// $pdf->MultiCell(80,5,"",1,"C");
// $pdf->SetXY(124,$y);
// $pdf->MultiCell(16,5,"",1,"C");
// $pdf->SetXY(140,$y);
// $pdf->MultiCell(20,5,"",1,"C");
// $pdf->SetXY(160,$y);
// $pdf->MultiCell(19,5,"",1,"C");
// $pdf->SetXY(179,$y);
// $pdf->MultiCell(19,5,"",1,"C");
//
$pdf->SetFont("Arial","","6");
$overallTotal = 0;
$totalDue = 0;
$totalSurcharge = 0;
$totalInterest = 0;

foreach ($application->get_Charges() as $key => $charge)
{
$year = date('Y', strtotime($charge->createdAt));
$period = $charge->period;
$particulars = $charge->particulars;
$due = number_format($charge->due, 2);
$surcharge = number_format($charge->surcharge, 2);
$interest = number_format($charge->interest, 2);
$total = $charge->due + $charge->surcharge + $charge->interest;

$overallTotal += $total;
$totalDue += $charge->due;
$totalSurcharge += $charge->surcharge;
$totalInterest += $charge->interest;
// $pdf->SetXY(10,$y);
$pdf->Cell(16,5,"$year",1,0,"C");	
// $pdf->SetXY(26,$y);
$pdf->Cell(18,5,"$period",1,0,"C");
// $pdf->SetXY(44,$y);
$pdf->Cell(80,5,"$particulars",1,0,"L");
// $pdf->SetXY(124,$y);
$pdf->Cell(16,5,"$due",1,0,"R");
// $pdf->SetXY(140,$y);
$pdf->Cell(20,5,"$surcharge",1,0,"R");
// $pdf->SetXY(160,$y);
$pdf->Cell(19,5,"$interest",1,0,"R");
// $pdf->SetXY(179,$y);
$pdf->Cell(19,5,"$total",1,0,"R");
$y = $pdf->GetY();
$pdf->SetY($y+5);
}

//
$y = $pdf->GetY();
$pdf->SetXY(44,$y+3);
$pdf->SetFont("Arial","","7");
$pdf->Cell(80,5,"Total:",0,0,"R");
$pdf->Cell(16,5,"$totalDue",0,0,"R");
$pdf->Cell(20,5,"$surcharge",0,0,"R");
$pdf->Cell(19,5,"$interest",0,0,"R");
$pdf->Cell(19,5,"$overallTotal",0,0,"R");

$balance = number_format($application->get_Assessment()->amount, 2);
$y = $pdf->GetY();
$pdf->SetXY(44,$y+5);
$pdf->Cell(80,5,"Balance:",0,0,"R");
$pdf->Cell(16,5,"$balance",0,0,"R");

$y = $pdf->GetY();
$pdf->SetXY(10,$y+5);
$pdf->SetFont("Arial","B","6");
$pdf->Cell(28,5,"Due Date",1,0,"C");
$pdf->Cell(40,5,"First Quarter (Jan 20)",1,0,"C");
$pdf->Cell(40,5,"Second Quarter (Apr 20)",1,0,"C");
$pdf->Cell(40,5,"Third Quarter (Jul 20)",1,0,"C");
$pdf->Cell(40,5,"Fourth Quarter (Oct 20)",1,0,"C");

$firstQuarter = isset($application->get_quarterPayment()[0]) ? number_format($application->get_quarterPayment()[0], 2) : '.00';
$secondQuarter = isset($application->get_quarterPayment()[1]) ? number_format($application->get_quarterPayment()[1], 2) : '.00';
$thirdQuarter = isset($application->get_quarterPayment()[2]) ? number_format($application->get_quarterPayment()[2], 2) : '.00';
$fourthQuarter = isset($application->get_quarterPayment()[3]) ? number_format($application->get_quarterPayment()[3], 2) : '.00';

$y = $pdf->GetY();
$pdf->SetXY(10,$y+5);
$pdf->SetFont("Arial","B","7");
$pdf->Cell(28,5,"Amount Due",1,0,"R");
$pdf->SetFont("Arial","","7");
$pdf->Cell(40,5,"$firstQuarter",1,0,"R");
$pdf->Cell(40,5,"$secondQuarter",1,0,"R");
$pdf->Cell(40,5,"$thirdQuarter",1,0,"R");
$pdf->Cell(40,5,"$fourthQuarter",1,0,"R");

$referenceNumber = $this->encryption->decrypt($application->get_referenceNum());
$dateHolder = date('M d Y');
$title = "order-of-payment-";
$fileName = "$title-$dateHolder-$referenceNumber";
$pdf->Output('I',$fileName);
 ?>
