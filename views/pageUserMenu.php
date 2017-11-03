<div class="topBar">
	<div class="topBarInner">

		<!-- Begin home icon menu -->
		<ul class="breadcrumbs">
			<li><a href="dashboard"><img src="./models/img/icons/14x14/home5.png" alt=""></a></li>
		</ul>
		<!-- End home icon menu -->

		<!-- Begin provider profile menu -->
		<ul class="profile barButtons">
			<li class="profile">
				<a href="#">
					<img src="./models/img/icons/14x14/member2.png" alt=""> <?php $name = $TransactionClass->getCompanyName(); echo $name['companyName'];?> <span class="arrow"></span>
				</a>
				<ul>
					<li><a href="./profile"><img src="./models/img/icons/14x14/cog2.png" alt=""> Company Profile</a></li>
					<li><a href="./inbox"><img src="./models/img/icons/14x14/envlope1.png" alt=""> Messages</a></li>
					<li><a href="./logout"><img src="./models/img/icons/14x14/lock3.png" alt=""> Log out</a></li>
				</ul>
			</li>
		</ul>
		<!-- Begin provider profile menu -->

		<!-- Begin transaction menus -->
		<ul class="barButtons">
			<li><a href="./transactions"><img src="./models/img/icons/14x14/pad.png" alt=""> Today's Transactions <strong></strong></a></li>
			<li>
				<a href="#"><img src="./models/img/icons/14x14/box2.png" alt=""> Monthly Transactions <span class="arrow"></span></a>
				<ul>
					<li>
						<a href="previous-transactions?t=January"><img src="./models/img/icons/14x14/box2.png" alt=""> <strong>January</strong></a>
						<a href="#" class="ctrlButton"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
					</li>
					<li>
						<a href="previous-transactions?t=December"><img src="./models/img/icons/14x14/box2.png" alt=""> December</a>
						<a href="#" class="ctrlButton"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
					</li>
					<li>
						<a href="previous-transactions?t=November"><img src="./models/img/icons/14x14/box2.png" alt=""> November</a>
						<a href="#" class="ctrlButton"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
					</li>
					<li>
						<a href="previous-transactions?t=October"><img src="./models/img/icons/14x14/box2.png" alt=""> October</a>
						<a href="#" class="ctrlButton"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
					</li>
					<li>
						<a href="previous-transactions?t=September"><img src="./models/img/icons/14x14/box2.png" alt=""> September</a>
						<a href="#" class="ctrlButton"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
					</li>
					<li>
						<a href="previous-transactions?t=August"><img src="./models/img/icons/14x14/box2.png" alt=""> August</a>
						<a href="#" class="ctrlButton"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
					</li>
					<li>
						<a href="previous-transactions?t=July"><img src="./models/img/icons/14x14/box2.png" alt=""> July</a>
						<a href="#" class="ctrlButton"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
					</li>
					<li>
						<a href="previous-transactions?t=June"><img src="./models/img/icons/14x14/box2.png" alt=""> June</a>
						<a href="#" class="ctrlButton"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
					</li>
					<li>
						<a href="previous-transactions?t=May"><img src="./models/img/icons/14x14/box2.png" alt=""> May</a>
						<a href="#" class="ctrlButton"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
					</li>
					<li>
						<a href="previous-transactions?t=April"><img src="./models/img/icons/14x14/box2.png" alt=""> April</a>
						<a href="#" class="ctrlButton"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
					</li>
					<li>
						<a href="previous-transactions?t=March"><img src="./models/img/icons/14x14/box2.png" alt=""> March</a>
						<a href="#" class="ctrlButton"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
					</li>
					<li>
						<a href="previous-transactions?t=February"><img src="./models/img/icons/14x14/box2.png" alt=""> February</a>
						<a href="#" class="ctrlButton"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
					</li>
					<li>
						<a href="previous-transactions"><img src="./models/img/icons/14x14/random.png" alt=""> View all reports</a>
					</li>
				</ul>
			</li>
		</ul>
		<!-- End transaction menus -->

		<!-- Begin service menus -->
		<ul class="barButtons">
			<li>
				<a href="#"><img src="./models/img/icons/14x14/box2.png" alt=""> Service Transactions <span class="arrow"></span></a>
				<ul>
					<li><a href="transactions?t=Bill Payment">Bill Payment</a></li>
					<li><a href="transactions?t=AirTime Topup">Airtime Topup</a></li>
					<li><a href="transactions?t=Funds Transfer">Funds Transfer</a></li>
				</ul>
			</li>
		</ul>
		<!-- End service menus -->

	</div>
</div>