<?php
//Annat
/*
$stringRes = "Slagserien är ";
$diceres;
for($i = 0; $i<6; $i++){
	$dice = rand(1,6);
	$stringRes .= ", " . $dice;
	$diceres += $dice;
}
$diceres = $diceres / 6;
echo $stringRes . "<br />";
echo "Medelvärdet var " .$diceres . "<br />";
echo "Pi " . pi() . "<br />";
$svar = hexdec("1A");
echo  "1A i decimal är " . $svar . "<br />";
echo "Kvadratroten ur 2 är " . sqrt(2) . "<br />";
*/

// -------------------------------------------------------------------------------------------
//
// Error handling on/off
//
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR);
$debug = "";
$debuggEnable = TRUE;

function mb_count_chars_kinda($input) {
    $l = mb_strlen($input, 'utf-8');
    $unique = array();
    for($i = 0; $i < $l; $i++) {
        $char = mb_substr($input, $i, 1, 'utf-8');
        if(!array_key_exists($char, $unique))
            $unique[$char] = 0;
        $unique[$char]++;
    }
    return implode("", array_keys($unique));
}
//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
//Ovan skriver ut en hel del information om servern "användbart"

// -------------------------------------------------------------------------------------------
//
// Take care of GET variables
// print_r skriver ut innehållet i en array
//print_r($_GET); skriver ut hela formuläret Word char guessed etc

//Kollar villken char som submittas
$char;
if(empty($_GET['char'])){
$char = "";
}
else{
$char = $_GET['char'];
}
// om $_GET['char'] är tom så sätt $char till tom
// annars om den innehåller en char så tilldela då $char den charen
//---
//kollar villket word som är för tillfället
$word;
if(empty($_GET['word'])){
//$word = "";
$word = rand(0, 6);
}
else{
$word = $_GET['word'];
}
//---
//kollar gissning om den är tom eller vad som gissades
$guessed;
if(empty($_GET['guessed'])){
$guessed = "";
}
else{
$guessed = $_GET['guessed'];
}
//---
$output;
if(empty($_GET['output'])){
$output = "";
}
else{
$output = $_GET['output'];
}
//debugg kollar vad char är villket ord samt gissning och lägger det som 
//en text sträng som vi kan skriva ut för att debugga.
$debug .= "char = {$char}<br />";
$debug .= "word = {$word}<br />";
$debug .= "guessed = {$guessed}<br />";
$debug .= "output = {$output}<br />";
$debuggEnable = (empty($output) ? FALSE : TRUE);
$debug .= "debugEnable = {$debuggEnable}<br />";
// -------------------------------------------------------------------------------------------
//
// Create a wordlist and pick the word.
//
$words = Array(
		'php',
		'sqlite',
		'kmom',
		'hangman',
		'leeeeeerooooy',
		'html',
		'nej',
		);
		//En array med några ord
$theWord = $words[$word];//theword tilldelas ordet från våran array som är word dvs den plats i arrayen

$debug .= "Ordlista: " . implode(', ', $words) . "<br />";
$debug .= "Valt ord: '{$theWord}'<br />";
/*
//Skriver ut alla orden längd
$debug .= "Ordens respektive längd: ";
foreach($words as $w){
	$debug .= "{$w} (" . strlen($w) . "), "; //för varje ord i arrayen sätt längden på dem till $w
}
$debug .= "<br />";

// asort(tar en array); Sorterar arrayen
asort($words);
foreach($words as $w){
	$debug .= "{$w} , ";
}

//count(tar en mixed "objekt i en array") räknar antal element
$result = count($words);
$debug .= "<br /> words har " . $result . " Element <br />";

//shuffle gör så att alla värden i arreyn får nya keys dvs index
shuffle($words);
foreach($words as $w){
$debug .= " " . $w;
}
//array_rand(tar en array , och slumpar ur x antal värden från olika index)
$result = array_rand($words, 3);
$debug .= "<br /> array rand blandar arrayen med index <br />";
foreach($result as $w){
	$debug .= " Index : " . $w . " Ord : " . $words[$w];
}
*/
// -------------------------------------------------------------------------------------------
//
// Show the string and the chars that are correct, else _
//

