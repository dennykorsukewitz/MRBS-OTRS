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

/**********
 * Timezone
**********/

// The timezone your meeting rooms run in. It is especially important
// to set this if you're using PHP 5 on Linux. In this configuration
// if you don't, meetings in a different DST than you are currently
// in are offset by the DST offset incorrectly.
//
// Note that timezones can be set on a per-area basis, so strictly speaking this
// setting should be in areadefaults.inc.php, but as it is so important to set
// the right timezone it is included here.
//
// When upgrading an existing installation, this should be set to the
// timezone the web server runs in.  See the INSTALL document for more information.
//
// A list of valid timezones can be found at http://php.net/manual/timezones.php
// The following line must be uncommented by removing the '//' at the beginning
$timezone = "Europe/Berlin";

/*******************
 * Database settings
******************/
// Which database system: "pgsql"=PostgreSQL, "mysql"=MySQL,
// "mysqli"=MySQL via the mysqli PHP extension
$dbsys = "mysql";
// Hostname of database server. For pgsql, can use "" instead of localhost
// to use Unix Domain Sockets instead of TCP/IP.
$db_host = "localhost";
// Database name:
$db_database = "mrbs-build";
// Database login user name:
$db_login = "mrbs";
// Database login password:
$db_password = 'malta999';
// Prefix for table names.  This will allow multiple installations where only
// one database is available
$db_tbl_prefix = "mrbs_";
// Uncomment this to NOT use PHP persistent (pooled) database connections:
$db_nopersist = 1;

/* Add lines from systemdefaults.inc.php and areadefaults.inc.php below here
 to change the default configuration. Do _NOT_ modify systemdefaults.inc.php
or areadefaults.inc.php.  */

/*********************************
 * Site identification information
*********************************/
$mrbs_admin = "Administrator";
$mrbs_admin_email = '"MRBS-Admin" <otrs@fu-berlin.de>';

// NOTE:  there are more email addresses in $mail_settings below.    You can also give
// email addresses in the format 'Full Name <address>', for example:
// $mrbs_admin_email = 'Booking System <admin_email@your.org>';
// if the name section has any "peculiar" characters in it, you will need
// to put the name in double quotes, e.g.:
// $mrbs_admin_email = '"Bloggs, Joe" <admin_email@your.org>';

// The company name is mandatory.   It is used in the header and also for email notifications.
// The company logo, additional information and URL are all optional.
$mrbs_company = "FU Berlin - Universitätsbibliothek";   // This line must always be uncommented ($mrbs_company is used in various places)

// Uncomment this next line to use a logo instead of text for your organisation in the header
//$mrbs_company_logo = "your_logo.gif";    // name of your logo file.   This example assumes it is in the MRBS directory
$mrbs_company_logo = "http://www.ub.fu-berlin.de/media/layout/fu_logo.gif";

// Uncomment this next line for supplementary information after your company name or logo
//$mrbs_company_more_info = "You can put additional information here";  // e.g. "XYZ Department"

// Uncomment this next line to have a link to your organisation in the header
//$mrbs_company_url = "http://www.your_organisation.com/";
$mrbs_company_url = "http://www.ub.fu-berlin.de/";

// This is to fix URL problems when using a proxy in the environment.
// If links inside MRBS appear broken, then specify here the URL of
// your MRBS root directory, as seen by the users. For example:
// $url_base =  "http://webtools.uab.ericsson.se/oam";
// It is also recommended that you set this if you intend to use email
// notifications, to ensure that the correct URL is displayed in the
// notification.
$url_base = "http://horus.ub.fu-berlin.de/mrbs/web";

/*******************
 * Themes
*******************/

// Choose a theme for the MRBS.   The theme controls two aspects of the look and feel:
//   (a) the styling:  the most commonly changed colours, dimensions and fonts have been
//       extracted from the main CSS file and put into the styling.inc file in the appropriate
//       directory in the Themes directory.   If you want to change the colour scheme, you should
//       be able to do it by changing the values in the theme file.    More advanced styling changes
//       can be made by changing the rules in the CSS file.
//   (b) the header:  the header.inc file which contains the function used for producing the header.
//       This enables organisations to plug in their own header functions quite easily, in cases where
//       the desired corporate look and feel cannot be changed using the CSS alone and the mark-up
//       itself needs to be changed.
//
//  MRBS will look for the files "styling.inc" and "header.inc" in the directory Themes/$theme and
//  if it can't find them will use the files in Themes/default.    A theme directory can contain
//  a replacement styling.inc file or a replacement header.inc file or both.

