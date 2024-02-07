<?php 

class AdminExamQuestion extends Dbh{
    protected function addQuestion($question, $optionA, $optionB, $optionC, $optionD, $ans){
        $sql = "INSERT INTO exam(question, optionA, optionB, optionC, optionD, ans) VALUES (:question, :optionA, :optionB, :optionC, :optionD, :ans)";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindParam(':question', $question);
        $stmt->bindParam(':optionA', $optionA);
        $stmt->bindParam(':optionB', $optionB);
        $stmt->bindParam(':optionC', $optionC);
        $stmt->bindParam(':optionD', $optionD);
        $stmt->bindParam(':ans', $ans);
        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: ../admin/exam_question.php?stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function showQuestion($x){
        $sql = "SELECT * FROM exam WHERE id != ?";
        $stmt = $this->connection()->prepare($sql);
        if (!$stmt->execute([$x])) {
            $stmt = null;
            exit();
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}