# MRBS-OTRS
	MRBS-OTRS is a function to connect the MRBS with the Ticketsystem OTRS.
	The aim is to add a ticketnumber from OTRS into the description of the booking in MRBS.
	Every notification of the booking goes into the same ticket as article.


## Feature List
* create a ticket in OTRS via SOAP::PHP
* insert the tickernumber into the description of the booking room
* tada = magic

### Installation

[...] coming soon [...]

### Prerequisites

SOAP-PHP...
[...] coming soon [...]

### Configuration
```no-highlight
$create_otrs_ticket = TRUE; 								// activate otrs-create-ticket function

$otrs_ticket["area"][] = "2";								// area number
$otrs_ticket["area"][] = "5";
[...]

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

#Download

For download see [https://github.com/dennybresch/MRBS-OTRS)


Enjoy!

Your Denny Bresch!
[https://github.com/breschie]
 
 
