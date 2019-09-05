<?php
class SectionDAO {

    // This function retrieves all the data of sections in the database 'section' table
    // returns array of student objects
    public function retrieve_all() {
        // skeleton SQL
        $sql = "SELECT * FROM SECTION";
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $list = [];
        while($row = $stmt->fetch()) {
            $list[] = new Section( $row['CID'], $row['SID'], $row['DAYOFWK'], $row['STARTTIME'], $row['ENDTIME'], $row['INSTRUCTOR'], $row['VENUE'], $row['SIZE']);
        }
        $stmt->closeCursor();
        return $list;
        $conn = null;
      }


  // This method checks to see if a section exists in the database 'section' table.
  // If it exists, it returns an section object.
  // Else, it returns null.
  public function retrieve_section($cid, $sid) {
    // skeleton SQL
    $sql = "SELECT * FROM SECTION where CID = :cid AND SID = :sid";
    $connMgr = new ConnectionManager();
    $conn = $connMgr->getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    while($row = $stmt->fetch()) {
        return new Section( $row['CID'], $row['SID'], $row['DAYOFWK'], $row['STARTTIME'], $row['ENDTIME'], $row['INSTRUCTOR'], $row['VENUE'], $row['SIZE']);
    }
    $stmt->closeCursor();
    $conn = null;
  }


    // Delete a USER record in the database
    // Return a status
    public function delete_section($cid, $sid){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "DELETE FROM section WHERE CID = :cid AND SID = :sid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":cid",$cid, PDO::PARAM_STR);
        $stmt->bindParam(":sid",$sid, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $stmt->execute();
        $stmt->closeCursor();
        $pdo = null;
        return $isOk;
    }

    // Updates a record in the database
    // Return a status
    public function update_size($cid, $sid, $size){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "UPDATE SECTION SET SIZE = :size WHERE CID = :cid and SID = :sid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":cid",$cid, PDO::PARAM_STR);
        $stmt->bindParam(":sid",$sid, PDO::PARAM_STR);
        $stmt->bindParam(":size",$size, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $stmt->execute();
        $stmt->closeCursor();
        $pdo = null;
        return $isOk;
    }
}

?>
