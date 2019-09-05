<?php 
class User{
    private $id;
    private $name;
    private $school;

    public function __construct($id,$pw,$name,$school, $e){
        $this->id = $id;
        $this->name = $name;
        $this->school = $school;
        $this->pw = $pw;
        $this->e = $e;
    }

    public function getId(){
        return $this->id;
    }

    public function getPw(){
        return $this->pw;
    }

    public function getName(){
        return $this->name;
    }

    public function getSchool(){
        return $this->school;
    }

    public function getE(){
        return $this->e;
    }

}
?>