<?php
class PrereqDAO {

    // This function retrieves all the data of students in the database 'prereq' table
    // returns array of prereq objects
    public function retrieve_all() {
        // skeleton SQL
        $sql = "SELECT * FROM PREREQ";
    
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $list = [];
        while($row = $stmt->fetch()) {
            $list[] = new Prereq( $row['CID'], $row['PREREQ']);
        }
        $stmt->closeCursor();
        return $list;
        $conn = null;
      }


  // This method checks to see if $cid exists in the database 'prereq' table.
  // If it exists, it returns a List.
  // Else, it returns null.
  public function retrieve_prereq($cid) {
    // skeleton SQL
    $sql = "SELECT * FROM PREREQ where CID = :CID";
    $connMgr = new ConnectionManager();
    $conn = $connMgr->getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CID', $cid, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $list = [];

    while($row = $stmt->fetch()) {
        $list[] = new Prereq( $row['CID'], $row['PREREQ']);
    }

    $stmt->closeCursor();
    $conn = null;

    return $list;
  }


  
}

?>
