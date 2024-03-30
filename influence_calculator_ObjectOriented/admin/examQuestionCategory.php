<?php
require_once __DIR__ . "/adminheader.php";
?>

<div class="col sm-12 col-md-12 col-lg-10">
    <div class="row">
        <div class="col-12 mb-3 d-flex mt-3">
            <input type="search" name="" id="" class="form-control" placeholder="Search for...">
            <button class="btn btn-dark"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
        <div class="col-12 text-muted fw-bold mb-2">
            joshuajulius2030@gmail.com <img src="../img/IMG-20230409-WA0055.jpg" class="img-fluid rounded-circle" width="30" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-muted">
            <h4>Select cateogry of Courses to upload question to</h4>
        </div>
    </div>
    <div class="row">
        <a href="exam_question.php?id=html" class="col-lg-4 bg-primary d-flex justify-content-center align-items-center text-decoration-none" style="height:400px;">
            <h1>HTML</h1>
        </a>
        <a href="exam_question.php?id=css" class="col-lg-4 bg-info d-flex justify-content-center align-items-center text-decoration-none" style="height:400px;">
            <h1>CSS</h1>
        </a> <a href="exam_question.php?id=js" class="col-lg-4 bg-success d-flex justify-content-center align-items-center text-decoration-none" style="height:400px;">
            <h1>Javascript</h1>
        </a>
    </div>
</div>

<?php
require_once __DIR__ . "/adminFooter.php"
?>