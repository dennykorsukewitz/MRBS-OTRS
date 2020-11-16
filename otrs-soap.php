<?php

# This file contains a create-ticket function for OTRS
# Used a SOAP connection to create a ticket in OTRS via PHP
# error_reporting(E_ALL);

# Set up a new SOAP connection:
$client = new SoapClient(null, array('location'  =>
    $otrs_url,                        # otrs-server url/ip
    'uri'       => "Core",
    'trace'     => 1,
    'login'     => $otrs_username,    # soap userlogin
    'password'  => $otrs_password,    # soap userpassword
    'style'     => SOAP_RPC,
    'use'       => SOAP_ENCODED));

# Create a new ticket. The function returns the Ticket ID. Ticket-properties
$TicketID = $client->__soapCall("Dispatch", array($otrs_username, $otrs_password,
    "TicketObject", "TicketCreate",   # action = create a ticket
    "Title",        $otrs_title,      # ticket-title: "MRBS Room booking" ...
    "Queue",        $otrs_queue,      # ticket-queue: "postmaster", "raw" etc.
    "Lock",         $otrs_lock,       # ticket-lock-state: lock or unlock state
    "PriorityID",   $otrs_priority,   # ticket-priority: 1 = very low, 2,3,4, 5 = very high
    "State",        $otrs_state,      # ticket-state: open, new,closed successful,closed unsuccessful, etc
    "CustomerUser", $otrs_from,       # CustomerUser: who did the booking...
    "OwnerID",      $otrs_userid,     # user ID: OTRS-User-ID of the user who creates the ticket
    "UserID",       $otrs_userid,     # -||-
));


# A ticket is not usefull without at least one article. The function
# returns an Article ID.  Article-properties
$ArticleID = $client->__soapCall("Dispatch",
array($otrs_username, $otrs_password,    #
"TicketObject",   "ArticleCreate",       # create a article in the ticket
"TicketID",       $TicketID,             # created TicketID
"ArticleType",    $otrs_articletype,     # article needs a article type
"SenderType",     $otrs_sendertype,      #
"HistoryType",    $otrs_historytype,     #
"HistoryComment", $otrs_historycomment,  #
"From",           $otrs_from,            # CustomerUser: who did the booking...
"Subject",        $otrs_title,           #
"ContentType",    $otrs_contenttype,     #
"Body",           $otrs_body,            # the booking description as article body
"UserID",         $otrs_userid,          # user ID: OTRS-User-ID of the user who creates the ticket
"Loop",           0,
"AutoResponseType", 'auto reply',
"OrigHeader", array(
        'From' => $otrs_from,
        'To' => $otrs_queue,
        'Subject' => $otrs_title,
        'Body' => $otrs_body
    ),
));


# Use the Ticket ID to retrieve the Ticket Number.
$TicketNr = $client->__soapCall("Dispatch",
array($otrs_username, $otrs_password,
"TicketObject",   "TicketNumberLookup",
"TicketID",       $TicketID,
));


# Make sure the ticket number is not displayed in scientific notation
# See http://forums.otrs.org/viewtopic.php?f = 53&t=5135
$big_integer                                 = 1202400000;
$Formatted_TicketNr                          = number_format($TicketNr, 0, '.', '');
