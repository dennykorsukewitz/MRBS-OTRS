# MRBS-OTRS
	MRBS-OTRS is a function to 'connect' the MRBS with the Ticketsystem OTRS.
	The aim is to add a ticketnumber from OTRS into the description of the booking in MRBS.
	Every notification of the booking goes into the same ticket as article.
	How it works: create a ticket in OTRS via the OTRS rpc interface from PHP.
	

##### Table of Contents  
[Feature List](#Feature)  
[Installation](#Installation)  
[Prerequisites](#Prerequisites)  
[Configuration](#Configuration)  
[OTRS configuration](#OTRSconfiguration)  
[Files](#Files)  
[Download](#Download)  
  

<a name="Feature"/>
### Feature List
* create a ticket in OTRS via SOAP::PHP
* insert the tickernumber into the description of the booking room
* tada = magic

<a name="Installation"/>
### Installation

#### MRBS-Server (sending server)
	* install the package php-soap
	
#### OTRS-Server (receiving server)
	* enable the RPC interface in OTRS 
	* set a user name and password under Admin > SysConfig > Framework > Core::Soap (webinterface)

#### config.inc.php
	* add the configuration of the config.inc.php
	* change ticket-properties

#### otrs-soap.php
	* add the file otrs-soap.php to the ./web directory

#### otrs.php
	* add the file otrs.php to the ./web directory
	
#### edit_entry.php
	* edit_entry.php (1.4.10) is updated by following code:
	```
	-    echo "<input class=\"submit default_action\" type=\"submit\"  name=\"save_button\" value=\"" .  get_vocab("save") . "\" > \n";
	+    echo "<input class=\"submit default_action\" type=\"submit\"  name=\"savebutton\" value=\"" .  get_vocab("save") . "\" > \n";
	
	```
#### edit_entry.js.php
	* edit_entry.js-php (1.4.10) is updated by following code:
	```
	-      if ($(this).data('submit') === 'save_button')
	+      if ($(this).data('submit') === 'savebutton')	
	```

#### edit_entry_handler.php
	* edit_entry_handler.php (1.4.10) is extended by following code:
	```
	+    	### OTRS ###
	+    	$just_check = TRUE;  # just check the valid booking
	+    	$result = mrbsMakeBookings($bookings, $this_id, $just_check, $skip, $original_room_id, $need_to_send_mail, $edit_type);
	+    	# if the booking is vaild & no other booking exist & save button was pressed = include otrs.php
	+    	if ($result['valid_booking']== TRUE  && !isset($id) && isset($savebutton) )
	+    	{
	+    		include("otrs.php");
	+    	}
	+    	### OTRS END ###
		
		$just_check = $ajax && function_exists('json_encode') && !$commit;
		$this_id = (isset($id)) ? $id : NULL;
		$result = mrbsMakeBookings($bookings, $this_id, $just_check, $skip, $original_room_id, $need_to_send_mail, $edit_type);
	```

<a name="Prerequisites"/>
### Prerequisites

* install PHP-SOAP:  sudo apt-get install php-soap
* enable the RPC interface in OTRS: Admin > SysConfig > Framework > Core::Soap
* set SOAP:username and SOAP:password
* Perl module SOAP::Lite on otrs-server

SOAP-PHP...
[...] coming soon [...]

<a name="Configuration"/>
### Configuration
Add these parameter into "config.inc.php" file.

```no-highlight
$create_otrs_ticket = TRUE; 								// activate otrs-create-ticket function

$otrs_ticket["area"][] = "2";								// area number
$otrs_ticket["area"][] = "5";
[...]

<a name="OTRSconfiguration"/>
*OTRS configuration*
$otrs_url      	= "http://domain.de/otrs/rpc.pl"; 			// URL of your otrs-server
$otrs_username	= "otrs";									// OTRS-Webinterface -> SysConfig -> Framework -> Core::SOAP -> SOAP:User
$otrs_password 	= "PASSWORD";								// OTRS-Webinterface -> SysConfig -> Framework -> Core::SOAP -> SOAP:Password

*ticket properties*
$otrs_title_add			= "MRBS-OTRS: ";					//	Ticket-title
$otrs_from_domain		= "domain.de";						//	(optional)	
$otrs_queue				= "Postmaster";						//	create tickets in this queue
$otrs_lock				= "unlock";							//  lock/unlock
$otrs_state				= "new";							//  new/open/closed..
$otrs_priority			= "3";								//	1/2/3/4/5 priority
$otrs_articletype 		= "webrequest";						//		
$otrs_sendertype		= "customer";						//	
$otrs_historytype 		= "WebRequestCustomer";				//	
$otrs_historycomment	= "created from MRBS via PHP";		//		
$otrs_contenttype		= "text/plain; charset=ISO-8859-1";	//	
$otrs_userid			=  1;								//	user in OTRS (1 = systemuser)		
```

<a name="Files"/>
### Files

config.inc.php
edit_entry_handler.php
otrs.php

<a name="Download"/>
### Download

For download see [https://github.com/dennybresch/MRBS-OTRS)


Enjoy!

Your Denny Bresch!
[https://github.com/breschie]
 
 
