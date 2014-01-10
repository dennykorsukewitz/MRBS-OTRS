<?php
## OTRS ##
// If create_otrs_ticket is activated
if (($create_otrs_ticket == TRUE)  && (!isset($id)))
{ 		// if create otrs ticket function is activated
foreach ($otrs_ticket["area"] as $key) 	// get all areas in which a ticket should be created
{
	if ($area == $key) 			// if the current booking room is in the ticket_creation_area = create a ticket in otrs
	{
		$otrs_title				= 	$otrs_title_add . " " .  $booking['create_by'];					// The Tilte/Subject of the Ticket
		$otrs_from  			= 	$booking['create_by'] . "@"	. $otrs_from_domain;					// Sender of the Ticket
		include("otrs-soap.php");
		$booking['name'] 		= 	$booking['name']			. " - [Ticket#" . $Formatted_TicketNr . "]";
		$booking['description']	=   $booking['description']		. " - [Ticket#" . $Formatted_TicketNr . "]";

	}
}
}
## OTRS END ##