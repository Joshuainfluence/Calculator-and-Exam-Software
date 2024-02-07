<?php

class UserExamQuestionContr extends UserExamQuestion{
    private $x;

    public function __construct($x)
    {
        $this->x = $x;
    }

    public function displayexamquestion(){
        if ($this->x == 0) {
            exit();
        }

        return $this->examquestiondisplay($this->x);
    }
}