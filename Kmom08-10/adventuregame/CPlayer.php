<?php
class CPlayer {  

    // -------------------------------------------------------------------------------------------
    //
    // Member variables
    //
    // http://php.net/manual/en/language.oop5.constants.php
    //
    public $iHealthMeter;
    public $iLastRoomVisited;
    

    // -------------------------------------------------------------------------------------------
    //
    // Constructor
    // http://www.php.net/manual/en/language.oop5.decon.php
    //
    function __construct() {
        $this->iHealthMeter = 10;
        $this->iLastRoomVisited = 1; // Always start in room 1
    }


    // -------------------------------------------------------------------------------------------
    //
    // Destructor
    // http://www.php.net/manual/en/language.oop5.decon.php
    //
    function __destruct() {
        ;
    }


    // -------------------------------------------------------------------------------------------
    //
    // SetCurrentRoomAndDecreaseHealtMeter
    //
    // Check if room-id has changed. Store the new room-id and decrease the 
    // health-meter. If the health-meter has reached 0 then redirect to 
    // page that shows gameover.
    //
    // http://php.net/manual/en/function.header.php
    //
    public function SetCurrentRoomAndDecreaseHealtMeter($aId) {
        
        if($aId != $this->iLastRoomVisited) {
            $this->iLastRoomVisited = $aId;
            $this->iHealthMeter--;
            
            if($this->iHealthMeter <= 0) {
                header('Location: http://www.student.bth.se/~kejb12/oophp/kmom07/adventuregame/gameover.php?reason=Hälomätaren nådde 0');
            }
        }
    }
    

    // -------------------------------------------------------------------------------------------
    //
    // Take care of the action-event.
    //
    //
    public function PerformActionEvent($aActionEvent) {

        switch($aActionEvent) {
            case 'increaseHealthBy5': {
                $this->iHealthMeter += 5;
                if($this->iHealthMeter > 10) {
                    $this->iHealthMeter = 10;                    
                }
            }
            break;

            case 'increaseHealthFull': {
                $this->iHealthMeter = 10;
            }
            break;
            
            case 'playGameHighLow': {
                header('Location: http://www.student.bth.se/~kejb12/oophp/kmom07/adventuregame/highlow/highlow.php?game=init');
            }
            break;

            default:
            break;
        }
    }


} // End of class

?>