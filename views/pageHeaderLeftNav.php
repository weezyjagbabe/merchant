<!-- Begin resposive menus -->
<!--<ul class="responsiveNav">-->
<!---->
<!--</ul>-->

<!-- End resposive menus -->

<!-- Begin logo -->
<header>
	<div>
		<a href="dashboard" class="logo"><img src="models/img/merchantlogo.png" alt=""></a>
	</div>
</header>
<!-- End logo -->

<!-- Begin navigation wrapper -->
<div class="widgetBar">
	<div class="barInner">
		
		<!-- Begin main menus -->
		<ul class="navigation">
			<li <?php if( $pageName === "Dashboard" ) { echo "class='active'"; }else{ echo "class='inactive'";} ?>><a href="./dashboard"><i class="icon-white icon-th-large"></i> Dashboard</a></li>
			<li <?php if( $pageName === "Transactions" || $pageName === "Previous Transactions" || $pageName === "Settlements" || $pageName === "Settlements Report" || $pageName === "Invoice" ) { echo "class='active'"; } ?>>
				<a href=""><i class="icon-white icon-shopping-cart"></i> Transactions</a>
				<ul class="subMenu">
					<li <?php if( $pageName === "Transactions" ) { echo "class='active dropActive'"; } ?>><a href="./transactions"><span>+</span> Today's Transactions</a></li>
					<li <?php if( $pageName === "Previous Transactions" ) { echo "class='active dropActive'"; } ?>><a href="./previous-transactions"><span>+</span> Previous Transactions</a></li>
                    <li <?php if( $pageName === "Settlements" ) { echo "class='active dropActive'"; } ?>><a href="./settlements"><span>+</span> Settlements</a></li>
                    <li <?php if( $pageName === "Settlements Report" ) { echo "class='active dropActive'"; } ?>><a href="./settlements-report"><span>+</span> Settlements Report</a></li>
              </ul>
			</li>
			<li><a href="./logout"><i class="icon-white icon-folder-close"></i> Log Out</a></li>
		</ul>
		<!-- End main menus -->
		
		<!-- Begin calender -->
		<div class="widgetBarContent">
			<div class="divider"><div><span></span></div></div>
			<div id="date"></div>
		</div>
		<!-- End calender -->
		
	</div>
</div>
<!-- End navigation wrapper -->