<?php
error_reporting(E_ALL | E_STRICT);
$debug = "";
$debugEnable = TRUE; 
$html = "";
require_once('Ccard.php');
$c1 = new Ccard('H', 1, 1);
$c2 = new Ccard('S', 13, 0);
$c3 = new Ccard('S', 12, 1);
$c4 = new Ccard('K', 6, 1);
$c5 = new Ccard('R', 9, 1);
$c6 = new Ccard('X', 2, 1);

$hand = Array($c1, $c2, $c3, $c4, $c5, $c6);
$html .= "<h1> Villka kort har jag nu?</h1>";

//visar som ID
$html .= "<h2>Som id</h2><p>";
foreach($hand as $card){
	$html .= $card->GetCardAsId() . ", ";
}
$html .= "</p>";

//visar som text
$html .="<h2>Som text</h2><p>";
foreach($hand as $card){
	$html .= $card->GetCardAsText() . ", ";
}
$html .="</p>";

//visar som box
$html .= "<h2>Som box</h2><p><div style='float: left; background: green;'>";
foreach($hand as $card) {
	$html .= $card->GetCardAsBox();
}
$divClear = "<div style='height: 0; clear: both;'>&nbsp;</div>";
$html .= "</div>{$divClear}</p>";

$html .= "<h2>Vänd korten och visa som box</h2><p><div style='float: left; background: green;'>";
foreach($hand as $card) {
	$card->FlipCard();
	$html .= $card->GetCardAsBox();
}
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
