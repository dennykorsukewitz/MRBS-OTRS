<?PHP

# This file contains a create-ticket function for OTRS
# Used a SOAP connection to create a ticket in OTRS via PHP
# error_reporting(E_ALL);
 

# Set up a new SOAP connection:
$client = new SoapClient(null, array('location'  =>
$otrs_url,
                                     'uri'       => "Core",
                                     'trace'     => 1,
                                     'login'     => $otrs_username,
                                     'password'  => $otrs_password,
                                     'style'     => SOAP_RPC,
                                     'use'       => SOAP_ENCODED));

# Create a new ticket. The function returns the Ticket ID.
$TicketID = $client->__soapCall("Dispatch", array($otrs_username, $otrs_password,
"TicketObject", "TicketCreate", 
"Title",        $otrs_title, 
"Queue",        $otrs_queue, 
"Lock",         $otrs_lock, 
"PriorityID",   $otrs_priority, 
"State",        $otrs_state, 
"CustomerUser", $otrs_from, 
"OwnerID",      $otrs_userid, 
"UserID",       $otrs_userid,
));


# A ticket is not usefull without at least one article. The function
# returns an Article ID. 
$ArticleID = $client->__soapCall("Dispatch", 
array($otrs_username, $otrs_password,
"TicketObject",   "ArticleCreate",
"TicketID",       $TicketID,
"ArticleType",    $otrs_articletype,
"SenderType",     $otrs_sendertype,
"HistoryType",    $otrs_historytype,
"HistoryComment", $otrs_historycomment,
"From",           $otrs_from,
"Subject",        $otrs_title,
"ContentType",    $otrs_contenttype,
"Body",           $booking['description'],
"UserID",         $otrs_userid,
"Loop",           0,
"AutoResponseType", 'auto reply',
"OrigHeader", array(
        'From' => $otrs_from,
        'To' => $otrs_queue,
        'Subject' => $otrs_title,
        'Body' => $booking['description']
    ),
));


# Use the Ticket ID to retrieve the Ticket Number.
$TicketNr = $client->__soapCall("Dispatch", 
array($otrs_username, $otrs_password,
"TicketObject",   "TicketNumberLookup",
"TicketID",       $TicketID,
));

# Make sure the ticket number is not displayed in scientific notation
# See http://forums.otrs.org/viewtopic.php?f=53&t=5135
$big_integer = 1202400000; 
$Formatted_TicketNr = number_format($TicketNr, 0, '.', ''); 



