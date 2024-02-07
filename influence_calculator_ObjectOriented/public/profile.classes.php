<?php 
require_once __DIR__. "/../config/dbh.php";
class Profile extends Dbh{
    protected function profiledisplay($userid){
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->connection()->prepare($sql);

        if (!$stmt->execute([$userid])) {
            $stmt = null;
            exit;
        }

        return $stmt;
    }
}