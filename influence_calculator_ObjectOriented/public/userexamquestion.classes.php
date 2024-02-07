<?php 
require_once __DIR__. "/../config/dbh.php";
class UserExamQuestion extends Dbh{
    protected function examquestiondisplay($x){
        $sql = "SELECT * FROM exam WHERE id = ?";
        $stmt = $this->connection()->prepare($sql);

        if (!$stmt->execute([$x])) {
            $stmt = null;
            exit();
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}