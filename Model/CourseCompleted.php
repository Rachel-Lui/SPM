<?php 
class CourseCompleted{
    private $userid;
    private $cid;

    public function __construct($userid, $cid){
        $this->userid = $userid;
        $this->cid = $cid;
    }

    public function getUserid(){
        return $this->userid;
    }

    public function getCid(){
        return $this->cid;
    }

    public function setUserid($userid){
        $this->userid = $userid;
    }

    public function setCid($cid){
        $this->cid = $cid;
    }



}
?>