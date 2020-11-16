<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";

## OTRS ##
# if create otrs ticket function is activated
if ($create_otrs_ticket == TRUE)
{
    # get all areas in which a ticket should be created
    foreach ($otrs_ticket["area"] as $key)
    {
        # if the current booking room is in the ticket_creation_area = create a ticket in otrs
        if ($area == $key)
        {
            echo "Rooms: |".$area . $room . "|<br>";
            echo "starttime: |" . $starttime. "|<br>";

            $otrs_title = $otrs_title_add . " " .  $booking['create_by'] . " $day.$month.$year";    # The Tilte/Subject of the Ticket
            $otrs_ from = $booking['create_by'] . "@"    . $otrs_from_domain;                       # Sender of the Ticket
            $otrs_body  = $booking['description'];                                                  # mrbs description as ticket body
            include("otrs-soap.php");                                                               # Includes the main soap-function

            # overwrites the booking- name and description with the current value and the created ticketnumber
            $bookings[0]['name']        = $booking['name']        . " - [Ticket#" . $Formatted_TicketNr . "]";
            $bookings[0]['description'] = $booking['description'] . " - [Ticket#" . $Formatted_TicketNr . "]";
            # booking information was updated. lets do the real booking.
        }
    }
}
## OTRS END ##