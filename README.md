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

[...] coming soon [...]

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

<a name="Download"/>
### Download

For download see [https://github.com/dennybresch/MRBS-OTRS)


Enjoy!

Your Denny Bresch!
[https://github.com/breschie]
 
 
