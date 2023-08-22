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
            <div>
                <img src="<?= My_Files_Root ?>assets/images/nadjar.jpg" alt="background" height="600px" width="100%">
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