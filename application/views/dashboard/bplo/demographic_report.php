<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$pdf->AddPage("");
$pdf->SetTitle("Demographic Report");

$pdf->SetFont("Times","B","10");
$pdf->Cell(94,5,"DEMOGRAPHIC REPORT",1,1,"C");

$maleOwner = $this->Owner_m->count_male_owners();
$femaleOwner = $this->Owner_m->count_female_owners();
$maleEmployee = $total_male;
$femaleEmployee = $total_female;
$totalMale = $maleOwner + $maleEmployee;
$totalFemale = $femaleOwner + $femaleEmployee;
$totalOwner = $maleOwner + $femaleOwner;
$totalEmployee = $maleEmployee + $femaleEmployee;
$total = $totalOwner + $totalEmployee;

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont("Times","","10");
$pdf->Text($x,$y+8.5,"MALE");
$pdf->Text($x,$y+13.5,"FEMALE");
$pdf->SetFont("Times","B","10");
$pdf->Text($x,$y+19,"TOTAL");

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+30,$y);
$pdf->SetFont("Times","","10");
$pdf->Cell(23,5,"OWNER",1,0,"C");
$pdf->Cell(23,5,"EMPLOYEE",1,0,"C");
$pdf->Cell(18,5,"TOTAL",1,1,"C");

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+30,$y);
$pdf->SetFont("Times","","10");
$pdf->MultiCell(23,5,"$maleOwner\n$femaleOwner",1,"R");
$pdf->SetXY($x+53,$y);
$pdf->MultiCell(23,5,"$maleEmployee\n$femaleEmployee",1,"R");
$pdf->SetXY($x+76,$y);
$pdf->MultiCell(18,5,"$totalMale\n$totalFemale",1,"R");

$y = $pdf->GetY();
$pdf->SetXY($x+30,$y);
$pdf->SetFont("Times","B","10");
$pdf->Cell(23,6,"$totalOwner",1,0,"R");
$pdf->Cell(23,6,"$totalEmployee",1,0,"R");
$pdf->Cell(18,6,"$total",1,1,"R");

$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(94,5,"REPORT BY BARANGAY",1,1,"C");
$pdf->SetFont("Times","","9");

$y = $pdf->GetY();
$pdf->SetY($y);
$pdf->Cell(25,5,"BARANGAY",1,0,"C");
$pdf->Cell(25,5,"BUSINESSES",1,0,"C");
$pdf->Cell(44,5,"RENEWED APPLICATIONS",1,0,"C");

$y = $pdf->GetY();
$pdf->SetY($y+4);
//
if (isset($barangay_array))
{
  $countBrgy = count($barangay_array);
  for($i=0;$i<$countBrgy;$i++)
  {
    $cellHeight = 5;
    $cellHeight = $cellHeight+6.5;
  }
  $y = $pdf->GetY();
  $pdf->SetY($y+1);
  $pdf->Cell(25,$cellHeight,"",1,0,"C");
  $pdf->Cell(25,$cellHeight,"",1,0,"C");
  $pdf->Cell(44,$cellHeight,"",1,0,"C");
foreach ($barangay_array as $key => $barangay)
  {
    $y = $pdf->GetY();
    $pdf->SetY($y+1);
    $pdf->Cell(25,5,utf8_decode($barangay->barangay),0,0,"L");
    $pdf->Cell(25,5,"$barangay->count",0,0,"R");
    $pdf->Cell(44,5,isset($barangay->expired) ? $barangay->expired : "1",0,0,"R");
    // $pdf->Text(11,$y+5,$barangay->barangay);
    // $pdf->Text(40,$y+5,$barangay->count);
    // $pdf->Text(50,$y+5,isset($barangay->expired) ? $barangay->expired : "1");
    $y = $pdf->GetY();
    $pdf->SetY($y+5);
  }
}

$dateHolder = date('M d Y');
$title = "demographic-report";
$fileName = "$title-$dateHolder";
$pdf->Output('I',$fileName);
?>
