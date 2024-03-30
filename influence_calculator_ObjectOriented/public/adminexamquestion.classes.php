<?php 

class AdminExamQuestion extends Dbh{
    protected function addQuestion($question, $optionA, $optionB, $optionC, $optionD, $ans, $category){
        $sql = "INSERT INTO exam(question, optionA, optionB, optionC, optionD, ans, category) VALUES (:question, :optionA, :optionB, :optionC, :optionD, :ans, :category)";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindParam(':question', $question);
        $stmt->bindParam(':optionA', $optionA);
        $stmt->bindParam(':optionB', $optionB);
        $stmt->bindParam(':optionC', $optionC);
        $stmt->bindParam(':optionD', $optionD);
        $stmt->bindParam(':ans', $ans);
        $stmt->bindParam('category', $category);
        // there will be an inserted course here, the course which the admin selects to add question to.
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