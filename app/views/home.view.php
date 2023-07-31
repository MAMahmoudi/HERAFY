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
    <main>

        <section class="Cover">
            <div>
                <img src="<?= My_Files_Root ?>assets/images/nadjar.jpg" alt="background" height="600px" width="100%">
            </div>

        </section>

        <hr />
        <section class="Ad">
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
        </section>

        <hr />
    </main>
    <?php include("../app/views/Footer.php"); ?>

    <script src="<?= My_Files_Root ?>assets/js/script.js"></script>

</body>

</html>