<?php
	$pageName = "Dashboard"; 																				// Set the page name

	require_once './models/classes/Configurations.php'; 													// Include the configurations class
	require_once './controllers/userController.php'; 														// Include the user processor file
    require_once './models/classes/TransactionClass.php';
	if( !$UserClass -> userIsLoggedin() ) { $UserClass -> redirect( 'sign-in' ); } 							// If user is not logged in, redirect to signin page
	
	require_once './controllers/documentHeader.php'; 														// Include the document header
?>
	
	<!-- Begin page body -->
	<body>

		<!-- Begin all content wrapper -->
		<div class="mainContainer">

			<!-- Begin the page header, logo and left navigation section -->
			<?php
				require_once './views/pageHeaderLeftNav.php'; 												// Include the page header, logo and left navigation
			?>
			<!-- End the page header, logo and left navigation section -->

			<!-- Begin content wrapper -->
			<div class="content">
			
				<!-- Begin page user menu -->
				<?php
					require_once './views/pageUserMenu.php'; 												// Include the page user menu
				?>
				<!-- End page user menu -->

				<!-- Begin inner content -->
				<div class="contentInner">


          <div class="inbox">
            <ul class="nav nav-tabs" data-tabs="tabs">
              <li><a data-toggle="tab" data-target="#newmessage" href="#newmessage"><img src="./models/img/icons/14x14/plus.png" alt="">New message</a></li>
              <li class="active"><a data-toggle="tab" data-target="#inbox" href="#inbox"><img src="./models/img/icons/14x14/download5.png" alt="">Inbox</a></li>
              <li><a data-toggle="tab" data-target="#outbox" href="#outbox"><img src="./models/img/icons/14x14/upload4.png" alt="">Outbox</a></li>
              <li><a data-toggle="tab" data-target="#trash" href="#trash"><img src="./models/img/icons/14x14/trash.png" alt="">Trash</a></li>
              <li><a data-toggle="tab" data-target="#archive" href="#archive"><img src="./models/img/icons/14x14/box2.png" alt="">Archive</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="inbox">
                <table cellpading="0" cellspacing="0" border="0" class="dTable inboxTable" data-msg_rowlink="a">
                  <thead align="left">
                    <tr>
                      <th class="checkboxes"><input type="checkbox" class="checkall"></th>
                      <th class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></th>
                      <th width="750">Subject</th>
                      <th width="350">From</th>
                      <th width="150">Date</th>
                      <th width="150">Size</th>
                      <th class="attach" width="40"><img src="./models/img/icons/14x14/link.png" alt=""></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="new">
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope1.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>21/11/2012</td>
                      <td>587kb</td>
                      <td class="attach" ><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr class="new">
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope1.png" alt=""></td>
                      <td><a href="#msg">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a></td>
                      <td>something@example.com</td>
                      <td>20/11/2012</td>
                      <td>411kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr class="new">
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope1.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>18/11/2012</td>
                      <td>327kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>eva@example.com</td>
                      <td>16/11/2012</td>
                      <td>587kb</td>
                      <td class="attach"><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a></td>
                      <td>bernad@example.com</td>
                      <td>15/11/2012</td>
                      <td>875kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>21/11/2012</td>
                      <td>587kb</td>
                      <td class="attach" ><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>something@example.com</td>
                      <td>20/11/2012</td>
                      <td>411kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a></td>
                      <td>john@example.com</td>
                      <td>18/11/2012</td>
                      <td>327kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>eva@example.com</td>
                      <td>16/11/2012</td>
                      <td>587kb</td>
                      <td class="attach"><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a></td>
                      <td>bernad@example.com</td>
                      <td>15/11/2012</td>
                      <td>875kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>21/11/2012</td>
                      <td>587kb</td>
                      <td class="attach" ><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>something@example.com</td>
                      <td>20/11/2012</td>
                      <td>411kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a></td>
                      <td>john@example.com</td>
                      <td>18/11/2012</td>
                      <td>327kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a></td>
                      <td>eva@example.com</td>
                      <td>16/11/2012</td>
                      <td>587kb</td>
                      <td class="attach"><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>bernad@example.com</td>
                      <td>15/11/2012</td>
                      <td>875kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a></td>
                      <td>john@example.com</td>
                      <td>21/11/2012</td>
                      <td>587kb</td>
                      <td class="attach" ><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>something@example.com</td>
                      <td>20/11/2012</td>
                      <td>411kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>18/11/2012</td>
                      <td>327kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a></td>
                      <td>eva@example.com</td>
                      <td>16/11/2012</td>
                      <td>587kb</td>
                      <td class="attach"><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>bernad@example.com</td>
                      <td>15/11/2012</td>
                      <td>875kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a></td>
                      <td>john@example.com</td>
                      <td>21/11/2012</td>
                      <td>587kb</td>
                      <td class="attach" ><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a></td>
                      <td>something@example.com</td>
                      <td>20/11/2012</td>
                      <td>411kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>18/11/2012</td>
                      <td>327kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a></td>
                      <td>eva@example.com</td>
                      <td>16/11/2012</td>
                      <td>587kb</td>
                      <td class="attach"><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>bernad@example.com</td>
                      <td>15/11/2012</td>
                      <td>875kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>21/11/2012</td>
                      <td>587kb</td>
                      <td class="attach" ><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a></td>
                      <td>something@example.com</td>
                      <td>20/11/2012</td>
                      <td>411kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>18/11/2012</td>
                      <td>327kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>eva@example.com</td>
                      <td>16/11/2012</td>
                      <td>587kb</td>
                      <td class="attach"><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>bernad@example.com</td>
                      <td>15/11/2012</td>
                      <td>875kb</td>
                      <td class="attach"></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane" id="outbox">
                <table cellpading="0" cellspacing="0" border="0" class="dTable outboxTable">
                  <thead align="left">
                    <tr>
                      <th class="checkboxes"><input type="checkbox" class="checkall"></th>
                      <th class="image"><a href="#"><img src="./models/img/icons/14x14/envlope2.png" alt=""></a></th>
                      <th width="750">Subject</th>
                      <th width="350">From</th>
                      <th width="150">Date</th>
                      <th width="150">Size</th>
                      <th class="attach" width="40"><img src="./models/img/icons/14x14/link.png" alt=""></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>21/11/2012</td>
                      <td>587kb</td>
                      <td class="attach" ><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>something@example.com</td>
                      <td>20/11/2012</td>
                      <td>411kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>18/11/2012</td>
                      <td>327kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>eva@example.com</td>
                      <td>16/11/2012</td>
                      <td>587kb</td>
                      <td class="attach"><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>bernad@example.com</td>
                      <td>15/11/2012</td>
                      <td>875kb</td>
                      <td class="attach"></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane" id="trash">
                <table cellpading="0" cellspacing="0" border="0" class="dTable trashTable">
                  <thead align="left">
                    <tr>
                      <th class="checkboxes"><input type="checkbox" class="checkall"></th>
                      <th class="image"><a href="#"><img src="./models/img/icons/14x14/envlope2.png" alt=""></a></th>
                      <th width="750">Subject</th>
                      <th width="350">From</th>
                      <th width="150">Date</th>
                      <th width="150">Size</th>
                      <th class="attach" width="40"><img src="./models/img/icons/14x14/link.png" alt=""></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>21/11/2012</td>
                      <td>587kb</td>
                      <td class="attach" ><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>something@example.com</td>
                      <td>20/11/2012</td>
                      <td>411kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>18/11/2012</td>
                      <td>327kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>eva@example.com</td>
                      <td>16/11/2012</td>
                      <td>587kb</td>
                      <td class="attach"><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>bernad@example.com</td>
                      <td>15/11/2012</td>
                      <td>875kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>18/11/2012</td>
                      <td>327kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>eva@example.com</td>
                      <td>16/11/2012</td>
                      <td>587kb</td>
                      <td class="attach"><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>bernad@example.com</td>
                      <td>15/11/2012</td>
                      <td>875kb</td>
                      <td class="attach"></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane" id="archive">
                <table cellpading="0" cellspacing="0" border="0" class="dTable archiveTable">
                  <thead align="left">
                    <tr>
                      <th class="checkboxes"><input type="checkbox" class="checkall"></th>
                      <th class="image"><a href="#"><img src="./models/img/icons/14x14/envlope2.png" alt=""></a></th>
                      <th width="750">Subject</th>
                      <th width="350">From</th>
                      <th width="150">Date</th>
                      <th width="150">Size</th>
                      <th class="attach" width="40"><img src="./models/img/icons/14x14/link.png" alt=""></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>21/11/2012</td>
                      <td>587kb</td>
                      <td class="attach" ><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>something@example.com</td>
                      <td>20/11/2012</td>
                      <td>411kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>18/11/2012</td>
                      <td>327kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>eva@example.com</td>
                      <td>16/11/2012</td>
                      <td>587kb</td>
                      <td class="attach"><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>bernad@example.com</td>
                      <td>15/11/2012</td>
                      <td>875kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>john@example.com</td>
                      <td>18/11/2012</td>
                      <td>327kb</td>
                      <td class="attach"></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>eva@example.com</td>
                      <td>16/11/2012</td>
                      <td>587kb</td>
                      <td class="attach"><img src="./models/img/icons/14x14/link.png" alt=""></td>
                    </tr>
                    <tr>
                      <td class="checkboxes"><input type="checkbox"></td>
                      <td class="image"><img src="./models/img/icons/14x14/envlope2.png" alt=""></td>
                      <td><a href="#msg">Lorem ipsum dolor sit amet co…</a></td>
                      <td>bernad@example.com</td>
                      <td>15/11/2012</td>
                      <td>875kb</td>
                      <td class="attach"></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane" id="newmessage">
                <div class="compose">
                  <div class="formWizard">
                    <span class="fLabel">Send from</span>
                    <div class="noSearch">
                      <select class="chosen">
                        <option value="opt1">no-reply@example.com</option>
                        <option value="opt2">support@example.com</option>
                        <option value="opt2">sales@example.com</option>
                        <option value="opt2">user123@example.com</option>
                      </select>
                    </div>
                  </div>
                  <div class="formWizard">
                    <span class="fLabel">Recipient</span>
                    <input type="text" name="to">
                  </div>
                  <div class="formWizard">
                    <span class="fLabel">Subject</span>
                    <input type="text" name="to">
                  </div>
                  <div class="formWizard">
                    <span class="fLabel">Message</span>
                    <textarea name="message"></textarea>
                  </div>
                  <div class="formButtons">
                    <button type="reset" class="button sButton bSky">Cancel</button>
                    <button type="submit" class="button sButton bOlive">Submit form</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="dt_inbox_actions">
              <div class="btn-group">
                <a href="javascript:void(0)" class="btn" title="Answer"><img src="./models/img/icons/14x14/cog.png" alt=""></a>
                <a href="javascript:void(0)" class="btn" title="Forward"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
                <a href="#" class="delete_msg btn" title="Delete" data-tableid="dt_inbox"><img src="./models/img/icons/14x14/trash.png" alt=""></a>
              </div>
            </div>

            <div class="dt_outbox_actions">
              <div class="btn-group">
                <a href="javascript:void(0)" class="btn" title="Forward"><img src="./models/img/icons/14x14/download4.png" alt=""></a>
                <a href="#" class="delete_msg btn" title="Delete" data-tableid="dt_inbox"><img src="./models/img/icons/14x14/trash.png" alt=""></a>
              </div>
            </div>

            <div class="dt_trash_actions">
              <div class="btn-group">
                <a href="#" class="delete_msg btn" title="Delete" data-tableid="dt_inbox"><img src="./models/img/icons/14x14/trash.png" alt=""></a>
              </div>
            </div>
          </div>

          <div class="divider"><div><span></span></div></div>
          
				</div>
				<!-- End inner content -->

			</div>
			<!-- End content wrapper -->

		</div>
		<!-- Ednd all content wrapper -->

		<!-- Begin the page scripts -->
		<?php
			require_once './controllers/pageScripts.php'; 													// Include the page scripts
		?>
		<!-- Begin the page scripts -->
    
	</body>
	<!-- End page body -->
	
</html>