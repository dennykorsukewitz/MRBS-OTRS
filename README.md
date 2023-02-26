# MRBS-OTRS

    **Deprecated!** - This package works for MRBS version 1.4.10.
    All newer versions have not been tested and are not supported.

| Repository | GitHub |
| ------ | ------ |
| ![GitHub release (latest by date)](https://img.shields.io/github/v/release/dennykorsukewitz/MRBS-OTRS) | ![GitHub open issues](https://img.shields.io/github/issues/dennykorsukewitz/MRBS-OTRS) ![GitHub closed issues](https://img.shields.io/github/issues-closed/dennykorsukewitz/MRBS-OTRS?color=#44CC44) |
| ![GitHub license](https://img.shields.io/github/license/dennykorsukewitz/MRBS-OTRS) | ![GitHub pull requests](https://img.shields.io/github/issues-pr/dennykorsukewitz/MRBS-OTRS?label=PR) ![GitHub closed pull requests](https://img.shields.io/github/issues-pr-closed/dennykorsukewitz/MRBS-OTRS?color=g&label=PR) |
| ![GitHub language count](https://img.shields.io/github/languages/count/dennykorsukewitz/MRBS-OTRS?style=flat&label=language) | ![GitHub contributors](https://img.shields.io/github/contributors/dennykorsukewitz/MRBS-OTRS) |
|  ![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/dennykorsukewitz/MRBS-OTRS) | ![GitHub all releases](https://img.shields.io/github/downloads/dennykorsukewitz/MRBS-OTRS/total?style=flat) |

| Versions | Status |
| ------ | ------ |
| ![GitHub label version](https://img.shields.io/github/labels/dennykorsukewitz/DK4/dev) | [![GitHub commits since tagged version](https://img.shields.io/github/commits-since/dennykorsukewitz/MRBS-OTRS/v1.0/MRBS-OTRS-1.0)](https://github.com/dennykorsukewitz/MRBS-OTRS/compare/v1.0...MRBS-OTRS-1.0) ![GitHub Workflow Pages](https://github.com/dennykorsukewitz/MRBS-OTRS/actions/workflows/pages.yml/badge.svg?branch=dev&style=flat&label=GitHub%20Pages) |


MRBS-OTRS is a function to 'connect' the [MRBS](https://mrbs.sourceforge.io/) `(1.4.10) deprecated` with the Ticketsystem OTRS.
The aim is to add a ticketnumber from OTRS into the description of the booking in MRBS.
Every notification of the booking goes into the same ticket as article.
How it works: create a ticket in OTRS via the OTRS rpc interface from PHP.


##### Table of Contents
- [Feature List](#Feature)
- [Installation](#Installation)
- [Prerequisites](#Prerequisites)
- [Configuration](#Configuration)
- [OTRS configuration](#OTRSconfiguration)
- [Download](#Download)

### Feature List

* create a ticket in OTRS via SOAP::PHP
* insert the TicketNumber into the description of the booking room

### Installation

#### MRBS-Server (sending server)

    * install the package php-soap

#### OTRS-Server (receiving server)

    * enable the RPC interface in OTRS
    * set a user name and password under `Admin > SysConfig > Framework > Core::Soap` (webinterface)

#### config.inc.php

    * add the configuration of the web/config.inc.php
    * change ticket-properties

#### otrs-soap.php

    * add the file otrs-soap.php to the ./web directory

#### otrs.php

    * add the file otrs.php to the ./web directory

#### edit_entry.php

`web/edit_entry.php` (1.4.10) is updated by following code:

```diff
-    echo "<input class=\"submit default_action\" type=\"submit\"  name=\"save_button\" value=\"" .  get_vocab("save") . "\" > \n";
+    echo "<input class=\"submit default_action\" type=\"submit\"  name=\"savebutton\" value=\"" .  get_vocab("save") . "\" > \n";
```

#### edit_entry.js.php

`web/js/edit_entry.js-php` (1.4.10) is updated by following code:

```diff
-      if ($(this).data('submit') === 'save_button')
+      if ($(this).data('submit') === 'savebutton')
```

#### edit_entry_handler.php

`web/edit_entry_handler.php` (1.4.10) is extended by following code:

```diff
+        ### OTRS ###
+        $just_check = TRUE;  # just check the valid booking
+        $result = mrbsMakeBookings($bookings, $this_id, $just_check, $skip, $original_room_id, $need_to_send_mail, $edit_type);
+        # if the booking is vaild & no other booking exist & save button was pressed = include otrs.php
+        if ($result['valid_booking']== TRUE  && !isset($id) && isset($savebutton) )
+        {
+            include("otrs.php");
+        }
+        ### OTRS END ###

    $just_check = $ajax && function_exists('json_encode') && !$commit;
    $this_id = (isset($id)) ? $id : NULL;
    $result = mrbsMakeBookings($bookings, $this_id, $just_check, $skip, $original_room_id, $need_to_send_mail, $edit_type);
```


### Prerequisites

* install PHP-SOAP:  sudo apt-get install php-soap
* enable the RPC interface in OTRS: `Admin > SysConfig > Framework > Core::Soap`
* set SOAP:username and SOAP:password
* Perl module SOAP::Lite on otrs-server

### Configuration

Add these parameter into "config.inc.php" file.

```php
    $create_otrs_ticket = TRUE;                                 // activate otrs-create-ticket function

    $otrs_ticket["area"][] = "2";                               // area number
    $otrs_ticket["area"][] = "5";
    [...]

    <a name="OTRSconfiguration"/>
    *OTRS configuration*
    $otrs_url       = "http://domain.de/otrs/rpc.pl";           // URL of your otrs-server
    $otrs_username  = "otrs";                                   // OTRS-Webinterface -> SysConfig -> Framework -> Core::SOAP -> SOAP:User
    $otrs_password  = "PASSWORD";                               // OTRS-Webinterface -> SysConfig -> Framework -> Core::SOAP -> SOAP:Password

    *ticket properties*
    $otrs_title_add         = "MRBS-OTRS: ";                    //  Ticket-title
    $otrs_from_domain       = "domain.de";                      //  (optional)
    $otrs_queue             = "Postmaster";                     //  create tickets in this queue
    $otrs_lock              = "unlock";                         //  lock/unlock
    $otrs_state             = "new";                            //  new/open/closed..
    $otrs_priority          = "3";                              //  1/2/3/4/5 priority
    $otrs_articletype       = "webrequest";                     //
    $otrs_sendertype        = "customer";                       //
    $otrs_historytype       = "WebRequestCustomer";             //
    $otrs_historycomment    = "created from MRBS via PHP";      //
    $otrs_contenttype       = "text/plain; charset=ISO-8859-1"; //
    $otrs_userid            =  1;                               //  user in OTRS (1 = systemuser)
```


### Download

For download see [dennykorsukewitz/MRBS-OTRS](https://github.com/dennykorsukewitz/MRBS-OTRS)

Enjoy!

Your [Denny Korsukéwitz](https://github.com/dennykorsukewitz)!
