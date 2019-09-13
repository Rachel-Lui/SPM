<?php 
class Course{
    private $cid;
    private $school;
    private $title;
    private $descript;
    private $examDate ;
    private $examStart;
    private $examEnd;

    public function __construct($cid, $school,$title,$descript,$examDate,$examStart,$examEnd){
        $this->cid = $cid;
        $this->school = $school;
        $this->title = $title;
        $this->descript = $descript;
        $this->examDate = $examDate;
        $this->examStart = $examStart;
        $this->examEnd = $examEnd;
    }

    public function getCid(){
        return $this->cid;
    }

    public function getSchool(){
        return $this->school;
    }

    public function getTitle(){
      return $this->title;
  }
   public function getDescript(){
      return $this->descript;
   }
   public function getExamDate(){
      return $this->examDate;
   }
   public function getExamStart(){
      return $this->examStart;
   }
   public function getExamEnd(){
      return $this->examEnd;
   }

   public function setCid($cid) {
      $this->cid = $cid;
   }
  public function setSchool($school) {
   $this->school = $school;
   }
   public function setTitle($title) {
      $this->title = $title;
   }
   public function setDescription($descript) {
      $this->descript = $descript;
   }
   public function setExamDate($examDate) {
      $this->examDate = $examDate;
   }
   public function setExamStart($examStart) {
      $this->examStart = $examStart;
   }
   public function setExamEnd($examEnd) {
      $this->examEnd = $examEnd;
   }
}
?>