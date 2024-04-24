<?php
require_once(__DIR__ . "/../../config/session.php");
require_once __DIR__ . "/../../src/header.php";
?>

<section>
    <div class="value-container">
        <div class="definition">
            Quadratic Equation
        </div>

        <div class="inputs shadow">
            <div id="overlay"></div>
            <div class="equation">
                <label for="equation">Type your question</label>
                <textarea name="text" id="question" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mass">
                <label for="a">
                    Enter the value of a
                </label>
                <input type="number" name="a" id="a" placeholder="a" class="form-control">
            </div>
            <div class="volume">
                <label for="b">
                    Enter the value of b
                </label>
                <input type="number" name="b" id="b" placeholder="b" class="form-control">
            </div>
            <div class="volume">
                <label for="c">
                    Enter the value of c
                </label>
                <input type="number" name="c" id="c" placeholder="c" class="form-control">
            </div>

            <div class="solve">
                <div class="view">

                </div>
                <button id="submitBtn" class="button">Solve</button>
            </div>
            <div id="quadratic"></div>
            <div id="explanation">

            </div>


        </div>

    </div>
</section>
<script src="quadratic.js"></script>
<script src="../../assets/sweetalert/jquery-3.6.4.min.js"></script>
<script src="../../assets/sweetalert/sweetalert2.all.min.js"></script>
</body>

</html>