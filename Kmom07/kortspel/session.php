<?php
error_reporting(E_ALL | E_STRICT);
$debug = "";
$debugEnable = TRUE;  // TRUE to enable debugging, FALSE to not print out debug information


// -------------------------------------------------------------------------------------------
//
// Prepare the page content
//
$html = "";

// Include class definitions
require_once('CCardHand.php');
require_once('CDeck.php');

// Load class definitions before calling session_start
session_start();


// -------------------------------------------------------------------------------------------
//
// Take care of GET variables
//
$doSession	= (empty($_GET['session']) ? FALSE : $_GET['session']);

switch($doSession) {
	case 'init': { // Destroy and then initiate the session
		require('ISessionDestroy.php');
		//
		// Initiating a session and storing an object in the session variable
		//
		// http://php.net/manual/en/function.session-start.php
		// http://php.net/manual/en/function.session-regenerate-id.php
		//
		session_start();          // Must call again if we destroyed just destroyed
 			                        // the session.
		session_regenerate_id();  // To avoid problems

		$_SESSION['hand']   = new CCardHand();

		$_SESSION['deck']   = new CDeck();
		$_SESSION['rounds'] = 0;

		$debug .= 'Session destroyed and created.';
		$debug .= 'Current session id is: ' . session_id() . '<br />';
	}
	break;

	case 'destroy': { // Only destroy the session
		require('ISessionDestroy.php');
		$debug .= 'Session destroyed.';
		$debug .= 'Current session id is: ' . session_id() . '<br />';
	}
	break;
	
	default: 
	break;
}

// -------------------------------------------------------------------------------------------
//
// Using the session variable
//
// http://php.net/manual/en/function.isset.php
//
if(isset($_SESSION['deck'])) {
	$card = $_SESSION['deck']->DealFromTop();
	
	// Only if there is more cards to retrieve
	if($card) {
		$card->FlipCard();
		$_SESSION['hand']->AddCard($card);
		$_SESSION['rounds'] += 1;
	} else {
		$html .= "<h1><em>The deck is empty.</em></h1>";
	}
	
	$html .= "<h1>Leker med sessioner</h1>";
	$html .= $_SESSION['hand']->GetCardsAsBox();
	$html .= <<<EOD
<p>
Antalet rundor äro {$_SESSION['rounds']}.
<a href='session.php'>Ny runda</a>
</p>
EOD;
}

$html .= <<<EOD
<p>
<a href='session.php?session=init'>Initiera ny session (och förstör den befintliga)</a><br/>
<a href='session.php?session=destroy'>Förstör sessionen</a>
</p>
EOD;

$debug .= 'Current session id is: ' . session_id() . '<br />';

$html .=<<<EOD
<div>
<h1>Kortspel</h1>
<p>
Här kommer sidans innehåll
</p>
</div>
EOD;
//------------------------------------------

require_once('../common.php');
$title = "Mitt kortspel";
$charset = "utf-8";
$language = "sv";
$html =<<<EOD
<!doctype html>
<html lang="{$language}">
	<head>
		<meta charset="{$charset}">
		<link rel="stylesheet" href="../me/style/stylesheet.css">
		<title>{$title}</title>
	</head>
	<body>
		{$header}
		{$html}
		{$footer}
	</body>
</html>
EOD;
echo $html;
?>