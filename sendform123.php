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

$thankyoupage = "gracias.html";

/*-----------------------------------------------------------------------*/

if ($_SERVER["REQUEST_METHOD"] <> 'POST')
die ("You did not send this email from our form");

$error1=$_POST['error'];
unset ($_POST['error']);

if (isset($_POST['name']) && $_POST['name']<>''){

$from = $_POST['name'];
$subject = $_POST['subject'];
$body="";
$return1=$_POST['return'];
unset ($_POST['return']);

while (list($key,$value) = each($_POST)){
$value = stripslashes($value);
$body.= ucwords($key).": ".$value."\r\n";
$select_enquirytype = strip_tags($_POST['servicios']);
}

$header = "";
$header = "From: ". $from ."\r\n"."Reply-To: ". $from ."\r\n";
$header.= "User-agent: SimplytheBest SendForm 1.23\r\n";
$header.= "Content-Type: text/plain; charset=iso-8859-1\r\n";
$header.= "Content-Transfer-Encoding: 8bit\r\n";
}

// Validación entradas Form
if(isset($_POST['condiciones']) && 
   	$_POST['condiciones'] == 'Aceptadas' &&
	$_POST['name']<>'' &&
	$_POST['phone']<>'') 
{
    mail ($to,$subject,$body,$select_enquirytype,$header);
	header ("Location: ".$thankyoupage); 	// as entered above
	die();
}

else
{

	// header ("Location:".$_SERVER["HTTP_REFERER"]."?msg=".urlencode("Invalid Data"));
	// or use hardcoded page f.e.:
	header("Location:".$_SERVER["HTTP_REFERER"]."error.html");
	die();
}



?>
