<?php
// -------------------------------------------------------------------------------------------
//
// Error handling on/off
//
error_reporting(E_ALL | E_STRICT);
$debug = "";
$debugEnable = TRUE;  // TRUE to enable debugging, FALSE to not print out debug information

// -------------------------------------------------------------------------------------------
//
// Get variables, and validate them
//
/*
$antal;
if(empty($_GET['antal'])){
$antal = "";
}
else{
$antal = $_GET['antal'];
}
*/
//$antal = filter_input(INPUT_POST, 'antal', FILTER_VALIDATE_INT);
//if($antal === FALSE) die("Felaktigt värde.");
if(empty($_POST['antal'])){
	$antal = "";
}
else{
	$antal = $_POST['antal'];
}
if(empty($_POST['last'])){
	$lastScore = 0;
}
else{
	$lastScore = $_POST['last'];
}
// -------------------------------------------------------------------------------------------
//
// Throw dice and show outcome and histogram
//
require_once("CDiceSvg.php");
require_once("CHistogram.php");

$histogram     = new CHistogram();
$dice                = new CDiceSvg();

$diceHtml = "<p>";

if($antal) {
	//$serie    = $histogram->ShowValues($slag);
    //$medel    = round($histogram->Average($slag), 1);
    //$graf        = $histogram->PrintGraf($slag);
    // Show all dices as Svg
	$resultAsString = "Poäng för tillfället ";
	$faild = false;
	for($i = 0; $i<$antal; $i++){
		$result = $dice->Roll();
		if($result != 1 && $faild != true){
			$lastScore = $lastScore + $result;
		}
		if($result == 1){
			$faild = true; 
			$lastScore = 0;
			$resultAsString = "Du förlorade !";
		}
		 $diceHtml .= $dice->GetSvg($result);
	}
    // Present the result in text
    $diceHtml .= <<<EOD
<p>
{$lastScore}
{$resultAsString}
</p>
EOD;

} else {
    $diceHtml .= "";
}

$diceHtml .= "</p>";

//-----------------------------------------------------
//
//ett formulär för input
$form=<<<EOD
<div>
<form action='{$_SERVER['PHP_SELF']}' method='post' style="height: 100px;">
	<input type='text' name='antal' value='{$antal}'tabindex='1' size='1' maxlength='1'/>
	<input type='hidden' name='last' value='{$lastScore}'/>
	<button type='submit'>Kasta</button>
	<nav class="navmenu" style="width: 102px; margin: 10px;">
	<a href='{$_SERVER['PHP_SELF']}'>Starta om</a>
	</nav>
</form>
</div>
EOD;
//------------------------------------------
// -------------------------------------------------------------------------------------------
//
// The content of the page
//
$html = <<<EOD
<div>
<p>
Välkommen, nu är det dax att spela kasta gris, det går ut på att få så mycket poäng som möjligt, men får du en etta så förlorar du alla din poäng.<br />
Ange hur många tärningar du vill kasta, men vågar du kasta 9 stycken utan att få en etta?
</p>
{$form}
{$diceHtml}
</div>
EOD;
//------------------------------------------


require_once('../common.php');
$title = "Min tärning";
$charset = "utf-8";
$language = "sv";
$pageId = "dice";
$html =<<<EOD
<!doctype html>
<html lang="{$language}">
	<head>
		<meta charset="{$charset}">
		<link rel="stylesheet" href="../me/style/stylesheet.css">
		<title>{$title}</title>
	</head>
	<body id="{$pageId}">
		{$header}
		<div id="pageLogo">
		<h1>Kasta Gris</h1>
		</div>
		<div id="text">
		{$html}
		</div>
		<div>
		{$debug}
		</div>
		{$footer}
	</body>
</html>
EOD;
echo $html;
?>
