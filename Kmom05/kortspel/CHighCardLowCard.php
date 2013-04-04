<?php
require_once("CDeck.php");
require_once("CCardHand.php");

class CHighCardLowCard{

	private $iDeck;
	private $iHand;

	function __construct(){
		$this->iDeck = new CDeck();
		$this->iHand = new CCardHand();
	}
	function __destruct(){
		;
	}
	function StartGame(){
		$this->iDeck->InitAndShuffle();
		$this->iHand->DropAllCards();
		$card = $this->iDeck->DealFromTop();
		$card->FlipCard();
		$this->iHand->AddCard($card);
	}
	function GuessAndPickCard($aGuess){
		$card1 = $this->iHand->GetLastCard();
		$card2 = $this->iDeck->DealFromTop();
		$card2->FlipCard();
		$this->iHand->AddCard($card2);

		$value1 = $card1->GetValue();
		$value2 = $card2->GetValue();

		$success = FALSE;
		switch($aGuess) {
			case 'high': {
			$success = ($value2 >= $value1);
			}
			break;

			case 'low': {
			$success = ($value2 <= $value1);
			}
			break;
		}

		return $success;
		}
	function GetPoints(){
	
	}
	function ShowGameStatus(){
		return $this->iHand->GetCardsAsBox();
	}
	
}