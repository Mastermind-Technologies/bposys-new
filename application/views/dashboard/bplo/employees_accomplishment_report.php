<?php if (isset($barangay_array)): ?>
<?php foreach ($barangay_array as $key => $barangay): ?>
<?php endforeach ?>
<?php endif ?>

<?php

require("application/views/FPDF/fpdf.php");
$pdf = new FPDF();

$pdf->AddPage("L");
$pdf->SetFont("Times","B","10");
$pdf->SetTitle("Employees Accomplishment Report");

$y = $pdf->GetY();
$pdf->SetY($y+10);
$pdf->MultiCell(0,5,"EMPLOYEES ACCOMPLISHMENT REPORT\nFOR THE PERIOD JANUARY TO JUNE 2016",1,"C");

$y = $pdf->GetY();
$pdf->SetY($y+5);
$pdf->Cell(0,5,"Business Permit",1,1,"C");

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont("Times","","10");
$pdf->Text($x,$y+13,"NEW");
$pdf->Text($x,$y+22,"RENEWAL");
$pdf->SetFont("Times","B","10");
$pdf->Text($x,$y+28,"TOTAL");

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+30,$y);
$pdf->SetFont("Times","","10");
$pdf->Cell(18,5,"JAN",1,0,"C");
$pdf->Cell(18,5,"FEB",1,0,"C");
$pdf->Cell(18,5,"MAR",1,0,"C");
$pdf->Cell(18,5,"APR",1,0,"C");
$pdf->Cell(18,5,"MAY",1,0,"C");
$pdf->Cell(18,5,"JUN",1,0,"C");
$pdf->Cell(18,5,"JUL",1,0,"C");
$pdf->Cell(18,5,"AUG",1,0,"C");
$pdf->Cell(18,5,"SEP",1,0,"C");
$pdf->Cell(18,5,"OCT",1,0,"C");
$pdf->Cell(18,5,"NOV",1,0,"C");
$pdf->Cell(18,5,"DEC",1,0,"C");
$pdf->Cell(31,5,"TOTAL",1,1,"C");

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+30,$y);
$pdf->SetFont("Times","","10");
$pdf->MultiCell(18,9,"$n_january\n$r_january",1,"R");
$pdf->SetXY($x+48,$y);
$pdf->MultiCell(18,9,"$n_february\n$r_february",1,"R");
$pdf->SetXY($x+66,$y);
$pdf->MultiCell(18,9,"$n_march\n$r_march",1,"R");
$pdf->SetXY($x+84,$y);
$pdf->MultiCell(18,9,"$n_april\n$r_april",1,"R");
$pdf->SetXY($x+102,$y);
$pdf->MultiCell(18,9,"$n_may\n$r_may",1,"R");
$pdf->SetXY($x+120,$y);
$pdf->MultiCell(18,9,"$n_june\n$r_june",1,"R");
$pdf->SetXY($x+138,$y);
$pdf->MultiCell(18,9,"$n_july\n$r_july",1,"R");
$pdf->SetXY($x+156,$y);
$pdf->MultiCell(18,9,"$n_august\n$r_august",1,"R");
$pdf->SetXY($x+174,$y);
$pdf->MultiCell(18,9,"$n_september\n$r_september",1,"R");
$pdf->SetXY($x+192,$y);
$pdf->MultiCell(18,9,"$n_october\n$r_october",1,"R");
$pdf->SetXY($x+210,$y);
$pdf->MultiCell(18,9,"$n_november\n$r_november",1,"R");
$pdf->SetXY($x+228,$y);
$pdf->MultiCell(18,9,"$n_december\n$r_december",1,"R");
$pdf->SetXY($x+246,$y);
$pdf->MultiCell(31,9,"$businesses\n$renew",1,"R");

//

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetXY($x+30,$y);
$pdf->SetFont("Times","B","10");
$pdf->Cell(18,8,$n_january+$r_january,1,0,"R");
$pdf->Cell(18,8,$n_february+$r_february,1,0,"R");
$pdf->Cell(18,8,$n_march+$r_march,1,0,"R");
$pdf->Cell(18,8,$n_april+$r_april,1,0,"R");
$pdf->Cell(18,8,$n_may+$r_may,1,0,"R");
$pdf->Cell(18,8,$n_june+$r_june,1,0,"R");
$pdf->Cell(18,8,$n_july+$r_july,1,0,"R");
$pdf->Cell(18,8,$n_august+$r_august,1,0,"R");
$pdf->Cell(18,8,$n_september+$r_september,1,0,"R");
$pdf->Cell(18,8,$n_october+$r_october,1,0,"R");
$pdf->Cell(18,8,$n_november+$r_november,1,0,"R");
$pdf->Cell(18,8,$n_december+$r_december,1,0,"R");
$overallTotal = $businesses +$renew;
$pdf->Cell(31,8,"$overallTotal",1,1,"R");
//

