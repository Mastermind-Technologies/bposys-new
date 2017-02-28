<?php
    require("application/views/FPDF/fpdf.php");
    $var = "Jason";
    $pdf = new  FPDF();
    //var_dump(get_class_methods($pdf));
    $pdf->AddPage();
    $pdf->SetTitle("Application_Form");
    $pdf->SetFont("Arial","","8");

    $pdf->SetY(22);
    //$pdf->MultiCell(0,4,"Application Form for BUSINESS PERMIT\nTax Year",1,"C",0);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->Cell(0,9,"",1,1,"");
        $pdf->Text($x+77,$y+3,"Application Form for");
        $pdf->SetFont("Arial","B","9");
        $pdf->Text($x+103,$y+3,"BUSINESS PERMIT");
        $pdf->SetFont("Arial","","8");
        $pdf->Text($x+89,$y+7.7,"Tax Year");
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->Line($x+101,$y-1,$x+111.5,$y-1);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x+101,$y-5.2);
    $taxYear=$application->get_taxYear();
    $pdf->Cell(10.5,5,$taxYear,0,0,"C");
    // $pdf->SetFont("Arial","U","7");
    // $pdf->Cell(0,10,"Hello",0,0,"L");

    //MultiCell
    $pdf->SetXY(10.00125,31);
      $x = $pdf->GetX();
      $y = $pdf->GetY();
    $pdf->Cell(59,20,"",1,0,"C");
      $pdf->Text($x+17,$y+4,"Transfer");
      $pdf->SetXY(12.00125,37);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(7,2.5,"New",0,0,"L");
      $pdf->SetXY(12.00125,41);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(13,2.5,"Renewal",0,0,"L");
      $pdf->SetXY(12.00125,45);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(14,2.5,"Additional",0,0,"L");

      //
      $pdf->SetXY(31.00125,37);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(7,2.5,"Ownership",0,0,"L");
      $pdf->SetXY(31.00125,41);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(13,2.5,"Renewal",0,0,"L");
      $pdf->SetXY(31.00125,45);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(14,2.5,"Change of Business name",0,0,"L");
      //
    $pdf->SetXY(69.00125,31);
      $x = $pdf->GetX();
      $y = $pdf->GetY();
    $pdf->Cell(80,20,"",1,0,"C");
      $pdf->Text($x+24,$y+4,"Amendment:");
      $pdf->SetXY(72.00125,38);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(7,2.5,"New",0,0,"L");
      $pdf->SetXY(72.00125,42);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(13,2.5,"Renewal",0,0,"L");
      $pdf->SetXY(72.00125,46);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(14,2.5,"Additional",0,0,"L");
      //
      $pdf->SetXY(109.00125,38);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(7,2.5,"New",0,0,"L");
      $pdf->SetXY(109.00125,42);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(13,2.5,"Renewal",0,0,"L");
      $pdf->SetXY(109.00125,46);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(14,2.5,"Additional",0,0,"L");
    $pdf->SetXY(149.00125,31);
      $x = $pdf->GetX();
      $y = $pdf->GetY();
      $pdf->Cell(51,20,"",1,1,"C");
      $pdf->Text($x+15.5,$y+4,"Mode of Payment:");
      $pdf->SetXY(165.5125,39);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(7,2.5,"Annually",0,0,"L");
      $pdf->SetXY(165.5125,43);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(13,2.5,"Bi-Annually",0,0,"L");
      $pdf->SetXY(165.5125,47);
      $pdf->Cell(2.7,2.5,"",1,0,"C");
      $x=$pdf->GetX();
      $pdf->SetX($x);
      $pdf->Cell(14,2.5,"Quarterly",0,0,"L");

    $pdf->SetXY(10.00125,51);
    $dateApp=$application->get_applicationDate();
    $pdf->Cell(95,4,"Date of Application $dateApp",1,0,"L");
    $dscRegNo = $application->get_DTISECCDARegNum();
    $pdf->Cell(95,4,"DTI/SEC/ CDA Registration No. $dscRegNo",1,1,"L");

    $refNo=$this->encryption->decrypt($application->get_referenceNum());
    $pdf->Cell(95,4,"Reference No. $refNo",1,0,"L");
    $dscDateReg=$application->get_DTISECCDADate();
    $pdf->Cell(95,4,"DTI/SEC/ CDA Date of Registration $dscDateReg",1,1,"L");

    $typeOrg = $application->get_organizationType();
      if($typeOrg == "Single")
    {
      $pdf->SetXY(48,59.5);
      $check = "4";
      $pdf->SetFont('ZapfDingbats','', 10);
      $pdf->Cell(4, 3, $check,0, 0);
    }
    else if($typeOrg == "Partnership")
    {
        $pdf->SetXY(84,59.5);
      $check = "4";
      $pdf->SetFont('ZapfDingbats','', 10);
      $pdf->Cell(4, 3, $check,0, 0);
    }
    else if($typeOrg == "Corporation")
    {
      $pdf->SetXY(120,59.5);
      $check = "4";
      $pdf->SetFont('ZapfDingbats','', 10);
      $pdf->Cell(4, 3, $check,0, 0);
    }

    $pdf->SetFont("Arial","","8");
    $pdf->SetY(59);
    $pdf->Cell(190,4,"Type of Organization:",1,1,"L");
      $pdf->SetXY(49,59.5);
      $x=$pdf->GetX();
      $y=$pdf->GetY();
      $pdf->Cell(2.7,2.9,"",1,1,"C");
      $pdf->Text($x+5,$y+2.5,"Single");
      //
      $pdf->SetXY(85,59.5);
      $x=$pdf->GetX();
      $y=$pdf->GetY();
      $pdf->Cell(2.7,2.9,"",1,1,"C");
      $pdf->Text($x+5,$y+2.5,"Partnership");
      //
      $pdf->SetXY(121,59.5);
      $x=$pdf->GetX();
      $y=$pdf->GetY();
      $pdf->Cell(2.7,2.9,"",1,1,"C");
      $pdf->Text($x+5,$y+2.5,"Corporation");

    //
    $pdf->SetY(63);
    $pdf->SetFont("Arial","","7");
    $ctcNum = $application->get_CTCNum();
    $pdf->Cell(95,4,"CTC No. $ctcNum",1,0,"L");
    $tin = $application->get_TIN();
    $pdf->Cell(95,4,"TIN: $tin",1,1,"L");

    $taxIncent = $application->get_entityName()=="NA" ? "No" : "Yes";
    if($taxIncent == "Yes")
    {
      $pdf->SetXY(93,67.5);
      $check = "4";
      $pdf->SetFont('ZapfDingbats','', 10);
      $pdf->Cell(4, 3, $check,0, 0);
    }
    else if($taxIncent == "No")
    {
      $pdf->SetXY(104,67.5);
      $check = "4";
      $pdf->SetFont('ZapfDingbats','', 10);
      $pdf->Cell(4, 3, $check,0, 0);
    }
    $pdf->SetFont("Arial","","7");
    $pdf->SetY(67);
    $pdf->Cell(190,4,"Are you enjoying tax incentive from any Government entity?",1,1,"L");
      $pdf->SetXY(93,67);
      $pdf->Cell(10,4,"[  ] Yes",0,0,"L");
      $pdf->SetXY(104,67);
      $pdf->Cell(37,4,"[  ] No Please specify the entity:",0,1,"L");
      $pdf->SetXY(141,67);
      $pdf->Cell(59,4,"Val",0,1,"L");
    //
    $pdf->SetFont("Arial","","8");
    $pdf->MultiCell(17,4,"Name of\nTax Payer",1,"C",0);
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $pdf->SetXY($x + 17, $y - 8);

    $lastName = $application->get_LastName();
    $firstName = $application->get_FirstName();
    $middleName = $application->get_MiddleName();

    $pdf->SetFont("Arial","I","6");
      $y = $pdf->GetY();
      $pdf->Text(28,$y+2.5,"Last Name");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(78,8,"$lastName",1,0,"L");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(106,$y+2.5,"First Name");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(48,8,"$firstName",1,0,"L");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(154,$y+2.5,"Middle Name");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(47,8,"$middleName",1,1,"L");

    $pdf->SetFont("Arial","","8");
    $businessName = $application->get_businessName();
    $pdf->Cell(190,7,"Business Name: $businessName",1,1,"L");

    $tradeName = $application->get_tradeName();
    $pdf->Cell(190,7,"Trade Name/Franchise: $tradeName",1,1,"L");

    $pdf->SetFont("Arial","","7");
    $presLastName = $application->get_presidentTreasurerName()  ;
    // $presFirstName = $application->get_LastName();
    // $presMiddleName = $application->get_LastName();

    $pdf->MultiCell(38,4,"Name of President/Treasure of Corporation: $presLastName",1,"L");
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $pdf->SetXY($x + 38, $y - 8);

    $pdf->SetFont("Arial","I","6");
      $pdf->Text(49,95.5,"Last Name");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(57,8,"",1,0,"TL");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(106,95.5,"First Name");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(48,8,"",1,0,"TL");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(154,95.5,"Middle Name");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(47,8,"",1,1,"TL");

    $pdf->SetFont("Arial","B","8");
    $houseNumBusi = $application->get_houseBldgNum();
    $houseNumOwner = $application->get_OwnerHouseBldgNo();
    $pdf->Cell(95,4,"Business Address",1,0,"C");
    $pdf->Cell(95,4,"Owner's Address",1,1,"C");

    $pdf->SetFont("Arial","","7");
    $pdf->Cell(95,4,"House No./Bldg. No. $houseNumBusi",1,0,"L");
    $pdf->Cell(95,4,"House No./Bldg. No. $houseNumOwner",1,1,"L");

    $baBldgName = $application->get_bldgName();
    $oaBldgName = $application->get_OwnerBldgName();
    $pdf->Cell(95,4,"Building Name $baBldgName",1,0,"L");
    $pdf->Cell(95,4,"Building Name $oaBldgName",1,1,"L");

    $baUnitNum = $application->get_unitNum();
    $oaUnitNum = $application->get_OwnerunitNum();
    $pdf->Cell(95,4,"Unit No. $baUnitNum",1,0,"L");
    $pdf->Cell(95,4,"Unit No. $oaUnitNum",1,1,"L");

    $baStreet = $application->get_street();
    $oaStreet = $application->get_OwnerStreet();
    $pdf->Cell(95,4,"Street $baStreet",1,0,"L");
    $pdf->Cell(95,4,"Street $oaStreet",1,1,"L");

    $baBrgy = $application->get_barangay();
    $oaBrgy = $application->get_Ownerbarangay();
    $pdf->Cell(95,4,"Barangay $baBrgy",1,0,"L");
    $pdf->Cell(95,4,"Barangay $oaBrgy",1,1,"L");

    $baSubd = $application->get_Subdivision();
    $oaSubd = $application->get_Ownersubdivision();
    $pdf->Cell(95,4,"Subdivision $baSubd",1,0,"L");
    $pdf->Cell(95,4,"Subdivision $oaSubd",1,1,"L");

    $baMun = $application->get_cityMunicipality();
    $oaMun = $application->get_OwnercityMunicipality();
    $pdf->Cell(95,4,"City/Municipality $baMun",1,0,"L");
    $pdf->Cell(95,4,"City/Municipality $oaMun",1,1,"L");

    $baProvince = $application->get_province();
    $oaProvince = $application->get_Ownerprovince();
    $pdf->Cell(95,4,"Province $baProvince",1,0,"L");
    $pdf->Cell(95,4,"Provice $oaProvince",1,1,"L");

    $baTelNum = $application->get_telNum();
    $oaTelNum = $application->get_OwnertelNum();
    $pdf->Cell(95,4,"Tel. No. $baTelNum",1,0,"L");
    $pdf->Cell(95,4,"Tel. No. $oaTelNum",1,1,"L");

    $baEmail = $application->get_email();
      $oaEmail = $application->get_OwnerEmail();
    $pdf->Cell(95,4,"Email Address $baEmail",1,0,"L");
    $pdf->Cell(95,4,"Email Address $oaEmail",1,1,"L");

    $PIN = $application->get_PIN();
    $busArea = $application->get_businessArea();
    $pdf->Cell(95,4,"Property Index Number (PIN): $PIN",1,0,"L");
    $pdf->Cell(95,4,"Business Area (in sq. m.): $busArea",1,1,"L");

    $maleEmp = $application->get_MaleEmployees();
    $femaleEmp = $application->get_FemaleEmployees();
    $pwdEmp = $application->get_PWDEmployees();
    $lguEmp = $application->get_LGUEmployees();

    $totEmp = $maleEmp + $femaleEmp + $pwdEmp + $lguEmp;
    $pdf->Cell(95,4,"Total No. of Employees in Establishment: $totEmp",1,0,"L");
    $pdf->Cell(95,4,"No. of Employees Residing in LGU: $lguEmp",1,1,"L");

    //
    // $lessorLastName = $application->get_Lessors()->lastName;
    // $application->get_lessors()->firstName
    // $application->get_lessors()->middleName
    // $application->get_lessors()->address
    // $application->get_lessors()->subdivision
    // $application->get_lessors()->barangay
    // $application->get_lessors()->cityMunicipality
    // $application->get_lessors()->province

    $y=$pdf->GetY();
    $pdf->SetY(153);
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(11,155,"If place of Business is Rented, please identify the following: Lessors Name and");
      $pdf->Text(11,157,"Address");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(90,9,"$y ?????",1,0,"C");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(101,155,"Last Name");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(20,9,"?????",1,0,"C");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(121,155,"First Name");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(45,9,"?????",1,0,"C");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(166,155,"Middle Name ");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(35,9,"?????",1,1,"C");

    //
    $y=$pdf->GetY();
    $pdf->SetY(162);
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(11,164,"Lessor's: Address House No./ Bldg No./ Street");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(50,11,"$y ?????",1,0,"TL");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(61,164,"Subdivision");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(40,11,"?????",1,0,"TL");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(101,164,"Barangay");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(20,11,"?????",1,0,"TL");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(121,164,"City/ Municipality");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(45,11,"?????",1,0,"TL");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(166,164,"Province");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(35,11,"?????",1,1,"TL");

    //
    $y=$pdf->GetY();
    $pdf->SetY(173);
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(11,175,"Monthly Rental:");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(50,9,"$y ?????",1,0,"TL");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(61,175,"Tel No. / Cel No.");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(40,9,"?????",1,0,"TL");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(101,175,"Email Address");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(20,9,"?????",1,0,"TL");
      $pdf->SetFont("Arial","I","6");
      $pdf->Text(121,175,"In case of Emergency: (Contact Person/ Tel No./ Cel No./ Email Address)");
      $pdf->SetFont("Arial","","7");
    $pdf->Cell(80,9,"?????",1,1,"TL");

    $pdf->SetFont("Arial","BI","8");
    $pdf->Cell(0,4,"BUSINESS ACTIVITY",1,1,"C");

    // $code = $application->code;
    // $lineOfBusi = $application->lineOfBusiness;
    // $numUnits = $application->numOfUnits;
    // $capital = $application->capitalization;
    // $grossSales = $application->code;

    $pdf->SetFont("Arial","","7");
    $pdf->Cell(20,9,"Code",1,0,"C");
    $pdf->Cell(49,9,"Line of Business",1,0,"C");
    $pdf->Cell(20,9,"No. of Units",1,0,"C");
    $pdf->Cell(43,9,"Capitalization (for new Business) ",1,0,"C");
    $pdf->Cell(58,5,"Gross Sales / Receipts (for renewal)",1,1,"C");
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $pdf->SetXY($x+132, $y);
    $pdf->Cell(26,4,"Essential",1,0,"C");
    $pdf->Cell(32,4,"Non-essential",1,1,"C");

    $pdf->Cell(20,4,"?????",1,0,"C");
    $pdf->Cell(49,4,"?????",1,0,"C");
    $pdf->Cell(20,4,"?????",1,0,"C");
    $pdf->Cell(43,4,"?????",1,0,"C");
    $pdf->Cell(26,4,"?????",1,0,"C");
    $pdf->Cell(32,4,"?????",1,1,"C");

    $pdf->Cell(20,4,"?????",1,0,"C");
    $pdf->Cell(49,4,"?????",1,0,"C");
    $pdf->Cell(20,4,"?????",1,0,"C");
    $pdf->Cell(43,4,"?????",1,0,"C");
    $pdf->Cell(26,4,"?????",1,0,"C");
    $pdf->Cell(32,4,"?????",1,1,"C");

    $pdf->Cell(20,4,"?????",1,0,"C");
    $pdf->Cell(49,4,"?????",1,0,"C");
    $pdf->Cell(20,4,"?????",1,0,"C");
    $pdf->Cell(43,4,"?????",1,0,"C");
    $pdf->Cell(26,4,"?????",1,0,"C");
    $pdf->Cell(32,4,"?????",1,1,"C");

    $pdf->SetFont("Arial","B","8");
    // $y = $pdf->GetY();
    $pdf->SetY(207);
    $y = $pdf->GetY();
    $pdf->Cell(190,9,"Oath of Undertaking",1,1,"C");
    $pdf->SetFont("Arial","I","6");
    $pdf->Text(50,$y+8,"I undertake to comply with the requirement and other deficiencies within 30 days from release of the business permit.");

    $pdf->SetFont("Arial","","7");
    $y = $pdf->GetY();
    $pdf->Cell(95,21,"",1,0,"C");
    $pdf->Line($x+15,$y+17,$x+80,$y+17);
    $pdf->Text(27.5,$y+20,"SIGNATURE OF APPLICANT OVER PRINTED NAME");
    $pdf->Cell(95,21,"",1,1,"C");
      $pdf->SetFont("Arial","B","8");
      $pdf->Text(133,$y+13,"MR. ANGELITO A. ALONALON");
      $pdf->SetFont("Arial","","7");
      $pdf->Text(139,$y+16,"City Administering Officer");
      $pdf->Text(145,$y+19,"City Treasurer");
    $pdf->Cell(190,3,"",1,1,"C");

    $pdf->SetFont("Arial","B","8");
    $pdf->Cell(190,4,"VERIFICATION OF DOCUMENTS",1,1,"C");
    $pdf->Cell(50,4,"Description",1,0,"C");
    $pdf->Cell(45,4,"Office/Agency",1,0,"C");
    $pdf->Cell(35,4,"Date Issued",1,0,"C");
    $pdf->Cell(60,4,"VERIFIED BY:(BPLO STAFF)",1,1,"C");

    $pdf->SetFont("Arial","","7");
    $pdf->Cell(50,4,"Barangay Clearance",1,0,"L");
    $pdf->Cell(45,4,"Barangay",1,0,"L");
    $pdf->Cell(35,4,"",1,0,"L");
    $pdf->Cell(60,4,"",1,1,"L");

    $pdf->Cell(50,4,"Zoning Clearance",1,0,"L");
    $pdf->Cell(45,4,"Zoning Admin",1,0,"L");
    $pdf->Cell(35,4,"",1,0,"L");
    $pdf->Cell(60,4,"",1,1,"L");

    $pdf->Cell(50,4,"Sanitray/Health Clearance",1,0,"L");
    $pdf->Cell(45,4,"City/Health Dept.",1,0,"L");
    $pdf->Cell(35,4,"",1,0,"L");
    $pdf->Cell(60,4,"",1,1,"L");

    $pdf->Cell(50,4,"Occupancy Permit",1,0,"L");
    $pdf->Cell(45,4,"Bldg. Official",1,0,"L");
    $pdf->Cell(35,4,"",1,0,"L");
    $pdf->Cell(60,4,"",1,1,"L");

    $pdf->Cell(50,4,"Fire Safety Inspection Certificate",1,0,"L");
    $pdf->Cell(45,4,"City Fire Dept.",1,0,"L");
    $pdf->Cell(35,4,"",1,0,"L");
    $pdf->Cell(60,4,"",1,1,"L");

    $pdf->Cell(50,4,"Others. please specify",1,0,"L");
    $pdf->Cell(45,4,"",1,0,"L");
    $pdf->Cell(35,4,"",1,0,"L");
    $pdf->Cell(60,4,"",1,1,"L");
    $pdf->Output();
?>