// Available options are:

// "default"        Default MRBS theme
// "classic126"     Same colour scheme as MRBS 1.2.6

$theme = "ubfu";


// PERIODS SETTINGS
// ----------------

// The "Periods" settings are ignored if $enable_periods is FALSE.

// Define the name or description for your periods in chronological order
// For example:
// $periods[] = "Period&nbsp;1"
// $periods[] = "Period&nbsp;2"
// ...
// or
// $periods[] = "09:15&nbsp;-&nbsp;09:50"
// $periods[] = "09:55&nbsp;-&nbsp;10:35"
// ...
// &nbsp; is used to ensure that the name or description is not wrapped
// when the browser determines the column widths to use in day and week
// views
//
// NOTE:  MRBS assumes that the descriptions are valid HTML and can be output
// directly without any encoding.    Please ensure that any special characters
// are encoded, eg '&' to '&amp;', '>' to '&gt;', lower case e acute to
// '&eacute;' or '&#233;', etc.

// NOTE:  The maximum number of periods is 60.   Do not define more than this.
unset($periods);    // Include this line when copying to config.inc.php
$periods[] = "Vormittag";
$periods[] = "Nachmittag";

// NOTE:  The maximum number of periods is 60.   Do not define more than this.

// NOTE:  See INSTALL for information on how to add or remove periods in an
// existing database.

/******************
 * Display settings
******************/

// [These are all variables that control the appearance of pages and could in time
//  become per-user settings]

// Start of week: 0 for Sunday, 1 for Monday, etc.
$weekstarts = 1;

// To display week numbers in the mini-calendars, set this to true. The week
// numbers are only accurate if you set $weekstarts to 1, i.e. set the
// start of the week to Monday
$mincals_week_numbers = TRUE;




// Define default room to start with (used by index.php)
// Room numbers can be determined by looking at the Edit or Delete URL for a
// room on the admin page.
// Default is 0
$default_room = 20;

/***********************************************
 * Authentication settings - read AUTHENTICATION
***********************************************/

$auth["type"] = "ldap"; // How to validate the user/password. One of "none"
// "config" "db" "db_ext" "pop3" "imap" "ldap" "nis"
// "nw" "ext".

// The list of administrators (can modify other peoples settings).
//
// This list is not needed when using the 'db' authentication scheme EXCEPT
// when upgrading from a pre-MRBS 1.4.2 system that used db authentication.
// Pre-1.4.2 the 'db' authentication scheme did need this list.   When running
// edit_users.php for the first time in a 1.4.2 system or later, with an existing
// users list in the database, the system will automatically add a field to
// the table for access rights and give admin rights to those users in the database
// for whom admin rights are defined here.   After that this list is ignored.

// unset($auth["admin"]);              // Include this when copying to config.inc.php
// $auth["admin"][] = "127.0.0.1";     // localhost IP address. Useful with IP sessions.
// $auth["admin"][] = "Amue2";
// $auth["admin"][] = "ckrempe";
// $auth["admin"][] = "vichi";
// $auth["admin"][] = "hoeterkes";
// $auth["admin"][] = "eiselt";
// $auth["admin"][] = "kesselhut";
// $auth["admin"][] = "wille";
// $auth["admin"][] = "bresch";


// 'auth_ldap' configuration settings

// Many of the LDAP parameters can be specified as arrays, in order to
// specify multiple LDAP directories to search within. Each item below
// will specify whether the item can be specified as an array. If any
// parameter is specified as an array, then EVERY array configuration
// parameter must have the same number of elements. You can specify a
// parameter as an array as in the following example:
//
// $ldap_host = array('localhost', 'otherhost.example.com');

// Where is the LDAP server.
// This can be an array.
//$ldap_host = "localhost";
$ldap_host = "novcluster.ub.fu-berlin.de";

// If you have a non-standard LDAP port, you can define it here.
// This can be an array.
$ldap_port = 389;

