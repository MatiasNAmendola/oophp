<?php

class Ccard{

	//Medlems variabler
	private $icardsPattern;
	private $icardsValue;
	private $icardFaceUporDown;

	//konstruktorn och destruktorn
	
	function __construct($acardsPattern ='H', $acardsValue = 1, $acardFaceUporDown=0){
		$this->icardsPattern = $acardsPattern;
		$this->icardsValue = $acardsValue;
		$this-> icardFaceUporDown = $acardFaceUporDown;
	}	
	function __destruct(){
		;
	}
	
	//Metoder
	function FlipCard($aAction = 'inverse'){
	switch($aAction) {
			case 'up': 			{ $this->icardFaceUporDown = 1;	}	break;
			case 'down': 		{ $this->icardFaceUporDown = 0;	}	break;
			case 'inverse': 
			default: 				{ $this->icardFaceUporDown  = ($this->icardFaceUporDown  == 1) ? 0 : 1;	}	break;
		}
	}
	function GetCardAsId(){
		return $this->icardsPattern . $this->icardsValue . "(" . $this->icardFaceUporDown . ")";
	}
	function GetValue(){
		if($this->icardsPattern == 'X') 
			return 0;
		
		if($this->icardsValue == 1) 
			return 14;
			
		return $this->icardsValue;
	}
	function GetCardAsText(){
		$string = "";
		if($this->icardsValue == 13){
			$string .= "K";
		}
		else if($this->icardsValue == 12){
			$string .=  "Q";
		}
		else if($this->icardsValue == 11){
			$string .=  "J";
		}
		else if($this->icardsValue == 1){
			$string .=  "A";
		}else{
			$string .= $this->icardsValue;
		}
		
		if($this->icardsPattern == 'H'){
			$string .= "&hearts;";
		}
		else if($this->icardsPattern == 'K'){
			$string .= "&clubs;";
		}
		else if($this->icardsPattern == 'R'){
			$string .= "&diams;";
		}
		else if($this->icardsPattern == 'S'){
			$string .= "&spades;";
		}
		else{
			$string = "";
			$string .=  "X";
			$string .= "&Theta;";
		}
		if($this->icardFaceUporDown == 1){
			return $string;
		}
		else{
			return "XXX";
		}
	}
	function GetCardAsBox(){
		$text = $this->GetCardAsText();
		if($text == "XXX"){
			$text = "&nbsp;";
		}
$style = <<<EOD
float: 			left; 
margin:			5px 5px 5px 5px;
padding: 		20px 0px 20px 0px; 
text-align: center;
background:	white;
width: 			40px; 
border: 		solid gray 1px;
EOD;

		if($this->icardFaceUporDown == 0){
			$style .= "background: white url(http://www.student.bth.se/~kejb12/oophp/kmom05/kortspel/cardback.png) repeat;";
		}
		if($this->icardsPattern == 'H' || $this->icardsPattern == 'R'){
			$style .= "color: red;";
		}
		return "<div style='{$style}'>{$text}</div>";
	}
	
}