//
// $y = $pdf->GetY();
// $pdf->SetY($y+5);
// $pdf->Cell(0,5,"INSPECTED ESTABLISHMENT",1,1,"C");
//
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf->SetXY($x+30,$y);
// $pdf->SetFont("Times","","10");
// $pdf->Cell(40,5,"Businesses",1,0,"C");
// $pdf->Cell(40,5,"Unrenewed Applications",1,0,"C");
// $pdf->Cell(18,5,"Total",1,1,"C");
//
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf->SetFont("Times","","9");
//   $pdf->Text($x,$y+5,"$barangay->barangay");
//   $pdf->Text($x,$y+12,"BUNGAHAN");
//   $pdf->Text($x,$y+19,"CANLALAY");
//   $pdf->Text($x,$y+26,"CAILES");
//   $pdf->Text($x,$y+33,"DELA PAZ");
//   $pdf->Text($x,$y+40,"GANADO");
//   $pdf->Text($x,$y+47,"LANGKIWA");
//   $pdf->Text($x,$y+54,"LOMA");
//   $pdf->Text($x,$y+61,"MALABAN");
//   $pdf->Text($x,$y+68,"MALAMIG");
//   $pdf->Text($x,$y+75,"MAMPALASAN");
//   $pdf->Text($x,$y+82,"PLATERO");
//   // $pdf->Text($x,$y+65,"Poblacion");
//   // $pdf->Text($x,$y+70,"San Antonio");
//   // $pdf->Text($x,$y+75,"San Francisco");
//   // $pdf->Text($x,$y+80,"San Jose");
//   // $pdf->Text($x,$y+85,"San Vicente");
//   // $pdf->Text($x,$y+90,"Santo Domingo");
//   // $pdf->Text($x,$y+95,"Soro-soro");
//   // $pdf->Text($x,$y+100,"Sto. Nino");
//   // $pdf->Text($x,$y+105,"Sto. Tomas");
//   // $pdf->Text($x,$y+110,"Timbao");
//   // $pdf->Text($x,$y+115,"Tubigan");
//   // $pdf->Text($x,$y+120,"Zapote");
//   $pdf->SetFont("Times","B","10");
//   //$pdf->Text($x,$y+64,"TOTAL");
//
//   $c = count($barangay_array);
//   $x = $pdf->GetX();
//   $y = $pdf->GetY();
//   $pdf->SetXY($x+30,$y);
//   $pdf->SetFont("Times","","10");
//   $pdf->MultiCell(40,84,"$c\n",1,"R");
//   $pdf->SetXY($x+70,$y);
//   $pdf->MultiCell(40,84,"",1,"R");
//   $pdf->SetXY($x+110,$y);
//   $pdf->MultiCell(18,84,"",1,"R");
//
// $pdf->AddPage("L");
// $y = $pdf->GetY();
// $pdf->SetY($y+5);
// $pdf->SetFont("Times","B","10");
// $pdf->Cell(0,5,"INSPECTED ESTABLISHMENT",1,1,"C");
//
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf->SetXY($x+30,$y);
// $pdf->SetFont("Times","","10");
// $pdf->Cell(40,5,"Businesses",1,0,"C");
// $pdf->Cell(40,5,"Unrenewed Applications",1,0,"C");
// $pdf->Cell(18,5,"Total",1,1,"C");
//
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf->SetFont("Times","","9");
// $pdf->Text($x,$y+5,"POBLACION");
// $pdf->Text($x,$y+12,"SAN ANTONIO");
// $pdf->Text($x,$y+19,"SAN FRANCISCO");
// $pdf->Text($x,$y+26,"SAN JOSE");
// $pdf->Text($x,$y+33,"SAN VICENTE");
// $pdf->Text($x,$y+40,"SANTO DOMINGO");
// $pdf->Text($x,$y+47,"SORO-SORO");
// $pdf->Text($x,$y+54,"STO. NINO");
// $pdf->Text($x,$y+61,"ST0. TOMAS");
// $pdf->Text($x,$y+68,"TIMBAO");
// $pdf->Text($x,$y+75,"TUBIGAN");
// $pdf->Text($x,$y+82,"ZAPOTE");
//
//   $x = $pdf->GetX();
//   $y = $pdf->GetY();
//   $pdf->SetXY($x+30,$y);
//   $pdf->SetFont("Times","","10");
//   $pdf->MultiCell(40,84,"",1,"R");
//   $pdf->SetXY($x+70,$y);
//   $pdf->MultiCell(40,84,"",1,"R");
//   $pdf->SetXY($x+110,$y);
//   $pdf->MultiCell(18,84,"",1,"R");
//
//   $pdf->SetFont("Times","B","10");
//   $y = $pdf->GetY();
//   $pdf->Text(10,$y+6,"TOTAL");
//   $x = $pdf->GetX();
//   $y = $pdf->GetY();
//   $pdf->SetXY($x+30,$y);
//   $pdf->SetFont("Times","B","10");
//   $pdf->Cell(40,8,"",1,0,"R");
//   $pdf->Cell(40,8,"",1,0,"R");
//   $pdf->Cell(18,8,"",1,0,"R");
$pdf->Output();
 ?>
