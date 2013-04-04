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
<div style="margin: 10px;">
</div>
<div id="text">
<h2>Kmom02/03: PHP-programmeringens grunder</h2>
<h3>Kursmoment, Problem/Svårigheter, Resultat</h3>
<dl>
<dt>
<b>Kursmoment</b>
<dd>
<p>
Kmom 02-03: Under dessa två moment så skapade vi ett Hangman spel i PHP, jag tycker att dessa moment var väldigt bra att göra
då man fick ännu bättre koll på PHP. Jag gillade att under momentet så fanns det små övningar då man fick testa olika funktioner
som shuffle, asort, array_rand mm. Jag känner redan nu att det mesta inom PHP kommer falla på plats. 
Eftersom vi har kommit så långt i C++ så ser man redan likheter mellan de två programmerings språken, men även olikheter.
Men allt som allt så har detta moment varit väldigt intressant då jag har haft en hel del kluriga problem att lösa.   
</p>
<dt>
<b>Problem/Svårigheter</b>
<dd>
<p>
Under detta moment så fick jag en hel del problem, eftersom jag programmerade spelets logik och beräkningar själv, samt att jag använde mig utav
"UTF-8" istället för "ISO-8859-1". När jag försökte använda mig utav å, ä, ö så började ett ganska så stort problem eftersom dessa tecken räknas som 8bit. 
Eftersom jag jämför två chars itaget för att kolla om dem är lika så kommer en 8bits tecken som tar dubbelt så stor plats som ett vanlig tecken inte kunna 
jämföras, detta var huvudproblemet i mitt program.<br />
Detta löste jag med med funktion mb_substr och mb_strlen för att räkna med multybyte. Detta gjorde så att min spellogik kunde fungera på ett korrekt sätt
utan att behöva hoppa över saker som jag inte vill eller göra en beräkning en gång för mycket.
Utöver detta Encoding problem så hade jag några små problem i min common.php då jag la både common.php och source.php i root mappen för kmom02-03,
då alla länkar vart brytna så en hel del redigering krävdes men allt detta gjorde jag så man kunde se källkoden för alla filer under mappen hangman samt alla filer under me sidan. 
Några andra små problem var länkning mellan sidorna samt att soruce.php var skrivet för "ISO-8859-1" då jag körde på "UTF-8". Men detta bytte jag ut då jag.
</p>
<dt>
<b>Resultat</b>
<dd>
<p>
Jag är väldigt nöjd med mitt resultat eftersom jag gjorde det mesta själv, Spellogik, beräkningar och även konvertering från
"ISO-8859-1" till "UTF-8". Även fast det ser ut som mos hangman så är det inte samma kod bakom allt. ja ändrade en del
under momentets gång då jag ville försöka koda det mesta själv. Så just nu så känns det bra i denna kurs och det ska bli intressant 
att påbörja moment 4!  
</p>
<dt>
<b>Tankenöt 1</b>
<dd>
<p>
Jag gjorde den första tankenöten, villket inte vara speciellt svårt. Jag skapade en funktion i classen CHangmanSVG.php
vid namn DrawHuvud. Denna funktion använde sig bara utav funktionenerna som redan fanns i classen dvs "GetHuvud" och "GetSvgHeader".
Jag skapade en variabel vid namn html som exemplet DrawPartsOfPicture funktionen hade. Sedan tilldelade jag denna variablen
funktionen GetSvgHeader, sen en tilldelning av GetHuvude " .= " och till sist tog jag med en slut tagg " .= "/svg.
<br />
I hangman.php så skapade jag ett nytt objekt av classen som jag sedan anropade min funktion DrawHuvud. I funktionen så retuneras html
som har svg koden. De retunerade värde tilldelades till svgCodeHead som jag sedan printa ut.
</p>
</dl>
</div>
<div style="margin: 10px;">
</div>
<div id="text">
<h2>Kmom04: Tärningsspel i PHP</h2>
<h3>Kursmoment, Problem/Svårigheter, Resultat</h3>
<dl>
<dt>
<b>Kursmoment</b>
<dd>
<p>
Kmom04: Klasser, funktioner mm var det vi gjorde under detta moment, att skapa en dice klass samt en histogram klass, momentet i sig var inte så jätte svårt men jag fick
lite problem med de skillnader mellan c++ och php villket gjorde att jag blev lite förvirrad. som foreach metoden då vi använde oss utav foreach(array as key => value) då man
kan bryta ut en array med dess nycklar och vad den har för value, då jag är van att man bara loopar igenom en array med en for loop för att sedan få ut värdet med hjälp av loopen text int i i c++.
annars så tyckte jag att detta moment var lite små roligt men spelet pig var kanske inte det roligaste att göra men men. 
</p>
<dt>
<b>Problem/Svårigheter</b>
<dd>
<p>
jag fick problem med att skillja på foreach och en vanligt for loop när jag ville hämta värden från en array, då vi skulle göra en foreach med key och value villket jag inte är van vid alls
så detta gjorde så jag blev förvirrad, och eftersom denna foreach gjorde mig förvirrad så tog det ganska lång tid att lösa histogrammet som skulle skriva ut x antal # för så många 1 man
slog osv osv. men mer än det så hade jag inga större problem med detta moment.<br />
Sedan så hade jag ett problem med get/post formuläret, eftersom jag började med ett GET formulär för att kunna testa och se hur jag skickar med variabler. Och när spelet var
klart så skulle jag gå över till ett post formulär för jag ville dölja min URL för variablerna jag gettade med innan, villket slutade med att jag fick en del problem, men dessa problem 
var bara syntax fel, och det löste sig tillslut när man testa sig fram.
</p>
<dt>
<b>Resultat</b>
<dd>
<p>
Jag är väl inte riktigt nöjd då jag kunde lagt ner mycket mer tid på detta moment, men eftersom jag har annat att göra också så blev resultatet som det blev, det blev klart och jag
följde instruktionerna. Om jag hade lagt mer tid på detta moment så skulle jag nog försökt göra ett yatzy spel. men nu blev det som det blev.
</dl>
</div>
<div style="margin: 10px;">
</div>
<div id="text">
<h2>Kmom05: Spela kort i PHP</h2>
<h3>Kursmoment, Problem/Svårigheter, Resultat</h3>
<dl>
<dt>
<b>Kursmoment</b>
<dd>
<p>
Kmom 05: Vi har gjort ett High low kort spel i PHP med sessions och classer. Jag tyckte detta moment var rörigt
då det var mycket hopp mellan classerna + och man skulle testa varje klass för att sedan kunna fortsätta. Men annars 
så tyckte jag momentet i sig var kul då man fick göra ett kortspel i PHP. Men jag tycker fortfarande att det är lite struligt
med PHP, även fast jag förstår syntax och hur man kodar PHP, sen när sessioner kommer in i bilden så förstår jag vad dem gör
men skulle nog inte kunna koda en session utan stöd. Eftersom det skulle kräva nötande att få in syntaxen. Men förhoppningsvis
så kommer den falla på plats inom sin tid. Som det känns nu i denna kurs så tror jag nog att jag endast kommer ha problem
med sessioner och databser då det är hyfsat nytt för mig.
</p>
<dt>
<b>Problem/Svårigheter</b>
<dd>
<p>
Jag hade några problem under detta moment, eftersom jag började att försöka koda classerna mm själv så gick det bra ett tag, sedan så fastnade
jag när jag skulle skapa en hand och dela ut kort. Jag försökte kolla på Mos kod men då vi hade gjort på helt olika sätt så var jag tvungen att börja om
och kolla hur mos gjorde steg för steg. Villket var ganska bra ändå då man lär sig hyfsat mycket på det. Sedan hade jag problem med
GetCardAsBox funktionen, då vi anropade en funktion iCCardHand.php som använde sig utav denna GetCardAsBox så printade den ut samma kort
två gånger. Detta gjorde så att jag fick sitta i 40 minuter för att hitta en kod som gjordes två gånger, men i olika klasser. Villket inte var så uppenbart.
Mer än det så var det bara små några små fel jag fick då jag placerade koden fel då jag blev förvirrad av mos instruktioner.
</p>
<dt>
<b>Resultat</b>
<dd>
<p>
Resultatet: Jo personligen är jag nöjd med resultat tycker det blev bra samt att jag fick till att 13,12,11 visas som K,Q,J samt 1 visas som A och joker
fick jag lägga in X eftersom J var tagen av knekten. Jag fixade lite med Css så det passade in med sidan som alla andra spel. Mer än det så
har jag inte så mycket mer att säga om resultatet bara att jag är almänt "nöjd".

</p>
<dt>
</dl>
</div>
<div style="margin: 10px;">
</div>
EOD;
//------------------------------------------

require_once('../common.php');
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
