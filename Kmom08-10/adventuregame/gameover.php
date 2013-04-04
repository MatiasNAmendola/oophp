<?php
$reason    = (empty($_GET['reason']) ? "Ingen anledning presenterad." : $_GET['reason']);


// -------------------------------------------------------------------------------------------
//
// The content of the page
//
$html = <<<EOD

<div class='wrapper'>
<h1>Äventyrsspel</h1>
<h2>GAME OVER</h2>
<p>
Anledning: {$reason}
</p>
<p>
<nav class="navmenu" style="width: 200px;">
<a href="adventure.php">Gå till startsidan</a> 
</nav>
</p>
</div> <!-- wrapper -->

EOD;

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