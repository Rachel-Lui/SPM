<?php

require_once 'ConnectionManager.php';

class CourseDAO {

    // This function retrieves all the data of courses in the database 'course' table
    // returns array of student objects
    public function retrieve_all() {
        // skeleton SQL
        $sql = "SELECT * FROM Course";
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $list = [];
        while($row = $stmt->fetch()) {
            $list[] = new Course( $row['CID'], $row['SCHOOL'], $row['TITLE'], $row['DESCRIPT'], $row['EXAMDATE'], $row['EXAMSTART'], $row['EXAMEND']);
        }
        $stmt->closeCursor();
        return $list;
        $conn = null;
      }

       public function CreateCourse($course) {
            $insertOK = false;

            # Step 1: Connect to database (using the ConnectionManager)
           
            $connMgr = new ConnectionManager();
            $conn = $connMgr->getConnection();
            # Get information from $person
            $cid = $course->getCid();
            $school = $course->getSchool();
            $title = $course->getTitle();
            $descript = $course->getDescript();
            $examDate = $course->getExamDate();
            $examStart = $course->getExamStart();
            $examEnd = $course->getExamEnd();
        

            # Step 2: Prepare a SQL statement
            $sql ='INSERT INTO Course
                (CID, SCHOOL, TITLE, DESCRIPT, EXAMDATE, 
                EXAMSTART, EXAMEND) 
                values 
                (:cid, :school, :title, :descript, :examDate, 
                :examStart, :examEnd);';
        
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':cid',$cid,PDO::PARAM_STR);
            $stmt->bindParam(':school',$school,PDO::PARAM_STR);
            $stmt->bindParam(':title',$title,PDO::PARAM_STR);
            $stmt->bindParam(':descript',$descript,PDO::PARAM_STR);
            $stmt->bindParam(':examDate',$examDate,PDO::PARAM_STR);
            $stmt->bindParam(':examStart',$examStart,PDO::PARAM_STR);
            $stmt->bindParam(':examEnd',$examEnd,PDO::PARAM_STR);
           

            # Step 3: Run the SQL statement
            $insertOK = $stmt->execute();
        
            # Step 5: Free up resources
            $stmt = null;
            $pdo = null;
            return $insertOK;
        }

  // This method checks to see if a course exists in the database 'course' table.
  // If it exists, it returns an course object.
  // Else, it returns null.
  public function retrieveCourse($cid) {
    // skeleton SQL
    $sql = "SELECT * FROM Course where CID = :cid ";
    $connMgr = new ConnectionManager();
    $conn = $connMgr->getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    while($row = $stmt->fetch()) {
        return new Course( $row['CID'], $row['SCHOOL'], $row['TITLE'], $row['DESCRIPT'], $row['EXAMDATE'], $row['EXAMSTART'], $row['EXAMEND']);
    }
    $stmt->closeCursor();
    $conn = null;
  }


    // Delete a USER record in the database
    // Return a status
    public function deleteCourse($cid){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "DELETE FROM Course WHERE CID = :cid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":cid",$cid, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $stmt->execute();
        $stmt->closeCursor();
        $pdo = null;
        return $isOk;
    }

    public function deleteAll(){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "TRUNCATE TABLE Course";
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $stmt->execute();
        $stmt->closeCursor();
        $pdo = null;
        return $isOk;
    }

    // Updates a record in the database
    // Return a status
    public function updateCourse($cid, $school, $title, $descript, $examDate, $examStart, $examEnd){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "UPDATE Course SET school = :school, title = :title, descript = :descript,examDate = :examDate, examStart = :examStart, examEnd = :examEnd WHERE CID = :cid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":cid",$cid, PDO::PARAM_STR);
        $stmt->bindParam(":school",$school, PDO::PARAM_STR);
        $stmt->bindParam(":title",$title, PDO::PARAM_STR);
        $stmt->bindParam(":descript",$descript, PDO::PARAM_STR);
        $stmt->bindParam(":examDate",$examDate, PDO::PARAM_STR);
        $stmt->bindParam(":examStart",$examStart, PDO::PARAM_STR);
        $stmt->bindParam(":examEnd",$examEnd, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $stmt->execute();
        $stmt->closeCursor();
        $pdo = null;
        return $isOk;
    }
}

?>
