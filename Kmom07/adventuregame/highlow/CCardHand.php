<?php
require_once('CDeck.php');
class CCardHand{

	private $myHand;
	
	function __construct(){
		$this->myHand = Array();
	}
	function __destruct(){
		;
	}
	public function AddCard($theCard){
		$this->myHand[] = $theCard;
		//en onödigt funktion för den görs två gånger WTF!!!!
		//array_push($this->myHand, $theCard);
	}
	public function DropAllCards(){
		$this->myHand = Array();
	}
	public function GetCardsAsBox() {
		$html = "<p><div style='float: left; background: green;'>";
		foreach($this->myHand as $theCard) {
			$html .= $theCard->GetCardAsBox();
		}
		$divClear = "<div style='height: 0; clear: both;'>&nbsp;</div>";
		$html .= "</div>{$divClear}</p>";		
		
		return $html;
	}
	public function GetLastCard() {
		return $this->myHand[count($this->myHand)-1];
	}
	public function GetNrOfCards() {
		return count($this->myHand);
	}
}