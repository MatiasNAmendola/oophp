<?php

// -------------------------------------------------------------------------------------------
//
// The content of the page
//
// Since nowdox is not available (need PHP 5.3.0) I will instead prepend each $ with a \ 
// to prevent it from being evaluated. It works fine. But nowdoc would be better.
// 
// http://php.net/manual/en/language.types.string.php (nowdoc, heredoc)
// http://php.net/manual/en/function.eval.php
//
$html = "";

$htmlTemplate = <<<EOD
<div class='wrapper'>
<h2>{\$room->iTitle}</h2>
<div class='gamearea'>
{\$room->igrafic}
</div> <!-- gamearea -->

<div class='description'>
<h4>Beskrivning:</h4>
<p class='description'>{\$room->iDescription}</p>
</div> <!-- description -->


</div> <!-- wrapper -->

EOD;


// ----------------------------------------------------------------------------
//
// Go through all rooms
//
// http://php.net/manual/en/function.eval.php
//
require_once('CRoom.php');
$room = new CRoom();

for($i=1; $i<=10; $i++) {

    $room->ReadFromDatabase($i);
    $html .= <<<EOD
<p>
<nav class="navmenu" style="width: 400px;"><a href='room.php?id={$room->iId}'>Gå till rummet '{$room->iTitle}'</a></nav>
</p>
EOD;
    eval("\$html .= \"{$htmlTemplate}\";");
}

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