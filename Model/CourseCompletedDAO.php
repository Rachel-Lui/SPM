<?php
class CourseCompletedDAO {

    // This function retrieves all the data of the courses completed in the database 'Course Completed' table
    // returns array of Course Completed objects
    public function retrieve_all() {
        // skeleton SQL
        $sql = "SELECT * FROM COURSE_COMPLETED";
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $list = [];
        while($row = $stmt->fetch()) {
            $list[] = new CourseCompleted( $row['USERID'], $row['CID']);
        }
        $stmt->closeCursor();
        return $list;
        $conn = null;
      }


  // This method checks to see if a User has completed a course 
  // If it exists, it returns the user as an object.
  // Else, it returns null.
  public function retrieve_section($userid, $cid) {
    // skeleton SQL
    $sql = "SELECT * FROM COURSE_COMPLETED where USERID = :userid AND CID = :cid";
    $connMgr = new ConnectionManager();
    $conn = $connMgr->getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    while($row = $stmt->fetch()) {
        return new CourseCompleted( $row['USERID'], $row['CID']);
    }
    $stmt->closeCursor();
    $conn = null;
  }


    // Delete a record in the Course Completed table of the database
    // Return a status
    public function delete_completed_course($userid, $cid){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "DELETE FROM COURSE_COMPLETED WHERE USERID = :userid AND CID = :cid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":userid",$userid, PDO::PARAM_STR);
        $stmt->bindParam(":cid",$cid, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $stmt->execute();
        $stmt->closeCursor();
        $pdo = null;
        return $isOk;
    }

}

?>
