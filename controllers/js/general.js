/*========= Starting function =========*/
$(function(){

	/*========= Popover =========*/
    $('a[rel="popover"]').popover();

    /*========= Easy pie charts =========*/
    $('.percentage').easyPieChart({
        animate: 1000,
        scaleColor: "#bebebe",
        size: 75,
        barColor: "#71a5e4"
    });

    $('.percentage02').easyPieChart({
        animate: 1000,
        scaleColor: "#bebebe",
        size: 75,
        barColor: "#db8973"
    });

	/*========= Pattern change =========*/
	$("ul.containerPattern li a").on("click", function(){
	var id = $(this).attr("id");
	$("body").css("background-image", "url('../../models/img/patterns/"+ id +".png')");
	});

	/*========= Animated progress bars =========*/
	$(".spaceProgress").progressbar({
		value: 1,
		create: function() {
			$(".spaceProgress .ui-progressbar-value").animate({"width":"82%"},{
				duration: 4054,
				step: function(now){
					$(".vSpace").html("<span>"+parseInt(now)*50+"mb</span> / 5.000mb");
				},
				easing: "linear"
			});
		}
	});

	$(".fileProgress").progressbar({
		value: 1,
		create: function() {
			$(".fileProgress .ui-progressbar-value").animate({"width":"42%"},{
				duration: 4054,
				step: function(now){
					$(".fSpace").html("<span>"+parseInt(now)*50+"mb</span> / 5.000mb");
				},
				easing: "linear"
			});
		}
	});

	$(".bandwidthProgress").progressbar({
		value: 1,
		create: function() {
			$(".bandwidthProgress .ui-progressbar-value").animate({"width":"51%"},{
				duration: 4054,
				step: function(now){
					$(".bSpace").html("<span>"+parseInt(now)*50+"mb</span> / 5.000mb");
				},
				easing: "linear"
			});
		}
	});

	/*========= Animate progress bar with delay =========*/
	setTimeout(function (){
	    $(".animateBar").delay(2000).animate({
			'width': '60%'
		});
    }, 1000);

	/*========= Sparklines =========*/
	$(".sparklineBar").sparkline([5,6,7,2,3,4,1,4,5,6,7,4,6,4,1,4], {
	    type: 'bar',
	    height: '30px',
	    barColor: '#db8973',
	    negBarColor: '#72a5e4'
	});

	$(".sparklineBar02").sparkline([5,6,7,2,3,4,1,4,5,6,7,4,6,4,1,4], {
	    type: 'bar',
	    height: '30px',
	    barColor: '#72a5e4',
	    negBarColor: '#db8973'
	});

	$(".sparklineBar03").sparkline([5,6,7,2,3,-4,1,4,-5,6,7,4,6,-4,1,4], {
	    type: 'bar',
	    height: '30px',
	    barColor: '#db8973',
	    negBarColor: '#72a5e4'
	});

	$(".sparklinePie").sparkline([1,1,2], {
	    type: 'pie',
	    width: '27px',
	    height: '27px',
	    sliceColors: ['#db8973','#72a5e4','#729d47','#109618','#66aa00','#dd4477','#0099c6','#990099 ']
	});

	$(".sparklinePie02").sparkline([5,6,7,9,9,5,3,2,2,4,6,7,5,6,7,9,9,5,3,2,2,4,6], {
	    type: 'line',
	    height: '30px',
	    lineColor: '#71a5e4',
	    fillColor: '#db8973',
	    spotColor: '#71a5e4',
	    maxSpotColor: '#71a5e4',
	    highlightSpotColor: '#71a5e4',
	    highlightLineColor: '#71a5e4'
	});

	$(".sparklinePie03").sparkline([1,1,0,1,-1,-1,1,-1,0,0,1,1], {
	    type: 'tristate',
	    height: '30px',
	    posBarColor: '#71a5e4',
	    negBarColor: '#db8973',
	    zeroBarColor: '#707070'
	});

	/*========= Antiscroll boxes =========*/
	$('.box-wrap').antiscroll({
		autoHide: false
	});

	/*========= Customscroll boxes =========*/
	$(".memberScroll").mCustomScrollbar({
		scrollButtons:{
			enable:true
		}
	});

	$(".adressScroll").mCustomScrollbar({
		scrollButtons:{
			enable:true
		}
	});

    /*========= Responsive navigation menu and dropdown =========*/
	$('.respNav a').click(function () {
		var respNav = $('.responsiveNav');
		if(respNav.is(":hidden")) {
			respNav.slideDown();
			$("html, body").animate({scrollTop:0},"slow");
		} else {
			respNav.slideUp();
		}
		return false;
    });

    $('.responsiveNav li a').click(function () {
		var subNav = $(this).parent().find('ul');
		$('.responsiveNav li ul').slideUp();
		$('.responsiveNav li').removeClass('active');
		if(subNav.is(":hidden")) {
			subNav.slideDown();
			subNav.parent().addClass('active')
		} else {
			subNav.slideUp();
			subNav.parent().removeClass('active')
		}
    });

    $(document).ready(function() {
		var submenu = $('.responsiveNav li').find('ul');
		if (submenu.length > 0) {
			submenu.parent().children('a').click(function() {
				return false;
			});
		}
	});

	/*========= Change color styling =========*/
	$('#styling li a').click(function(){
		var style_selected = $(this).attr('title');
		$('#theme').attr('href','css/colors/'+style_selected+'.css');
		$('#theme').attr();
	});

	/*========= Sidebar menu and dropdown functions =========*/
	$('ul.navigation > li > a').click(function(){
		var submenu = $(this).parent().find('ul.subMenu');
		$("ul.navigation li:not(.active)").children('ul.subMenu').slideUp(350);
		$('ul.navigation li').removeClass('dropActive');
		$("ul.navigation li:not(.active) a").find('span.collapse').removeClass('collapse').addClass('expand');
		if(submenu.is(":hidden")) {
			submenu.slideDown(350);
			submenu.parent().find('span.expand').removeClass('expand').addClass('collapse');
			submenu.parent().addClass('dropActive');
		} else {
			submenu.slideUp(350);
			submenu.parent().find('span.collapse').removeClass('collapse').addClass('expand');
			submenu.parent().removeClass('dropActive');
		}
	});

	$(document).ready(function() {
		var submenu = $('ul.navigation li').find('ul.subMenu');
		var active = $('ul.navigation li.active');
		if (submenu.length > 0) {
			submenu.parent('li').children('a').append('<span class="expand"></span>');
			active.addClass('dropActive');
			active.find('span.expand').removeClass('expand').addClass('collapse');
			submenu.parent().children('a').click(function() {
				return false;
			});
		}
	});

	/*========= Top navigation menu and dropdown =========*/
	$('ul.noFluidNav > li').hover(function(){
		$(this).children('ul').stop(true, true).slideDown(180);
	}, function(){
		$(this).children('ul').stop(true, true).slideUp(180);
	});

	$(document).ready(function() {
		var submenu = $('ul.noFluidNav li').find('ul');
		if (submenu.length > 0) {
			submenu.parent().children('a').click(function() {
				return false;
			});
		}
	});

	$('ul.noFluidNav > li > ul > li').hover(function(){
		$(this).children('ul').stop(true, true).slideDown(180);
	}, function(){
		$(this).children('ul').stop(true, true).slideUp(180);
	});

	$(document).ready(function() {
		var submenu = $('ul.noFluidNav li').find('ul');
		if (submenu.length > 0) {
			submenu.parent().children('a').click(function() {
				return false;
			});
		}
	});

	/*========= Change navigation left/top on fluid =========*/
	$('.mainContainer #tnav').click(function() {
		$.cookie('topNav', 'hide', { path: '/', expires: 365 });
		$('.widgetBar').css('display', 'none');
		$('.containerNav').css('display', 'block');
		$('.content').addClass('noSideNav')
		$('.layout').css('display', 'none');
		$('#tnav').attr('checked', true);
		$('#lnav').attr('checked', false);
	});

	$('.mainContainer #lnav').click(function() {
		$.cookie('topNav', null, { path: '/', expires: 365 });
		$('.widgetBar').css('display', 'block');
		$('.containerNav').css('display', 'none');
		$('.layout').css('display', 'block');
		$('.content').removeClass('noSideNav')
		$('#lnav').attr('checked', true);
		$('#tnav').attr('checked', false);
	});

	if($.cookie('topNav')) { 
		$('.widgetBar').css('display', 'none');
		$('.containerNav').css('display', 'block');
		$('.layout').css('display', 'none');
		$('.content').addClass('noSideNav')
		$('#tnav').attr('checked', true);
		$('#lnav').attr('checked', false);
	} else {
		$('.widgetBar').css('display', 'block');
		$('.containerNav').css('display', 'none');
		$('.layout').css('display', 'block');
		$('.content').removeClass('noSideNav')
		$('#lnav').attr('checked', true);
		$('#tnav').attr('checked', false);
	}	
 	
 	/*========= Click on cog will pull style container out =========*/
	$('.pullStyle').click(function() {
		if($('.rightStyle').css('right') == '-238px') {
			$('.rightStyle').animate({
				right: '0px'
			});
		} else {
			$('.rightStyle').animate({
				right: '-238px'
			});
		}
		return false;
	});

	$('.pullStyle').click(function() {
		if($('.leftStyle').css('left') == '-238px') {
			$('.leftStyle').animate({
				left: '0px'
			});
		} else {
			$('.leftStyle').animate({
				left: '-238px'
			});
		}
		return false;
	});

	/*========= Topbar buttons menu and dropdown =========*/
	$('.barButtons > li > a').click(function(){
		submenu = $(this).parent().children('ul');
		speed = 180
		$('.barButtons li ul').slideUp(speed);
		$('.barButtons li').removeClass('active');
		if(submenu.is(":hidden")) {
			submenu.slideDown(speed);
			submenu.parent().addClass('active');
		} else {
			submenu.slideUp(speed);
			submenu.parent().removeClass('active');
		}
	});

	$(document).ready(function() {
		var submenu = $('.barButtons li').children('ul');
		if (submenu.length > 0) {
			submenu.parent().children('a').append('<span class="expand"></span>');
			submenu.parent().children('a').click(function() {
				return false;
			});
		}
	});

	$('.topBar .barButtons li').click(function(event){
    	event.stopPropagation();
 	});

	$('html').click(function(event){
    	$('.barButtons li ul').slideUp(speed);
    	$('.barButtons li').removeClass('active');
 	});

 	/*========= Gallery click on trash icon will delete image - function =========*/
	$('.removeImage').click(function(event){
		$(this).parents('li').hide();
	});

	/*========= qtip =========*/
	$('[rel="tipsyS"]').tipsy({gravity: 's', fade: true});
	$('[rel="tipsyN"]').tipsy({gravity: 'n', fade: true});
	$('[rel="tipsyE"]').tipsy({gravity: 'e', fade: true});
	$('[rel="tipsyW"]').tipsy({gravity: 'w', fade: true});

	/*========= fancybox =========*/
	$('.fancybox').fancybox({
		openEffect: 'elastic',
		closeEffect: 'elastic',
		padding: [5, 5, 5, 5],
		arrows: false,
		mouseWheel: false
	});

	/*========= datepicker =========*/
	$("#date").datepicker({
		showOtherMonths:true,
		autoSize: true,
		appendText: '(dd-mm-yyyy)',
		dateFormat: 'dd-mm-yy'
	});

	/*========= Inbox tables using dataTable plugin =========*/
	$('.inboxTable').dataTable({
	    "sPaginationType": "full_numbers",
	    "sDom": "<'row-fluid inboxHeader'<'span6'<'dt_actions'>l><'span6'f>r>t<'row-fluid inboxFooter'<'span6'i><'span6'p>>",
	    "iDisplayLength": 25,
	    "asSorting": [[ 5, "desc" ]],
	    "aoColumns": [
			{ "bSortable": false, "sClass": "nohref", },
			{ "bSortable": false, "sClass": "table-icon nohref" },
			{ "sType": "string" },
			{ "sType": "string" },
			{ "bSortable": true },
	        { "bSortable": true },
			{ "bSortable": false, "sClass": "nohref" }
		]
	});

	$('.outboxTable').dataTable({
	    "sPaginationType": "full_numbers",
	    "sDom": "<'row-fluid inboxHeader'<'span6'<'dt_actions'>l><'span6'f>r>t<'row-fluid inboxFooter'<'span6'i><'span6'p>>",
	    "iDisplayLength": 25,
	    "asSorting": [[ 5, "desc" ]],
	    "aoColumns": [
			{ "bSortable": false, "sClass": "nohref" },
			{ "bSortable": false, "sClass": "table-icon nohref" },
			{ "sType": "string" },
			{ "sType": "string" },
			{ "bSortable": true },
	        { "bSortable": true },
			{ "bSortable": false, "sClass": "nohref" }
		]
	});

	$('.trashTable').dataTable({
	    "sPaginationType": "full_numbers",
	    "sDom": "<'row-fluid inboxHeader'<'span6'<'dt_actions'>l><'span6'f>r>t<'row-fluid inboxFooter'<'span6'i><'span6'p>>",
	    "iDisplayLength": 25,
	    "aoColumns": [
			{ "bSortable": false, "sClass": "nohref" },
			{ "bSortable": false, "sClass": "table-icon nohref" },
			{ "sType": "string" },
			{ "sType": "string" },
			{ "bSortable": true },
	        { "bSortable": true },
			{ "bSortable": false, "sClass": "nohref" }
		]
	});

	$('.archiveTable').dataTable({
	    "sPaginationType": "full_numbers",
	    "sDom": "<'row-fluid inboxHeader'<'span6'<'dt_actions'>l><'span6'f>r>t<'row-fluid inboxFooter'<'span6'i><'span6'p>>",
	    "iDisplayLength": 25,
	    "aoColumns": [
			{ "bSortable": false, "sClass": "nohref" },
			{ "bSortable": false, "sClass": "table-icon nohref" },
			{ "sType": "string" },
			{ "sType": "string" },
			{ "bSortable": true },
	        { "bSortable": true },
			{ "bSortable": false, "sClass": "nohref" }
		]
	});

	/*========= Take actions from divs on bottom of page inbox.html and appear them in datatable header =========*/
	$('.inbox #inbox .dt_actions').html($('.dt_inbox_actions').html());
	$('.inbox #outbox .dt_actions').html($('.dt_outbox_actions').html());
	$('.inbox #trash .dt_actions').html($('.dt_trash_actions').html());
	$('.inbox #archive .dt_actions').html($('.dt_inbox_actions').html());

	$('.dataTables_length select').chosen();

	/* This is used for layout options. If you decide to use manually setting for layout then you can
	remove this part of code and set all options manually by addinc classes. Otherwise if you decide to
	use jquery cookie and switch options do not remove this part of code below. */

	/*========= Make template in fixed of full-width =========*/
	$('.changeContainer').click(function() {
		if(!$('.mainContainer').hasClass('noFluid')) {
			$.cookie('nonFluid', 'hide', { path: '/', expires: 365 });
			$('.mainContainer').addClass('noFluid');
			$('.containerNav ul').addClass('container');
			$('header > div').addClass('container');
			$('.topBarInner').addClass('container');
			$('.contentInner').addClass('container');
			if($('.containerNav').is(":hidden")) {
				$('.layout').css('display', 'block');
			} else {
				$('.layout').css('display', 'none');
			}
			if($('.widgetBar').is("hidden")) {
				$('.content').removeClass('contentLeft').removeClass('contentRight');
			} else {
				if($('.widgetBar').hasClass("barRight")) {
					$('.content').addClass('contentLeft').removeClass('contentRight');
				} else {
					$('.content').addClass('contentRight').removeClass('contentLeft');
				}
			}
			$('.changeContainer span').removeClass('container').addClass('full');
		} else {
			$.cookie('nonFluid', null, { path: '/', expires: 365 });
			$('.mainContainer').removeClass('noFluid');
			$('.containerNav ul').removeClass('container');
			$('header > div').removeClass('container');
			$('.topBarInner').removeClass('container');
			$('.contentInner').removeClass('container');
			if($('.containerNav').is(":hidden")) {
				$('.layout').css('display', 'block');
			} else {
				$('.layout').css('display', 'none');
			}
			$('.changeContainer span').addClass('container').removeClass('full');
		}
		return false;
	});

	if($.cookie('nonFluid')) { 
		$('.mainContainer').addClass('noFluid');
		$('.containerNav ul').addClass('container');
			$('header > div').addClass('container');
			$('.topBarInner').addClass('container');
			$('.contentInner').addClass('container');
			if($('.containerNav').is(":hidden")) {
				$('.layout').css('display', 'block');
			} else {
				$('.layout').css('display', 'none');
			}
		$('.changeContainer span').removeClass('container').addClass('full');
	}
	
	/*========= Change navigation and sidebar position to left/right =========*/
	$('.layoutChange').click(function() {
		if($('.widgetBar').hasClass('barRight')) {
			$.cookie('barPosition', null, { path: '/', expires: 365 });
			$('.widgetBar').removeClass('barRight');
			$('.content').addClass('contentRight').removeClass('contentLeft');
			$('.layoutChange span').removeClass('layoutRight').addClass('layoutLeft');
			$('.styleChoose').removeClass('leftStyle').addClass('rightStyle');
		} else {
			$.cookie('barPosition', 'hide', { path: '/', expires: 365 });
			$('.widgetBar').addClass('barRight');
			$('.content').addClass('contentLeft').removeClass('contentRight');
			$('.layoutChange span').removeClass('layoutLeft').addClass('layoutRight');
			$('.styleChoose').addClass('leftStyle').removeClass('rightStyle');
		}
		return false;
	});

	if($.cookie('barPosition')) { 
		$('.widgetBar').addClass('barRight');
		$('.content').addClass('contentLeft').removeClass('contentRight');
		$('.layoutChange span').removeClass('layoutLeft').addClass('layoutRight');
		$('.styleChoose').addClass('leftStyle').removeClass('rightStyle');
	} else {
		$('.content').addClass('contentRight').removeClass('contentLeft');
		$('.layoutChange span').removeClass('layoutRight').addClass('layoutLeft');
		$('.styleChoose').removeClass('leftStyle').addClass('rightStyle');
	}

	/* Check if main container have class noFluid and if answer is yes then
	add class to all necessary elements to make it working properly */

	$(document).ready(function() {
		if($('.mainContainer').hasClass("noFluid")) {
			$('.noFluidNav').addClass('container');
			$('.topBarInner').addClass('container');
			$('header > div').addClass('container').removeClass('container-fluid');
			$('.contentInner').addClass('container');
			$('.layout').css('display', 'none');
		}
	});

	/* Check if widgetbar have class barRight and if answer is yes then
	add class to all necessary elements to make it working properly */

	$(document).ready(function() {
		if($('.widgetBar').hasClass("barRight")) {
			$('.content').addClass('contentLeft').removeClass('contentRight');
			$('.layoutChange span').removeClass('layoutLeft').addClass('layoutRight');
			$('.styleChoose').addClass('leftStyle').removeClass('rightStyle');
		}
	});

	/* Check if widgetbar have class barRight and if answer is yes then
	add class to all necessary elements to make it working properly */

	$(document).ready(function() {
		if($('.mainContainer').hasClass("fluidTopnav")) {
			$('.noFluidNav').removeClass('container');
			$('.topBarInner').removeClass('container');
			$('header > div').removeClass('container');
			$('.contentInner').removeClass('container');
			$('.conta').css('display', 'none');
			$('.layout').css('display', 'none');
		}
	});
	
});
/*========= End of function =========*/