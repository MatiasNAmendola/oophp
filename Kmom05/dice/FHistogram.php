<?php
function histogramShowValues($anArray){
	$dicestring = "";
	foreach($anArray as $key => $value){
		$dicestring .= "<br /> " . $key . " => " . $value . ", ";
	}
	return $dicestring;
}
function histogramPrintGraf($anArray){
	$histoString = array();
	foreach($anArray as $w){
		@$histoString[$w] .= "*";
	}
	ksort($histoString);
	return histogramShowValues($histoString);;
}
?>