// If you do not want to use LDAP v3, change the following to false.
// This can be an array.
$ldap_v3 = true;

// If you want to use TLS, change the following to true.
// This can be an array.
$ldap_tls = false;

// LDAP base distinguish name.
// This can be an array.
//$ldap_base_dn = "ou=organizationalunit,dc=my-domain,dc=com";
// $ldap_base_dn = array('ou=User,o=UB', 'ou=Auskunft,ou=User,o=UB', 'ou=Benutzung,ou=User,o=UB', 'ou=Direktion,ou=User,o=UB', 'ou=EDV,ou=User,o=UB', 'ou=Ehemalige,ou=User,o=UB', 'ou=Gaeste,ou=User,o=UB', 'ou=Praktikanten,ou=User,o=UB', 'ou=Schulung,ou=User,o=UB', 'ou=Zugang,ou=User,o=UB', 'ou=Ausbildung,ou=Auskunft,ou=User,o=UB', 'ou=Infozentrum,ou=Auskunft,ou=User,o=UB', 'ou=Lesesaal,ou=Auskunft,ou=User,o=UB', 'ou=Fernleihe,ou=Benutzung,ou=User,o=UB', 'ou=Hauptausleihe,ou=Benutzung,ou=User,o=UB', 'ou=LBS,ou=Benutzung,ou=User,o=UB', 'ou=Magazin,ou=Benutzung,ou=User,o=UB', 'ou=Sekretariat,ou=Direktion,ou=User,o=UB', 'ou=Unibibliographie,ou=Direktion,ou=User,o=UB', 'ou=Verwaltung,ou=Direktion,ou=User,o=UB', 'ou=ALEPH,ou=EDV,ou=User,o=UB', 'ou=Rechnerbetrieb,ou=EDV,ou=User,o=UB', 'ou=Sonstige Benutzer,ou=EDV,ou=User,o=UB', 'ou=Monographien,ou=Zugang,ou=User,o=UB', 'ou=Sacherschliessung-Dokumentation,ou=Zugang,ou=User,o=UB', 'ou=Schluss-Stelle,ou=Zugang,ou=User,o=UB', 'ou=Zeitschriften,ou=Zugang,ou=User,o=UB');
$ldap_base_dn = "ou=User,o=UB";

// Attribute within the base dn that contains the username
// This can be an array.
//$ldap_user_attrib = "uid";
$ldap_user_attrib = "uid";

// If you need to search the directory to find the user's DN to bind
// with, set the following to the attribute that holds the user's
// "username". In Microsoft AD directories this is "sAMAccountName"
// This can be an array.
//$ldap_dn_search_attrib = "sAMAccountName";
$ldap_dn_search_attrib = "uid";

// If you need to bind as a particular user to do the search described
// above, specify the DN and password in the variables below
// These two parameters can be arrays.
// $ldap_dn_search_dn = "cn=Search User,ou=Users,dc=some,dc=company";
$ldap_dn_search_dn = "cn=ldapproxyuser,ou=Services,o=UB";
// $ldap_dn_search_password = "";

// 'auth_ldap' extra configuration for ldap configuration of who can use
// the system
// If it's set, the $ldap_filter will be used to determine whether a
// user will be granted access to MRBS
// This can be an array.
// An example for Microsoft AD:
//$ldap_filter = "memberof=cn=whater,ou=whatver,dc=example,dc=com";

// If you need to disable client referrals, this should be set to TRUE.
// Note: Active Directory for Windows 2003 forward requires this.
// $ldap_disable_referrals = TRUE;

// Set to TRUE to tell MRBS to look up a user's email address in LDAP.
// Utilises $ldap_email_attrib below
$ldap_get_user_email = TRUE;
// The LDAP attribute which holds a user's email address
// This can be an array.
$ldap_email_attrib = 'mail';

// The DN of the LDAP group that MRBS admins must be in. If this is defined
// then the $auth["admin"] is not used.
// This can be an array.
// $ldap_admin_group_dn = 'cn=admins,ou=whoever,dc=example,dc=com';
$ldap_admin_group_dn = 'cn=MRBS-Admin,ou=Gruppen,o=UB';

