/*========= Starting function =========*/
$(function(){

	/*========= UI progress bars =========*/
	$( ".progressred" ).progressbar({
      value: 27
    });

    $( ".progressblue" ).progressbar({
      value: 47
    });

    $( ".progressgreen" ).progressbar({
      value: 67
    });

    $( ".progressblack" ).progressbar({
      value: 87
    });

	/*========= bootstrap modals =========*/
	$(".myModal").click(function(){
		$("#myModal").modal();
		return false;
	});

	$(".myModal2").click(function(){
		$("#myModal2").modal({backdrop:false});
		return false;
	});

	$(".myModal3").click(function(){
		$("#myModal3").modal('toggle');
		return false;
	});

	/*========= ibutton plugin =========*/
	$(".ibutton").iButton({
        resizeHandle: "auto",
        resizeContainer: "auto" 
    });

    $(".ibutton_label .lightSwitch").each(function() {
		var onoff = $(this);
		onoff.iButton({
		change: function() {
			if (onoff.is(':checked')) {
		        $('span.left').addClass('offline').removeClass('online');
		        $('span.right').addClass('online').removeClass('offline');
		    } else {
		    	$('span.left').addClass('online').removeClass('offline');
		        $('span.right').addClass('offline').removeClass('online');
		    }
		}
		});
	});

    $(".ibutton_label").iButton({
        resizeHandle: "auto",
        resizeContainer: "auto",
    });

    $(".ibutton_label2 .signSwitch").each(function() {
		var onoff = $(this);
		onoff.iButton({
		change: function() {
			if (onoff.is(':checked')) {
		        $('span.no').addClass('yes').removeClass('no');
		    } else {
		    	$('span.yes').addClass('no').removeClass('yes');
		    }
		}
		});
	});

    $(".ibutton_label2").iButton({
        resizeHandle: "auto",
        resizeContainer: "auto",
    });

    $(".ibutton_radios").iButton({
        resizeHandle: "auto",
        resizeContainer: "auto" 
    });

	/*========= uniform plugin =========*/
	$('input[type="checkbox"], input[type="radio"], select.uniform, input[type="file"]').uniform();

	/*========= chosen plugin =========*/
	$('.chosen').chosen();

	/*========= spinner plugin =========*/
	$("#spinner").spinner();

	$("#spinnerCurrency").spinner({ 
		culture: "en-US", 
		min: 2, 
		max: 2500, step: 1, 
		numberFormat: "C" 
	});

	$("#spinnerDecimal").spinner({
	    step: 0.01,
	    numberFormat: "n"
	});

	$("#spinnerCurrencyDE").spinner({
	    culture: "de-DE", 
		min: 5, 
		max: 2500, step: 1, 
		numberFormat: "C" 
	});

	/*========= masked inputs plugin =========*/
	$("#dateinput").mask("99/99/9999");
	$("#phone").mask("(999)99-999-999");
	$("#ssn").mask("999-99-9999");
	$("#tin").mask("99-9999999");

	/*========= ui modal plugin =========*/
	$("#ui-dialog").dialog({
        autoOpen: false,
        width: 350,
        height: 90,
        modal: true,
    });

	$("#uimodal").click(function() {
        $("#ui-dialog").dialog( "open" );
    });

    $("#uimodalanimate").dialog({
        autoOpen: false,
        show: "blind",
        hide: "explode",
        width: 350,
        height: 90,
    });

    $("#uimodaleffect").click(function() {
        $("#uimodalanimate").dialog( "open" );
    });

    /*========= inlinde datepicker =========*/
    $("#inlineDate").datepicker({
		showOtherMonths:true,
		appendText: '(dd-mm-yyyy)',
		dateFormat: 'dd-mm-yy'
	});

    /*========= ui sliders =========*/
	$(".ui_slider1").slider({
		range: "min",
		value: 120,
		min: 80,
		max: 700,
		slide: function( event, ui ) {
			$( ".ui_slider1_val" ).html( "$" + ui.value );
		}
	});
	$( ".ui_slider1_val" ).text( "$" + $( ".ui_slider1" ).slider( "value" ) );

	$( ".ui_slider2" ).slider({
		range: true,
		min: 0,
		step: 20,
		max: 500,
		values: [ 75, 300 ],
		slide: function( event, ui ) {
			$( ".ui_slider2_val" ).text( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			$( "#ui_slider_min_val" ).val( "$" + ui.values[ 0 ] );
			$( "#ui_slider_max_val" ).val( "$" + ui.values[ 1 ] );
		}
	});
	$( ".ui_slider2_val" ).text( "$" + $( ".ui_slider2" ).slider( "values", 0 ) + " - $" + $( ".ui_slider2" ).slider( "values", 1 ) );
	$( "#ui_slider_min_val" ).val( "$" + $( ".ui_slider2" ).slider( "values", 0 ) );
	$( "#ui_slider_max_val" ).val( "$" + $( ".ui_slider2" ).slider( "values", 1 ) );

	$(".ui_slider3").slider({
		range: "min",
		value: 120,
		min: 1,
		max: 400,
	});

	$(".ui_slider5_ver").slider({
		orientation: "vertical",
		range: "min",
		min: 0,
		max: 100,
		value: 60,
	});

	$(".ui_slider6_ver").slider({
		orientation: "vertical",
		range: "min",
		min: 0,
		max: 100,
		value: 50,
	});

	$(".ui_slider7_ver").slider({
		orientation: "vertical",
		range: "min",
		min: 0,
		max: 100,
		value: 90,
	});

	$(".ui_slider8_ver").slider({
		orientation: "vertical",
		range: "min",
		min: 0,
		max: 100,
		value: 30,
	});

	$(".ui_slider9_ver").slider({
		orientation: "vertical",
		range: "min",
		min: 0,
		max: 100,
		value: 70,
	});

	/*========= check all checkboxes function =========*/
	$('.checkall').click(function(){
		var table = $(this).parents('table');
		var checkbox = table.find('input[type=checkbox]');
			
		// Check is checkall button checked 
		if($(this).is(':checked')) {
			checkbox.each(function(){ // then on all other checks do following
				$(this).attr('checked',true); // check all other check buttons
				$(this).parent().addClass('checked'); // add class checked to them so that uniform can be applied properly
				$(this).parents('tr').addClass('active');
			}); 
		} else { // If checkall button it not checked
			checkbox.each(function(){  // then on all other checks do following
				$(this).attr('checked',false);  // uncheck all other check buttons
				$(this).parent().removeClass('checked'); // remove class checked to them so that uniform can be applied properly
				$(this).parents('tr').removeClass('active');
			});	
		}
	});

	$('input:checkbox').click(function(){
		if($(this).is(":checked")) {
			$(this).parents('tr').addClass('active');
		} else {
			$(this).parents('tr').removeClass('active');
		}
	});

	/*========= form wizard plugin =========*/
	$("#demoForm").formwizard({ 
		formPluginEnabled: true, 
		validationEnabled: false,
		focusFirstInput : false,
		disableUIStyles : true,
	 }
	);

	$("#demoFormValidate").formwizard({ 
		formPluginEnabled: true,
		validationEnabled: true,
		focusFirstInput : true,
		disableUIStyles: true,
		formOptions :{
			success: function(data){$("#status2").fadeTo(500,1,function(){ $(this).html("<span>Form was submitted!</span>").fadeTo(5000, 0); })},
			beforeSubmit: function(data){$("#success2").html("<span>Form was submitted with ajax. Data sent to the server: " + $.param(data) + "</span>");},
			resetForm: true
		},
		validationOptions : {
			rules: {
				name: "required",
				userEmail: "required",
				userPassword: { required: true },
				confirm_password: { required: true, equalTo: "#password" }
			}
		}
	 }
	);

	/*========= validate form plugin =========*/
	$("#validate").validate({
		rules: {
			name: "required",
			lastname: "required",
			userEmail: "required",
			userEmail: {
				required: true,
				userEmail: true
			},
			url: {
				required: true,
				url: true
			},
			date: {
				required: true,
				date: true
			},
			numbers: {
				required: true,
				digits: true
			},
			userPassword: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
		   		minlength: 5,
				equalTo: "#pass_con"
			},
			message: "required"
		}
	});

	$("#validateLogin").validate({
		rules: {
			userEmail: "required",
			userPassword: "required"
		}
	});

	/*========= jplayer function and callbacks =========*/
	$(window).load(function(){

		$(document).ready(function(){
	    new jPlayerPlaylist({
	        jPlayer: "#jquery_jplayer_1",
	        cssSelectorAncestor: "#jp_container_1"
	      }, [
	        {
	          title:"Big Buck Bunny Trailer",
		  artist:"Blender Foundation",
		  free:true,
		  m4v: "http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v",
		  ogv: "http://www.jplayer.org/video/ogv/Big_Buck_Bunny_Trailer.ogv",
		  webmv: "http://www.jplayer.org/video/webm/Big_Buck_Bunny_Trailer.webm",
		  poster:"http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
	        },
	        {
	          title:"Finding Nemo Teaser",
		  artist:"Pixar",
		  m4v: "http://www.jplayer.org/video/m4v/Finding_Nemo_Teaser.m4v",
		  ogv: "http://www.jplayer.org/video/ogv/Finding_Nemo_Teaser.ogv",
		  webmv: "http://www.jplayer.org/video/webm/Finding_Nemo_Teaser.webm",
		  poster: "http://www.jplayer.org/video/poster/Finding_Nemo_Teaser_640x352.png"

	        }
	      ], {
	        swfPath: "js/jplayer",
			supplied: "webmv, m4v, ogv",
			size: {
				width: "100%",
				height: "360px",
				cssClass: "jp-video-100"
			},
			cssSelectorAncestor: "#jp_container_1"
	    });
});

		$("#jquery_jplayer_2").jPlayer({
			ready: function () {
				$(this).jPlayer("setMedia", {
				  m4v: "http://www.jplayer.org/video/m4v/Incredibles_Teaser.m4v",
				  ogv: "http://www.jplayer.org/video/ogv/Incredibles_Teaser.ogv",
				  webmv: "http://www.jplayer.org/video/webm/Incredibles_Teaser.webm",
				  poster: "http://www.jplayer.org/video/poster/Incredibles_Teaser_640x272.png"
				});
			},
			play: function() { // To avoid both jPlayers playing together.
				$(this).jPlayer("pauseOthers");
			},
			repeat: function(event) { // Override the default jPlayer repeat event handler
				if(event.jPlayer.options.loop) {
					$(this).unbind(".jPlayerRepeat").unbind(".jPlayerNext");
					$(this).bind($.jPlayer.event.ended + ".jPlayer.jPlayerRepeat", function() {
						$(this).jPlayer("play");
					});
				} else {
					$(this).unbind(".jPlayerRepeat").unbind(".jPlayerNext");
					$(this).bind($.jPlayer.event.ended + ".jPlayer.jPlayerNext", function() {
						$("#jquery_jplayer_1").jPlayer("play", 0);
					});
				}
			},
			swfPath: "js/jplayer",
			supplied: "webmv, m4v, ogv",
			size: {
				width: "100%",
				height: "360px",
				cssClass: "jp-video-100"
			},
			cssSelectorAncestor: "#jp_container_2"
		});

		$("#jquery_jplayer_3").jPlayer({
			ready: function (event) {
				$(this).jPlayer("setMedia", {
					m4a: "http://www.jplayer.org/audio/m4a/Miaow-07-Bubble.m4a",
					oga: "http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
				});
			},
			swfPath: "js/jplayer",
			supplied: "m4a, oga",
			wmode: "window",
			cssSelectorAncestor: "#jp_container_3"
		});

	});

	/* UI progress bar */
	$(".progressAnimate").progressbar({
		value: 1,
		create: function() {
			$(".progressAnimate .ui-progressbar-value").animate({"width":"100%"},{
				duration: 10000,
				step: function(now){
					$(".proValue").html(parseInt(now)+"%");
				},
				easing: "linear"
			})
		}
	});

	$(".UprogressAnimate").progressbar({
		value: 1,
		create: function() {
				$(".UprogressAnimate .ui-progressbar-value").animate({"width":"100%"},{
					duration: 30000,
					easing: 'linear',
					step: function(now){
						$(".UproValue").html("Uploading: <span>"+parseInt(now*10.24)+" Mb</span> / 1024 Mb");
					},
					complete: function(){
						$(".UprogressAnimate + .field_notice").html("<span class='must'>Upload Finished</span>");
					} 
				})
			}
	});

});
/*========= End of function =========*/