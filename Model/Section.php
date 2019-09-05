<?php 
class Section{
    private $CID;
    private $SID;
    private $DAYOFWK;
    private $START;
    private $END;
    private $INSTRUCTOR;
    private $VENUE;
    private $SIZE;

    public function __construct($cid,$sid,$dayofwk,$start,$end,$instructor,$venue,$size){
        $this->CID = $cid;
        $this->SID = $sid;
        $this->DAYOFWK = $dayofwk;
        $this->START= $start;
        $this->END = $end;
        $this->INSTRUCTOR = $instructor;
        $this->VENUE = $venue;
        $this->SIZE = $size;
    }

    public function getCID(){
        return $this->CID;
    }

    public function getSID(){
        return $this->SID;
    }

    public function getDayofwk(){
        return $this->DAYOFWK;
    }

    public function getStart(){
        return $this->START;
    }

    public function getEnd(){
        return $this->END;
    }

    public function getInstructor(){
        return $this->INSTRUCTOR;
    }

    public function getVenue(){
        return $this->VENUE;
    }

    public function getSIZE(){
        return $this->SIZE;
    }

    public function setCID($cid){
        $this->CID = $cid;
    }

    public function setSID($sid){
        $this->SID = $sid;
    }

    public function setDayofwk($dayofwk){
        $this->DAYOFWK = $dayofwk;
    }

    public function setStart($start){
        $this->START = $start;
    }

    public function setEnd($end){
        $this->END = $end;
    }

    public function setInstructor($instructor){
        $this->INSTRUCTOR = $instructor;
    }

    public function setVenue($venue){
        $this->VENUE = $venue;
    }

    public function setSize($size){
        $this->SIZE = $size;
    }

}
?>