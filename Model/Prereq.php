<?php 
class Prereq{
    private $cid;
    private $pcid;


    public function __construct($cid,$pcid){
        $this->cid = $cid;
        $this->pcid = $pcid;
        
    }

    public function getCid(){
        return $this->cid;
    }

    public function getPrereq(){
        return $this->pcid;
    }

    public function setCid($cid){
        $this->cid = $cid;
    }

    public function setPrereq($prereq){
        $this->pcid = $pcid;
    }


}
?>