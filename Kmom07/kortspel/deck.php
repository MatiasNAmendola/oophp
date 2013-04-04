<?php
error_reporting(E_ALL | E_STRICT);
$debug = "";
$debugEnable = TRUE;  // TRUE to enable debugging, FALSE to not print out debug information

$html = "";

require_once('CDeck.php');
$deck1 = new CDeck();

$html .= "<h1>Hur ser min kortlek ut?</h1>";

$html .= "<h2>Visa kort i en oblandad lek</h2><p><div style='float: left; background: green;'>";
while($card = $deck1->DealFromTop()) {
	$card->FlipCard();
	$html .= $card->GetCardAsBox();
}
// divClear used to clearing the float-left state in css.
$divClear = "<div style='height: 0; clear: both;'>&nbsp;</div>";
$html .= "</div>{$divClear}</p>";

$html .= "<h2>Initiera och blanda leken, plocka 5 kort.</h2><p><div style='float: left; background: green;'>";
$deck1->InitAndShuffle();
for($i=0; $i<5; $i++) {
	$card = $deck1->DealFromTop();
	$card->FlipCard();
	$html .= $card->GetCardAsBox();
}
// divClear used to clearing the float-left state in css.
$divClear = "<div style='height: 0; clear: both;'>&nbsp;</div>";
$html .= "</div>{$divClear}</p>";
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