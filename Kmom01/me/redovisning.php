<?php
$html =<<<EOD
<div id="pageLogo">
<h1>Redovisning av kursmomenten</h1>
</div>
<div id="text">
<h2>Kmom01: Intro till PHP i webbmiljö</h2>
<h3>Kursmoment, Problem/Svårigheter, Resultat</h3>
<dl>
<dt>
<b>Kursmoment</b>
<dd>
<p>
Kmom01: Intro till PHP i webbmiljö var ett bra startmoment, då man gick igenom grundläggande PHP programmering. 
Men det som var mest intressant var att avända putty, då det var ett tag sedan jag använde det. 
Överlag så var detta moment inte speciellt svårt att göra förutom att putty strulade lite villket gjorde jag fick en 
.nfs fil som jag inte kunde ta bort. Men det löser sig nog.
</p>
<dt>
<b>Problem/Svårigheter</b>
<dd>
<p>
Jag hade en del problem under detta kursmoment, ett av det första var att komma igång med putty då min konfiguration av screens strulade lite.
Sedan fick jag ett till problem med putty, eftersom den skapade en .nfs fil villket jag inte kunde ta bort, men den skall tas bort framöver.
Jag var även tvungen att ändra vissa små saker i source.php då den strulade för mig, fick byta character encoding till UTF-8 då ISO strulade mm.
En stund så stulade min EOD också, men det var bara ett lite klantigt fel som jag inte hade förväntade mig.
Som vanligt så ficka jag små problem med stylesheeten med start-taggar samt slut-taggar då det var annorlunda när allt 
ska skrivas ut med PHP. Men allt löste sig tillslut.
</p>
<dt>
<b>Resultat</b>
<dd>
<p>
Allt som allt så är jag nöjd med resultatet då jag fick till det som jag ville. Det som var jobbigast med detta moment var stylesheeten, eftersom man kan
hålla på med det i oändlighet. Men jag är nöjd men hur min första sida blev i denna kurs. Här är även min länkt till 
<nav class="navmenu" style="width: 120px;">
<a href="../hello/template.php">Hello world!</a>
</nav>
</p>
<dt>
<b>Tankenöt 1&2</b>
<dd>
<p>
Tankenöt 1: Man kan fuska på flera sätt på hangman v1. Först å främst i URL så kan man se tre stycken olika get metoder
en för word en för guessed och en för char. Jag började med att skriva olika char=a tex. Då fick men ett resultat i guessed. Om
det var fel så kunde man bara ta bort sin gissning som var fel så försvann en del av bilden. Detta kunde man göra för att lista
ut villket ord som söktest utan att få ett enda fel när man var klar. Men lättast var bara att kolla på get metoden för word. 
Om den var word=5 så kunde man gå in i källkoden kolla villket ord som låg på plats 5 i array och skriva in programvaruteknik direkt
i url på guessed.
</p>
<p>
Tankenöt 2: Här kunde man bara se en get metod dvs word i början när spelet starta. Så man kunde sedan gå in och kolla i arrayen och se villket ord
som låg på plats tex 8 i arrayen, i detta fall var det PHP. Vips så klara man spelet utan fel. Eller så kunde man gissa på en bokstav, se vad för
get metoder som poppade upp i URL dvs char och guessed igen. Sedan kunde man sitta och gissa på alla bokstäver tills man fick rätt ord.
</p>
</dl>
</div>
EOD;
//------------------------------------------

require_once('common.php');
$title = "Redovisning";
$pageId = "redo";
$charset = "utf-8";
$language = "sv";
$html =<<<EOD
<!doctype html>
<html lang="{$language}">
	<head>
		<meta charset="{$charset}">
		<link rel="stylesheet" href="style/stylesheet.css">
		<title>{$title}</title>
	</head>
	<body id="{$pageId}">
		{$header}
		{$html}
		{$footer}
	</body>
</html>
EOD;
echo $html;
?>
