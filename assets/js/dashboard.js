$(document).ready(function()
{
  var base_url = 'http://192.168.43.213/bposys/';//'http://localhost/bposys/';
  var interval = window.setInterval(check_application_status, 3000);

  // $('.line-of-business').change(function(){
  //   var this_control = this;
  //   var type = $(this_control).find(':selected').attr('data-type');
  //   console.log(type);
  //   if(type == "Amusement")
  //   {
  //     $('#modal-amusement').modal('show');
  //     $(this_control).closest('tr').find('.btn-misc').prop('disabled', false);
  //     $(this_control).closest('tr').find('.btn-misc').attr('data-target','#modal-amusement');
  //     $(this_control).closest('tr').find('.btn-misc').html("Edit Amusement Devices");
  //   }
  //   else if(type == "Financial Institution")
  //   {
  //     $('#modal-financial').modal('show');
  //     $(this_control).closest('tr').find('.btn-misc').prop('disabled', false);
  //     $(this_control).closest('tr').find('.btn-misc').attr('data-target','#modal-financial');
  //     $(this_control).closest('tr').find('.btn-misc').html("Select Financial Institution Type");
  //   }
  //   else
  //   {
  //     $(this_control).closest('tr').find('.btn-misc').prop('disabled', true);
  //     $(this_control).closest('tr').find('.btn-misc').removeAttr('data-target');
  //     $(this_control).closest('tr').find('.btn-misc').html("Edit Misc");
  //   }
  // })

  $('#btn-notif').click(function(){
    $('.fa-bell').html("");
    $.ajax({
      type:'POST',
      url:base_url+'dashboard/update_notif',
      success: function(data){
        $('#notif-section').html(data);
      }
    });
  });

  $('[data-toggle="tooltip"]').tooltip();

  $('#certify').click(function(){
    if($('#certify').is(':checked'))
    {
      $('#s1-proceed').removeAttr('disabled');
      $('#s1-proceed').prop('href','#step2');
    }
    else
    {
      $('#s1-proceed').attr('disabled',true);
      $('#s1-proceed').removeAttr('href');
    }
  });

  $('#cnc').click(function(){
    if($('#cnc').is(':checked'))
    {
      $('#cnc-date-issued').prop('disabled',false);
      $('#cnc-date-issued').prop('required',true);
    }
    else
    {
      $('#cnc-date-issued').prop('disabled',true);
      $('#cnc-date-issued').prop('required',false);
      $('#cnc-date-issued').val("");
    }
  });

  $('#llda').click(function(){
    if($('#llda').is(':checked'))
    {
      $('#llda-date-issued').prop('disabled',false);
      $('#llda-date-issued').prop('required',true);
    }
    else
    {
      $('#llda-date-issued').prop('disabled',true);
      $('#llda-date-issued').prop('required',false);
      $('#llda-date-issued').val("");
    }
  });

  $('#discharge-permit').click(function(){
    if($('#discharge-permit').is(':checked'))
    {
      $('#discharge-permit-date-issued').prop('disabled',false);
      $('#discharge-permit-date-issued').prop('required',true);
    }
    else
    {
      $('#discharge-permit-date-issued').prop('disabled',true);
      $('#discharge-permit-date-issued').prop('required',false);
      $('#discharge-permit-date-issued').val("");
    }
  });

  $('#apsci').click(function(){
    if($('#apsci').is(':checked'))
    {
      $('#apsci-date-issued').prop('disabled',false);
      $('#apsci-date-issued').prop('required',true);
    }
    else
    {
      $('#apsci-date-issued').prop('disabled',true);
      $('#apsci-date-issued').prop('required',false);
      $('#apsci-date-issued').val("");
    }
  });

  $('#steam-generator-others').click(function(){
    if($('#steam-generator-others').is(':checked'))
    {
      $('#steam-generator-specify').prop('disabled',false);
      $('#steam-generator-specify').prop('required',true);
    }
    else
    {
      $('#steam-generator-specify').prop('disabled',true);
      $('#steam-generator-specify').prop('required',false);
      $('#steam-generator-specify').val("");
    }
  });

  $('#steam-generator-specify').change(function(){
    $('#steam-generator-others').val($('#steam-generator-specify').val());
  });

  $('#pending-llda-case').click(function(){
    if($('#pending-llda-case').is(':checked'))
    {
      $('#llda-case-no').prop('disabled',false);
      $('#llda-case-no').prop('required',true);
    }
    else
    {
      $('#llda-case-no').prop('disabled',true);
      $('#llda-case-no').prop('required',false);
      $('#llda-case-no').val("");
    }
  });

  $('#garbage-radio input').on('change',function(){
    // console.log($('input[name=garbage-collection-frequency]:checked').val());
    if($('#garbage-collection-others').is(':checked'))
    {
      $('#garbage-collection-specify').prop('disabled',false);
      $('#garbage-collection-specify').prop('required',true);
    }
    else
    {
      $('#garbage-collection-specify').prop('disabled',true);
      $('#garbage-collection-specify').prop('required',false);
      $('#garbage-collection-specify').val("");
    }
  });


  $('#garbage-collection-specify').change(function(){
    $('#garbage-collection-others').val($('#garbage-collection-specify').val());
    // console.log($('#garbage-collection-others').val());
  });

  $('#drainage-system').click(function(){
    if($('#drainage-system').is(':checked'))
    {
      $('#drainage-system-type1').prop('disabled',false);
      $('#drainage-system-type1').prop('checked',true);
      $('#drainage-system-type2').prop('disabled',false);

      $('#drainage-where-discharged1').prop('disabled',false);
      $('#drainage-where-discharged1').prop('checked',true);
      $('#drainage-where-discharged2').prop('disabled',false);
    }
    else
    {
      $('#drainage-system-type1').prop('disabled',true);
      $('#drainage-system-type1').prop('checked',false);
      $('#drainage-system-type2').prop('disabled',true);

      $('#drainage-where-discharged1').prop('disabled',true);
      $('#drainage-where-discharged1').prop('checked',false);
      $('#drainage-where-discharged2').prop('disabled',true);
    }
  });

  $('#septic-tank').click(function(){
    if($('#septic-tank').is(':checked'))
    {
      $('#sewerage-where-discharged1').prop('disabled',false);
      $('#sewerage-where-discharged1').prop('checked',true);
      $('#sewerage-where-discharged2').prop('disabled',false);
    }
    else
    {
      $('#sewerage-where-discharged1').prop('disabled',true);
      $('#sewerage-where-discharged1').prop('checked',false);
      $('#sewerage-where-discharged2').prop('disabled',true);
    }
  });

  $('#date-of-operation').datetimepicker({
    format: 'MM/DD/YYYY',
    viewMode: 'years'
  });

  $('.date-field').datetimepicker({
    format: 'MM/DD/YYYY',
    viewMode: 'years'
  });

  $('#cnc-date-issued').datetimepicker({
    format: 'MM/DD/YYYY',
    viewMode: 'years'
  });

  $('#llda-date-issued').datetimepicker({
    format: 'MM/DD/YYYY',
    viewMode: 'years'
  });

  $('#discharge-permit-date-issued').datetimepicker({
    format: 'MM/DD/YYYY',
    viewMode: 'years'
  });

  $('#apsci-date-issued').datetimepicker({
    format: 'MM/DD/YYYY',
    viewMode: 'years'
  });

  $('#DTISECCDA_Date').datetimepicker({
    format: 'MM/DD/YYYY',
    viewMode: 'years'
  });

  $('#organization-type').change(function(event){
    if($('#organization-type').val() == 'Corporation')
    {
      $('#corporation-name').prop('disabled',false);
      $('#corporation-name').prop('required',true);
    }
    else
    {
      $('#corporation-name').prop('disabled',true);
      $('#corporation-name').prop('required',false);
    }
  });

  $('#btn-male').click(function(event)
  {
    $('#btn-male').addClass('active');
    $('#btn-female').removeClass('active');
    $("#hidden-gender").val("Male");
  });

  $('#btn-female').click(function(event)
  {
    $('#btn-female').addClass('active');
    $("#btn-male").removeClass('active');
    $("#hidden-gender").val("Female");
  });

  $('#btn-edit-info').click(function(event)
  {
    jQuery.ajax({
      type: 'get',
      url:base_url + 'dashboard/new_application',
      success: function(o) {
        $('#content-container').html(o);
      }
    });
  });

  $('#tax-incentive').click(function() {
    if($('#tax-incentive').is(':checked'))
    {
      $("#entity").prop('disabled', false);
      $("#entity").prop('required', true);
    }
    else
    {
      $("#entity").prop('disabled', true);
      $("#entity").prop('required', false);
    }    
  });

  $('#rented').click(function() {
    if($('#rented').is(':checked'))
    {
      $('.lessor-controls input[type=text], textarea, input[type=email]').each(function() {
        $(this).prop('disabled', false);
        $(this).prop('required', true);
      });
    }
    else
    {
      $('.lessor-controls input[type=text], textarea[name=lessor-address], input[type=email]').each(function() {
        $(this).prop('disabled', true);
        $(this).prop('required', false);
        $(this).val("");
        $(this).html("");
      });
    }    
  });

  var rowCount = 1;
  $('#btn-add-bus-activity').click(function(){
    rowCount++;
    $.ajax({
      type:'GET',
      url:base_url+'dashboard/get_business_activities',
      success: function(data)
      {
        $('#bus-activity > tbody:last-child').append(data);
      },
      error: function(error)
      {
        console.log(error.message);
      }
    });
  });
    // console.log(rowCount);

    var draft = false;

    $('.btn-draft').click(function(){
      $sections.each(function(index, section) {
        $(section).find(':input[type=text], select').removeAttr('data-parsley-group');
        $(section).find(':input[type=text], select').removeAttr('required');
      });
      draft = true;
    })

    $('#new_application_form').submit(function(e){
      if(draft == true)
      {
        var url = base_url+"dashboard/save_draft";
        $(".btn-draft").prop('disabled', true);
        $("#btn-add-bus-activity").prop('disabled', true);
        $('.fa-draft-icon').removeClass('fa-pencil-square-o');
        $('.fa-draft-icon').addClass('fa-circle-o-notch fa-spin');
      // console.log(url);
    }
    else
    {
      // console.log('false');
      var url = base_url+"dashboard/submit_application";
      $("#btn-submit").prop('disabled', true);
      $("#btn-add-bus-activity").prop('disabled', true);
      $("#fa-submit").removeClass('fa-check');
      $("#fa-submit").addClass('fa-circle-o-notch fa-spin');
    }
    // console.log('here');
    e.preventDefault();
    jQuery.ajax({
      type:"POST",
      dataType:'json',
      url:url,
      data:$('form#new_application_form').serialize(),
      success: function(data) {
        if(draft == false)
        {
          if(data.error)
          {
            console.log(data.error);
            $("#btn-submit").prop('disabled', false);
            $("#btn-add-bus-activity").prop('disabled', false);
            $("#fa-submit").removeClass('fa-circle-o-notch fa-spin');
            $("#fa-submit").addClass('fa-check');
          }
          else
          {
            process_business_activity(data.referenceNum);
          }
        }
        else
        {
          if(data == 'success')
          {
            window.location = base_url+"dashboard"; 
          }
          else
          {
            $(".btn-draft").prop('disabled', false);
            $("#btn-add-bus-activity").prop('disabled', false);
            $('.fa-draft-icon').removeClass('fa-circle-o-notch fa-spin');
            $('.fa-draft-icon').addClass('fa-pencil-square-o');
          }
          
        }
      }
    });
    return false;
  });

    function process_business_activity(reference_number)
    {

      var ctr = 0;
      var total_rows = count_business_activities();
      $("#bus-activity tbody .data").each(function() {
        ctr++;
        var lineOfBusiness = $(this).find("td:nth-child(1) select").val();
        var capitalization = $(this).find("td:nth-child(2) input").val();

        $.ajax({
          type:"POST",
          url:base_url+"dashboard/store_business_activity",
          dataType:'json',
          data:{ctr:ctr, total_rows:total_rows, lineOfBusiness:lineOfBusiness, capitalization:capitalization, referenceNum:reference_number},
          success: function(o){
            if(o == "success")
            {
              console.log('Waiting for all processes to complete...');
              $(document).ajaxStop(function(){
               console.log("Finished!");
               console.log("Redirecting...");
               window.setTimeout(function() { 
                window.location = base_url+"dashboard"; 
              },2000);
             })
            }
            else
            {
              console.log(o);
            }
          }
        });
      });
    }

    function count_business_activities()
    {
      var total_rows = 0;
      $("#bus-activity tbody .data").each(function() {
        total_rows++;
      });
      return total_rows;
    }

  // function process_order_of_payment(reference_number)
  // {
  //   console.log('Processing...');
  //   $.ajax({
  //     type:"POST",
  //     url:base_url+"dashboard/process_assessments",
  //     dataType:"JSON",
  //     data:{referenceNum: reference_number},
  //     success: function(data){
  //       if(data == "success")
  //       {
  //         console.log("Success!");
  //         console.log("Redirecting...");
  //         window.setTimeout(function() { 
  //           window.location = base_url+"dashboard"; 
  //         },2000);
  //       }
  //     }
  //   })
  // }

  $('#business').change(function(event){
    $.ajax({
      type:"GET",
      dataType:"JSON",
      url:base_url+"dashboard/get_business_profile",
      data:{id:$('#business').val()},
      success:function(data){
        // console.log(data);
        $('#tax-payer-name').html(data.lastName + ", " + data.firstName + " (" + data.middleName + ")");
        $('#president-treasurer-name').html(data.presidentTreasurerName);
        $('#pollution-control-officer').html(data.pollutionControlOfficer);
        $('#male-employees').html(data.maleEmployees);
        $('#female-employees').html(data.femaleEmployees);
        $('#pwd-employees').html(data.PWDEmployees);
        $('#company-name').html(data.companyName);
        $('#business-name').html(data.businessName);
        $('#trade-name').html(data.tradeName);
        $('#signage-name').html(data.signageName);
        $('#organization-type').html(data.organizationType);
        $('#corporation-name').html(data.corporationName);
        $('#pin').html(data.PIN);
        $('#date-of-operation-text').html(data.dateOfOperation);
        $('#business-desc').html(data.businessDesc);
        $('#house-bldg-no').html(data.houseBldgNum);
        $('#unit-no').html(data.unitNum);
        $('#subdivision').html(data.subdivision);
        $('#province').html(data.province);
        $('#street').html(data.street);
        $('#city-municipality').html(data.cityMunicipality);
        $('#barangay').html(data.barangay);
        $('#bldg-name').html(data.bldgName);
        $('#business-area').html(data.businessArea);
        $('#tel-num').html(data.telNum);
        $('#email').html(data.email);
        $('#lgu-employees').html(data.LGUResidingEmployees);
        $('#gmaps-address').html(data.gmapAddress);
        $('#emergency-contact-name').html(data.emergencyContactPerson);
        $('#emergency-tel-cel-no').html(data.emergencyTelNum);
        $('#emergency-email').html(data.emergencyEmail);

        initMap(data.lat, data.lng);

        
      }
    });
  });

  function initMap(lat,lng){

    var map;
    latlang = new google.maps.LatLng(lat,lng);
    map = new google.maps.Map(document.getElementById('gmaps'), {
      center: latlang,
      zoom: 15

    });
    var marker = new google.maps.Marker({
      position: latlang,
    });

    marker.setMap(map);
  }

  function check_application_status()
  {

    var business_object = [];
    $('.hidden-business-id').each(function(index, result){
      var bus_obj = {id: $(result).val(), status: $(".status").eq(index).html()}
      business_object.push(bus_obj);
    });
    $.ajax({
      type:'POST',
      dataType:'JSON',
      url:base_url+'dashboard/check_app_status',
      data:{application_object: business_object},
      success:function(data){
          // console.log(data.status_array.length);
          if($('#application-table').length != 0)
          {
            // console.log(data.status_array);
            $(data.status_array).each(function(index,result){
              // console.log(data.buttons);
            // console.log(result.status);
            if(result == "Expired")
            {
              $(".status").eq(index).html("Status: <span class='label label-danger' style='font-size:14px'>"+result+"</span>");
            }
            else if(result == "For Retirement")
            {
              $(".status").eq(index).html("Status: <span class='label label-warning' style='font-size:14px'>"+result+"</span>");
            }
            else
            {
              $(".status").eq(index).html("Status: <span class='label label-info' style='font-size:14px'>"+result+"</span>");
            }
            $(".button-container").eq(index).html(data.buttons[index]);
          });
          }
          if(data.notifications)
          {
            $('#notif-container').html("<span class='notif-count'>"+data.notifications.length+"</span>")
          }
        },
        error:function(error)
        {
          console.log(error.message);
          clearInterval(interval);
        }
      });
  }

  $('.btn-cancel').click(function(){
    var r = confirm('Are you sure you want to cancel this application?');
    if(r==true)
      window.location = this.id;
    else
      return false;
  });

  $('.btn-delete').click(function(){
    console.log('test');
    var r = confirm('Are you sure you want to delete this drafted application?');
    if(r==true)
      window.location = this.id;
    else
      return false;
  });

  //VALIDATE WIZARD FORM
  var $sections = $('.tab-pane');
  // Next button goes forward if current block validates
  var index = 1;
  $('.form-navigation .next').click(function() {
    if ($('#new_application_form, .renewal-form').parsley().validate({group: 'block-' + index}))
    {
      $('.tab-pane').eq(index).removeClass('active');
      index++;
      $('.tab-pane').eq(index).addClass('active');
      console.log(index);
    }
  });

  $('.form-navigation .previous').click(function() {
    $('.tab-pane').eq(index).removeClass('active');
    index--;
    $('.tab-pane').eq(index).addClass('active');
    console.log(index);
  });

  // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
  $sections.each(function(index, section) {
    $(section).find(':input[type=text], :input[type=email], select, textarea').attr('data-parsley-group', 'block-' + index);
  });

    //Remove Business Activity
    $('.btn-remove-business-activity').click(function(){
      var this_control = this;
      var id = this.id
      var r = confirm('Are you sure you want to remove this business activity?');
      if(r==true)
      {
        $.ajax({
          type:'POST',
          url:base_url+'dashboard/remove_business_activity/'+id,
          success: function(data)
          {
            $(this_control).closest('tr').remove();
            if(count_existing_activities() == 1)
            {
              $('.btn-remove-business-activity').attr('id', '#');
              $('.btn-remove-business-activity').prop('disabled', true);
            }
          },
          error: function(error)
          {
            alert('Failed to remove business activity');
          }
        });
      }
      else
        return false;
    });

    function count_existing_activities()
    {
      var total_rows = 0;
      $("#table-existing-business-activities tbody .existing-data").each(function() {
        total_rows++;
      });
      return total_rows;
    }
  //End Remove Business Activity

  $('#renewal-form').submit(function(e){
      // console.log('false');
      var url = base_url+"form/submit_renewal_application";
      $("#btn-submit").prop('disabled', true);
      $("#btn-add-bus-activity").prop('disabled', true);
      $("#fa-submit").removeClass('fa-check');
      $("#fa-submit").addClass('fa-circle-o-notch fa-spin');  
    // console.log('here');
    e.preventDefault();
    jQuery.ajax({
      type:"POST",
      dataType:'json',
      url:url,
      data:$('form#renewal-form').serialize(),
      success: function(data) {
        if(data.error)
        {
          console.log(data.error);
          $("#btn-submit").prop('disabled', false);
          $("#btn-add-bus-activity").prop('disabled', false);
          $("#fa-submit").removeClass('fa-circle-o-notch fa-spin');
          $("#fa-submit").addClass('fa-check');
        }
        else
        {
          process_business_activity(data.referenceNum);
        }     
      }
    });
    return false;
  });
  
}); //End of Jquery
