<?php
require_once('CPlayer.php');
session_name('hej');
session_start();

error_reporting(E_ALL | E_STRICT);
$debug = "";
$debugEnable = TRUE;  // TRUE to enable debugging, FALSE to not print out debug information


// -------------------------------------------------------------------------------------------
//
// Take care of GET variables
//
$doGame    = (empty($_GET['game']) ? FALSE : $_GET['game']);
$gameOver = FALSE;

switch($doGame) {
	case 'initsession': { // Destroy and then initiate the session
        require('ISessionDestroy.php');
        //
        // Initiating a session and storing an object in the session variable
        //
        // http://php.net/manual/en/function.session-start.php
        // http://php.net/manual/en/function.session-regenerate-id.php
        //
		session_name('hej');
        session_start();          // Must call again if we just destroyed
                                   // the session.
        session_regenerate_id();  // To avoid problems
        
        $debug .= "Session destroyed and re-created.";
    }
	break;
	
    case 'start':   {                         // Go to the first room
		if(!isset($_SESSION['player'])) {            // Init the session with a new player
        $_SESSION['player'] = new CPlayer(); 
		}
        //
        // Make a redirect to the first room
        // http://php.net/manual/en/function.header.php
        //
        header('Location: http://www.student.bth.se/~kejb12/oophp/kmom07/adventuregame/room.php?id=1');
        exit;
    }
    break;
        
    default: 
    break;
}


// -------------------------------------------------------------------------------------------
//
// The content of the page
//
$html = <<<EOD

<div class='wrapper'>
<h1>Äventyrsspel</h1>
<p>
Välkommen att spela det magiska äventyrsspelet med Betty som är på promenad i skogen och 
letar efter lite äventyr.
</p>
<p>
<div align="center">
<nav class="navmenu" style="width: 680px;">
<a href="{$_SERVER['PHP_SELF']}?game=start">Börja spela spelet</a> 
 | 
 <a href="{$_SERVER['PHP_SELF']}?game=initsession">Förstör sessionen (börja om)</a>
 |
<a href="allrooms.php">Visa alla rummen (cheat)</a>
</p>
</nav>
<br />
</div>
</div> <!-- wrapper -->

EOD;
require_once('../common.php');
$title = "Äventyrsspel";
$pageId = "advent";
$charset = "utf-8";
$language = "sv";
$stylesheet = "";
$html =<<<EOD
<!doctype html>
<html lang="{$language}">
	<head>
		<meta charset="{$charset}">
		<link rel="stylesheet" href="../me/style/stylesheet.css">
		<style type="text/css">{$stylesheet}</style>
		 <link rel='stylesheet' href='gamestyle.css' type='text/css' media='screen' />
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