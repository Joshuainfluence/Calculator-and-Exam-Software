<?php 

class ProfileContr extends Profile{
    private $userid;

    public function __construct($userid)
    {
        $this->userid = $userid;
    }

    public function displayProfile(){
        if ($this->userid == 0) {
            exit();
        }
        return $this->profiledisplay($this->userid);
    }
}