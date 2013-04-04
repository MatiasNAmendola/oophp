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
require_once('CHighCardLowCard.php');

// Load class definitions before calling session_start
session_start();


// -------------------------------------------------------------------------------------------
//
// Take care of GET variables
//
$doGame	= (empty($_GET['game']) ? FALSE : $_GET['game']);
$gameOver = FALSE;

switch($doGame) {
	case 'init': { // Destroy and then initiate the session
		require('ISessionDestroy.php');
		//
		// Initiating a session and storing an object in the session variable
		//
		// http://php.net/manual/en/function.session-start.php
		// http://php.net/manual/en/function.session-regenerate-id.php
		//
		session_start();          // Must call again if we just destroyed
 			                        // the session.
		session_regenerate_id();  // To avoid problems

		$_SESSION['game']   = new CHighCardLowCard();
		$_SESSION['game']->StartGame();

		$debug .= 'Game initiated.';
		$debug .= 'Current session id is: ' . session_id() . '<br />';
	}
	break;

	case 'high':
	case 'low':   { // Guess next card is high/low card
		if($_SESSION['game']->GuessAndPickCard($doGame) == FALSE) {
			$gameOver = TRUE;
		}

		$debug .= 'Made a guess. <br />';
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
// Test the CHighCardLowCard-class
//
//
$html .= "<div class='wrapper'><p>Gissa om nästa kort är högre eller lägre.</p>";

if(isset($_SESSION['game'])) {

	$html .= $_SESSION['game']->ShowGameStatus();
	
	if($gameOver) {
		$points = $_SESSION['game']->GetPoints();
		$_SESSION['game']->StartGame();
		$html .= <<<EOD
<p>
Game over. Du lyckades med {$points} kort.
</p>
EOD;
  if($points >= 3) {
            $html .= "<p>GRATTIS, du har låst upp den hemliga passagen. ";
            $html .= "<a href='../room.php?id=1337'>Gå vidare via den hemliga passagen!</a></p>";
        }
	} else {
		$html .= <<<EOD
<p>
<nav class="navmenu" style="width: 200px;">
<a href='highlow.php?game=high'>Nästa kort är högre...</a><br/>
</nav>
</p>
<p>
<nav class="navmenu" style="width: 200px;">
<a href='highlow.php?game=low'>Nästa kort är lägre...</a>
</nav>
</p>
EOD;
	}
}	

$html .= <<<EOD
<p>
<nav class="navmenu" style="width: 200px;">
<a href='highlow.php?game=init'>Starta ett nytt spel</a><br/>
</nav>
</p>
<p>
<nav class="navmenu" style="width: 200px;">
<a href='highlow.php?game=destroy'>Avbryt spelet</a>
</nav>
</p>
</div>
EOD;

//</div> är för div taggen text för css
$debug .= 'Current session id is: ' . session_id() . '<br />';

//------------------------------------------

require_once('../../common.php');
$title = "Mitt kortspel";
$charset = "utf-8";
$language = "sv";
$pageId = "kort";
$stylesheet = "";
$html =<<<EOD
<!doctype html>
<html lang="{$language}">
	<head>
		<meta charset="{$charset}">
		<link rel="stylesheet" href="../../me/style/stylesheet.css">
		<style type="text/css">{$stylesheet}</style>
		 <link rel='stylesheet' href='gamestyle.css' type='text/css' media='screen' />
		<title>{$title}</title>
	</head>
	<body id="{$pageId}">
		{$header}
		<div id="pageLogo">
			<h1>Spela High Card Low Card</h1>
		</div>
		<div id="text">
		{$html}
		</div>
		{$footer}
	</body>
</html>
EOD;
echo $html;
?>