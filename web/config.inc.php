<?php

// $Id: config.inc.php 2211 2011-12-24 09:27:00Z cimorrison $

/**************************************************************************
*   MRBS Configuration File
*   Configure this file for your site.
*   You shouldn't have to modify anything outside this file
*   (except for the lang.* files, eg lang.en for English, if
*   you want to change text strings such as "Meeting Room
*   Booking System", "room" and "area").
**************************************************************************/

/*******************
 * MRBS to OTRS
*******************/

// activate otrs create ticket function
$create_otrs_ticket = TRUE;

// $otrs_ticket["area"] = area number
$otrs_ticket["area"][] = "10";
$otrs_ticket["area"][] = "11";

# Please define the connection information here:
$otrs_url      = "http://domain.de/otrs/rpc.pl";        # URL of your otrs-server
$otrs_username = "otrs";                                # OTRS -> SysConfig -> Framework -> Core::SOAP -> SOAP:User
$otrs_password = "otrs-password";                       # OTRS -> SysConfig -> Framework -> Core::SOAP -> SOAP:Password

# Ticket properties
$otrs_title_add      = "MRBS-booking: ";                # (optional) just text for ticket title/article
$otrs_from_domain    = "mailadress-domain.de";          # (optional) needed to create senderadress (maybe exists another val)
$otrs_queue          = "Postmaster";                    # queue of otrs
$otrs_lock           = "unlock";                        # ticket-lock-state: lock or unlock state
$otrs_state          = "new";                           # ticket-state: open, new,closed successful,closed unsuccessful, etc
$otrs_priority       = "3";                             # ticket-priority: 1 = very low, 2,3,4, 5 = very high
$otrs_articletype    = "webrequest";                    # email-external|email-internal|phone|fax
$otrs_sendertype     = "customer";                      # agent|system|customer
$otrs_historytype    = "WebRequestCustomer";            # EmailCustomer|Move|AddNote|PriorityUpdate|WebRequestCustomer|...
$otrs_historycomment = "created from MRBS via PHP";     # Some free text!'
$otrs_contenttype    = "text/plain; charset=utf-8";     # charse: ISO-8859-1 / utf-8 ...
$otrs_userid         = 1;