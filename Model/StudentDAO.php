<?php
class StudentDAO {

    // This function retrieves all the data of students in the database 'student' table
    // returns array of student objects
    public function retrieve_all() {
        // skeleton SQL
        $sql = "SELECT * FROM STUDENT";
    
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $list = [];
        while($row = $stmt->fetch()) {
            $list[] = new User( $row['USERID'], $row['PWD'], $row['SNAME'], $row['SCHOOL'], $row['EDOLLAR']);
        }
        $stmt->closeCursor();
        return $list;
        $conn = null;
      }


  // This method checks to see if an account with $username exists in the database 'account' table.
  // If it exists, it returns an Account object.
  // Else, it returns null.
  public function retrieve_user($username) {
    // skeleton SQL
    $sql = "SELECT * FROM STUDENT where USERID = :username";
    $connMgr = new ConnectionManager();
    $conn = $connMgr->getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    while($row = $stmt->fetch()) {
        return new User( $row['USERID'], $row['PWD'], $row['SNAME'], $row['SCHOOL'], $row['EDOLLAR']);
    }
    $stmt->closeCursor();
    $conn = null;
  }


  // This method authenticates the account given username & password (from user form - in plain text).
  // Returns true if username & password combination is correct.
  // Otherwise, returns false.
  // Please make use of retrieve() method above.
  public function authenticate($username, $password) {
    $truth = FALSE;
    $user = $this -> retrieve_user($username);
    if ($user)
    {
        $pw = $user -> getPw();
        if ($pw == $password)
        {
            $truth = TRUE;
        }
    }
    return $truth;
  }

  // Input 1: Student ID (database table USERID, integer)
  // Input 2: New Password (string)
  public function reset_password($id, $pass, $new_password) {
    $sql = 'UPDATE Student SET PWD = :new_password WHERE USERID = :id AND PWD = :pwd';
    $connMgr = new ConnectionManager();
    $conn = $connMgr->getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':new_password', $new_password, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':pwd', $pass, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $isOK = $stmt->execute();
    $stmt->closeCursor();
    $conn = null;
    return $isOK;
  }

    // Delete a USER record in the database
    // Return a status
    public function delete_user($userid){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "DELETE FROM student WHERE USERID = :userid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":userid",$userid, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $stmt->execute();
        $stmt->closeCursor();
        $pdo = null;
        return $isOk;
    }

    // Updates a record in the database
    // Return a status
    public function update_edollar($id, $ecredits){
        $conn = new ConnectionManager();
        $pdo = $conn->getConnection();
        $sql = "UPDATE STUDENT SET EDOLLAR = :ecredits WHERE USERID = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id",$id, PDO::PARAM_STR);
        $stmt->bindParam(":ecredits",$ecredits, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $stmt->execute();
        $stmt->closeCursor();
        $pdo = null;
        return $isOk;
    }
}

?>
