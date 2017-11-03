<!-- Placed at the end of the document so the pages load faster -->
<script src="./controllers/js/jquery-1.8.3.js"></script>
<script src="./controllers/js/ui/jquery-ui-1.9.2.custom.js"></script>

<!-- flot plugin -->
<script src="./controllers/js/flot/excanvas.min.js"></script>
<script src="./controllers/js/flot/jquery.flot.js"></script>
<script src="./controllers/js/flot/jquery.flot.pie.min.js"></script>
<script src="./controllers/js/flot/jquery.flot.resize.js"></script>
<script src="./controllers/js/flot/jquery.flot.orderBars.js"></script>

<!-- Jquery form wizard -->
<script src="./controllers/js/formWizard/jquery.form.js"></script>
<script src="./controllers/js/formWizard/jquery.validate.js"></script>
<script src="./controllers/js/formWizard/bbq.js"></script>
<script src="./controllers/js/formWizard/jquery.form.wizard.js"></script>

<!-- antiscroll plugin -->
<script src="./controllers/js/scrollbar/jquery.mCustomScrollbar.js"></script>


<!-- fullcalendar plugin -->
<script src="./controllers/js/fullcalendar/fullcalendar.js"></script>


<!-- tipsyS plugin -->
<script src="./controllers/js/tipsy/jquery.tipsy.js"></script>

<!-- fancybox plugin -->
<script src="./controllers/js/fancybox/jquery.fancybox.pack.js"></script>

<!-- uniform plugin -->
<script src="./controllers/js/uniform/jquery.uniform.js"></script>

<!-- Jquery dataTable -->
<script src="./controllers/js/dataTable/jquery.dataTables.js"></script>

<!-- uniform plugin -->
<script src="./controllers/js/sparklines/jquery.sparkline.js"></script>

<!-- chosen plugin -->
<script src="./controllers/js/chosen/chosen.jquery.js"></script>

<!-- cookie plugin -->
<script src="./controllers/js/cookie/jquery.cookie.js"></script>

<!-- jplayer plugin -->
<script src="./controllers/js/jplayer/jquery.jplayer.min.js"></script>

<!-- mask plugin -->
<script src="./controllers/js/mask/jquery.maskedinput-1.3.js"></script>

<!-- easypiechart plugin -->
<script src="./controllers/js/easypiechart/jquery.easy-pie-chart.js"></script>

<!-- globalize plugin -->
<script src="./controllers/js/globalize/globalize.js"></script>
<script src="./controllers/js/globalize/cultures/globalize.culture.de.js"></script>

<!-- jplayer plugin -->
<script src="./controllers/js/jplayer/jquery.jplayer.min.js"></script>
<script src="./controllers/js/jplayer/jplayer.playlist.min.js"></script>

<!-- ibutton plugin -->
<script src="./controllers/js/ibutton/jquery.ibutton.js"></script>

<!-- daterangepicker plugin -->
<script src="./controllers/js/dateRangepicker/date.js"></script>
<script src="./controllers/js/dateRangepicker/daterangepicker.jQuery.js"></script>

<!-- antiscroll plugin -->
<script src="./controllers/js/antiscroll/jquery-mousewheel.js"></script>
<script src="./controllers/js/antiscroll/antiscroll.js"></script>

<script src="./controllers/js/bootstrap.min.js"></script>
<script src="./controllers/js/application.js"></script>

<script src="./controllers/js/general.js"></script>
<script src="./controllers/js/forms.js"></script>
<!--<script src="./controllers/js/updating.js"></script>-->
<!--<script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
<!--<script src="./controllers/js/canvasjs.min.js"></script>-->
<script src="./controllers/js/Chart.bundle.js"></script>
<script src="./controllers/js/charts.js"></script>
<script src="./controllers/js/barchart.js"></script>

<?php
	if ( $pageName == "Dashboard" ) { echo "<script src='./controllers/js/dashboard.js'></script>"; }
?>

<script>
	$(document).ready(function()
	{
		setTimeout('$("html").removeClass("loader")',1000);
	});
</script>