// The LDAP attribute that holds group membership details. Used with
// $ldap_admin_group_dn, above.
// This can be an array.
//$ldap_group_member_attrib = 'memberof';
$ldap_group_member_attrib = 'groupMembership';

// Output debugging information for LDAP actions
$ldap_debug = FALSE;
/**********************************************
 * Email settings
**********************************************/

// HOW TO EMAIL - BACKEND
// ----------------------
// Set the name of the backend used to transport your mails. Either 'mail',
// 'smtp' or 'sendmail'. Default is 'mail'.
$mail_settings['admin_backend'] = 'smtp';

/*******************
 * SMTP settings
*******************/

// These settings are only used with the "smtp" backend
$smtp_settings['host'] = 'golem.ub.fu-berlin.de';  // SMTP server
$smtp_settings['port'] = 25;           // SMTP port number
$smtp_settings['auth'] = FALSE;        // Whether to use SMTP authentication

// WHO TO EMAIL
// ------------
// The following settings determine who should be emailed when a booking is made,
// edited or deleted (though the latter two events depend on the "When" settings below).
// Set to TRUE or FALSE as required
// (Note:  the email addresses for the room and area administrators are set from the
// edit_area_room.php page in MRBS)
$mail_settings['room_admin_on_bookings'] = TRUE;  // the room administrator
$mail_settings['booker']                 = TRUE;  // the person making the booking

// WHEN TO EMAIL
// -------------
// These settings determine when an email should be sent.
// Set to TRUE or FALSE as required
//
// (Note:  (a) the variables $mail_settings['admin_on_delete'] and
// $mail_settings['admin_all'], which were used in MRBS versions 1.4.5 and
// before are now deprecated.   They are still supported for reasons of backward
// compatibility, but they may be withdrawn in the future.  (b)  the default
// value of $mail_settings['on_new'] is TRUE for compatibility with MRBS 1.4.5
// and before, where there was no explicit config setting, but mails were always sent
// for new bookings if there was somebody to send them to)

$mail_settings['on_change'] = TRUE;  // when an entry is changed
$mail_settings['on_delete'] = TRUE;  // when an entry is deleted

// WHAT TO EMAIL
// -------------
// These settings determine what should be included in the email
// Set to TRUE or FALSE as required
$mail_settings['details']   = TRUE; // Set to TRUE if you want full booking details;

// HOW TO EMAIL - LANGUAGE
// -----------------------------------------

// Set the language used for emails (choose an available lang.* file).
$mail_settings['admin_lang'] = 'de';   // Default is 'en'.

// EMAIL - MISCELLANEOUS
// ---------------------

// Set the email address of the From field. Default is 'admin_email@your.org'
$mail_settings['from'] = 'blackhole@ub.fu-berlin.de';

// Set the recipient email. Default is 'admin_email@your.org'. You can define
// more than one recipient like this "john@doe.com,scott@tiger.com"
$mail_settings['recipients'] = 'sysmsg@ub.fu-berlin.de';

/**********
 * Language
**********/

// Set this to 1 to disable the automatic language changing MRBS performs
// based on the user's browser language settings. It will ensure that
// the language displayed is always the value of $default_language_tokens,
// as specified below
$disable_automatic_language_changing = 1;

// Set this to a different language specifier to default to different
// language tokens. This must equate to a lang.* file in MRBS.
// e.g. use "fr" to use the translations in "lang.fr" as the default
// translations.  [NOTE: it is only necessary to change this if you
// have disabled automatic language changing above]
$default_language_tokens = "de";

// Set this to a valid locale (for the OS you run the MRBS server on)
// if you want to override the automatic locale determination MRBS
// performs.   Remember to include the codeset if appropriate.   For example,
// on a UNIX system you would use "en_GB.utf-8" for English/GB.
$override_locale = "de_DE.utf-8";

// faq file language selection. IF not set, use the default english file.
// IF your language faq file is available, set $faqfilelang to match the
// end of the file name, including the underscore (ie. for site_faq_fr.html
// use "_fr"
$faqfilelang = "_de";

/*************
 * Entry Types
*************/

