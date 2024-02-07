<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/nav.css">
    <script src="../../assets/nav.js" defer></script>
    <link rel="stylesheet" href="../../assets/font_awesome/css/font-awesome.css">
    <link rel="stylesheet" href="contact.css">
</head>

<body>
    <header class="primary-header">
        <nav>
            <div class="container">
                <div class="nav-content">
                    <div class="logo">
                        <!-- <img src="image/hacker2.jpg" class="image" alt=""> -->
                        <div class="title">Influence Calculator</div>
                    </div>
                    <button class="mobile-nav-toggle" aria-expanded="false" aria-controls=".content"></button>
                    <div class="content">
                        <ul class="content1" id="content" data-visible="false">
                            <li>
                                <a href="../../index.php">Home</a>
                            </li>
                            <li>
                                <a href="">Contents</a>
                            </li>
                            <li>
                                <a href="../about/about.php">About</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                            <li>
                                <a href="../signup/signup.php">Register <i class="fa fa-sign-in"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="value-container">

            <div class="inputs">
                <div class="contact">
                    Write to Us, we'll reply
                </div>
                <div class="name">
                    <label for="name">
                        Name
                    </label>
                    <input type="text" name="name" id="name" placeholder="name" class="form-control">
                </div>
                <div class="email">
                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" id="email" placeholder="email" class="form-control">
                </div>
                <div class="name">
                    <label for="name">
                        How can we help?
                    </label>
                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                
                <div class="checks">  
                    <div class="web">
                        <input type="checkbox" name="web" id="web" class="check">
                        <h3 class="font">Web Development</h3>
                    </div>
                    <div class="web">
                        <input type="checkbox" name="branding" id="branding" class="check">
                        <h3 class="font">Branding</h3>
                    </div>
                    <div class="digital">
                        <input type="checkbox" name="digital" id="digital" class="check">
                        <h3 class="font">Digital Experience</h3>
                    </div>
                </div>
                <div class="solve">
                    <div class="view">

                    </div>
                    <input type="submit" value="Send message" class="button">
                </div>
            </div>
        </div>
    </section>
</body>

</html>