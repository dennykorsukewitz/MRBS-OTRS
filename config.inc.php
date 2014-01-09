/*******************
 * MRBS to OTRS
*******************/

// activate otrs create ticket function
$create_otrs_ticket = TRUE;

// $otrs_ticket["area"] = area number
$otrs_ticket["area"][] = "10";
$otrs_ticket["area"][] = "11";
$otrs_ticket["area"][] = "12";
$otrs_ticket["area"][] = "100";
$otrs_ticket["area"][] = "19";


# Please define the connection information here:
$otrs_url      	= "http://otrs.x.de/otrs/rpc.pl"; // URL of your otrs-server
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
