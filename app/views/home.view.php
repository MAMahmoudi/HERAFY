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
                <div class="Slider">
                    <img class="Slides_Previous_Btn" id="Slides_Previous_Btn" src="<?= My_Files_Root ?>assets/images/arrow-left-out.svg" alt="Previous">
                    <div class="Slides_Container">
                        <div class="Slide"><img src="<?= My_Files_Root ?>assets/images/slider-main/bg1.jpg" alt="background" height="600px" width="100%"></div>
                        <div class="Slide"><img src="<?= My_Files_Root ?>assets/images/slider-main/bg2.jpg" alt="background" height="600px" width="100%"></div>
                        <div class="Slide"><img src="<?= My_Files_Root ?>assets/images/slider-main/bg3.jpg" alt="background" height="600px" width="100%"></div>
                        <div class="Slide"><img src="<?= My_Files_Root ?>assets/images/slider-main/bg4.jpg" alt="background" height="600px" width="100%"></div>
                        <div class="Slide"><img src="<?= My_Files_Root ?>assets/images/slider-main/bg5.jpg" alt="background" height="600px" width="100%"></div>
                    </div>
                    <img class="Slides_Next_Btn" id="Slides_Next_Btn" src="<?= My_Files_Root ?>assets/images/arrow-right-out.svg" alt="Next">
                    <!-- If we need pagination 
                    <div class="swiper-pagination"></div>
-->
                    <!-- If we need navigation buttons -->



                </div>

            </div>
        </section>

        <section class="Services">

            <div class="SearchServices" id="SearchServices">
                <input type="text" placeholder="Looking for a craftsman service...Start here!" class="SearchServicesTxtField" id="SearchServicesTxtField">
                <ul id="AutoComplete_Results" class="AutoComplete_Results"></ul>
            </div>

            <div class="MostSearchedServices">

                <div class="ServiceContainer">
                    <h3 class="ServiceName">Service1</h3>
                </div>

                <div class="ServiceContainer">
                    <h3 class="ServiceName">Service1</h3>
                </div>

                <div class="ServiceContainer">
                    <h3 class="ServiceName">Service1</h3>
                </div>
                <div class="ServiceContainer">
                    <h3 class="ServiceName">Service1</h3>
                </div>

                <div class="ServiceContainer">
                    <h3 class="ServiceName">Service1</h3>
                </div>

                <div class="ServiceContainer">
                    <h3 class="ServiceName">Service1</h3>
                </div>
            </div>
        </section>
    </main>
    <?php include("../app/views/Footer.php"); ?>

    <script src="<?= My_Files_Root ?>assets/JS/script.js"></script>
</body>

</html>