// This array lists the configured entry type codes. The values map to a
// single char in the MRBS database, and so can be any permitted PHP array
// character.
//
// The default descriptions of the entry types are held in the language files
// as "type.X" where 'X' is the entry type.  If you want to change the description
// you can override the default descriptions by setting the $vocab_override config
// variable.   For example, if you add a new booking type 'C' the minimum you need
// to do is add a line to config.inc.php like:
//
// $vocab_override["en"]["type.C"] =     "New booking type";
//
// Below is a basic default array which ensures there are at least some types defined.
// The proper type definitions should be made in config.inc.php.
//
// Each type has a color which is defined in the array $color_types in the Themes
// directory - just edit whichever include file corresponds to the theme you
// have chosen in the config settings. (The default is default.inc, unsurprisingly!)
//

$booking_types[] = "A";
$booking_types[] = "B";
$booking_types[] = "D";
$booking_types[] = "F";
$booking_types[] = "G";

$vocab_override["de"]["type.A"] = "Allgemein";
$vocab_override["de"]["type.B"] = "Ausbildung";
$vocab_override["de"]["type.D"] = "Benutzung";
$vocab_override["de"]["type.E"] = "Einführungsveranstaltung";
$vocab_override["de"]["type.F"] = "IT";
$vocab_override["de"]["type.G"] = "Zugang";
$vocab_override["de"]["type.I"] = "Extern";
$vocab_override["de"]["mrbs"] = "UB Raum- und Gerätebuchung";

# Setz die Kategorie Allgemein als default-Wert
$default_type = "A";


/*******************
 * Calendar settings
*******************/
 
// TIMES SETTINGS
// --------------

// Start and end of day.
// NOTE:  The time between the beginning of the last and first
// slots of the day must be an integral multiple of the resolution,
// and obviously >=0.

// The default settings below (along with the 30 minute resolution above)
// give you 24 half-hourly slots starting at 07:00, with the last slot
// being 18:30 -> 19:00

// The beginning of the first slot of the day (DEFAULT VALUES FOR NEW AREAS)
$morningstarts         = 8;   // must be integer in range 0-23
$morningstarts_minutes = 0;   // must be integer in range 0-59

// The beginning of the last slot of the day (DEFAULT VALUES FOR NEW AREAS)
$eveningends           = 20;  // must be integer in range 0-23
$eveningends_minutes   = 0;   // must be integer in range 0-59

// Set a maximum duration for bookings
$max_duration_enabled = TRUE; // Set to TRUE if you want to enforce a maximum duration
$max_duration_secs = 60*60*60*24*365;  // (seconds) - when using "times"
$max_duration_periods = 60;     // (periods) - when using "periods"


/*******************
 * MRBS to OTRS
*******************/

// activate otrs create ticket function
$create_otrs_ticket = TRUE;

// $otrs_ticket["area"] = area number
$otrs_ticket["area"][] = "10";
$otrs_ticket["area"][] = "11";


# Please define the connection information here:
$otrs_url      	= "http://domain.de/otrs/rpc.pl"; 				# URL of your otrs-server
$otrs_username	= "otrs";										# OTRS -> SysConfig -> Framework -> Core::SOAP -> SOAP:User
$otrs_password 	= "otrs-password";								# OTRS -> SysConfig -> Framework -> Core::SOAP -> SOAP:Password

# Ticket properties
$otrs_title_add			= "MRBS-booking: ";					# (optional) just text for ticket title/article
$otrs_from_domain		= "mailadress-domain.de";			# (optional) needed to create senderadress (maybe exists another val)
$otrs_queue				= "Postmaster";						# queue of otrs
$otrs_lock				= "unlock";							# ticket-lock-state: lock or unlock state
$otrs_state				= "new";							# ticket-state: open, new,closed successful,closed unsuccessful, etc
$otrs_priority			= "3";								# ticket-priority: 1 = very low, 2,3,4, 5 = very high
$otrs_articletype 		= "webrequest";						# email-external|email-internal|phone|fax
$otrs_sendertype		= "customer";						# agent|system|customer
$otrs_historytype 		= "WebRequestCustomer";				# EmailCustomer|Move|AddNote|PriorityUpdate|WebRequestCustomer|...
$otrs_historycomment	= "created from MRBS via PHP";		# Some free text!'
$otrs_contenttype		= "text/plain; charset=utf-8";		# charse: ISO-8859-1 / utf-8 ...
$otrs_userid			=  1;