MRBS-OTRS
=========

**Feature List**

This package enables a "Quick Delete" feature in ticket action row (where you already have "note, pending, close, ..."). With it you can delete a ticket without having to leave a note.

this module is very similar to the both following modules, which exist in the basic-configuration:
(i recognized this configuration after built these module) - happened :)

Ticket::Frontend::MenuModule###460-Delete

Ticket::Frontend::PreMenuModule###450-Delete


**Installation**



**Prerequisites**

- OTRS 3.1

- OTRS 3.2


**Configuration**


$create_otrs_ticket = TRUE; 								// activate otrs-create-ticket function

// $otrs_ticket["area"] = area number
$otrs_ticket["area"][] = "2";
$otrs_ticket["area"][] = "5";
[...]


# Please define the connection information here:
$otrs_url      	= "http://otrs.x.de/otrs/rpc.pl"; 			// URL of your otrs-server
$otrs_username	= "otrs";									// OTRS -> SysConfig -> Framework -> Core::SOAP -> SOAP:User
$otrs_password 	= "PASSWORD";								// OTRS -> SysConfig -> Framework -> Core::SOAP -> SOAP:Password

# Ticket properties
$otrs_title_add			= "MRBS-Gerätebuchung: ";
$otrs_from_domain		= "domain.de";
$otrs_queue				= "OTRS::OTRS-SystemJunk";
$otrs_lock				= "unlock";
$otrs_state				= "new";
$otrs_priority			= "3";
$otrs_articletype 		= "webrequest";
$otrs_sendertype		= "customer";
$otrs_historytype 		= "WebRequestCustomer";
$otrs_historycomment	= "created from MRBS via PHP";
$otrs_contenttype		= "text/plain; charset=ISO-8859-1";
$otrs_userid			=  1;


**Download**

For download see [https://github.com/breschie/MRBS-OTRS)


Enjoy!

Your Denny Bresch!
[https://github.com/breschie]
 
 
