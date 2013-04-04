<?php
function diceThrow(){
	return rand(1,6);
}
function DiceThrowRepeated($aNumber){
	//Deklarerar en Array 
	$diceArr = Array();
	for($i = 0; $i<$aNumber; $i++){
		$diceArr[$i] = diceThrow();
	}
	return $diceArr;
}
?>