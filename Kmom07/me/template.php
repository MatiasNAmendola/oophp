<?php
$html =<<<EOD
<div>
<h1>Min Template</h1>
<p>
Här kommer sidans innehåll
</p>
</div>
EOD;
//------------------------------------------

require_once('../common.php');
$title = "Min template";
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
