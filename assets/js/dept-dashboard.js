$(document).ready(function(){

	// var base_url = 'http://172.16.105.102/bposys/';
	var info_active = false;
	var success_active = false;
	var warning_active = false;
	// if($('#notif-count').val() != "-")
	var interval = window.setInterval(notif_check, 3000);


	if($('#notif-count').val() > 0)
	{
		info_active = true;
		if($('#notif-count').val() > 1)
		{
			var message = "You have <strong id='incoming-notif'>"+ $('#notif-count').val() + "</strong> new incoming applications";
		}
		else
		{
			var message = "You have <strong id='incoming-notif'>"+ $('#notif-count').val() + "</strong> new incoming application";
		}
		notify(message, "information");
	}

	if($('#new-count').val() > 0)
	{
		warning_active = true;
		if($('#new-count').val() > 1)
		{
			var message = "You have <strong id='new-notif'>"+ $('#new-count').val() + "</strong> new incoming applications";
		}
		else
		{
			var message = "You have <strong id='new-notif'>"+ $('#new-count').val() + "</strong> new incoming application";
		}
		notify(message, "warning");
	}

	if($('#completed-count').val() > 0)
	{
		success_active = true;
		if($('#completed-count').val() > 1)
		{
			var message = "<strong id='completed-notif'>"+$('#completed-count').val() + "</strong> new complete applications";
		}
		else
		{
			var message = "<strong id='completed-notif'>"+$('#completed-count').val() + "</strong> new complete application";
		}
		notify(message, "success");
	}

	function notif_check()
	{
		$.ajax({
			type:'POST',
			dataType:'JSON',
			url:base_url+'dashboard/check_notif',
			success:function(data){
				// console.log(data.notifications);
				if(data.notifications > 0 && data.notifications != $('#notif-count').val())
				{
					var message = 'You have <strong id="incoming-notif">'+data.notifications+'</strong> new incoming application';
					$('#notif-count').val(data.notifications);
					// $('.badge-issued').html();
					if(!info_active)
					{
						notify(message,"information");
						info_active = true;
					}
					else
						$('#incoming-notif').html(data.notifications);
				}
				if(data.complete > 0 && data.complete != $('#completed-count').val())
				{
					var message = '<strong id="completed-notif">'+data.complete+'</strong> new completed application';
					$('#completed-count').val(data.complete);
					// $('.badge-issued').html();
					if(!success_active)
					{
						notify(message,"success");
						success_active = true;
					}
					else
						$('#completed-notif').html(data.complete);
				}
				if(data.new > 0 && data.new != $('#new-count').val())
				{
					var message = 'You have <strong id="new-notif">'+data.new+'</strong> new incoming application';
					$('#new-count').val(data.new);
					// $('.badge-issued').html();
					if(!warning_active)
					{
						notify(message,"warning");
						warning_active = true;
					}
					else
						$('#new').html(data.new);
				}

				//update quick action badges
				$('.badge-incoming').html(data.incoming>0 ? data.incoming : "");
				$('.badge-process').html(data.process>0 ? data.process : "");
				$('.badge-completed').html(data.completed>0 ? data.completed : "");
				// console.log(data);
			}
		});
	}

	function notify(message,type)
	{
		var n = noty({
			layout: 'topRight',
			text: message,
			type: type,
			animation: {
		        open: 'animated bounceInRight', // jQuery animate function property object
		        close: 'animated bounceOutRight', // jQuery animate function property object
		        easing: 'swing', // easing
		        speed: 500 // opening & closing animation speed
		    },
		    //timeout: 30000,
		    theme: 'metroui',
		    template: '<div class="noty_message"><img src="http://localhost/bposys/assets/matrix/img/demo/envelope.png"/> <span class="noty_text" id="'+(type=='information' ? 'info_message' : 'success_message')+'"></span><div class="noty_close"></div></div>',
		    callback: {
		    	// onShow: function() {},
		    	// afterShow: function() {},
		    	// onClose: function() {},
		    	// afterClose: function() {},
		    	onCloseClick: function() {
		    		//ajax
		    		if(type == "information")
		    			var notifType = 'Incoming';
		    		else if(type == "success")
		    			var notifType = 'Completed';
		    		$.ajax({
		    			type:'POST',
		    			url:base_url+'dashboard/update_notif/'+notifType,
		    			success: function(data)
		    			{
		    				if(type == "success")
		    					window.location = base_url+"dashboard/completed_applications";
		    				else if(type == "information")
		    					window.location = base_url+"dashboard/incoming_applications";
		    				else if(type == "warning")
		    					window.location = base_url+"dashboard/incoming_applications";
		    			}
		    		});
		    	},
		    },
		});
	}

	$('#report-year').change(function(){
		$.ajax({
			type:'POST',
			url:base_url+'reports/report_year',
			data:{year:$('#report-year').val()},
			beforeSend: function() {
				$('#report-container').addClass('text-center');
				$('#report-container').html("<div style='height:400px;width:100%;'>"+
					"<i style='margin-top:150px' class='fa fa-circle-o-notch fa-spin fa-5x fa-fw text-center'></i>"+
					"<span class='sr-only text-center'>Loading...</span>"+
					"</div>");
			},
			success:function(data)
			{
				$('#report-container').removeClass('text-center');
				$('#report-container').html(data);
			}
		});
	});

	$('.count').each(function () {
		$(this).prop('Counter',0).animate({
			Counter: $(this).text()
		}, {
			duration: 3000,
			easing: 'swing',
			step: function (now) {
				$(this).text(Math.ceil(now));
			}
		});
	});

	$('.paid-up-to').click(function(){
		var	paid_up_to = $(this).val();
		$('#hidden-paid-up-to').val($(this).val());
		console.log($('#hidden-paid-up-to').val());

		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: base_url+"form/get_total_payment",
			data: {paid_up_to: paid_up_to, ref: $('#ref').val(), aid: $('#aid').val()},
			success: function(data)
			{
				$('#amount-paid').html("<strong> PHP "+data+"</strong>");
				$('#hap').val(data);
			}
		})
	});

	var requirements_count = $('.requirements-checkbox').length;
	// console.log(requirements_count);
	var checked_count = 0;
	$('.requirements-checkbox').click(function(){
		if($(this).is(':checked'))
		{
			checked_count++;
		}
		else
		{
			checked_count--;
		}
		if(checked_count == requirements_count)
		{
			$('#approve-btn').prop('disabled', false);
		}
		else
		{
			$('#approve-btn').prop('disabled', true);
		}
	});

	if($('.btn-required').length == 0)
	{
		$('.btn-submit').prop('disabled', false);
	}

	$('#btn-save-amusement').click(function(){
		// console.log('hehe');
		var device_array = [];
		var req_count = 0;

		$(".device").each(function(){
			if($(this).val() == "" || $(this).val() < 0)
			{
				device_array.push(this.id+"|"+0);
			}
			else
			{
				device_array.push(this.id + "|" +$(this).val());
			}

		});
		// console.log(device_array);
		$(".hidden-device").each(function(index, result){
			$(result).val(device_array[index]);
			// console.log(index);
		});

		$('#hidden-holes').val($('#holes').val()==""||$('#holes').val()<0?0:$('#holes').val());
		$('#hidden-non-automatic-lanes').val($('#non-automatic-lanes').val()==""||$('#non-automatic-lanes').val()<0?0:$('#non-automatic-lanes').val());
		$('#hidden-automatic-lanes').val($('#automatic-lanes').val()==""||$('#automatic-lanes').val()<0?0:$('#automatic-lanes').val());

		$('#btn-edit-amusement-devices').removeClass('btn-danger');
		$('#btn-edit-amusement-devices').removeClass('btn-required');
		$('#btn-edit-amusement-devices').addClass('btn-success');

		$('.btn-required').each(function(index, result){
			req_count++;
		});
		if(req_count == 0)
		{
			$('.btn-submit').prop('disabled', false);
		}

	});

	$('#btn-save-financial').click(function(){
		var req_count = 0;
		$('#financial-institution').val($('.financial-institution:checked').val());

		$('#btn-select-financial-institution').removeClass('btn-danger');
		$('#btn-select-financial-institution').removeClass('btn-required');
		$('#btn-select-financial-institution').addClass('btn-success');

		$('.btn-required').each(function(index, result){
			req_count++;
		});
		if(req_count == 0)
		{
			$('.btn-submit').prop('disabled', false);
		}
		// console.log($('.financial-institution:checked').val());
	})

	$('.btn-process').click(function(){
		$(this).attr('disabled',true);
	});

	$('a.btn-process').on("click", function(e){
		console.log('disabled');
		e.preventDefault();
		$(this).removeAttr("href"); 
		$(this).attr('disabled',true);
	});

});//End of Jquery