$wordNr = mb_strlen($theWord, 'utf-8');
$noNeed = false;
for($i = 0; $i<$wordNr; $i++){
	$currentWord[$i] .= "-";
}
for($i = 0; $i<mb_strlen($guessed, 'utf-8'); $i++){
	for($j = 0; $j<$wordNr; $j++){
		$inChr = mb_substr($guessed, $i, 1, 'utf-8');
		$checkChr = mb_substr($theWord, $j, 1, 'utf-8');
		if($inChr == $checkChr){
			$currentWord[$j] = $inChr;
		}
	}
}
$done = true;
for($i = 0; $i<$wordNr; $i++){
	if($char == $theWord[$i]){
		for($j = 0; $j<mb_strlen($guessed, 'utf-8'); $j++){
			if($char == mb_substr($guessed, $i, 1, 'utf-8') && $done){
				$done = false;
			}
		}
		if($done == true){
			$guessed .= $char;
			$noNeed = true;
		}
		$currentWord[$i] = $char;
	}
}
$not = true;
if($noNeed != true){
	$guessed .= $char;
}
// ------------------------------------------------------------------------------------------
//
// Check state of game:
// count number of failed attempts
//
$howManyFails = 0;
for($i = 0; $i<mb_strlen($guessed, 'utf-8'); $i++){
	$faild = true;
	for($j = 0; $j<$wordNr; $j++){
		if(mb_substr($guessed, $i, 1, 'utf-8') == mb_substr($theWord, $j, 1, 'utf-8')){
				$faild = false;
		}
	}
	if($faild == true){
		$howManyFails = $howManyFails + 1;
	}
}

// -------------------------------------------------------------------------------------------
//
// Check state of game:
// if all chars are right, then success!
//
$win = false;
$counter = 0;
for($i = 0; $i<$wordNr; $i++){
	if($currentWord[$i] == $theWord[$i]){
		$counter = $counter + 1;
	}
}
if($counter == $wordNr){
	$win = true;
}
// -------------------------------------------------------------------------------------------
//
// Check state of game:
// if failed nine times, then hanged, game over.
//
if($howManyFails == 9){
	$win = false;
}

//--------------------------------
//
//Show game
//
for($i = 0; $i<$wordNr; $i++){
	if($win == true){
		$show = "Winner!";
	}
	else if($win == false && $howManyFails == 9){
		$show = "Fail!";
	}
	else{
		$show .= $currentWord[$i];
	}
}
// -------------------------------------------------------------------------------------------
//
// Create a form for managing input.
// När man submittar klicka på button "gissar" så skall hangman.php anropas
$form =<<<EOD
<div id="hangmanResult">
{$show}
</div>
<form action='hangman.php' method='get' style="height: 450px;">
	<input type='hidden' name='word' value='{$word}' />
	<input type='hidden' name='guessed' value='{$guessed}' />
	<input type='text' name='char' tabindex='1' size='1' maxlength='1'/>
	<button type='submit'>Gissning</button>
	<nav class="navmenu" style="width: 102px; margin: 10px;">
	<a href='{$_SERVER['PHP_SELF']}'>Starta om</a>
	</nav>
</form>
EOD;
// type hidden gör så att fältet inte blir synlig samt att get word får värdet
//av word från våran array
//och get guessed får värdet av $guessed
//$_SERVER tar fram all information som används för skriptet
//i SERVER så finns det en PHP_SELF detta är en direkt länk till
//nuvarande sida. denna använder vi för att starta om spelet "laddar omsidan"

// -------------------------------------------------------------------------------------------
//
// Create html for drawing the hanging man.
//
require_once('CHangmanSVG.php');
$hangman = new CHangmanSVG();
$svgCode = $hangman->DrawPartsOfPicture($howManyFails);	

//Rita ut huvudet endast-----------------
//$hangman2 = new CHangmanSVG();
//$svgCodeHead = $hangman2->DrawHuvud();
// -------------------------------------------------------------------------------------------
//
// Create and print out the html-page
//
require_once('../common.php');
$title = "Hangman";
$pageId = "hangman";
$charset = "utf-8";
$language = "sv";
$debug = $debuggEnable ? $debug : "";
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
		<h1>Hang that man</h1>
		</div>
		<div id="text">
		<p>Hangman försök rädda gubben, du har nio försök innan något dåligt händer. kan du klara av det? </p>
		<fieldset>
			<div style='float: left'>
				{$form}
			</div>
			<div style='float: right'>
				{$svgCode}
				{$svgCodeHead}
			</div>
		</fieldset>
		</div>
		<div style='font-size: small;'>
			{$debug}
		</div>
		{$footer}
	</body>
</html>
EOD;

echo $html;
?>