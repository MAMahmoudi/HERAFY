<!DOCTYPE html>
<html lang="ar">

<head>
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/styles.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Footer.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>حرفي</title>
</head>

<body>
    <?php
    include("../app/views/Header.php");

    ?>
    <main>

        <?php
        include("../app/views/Slider.php");

        ?>

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