<?php
$html =<<<EOD
<div id="pageLogo">
<h1>Om mig själv</h1>
</div>
<div id="text">
<figure>
<div style="float: right;">
<img src="img/bild1.jpg" alt="Kevin J bild" width=350 height=310>
<figcaption>
<p> Lite gitarr lirande </P>
</figcaption>
</div>
</figure>
<p>Mitt namn är Kevin Jouper, jag har precis börjat mitt första år på Data- och Systemvetenskap "DSV"
på Blekinge Tekniska Högskola "BTH". Mina tidigar studier var på ett gymnasie vid namn ITG-Sundbyberg då
jag studera ett Specialutformat program inom IT, Elektronik och naturvetenskap.</p>

<h2>Intressen: Musik, Datorer och Sport/Träning.</h2>
<dl>
<dt>
<b>Musik</b>
<dd>
Musik är ett av mina större intressen då jag spelar ett flertal instrument, men för det mesta gitarr.
jag är helt självlärd inom musik och jag har kommit en bra bit fram på egen hand.
<dt>
<br/>
<b>Datorer</b>
<dd>
Jag är även intresserad utav datorer då jag gillar att spela och programmera, och jag
tror nog att IT skulle passa mig bra som ett framtida jobb, eftersom det är nog det ända jag 
kan tänka mig göra framöver. 
<dd>
<br/>
<dt>
<b>Sport/Träning</b>
<dd>
Jag har också intresse för träning "Styrketräning" och sport "Golf" då jag har sysslat med detta ett tag.
men både Styrketräning och golf är ett intresse som kommer och går, då det kan gå upp och ner. 
</dl>
</div>
EOD;
//------------------------------------------

require_once('../common.php');
$title = "Hem";
$pageId = "hem";
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
