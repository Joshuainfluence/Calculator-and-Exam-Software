<?php
require_once(__DIR__ . "/../../config/session.php");
require_once __DIR__. "/../../src/header.php";
?>


    <section>
        <div class="value-container">
            <div class="definition">
                Density can be defined as the mass of a substance of a substance per unit volume of the substance
            </div>
           
            <div id="errorAlert" class="error-alert">
                
            </div>
            <div class="inputs shadow">
                <div id="overlay"></div>
                <div id="content">
                    
                </div>
                
                
                <div class="mass">
                    <label for="mass">
                        Mass
                    </label>
                    <input type="number" name="mass" id="mass" placeholder="Mass" class="form-control">
                </div>
                <div class="volume">
                    <label for="volume">
                        Volume
                    </label>
                    <input type="number" name="volume" id="volume" placeholder="Volume" class="form-control">
                </div>
                <div class="solve">
                    <div class="view">

                    </div>
                    <button type="button" id="submitBtn" class="button">Solve</button>
                </div>
                <div id="density"></div>
                <div id="explanation">

                </div>

            </div>

        </div>
    </section>

    <script src="density.js"></script>
    <script src="../../assets/sweetalert/jquery-3.6.4.min.js"></script>
    <script src="../../assets/sweetalert/sweetalert2.all.min.js"></script>

</body>

</html>