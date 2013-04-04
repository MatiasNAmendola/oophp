<?php
error_reporting(E_ALL | E_STRICT);
$debug = "";
$debugEnable = TRUE;  // TRUE to enable debugging, FALSE to not print out debug information


// -------------------------------------------------------------------------------------------
//
// Prepare the page content
//
$html = "";


// -------------------------------------------------------------------------------------------
//
// Create and test the classes
//
//
require_once('CDeck.php');
require_once('CCardHand.php');
$deck = new CDeck();
$hand1 = new CCardHand();
$hand2 = new CCardHand();

$deck->InitAndShuffle();

$html .= "<h1>Att hantera en korthand</h1>";

$html .= "<h2>Plocka en hand med 5 kort.</h2>";
for($i=0; $i<5; $i++) {
	$card = $deck->DealFromTop();
	$card->FlipCard();
	$hand1->AddCard($card);
}
$html .= $hand1->GetCardsAsBox();

$html .= "<h2>Gör en ny hand och plocka 5 kort.</h2>";
for($i=0; $i<5; $i++) {
	$card = $deck->DealFromTop();
	$card->FlipCard();
	$hand2->AddCard($card);
}
$html .= $hand2->GetCardsAsBox();
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