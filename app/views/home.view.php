<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/styles.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodz</title>
</head>

<body>
    <?php
    include("../app/views/Header.php");

    ?>

    <div class="Main" style="background-image: url( <?= My_Files_Root ?>assets/images/home-bg.jpg); ">
        <div style="display: flex; flex-direction: row; font-size: xx-large; padding-bottom:0px; margin-left: 50px;">
            <h1 style="color: green; margin:0px;">Foo</h1>
            <h1 style="color: red; margin:0px;">dz</h1>
        </div>


        <div style="display: flex;   flex-direction: row; ">
            <div class="AccountLogin">
                <form class="from" name="AccountLogin" method="POST" autocomplete="off">
                    <h1>Account login</h1><br>
                    <?php if (!empty($My_Errors)) : ?>
                        <div class="warning">
                            <?= implode("<br>", $My_Errors) ?>
                        </div>
                    <?php endif; ?>
                    <input type="email" placeholder="Enter your email or phone number" name="mostakhdim" class="Email_Password" required><br>
                    <input type="password" placeholder="Enter your password" name="kalimat_sir" class="Email_Password" required><br>
                    <button type="submit" class="LoginBtn" name="AccountLogin_submit">Login</button><br>

                </form>

                <a href="#">Forgot your password?</a><br>
                <hr />
                <button class="CreateAccountBtn"><a href="<?= My_Files_Root ?>Register_Account" class="Create_Account_Btn">Create new account</a></button><br>
            </div>

            <div class="AccountLogin">
                <form class="from" name="PageLogin" method="POST" autocomplete="off">
                    <h1>Page login</h1><br>
                    <?php if (!empty($My_Errors)) : ?>
                        <div class="warning">
                            <?= implode("<br>", $My_Errors) ?>
                        </div>
                    <?php endif; ?>
                    <input type="email" placeholder="Enter your email or phone number" name="mostakhdim_safeha" class="Email_Password" required><br>
                    <input type="password" placeholder="Enter your password" name="kalimat_sir_safeha" class="Email_Password" required><br>
                    <button type="submit" class="LoginBtn" name="PageLogin_submit">Login</button><br>

                </form>

                <a href="#">Forgot your password?</a><br>
                <hr />
                <button type="submit" class="CreateAccountBtn"><a href="<?= My_Files_Root ?>Register_Restaurant" class="Create_Account_Btn">Create new page</a></button><br>

            </div>

        </div>





    </div>

    <hr />
    <div class="Ad">
        <div class="DishAd">
            <div><img src="<?= My_Files_Root ?>assets/images/Cuscus.jpg" width="500" height="300" style="border-radius: 30px;" alt="Couscous"></div>
            <div class="DishDescription">
                <div class="DishMaker">
                    <h3 style=" margin: 0px;">Dish Maker</h3>
                    <h3 style=" margin: 0px; ">1st December 2023</h3>
                </div>
                <hr />
                <div class="DishInfo">
                    <h3 style=" margin: 0px;">Couscous</h3>
                    <p style="text-align: justify;">
                        Couscous is a staple food throughout the Maghrebi cuisines of Algeria, Tunisia, Mauritania, Morocco, and Libya.
                        It was integrated into French and European cuisine at the beginning of the twentieth century, through the French
                        colonial empire and the Pieds-Noirs of Algeria. In 2020, couscous was added to UNESCO's Intangible Cultural Heritage list.
                    </p>
                    <button class="ReadMoreBtn">Read more</button>
                </div>

            </div>
        </div>
        <div class="DishAd">
            <div><img src="<?= My_Files_Root ?>assets/images/Cuscus.jpg" width="500" height="300" style="border-radius: 30px;" alt="Couscous"></div>
            <div class="DishDescription">
                <div class="DishMaker">
                    <h3 style=" margin: 0px;">Dish Maker</h3>
                    <h3 style=" margin: 0px; ">1st December 2023</h3>
                </div>
                <hr />
                <div class="DishInfo">
                    <h3 style=" margin: 0px;">Couscous</h3>
                    <p style="text-align: justify;">
                        Couscous is a staple food throughout the Maghrebi cuisines of Algeria, Tunisia, Mauritania, Morocco, and Libya.
                        It was integrated into French and European cuisine at the beginning of the twentieth century, through the French
                        colonial empire and the Pieds-Noirs of Algeria. In 2020, couscous was added to UNESCO's Intangible Cultural Heritage list.
                    </p>
                    <button class="ReadMoreBtn">Read more</button>
                </div>

            </div>
        </div>
    </div>

    <hr />

    <footer class="footer-div" id="contact-me">
        <div>
            <h2>Contact me</h2>
            <p>mohamed.mahmoudi@ensia.edu.dz</p>
        </div>
    </footer>
    <script src="<?= My_Files_Root ?>assets/js/script.js"></script>

</body>

</html>