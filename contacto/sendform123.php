<?php
/* -----------------------------------------------------------------------------
SimplytheBest SendForm 1.23 PHP version
Copyright (c) 2004-2008 by SimplytheBest Inc.
http://simplythebest.net
This script may be used freely as long as the copyright notice and the footer
message remain in place. To remove the footer message from the form page you must
purchase a license to remove the footer!
------------------------------------------------------------------------------*/
/* SET VARIABLES */

$to = "dave74@gmail.com"; //email address to receive the email

$thankyoupage = "http://esteticajetlight.com/contacto/thanks.html";

/*-----------------------------------------------------------------------*/

if ($_SERVER["REQUEST_METHOD"] <> 'POST')
die ("You did not send this email from our form");

$error1=$_POST['error'];
unset ($_POST['error']);

if (isset($_POST['email']) && $_POST['email']<>''){

$from = $_POST['email'];
$subject = $_POST['subject'];
$body="";
$return1=$_POST['return'];
unset ($_POST['return']);

while (list($key,$value) = each($_POST)){
$value = stripslashes($value);
$body.= ucwords($key).": ".$value."\r\n";
}

$header = "";
$header = "From: ". $from ."\r\n"."Reply-To: ". $from ."\r\n";
$header.= "User-agent: SimplytheBest SendForm 1.23\r\n";
$header.= "Content-Type: text/plain; charset=iso-8859-1\r\n";
$header.= "Content-Transfer-Encoding: 8bit\r\n";

mail ($to,$subject,$body,$header);

header ("Location: ".$thankyoupage); 	// as entered above
die();
}
else {
header ("Location:".$_SERVER["HTTP_REFERER"]."?msg=".urlencode("Invalid Data"));
// or use hardcoded page f.e.:
// header("Location:"."http://www.yourdomain.com/yourpage.html?msg=".urlencode("Invalid Data"));
die();
}
?>
