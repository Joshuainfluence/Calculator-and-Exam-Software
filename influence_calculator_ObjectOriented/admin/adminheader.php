<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/font_awesome/css/font-awesome.css">
</head>

<body>
    <style>
        .position {
            position: fixed;
            z-index: 9999;

        }

        a {
            color: white;
        }

        a:hover {
            color: orange;
        }

        #input-button {
            border: 0px solid white;
            border-bottom: 1px solid blue;
            outline: none;
            width: 100%;
        }

        .submit-button {
            width: 100px;
            height: 50px;
            background-color: transparent;
            color: blue;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-weight: bold;
        }

        .submit-button:hover {
            background-color: red;
            color: white;
            border: 1px solid red;
        }

        #input-button:focus {
            border-bottom: 4px solid red;
        }

        @media (max-width: 60rem) {
            .position {
                position: relative;
            }

            .posture {
                position: fixed;
                z-index: 9999;
            }

        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-2 bg-dark">
                <div class="position col bg-dark mt-3 ">
                    <div class="column text-center">
                        <p class="text-light fw-bold fs-4"><i class="fa fa-grin-wink"></i> ADMIN</p>
                    </div>
                    <hr class="text-light">
                    <div class="column text-light">
                        <p class="text-light fw-bold fs-6"><i class="fa fa-dashboard" aria-hidden="true"></i> <a href="" class="text-decoration-none">Dashboard</a></p>
                        <hr class="text-light">
                        <p class="text-muted fw-bold fs-6">INTERFACE</p>
                        <p><i class="fa fa-cog" aria-hidden="true"></i> <a href="" class="text-decoration-none"> Webpages</a></p>
                        <p><i class="fa fa-bar-chart" aria-hidden="true"></i><a href="" class="text-decoration-none"> Admin Profile</a></p>
                        <p><a href="admin.php" class="text-decoration-none"> View Users</a></p>

                        <p><a href="" class="text-decoration-none">Academics</a></p>
                        <p><a href="examQuestionCategory.php" class="text-decoration-none">Exam Questions</a></p>
                        <p><a href="../config/logout.php" ; class="text-decoration-none">Logout</a></p>
                    </div>
                </div>
            </div>