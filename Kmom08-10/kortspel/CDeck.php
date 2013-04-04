<?php
require_once("Ccard.php");
class CDeck{

	//medlems variabler
	private $iCards;
	const cNumCards = 54;

	function __construct(){
		$this->iCards = Array();
		$this->InitDeckWithCards();
	}
	function __destruct(){
		;
	}
	public function InitDeckWithCards(){
		$deckShapes = Array('H', 'K', 'R', 'S', 'X');
		$pos = 1;
		foreach($deckShapes as $shape){
			for($i = 1; $i<=13; $i++){
				$this->iCards[$pos++] = new Ccard($shape, $i, 0);
				if($shape == 'X' && $i == 2) break;
			}
		}
	}
	public function InitAndShuffle(){
		$this->InitDeckWithCards();
		shuffle($this->iCards);
	}
	public function Shuffle(){
		shuffle($this->iCards);
	}
	public function DealFromTop(){
		return (array_pop($this->iCards));
	}
}//klass