<?php

require_once('CPlayer.php');        
session_name('hej');    
session_start();
// -------------------------------------------------------------------------------------------
//
// Error handling on/off
//
error_reporting(E_ALL | E_STRICT);
$debug = "";
$debugEnable = FALSE;  // TRUE to enable debugging, FALSE to not print out debug information

// -------------------------------------------------------------------------------------------
//
// Take care of GET variables, and validate them
//

// Get the id of the room
$idRoom = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($idRoom === FALSE || $idRoom === NULL || $idRoom < 0) die("Felaktig _GET värde."); 

$actionEvent = isset($_GET['event']) ? $_GET['event'] : "";

require_once('CRoom.php');
$room = new CRoom();
$room->ReadFromDatabase($idRoom);

$_SESSION['player']->PerformActionEvent($actionEvent);

// Keep track on current room and decrease health-meter when entering a new room
$_SESSION['player']->SetCurrentRoomAndDecreaseHealtMeter($idRoom);
// -------------------------------------------------------------------------------------------
//
// The content of the page
//
$html = <<<EOD

<div class='wrapper'>
<table>
<tr>
<td style='width: 500px;'>
<h1>Äventyrsspel</h1>
<h2>{$room->iTitle}</h2>
</td>
<td>
<p>
Hälsa: {$_SESSION['player']->iHealthMeter}
</p>
</td>
</tr>
</table>

<div class='gamearea' align="center">
<!-- 
- Testing 3 different ways of including an external svg-image into html.
- read more: http://w3schools.com/svg/svg_inhtml.asp 
-
-  <object type="image/svg+xml" data="img/bakgrund.svg" />
-  <embed type="image/svg+xml" src="img/bakgrund.svg" width="720" height="480" />
-  <iframe src="img/bakgrund.svg" width="720" height="480" frameborder="0"></iframe> 
-
-->
<div style="width: 720px height: 480px;  border: ridge 10px #932;"">
{$room->igrafic}
</div>
</div> <!-- gamearea -->

<div class='description' style="padding: 10px;">
<h4>Beskrivning:</h4>
<p class='description'>
<p class='description'>{$room->iDescription}</p>
</div> <!-- description -->

<div class='action'>
<h4>Riktningar:</h4>
<p class='action'><nav class="navmenu" style="width: 550px; background-color: #942; margin: 10px 0px 10px 0px; padding: 6px;">
{$room->iConnections}</nav></p>
<h4>Händelser:</h4>
<p class='action'><nav class="navmenu" style="width: 300px; background-color: #942; margin: 10px 0px 10px 0px; padding: 6px;">
{$room->iActions}
</nav>
</p>
</div> <!-- actions -->

</div> <!-- wrapper -->

EOD;

// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
require_once('../common.php');
$title = "Äventyrsspel";
$pageId = "advent";
$charset = "utf-8";
$language = "sv";
$stylesheet = "";
$debug = $debugEnable ? $debug : "";
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