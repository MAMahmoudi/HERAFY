<!DOCTYPE html>
<html lang="ar">

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
    <main>

        <section class="Cover">
            <div class="Slides_Container_Div">
                <img src="<?= My_Files_Root ?>assets/images/slider-main/bg1.jpg" alt="background" height="600px" width="100%">

                <!--
                <ul class="Slides_Container" id="Slides_Container">
                    <li class="Slide"><img src="<?= My_Files_Root ?>assets/images/slider-main/bg1.jpg" alt="background" height="600px" width="100%"></li>
                    <li class="Slide"><img src="<?= My_Files_Root ?>assets/images/slider-main/bg2.jpg" alt="background" height="600px" width="100%"></li>
                    <li class="Slide"><img src="<?= My_Files_Root ?>assets/images/slider-main/bg3.jpg" alt="background" height="600px" width="100%"></li>
                    <li class="Slide"><img src="<?= My_Files_Root ?>assets/images/slider-main/bg4.jpg" alt="background" height="600px" width="100%"></li>
                    <li class="Slide"><img src="<?= My_Files_Root ?>assets/images/slider-main/bg5.jpg" alt="background" height="600px" width="100%"></li>
                </ul>
                <a href="#" id="Previous"><img src="<?= My_Files_Root ?>assets/images/arrow-left-out.svg" alt="Previous"></a>
                <a href="#" id="Next"><img src="<?= My_Files_Root ?>assets/images/arrow-right-out.svg" alt="Next"></a>
                -->
            </div>
        </section>

        <section class="Services">

            <div class="SearchServices">
                <input type="text" placeholder="Looking for a craftsman service...Start here!" class="SearchServicesTxtField" id="SearchServicesTxtField">
                <ul id="AutoComplete_Results" class="AutoComplete_Results"></ul>
            </div>

            <div class="MostSearchedServices">

                <div class="ServiceContainer">
                    <h3>Service1</h3>
                </div>

                <div class="ServiceContainer">
                    <h3>Service1</h3>
                </div>

                <div class="ServiceContainer">
                    <h3>Service1</h3>
                </div>
                <div class="ServiceContainer">
                    <h3>Service1</h3>
                </div>

                <div class="ServiceContainer">
                    <h3>Service1</h3>
                </div>

                <div class="ServiceContainer">
                    <h3>Service1</h3>
                </div>

            </div>


        </section>

    </main>
    <?php include("../app/views/Footer.php"); ?>

    <script src="<?= My_Files_Root ?>assets/JS/script.js"></script>

</body>

</html>