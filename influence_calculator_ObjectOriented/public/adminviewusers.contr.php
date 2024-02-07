<?php 

class AdminViewUsersContr extends AdminViewUsers{
    private $is_admin;

    public function __construct($is_admin)
    {
        $this->is_admin = $is_admin;

    }

    public function userView(){
        if ($this->is_admin !== 0) {
            exit();
        }
        return $this->viewUser($this->is_admin);
    
    }
}