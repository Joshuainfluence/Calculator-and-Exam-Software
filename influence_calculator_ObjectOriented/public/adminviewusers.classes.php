<?php 

class AdminViewUsers extends Dbh{
    protected function viewUser($is_admin){
        $sql = "SELECT * FROM users WHERE is_admin = ?";
        $stmt = $this->connection()->prepare($sql);
        if (!$stmt->execute([$is_admin])) {
            $stmt = null;
            exit();
        }

       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $result;
    }

}