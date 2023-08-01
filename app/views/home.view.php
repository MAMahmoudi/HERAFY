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

        <section class="Services">

            <div class="SearchServices">
                <input type="text" placeholder="Search for your favorite restaurant or dish" class="SearchServicesTxtField">
            </div>

            <div class="MostSearchedServices">
                
                <div class="ServiceContainer">
                    <!-- <div class="ServiceName">Service1</div>  -->
                    <img src="<?= My_Files_Root ?>assets/images/services/service1.jpg" alt="Service1" class="ServiceImg" height="300px" width="250px">
                </div>

                <div class="ServiceContainer">
                    <!-- <div class="ServiceName">Service1</div>  -->
                    <img src="<?= My_Files_Root ?>assets/images/services/service1.jpg" alt="Service1" class="ServiceImg" height="300px" width="250px">
                </div>

            </div>


        </section>

    </main>
    <?php include("../app/views/Footer.php"); ?>

    <script src="<?= My_Files_Root ?>assets/js/script.js"></script>

</body>

</html>