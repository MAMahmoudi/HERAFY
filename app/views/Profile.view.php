<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/styles.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Header.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Footer.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Profile.css" />


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <?php include("../app/views/Header.php"); ?>
    <div class="Profile_Page">
        <img src="<?= My_Files_Root ?>assets/IMAGES/slider-pages/slide-page1.jpg" width="100%" height="300px" alt="slide-page1" class="Profile_Page_Cover_Image">

        <main class="Profile_Page_Main">
            <div class="Profile_Page_Inner">
                <img src="<?= My_Files_Root ?>assets/IMAGES/user-1.png" alt="user-1" class="Profile_Pic">
                <h1>John Doe</h1>
                <b>Plumber at Lorem ipsum dolor sit amet, consectetur adipisicing </b>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing <a href="#">Contact info</a> </p>
            </div>

        </main>
        <aside class="Profile_Page_Right_Side_Bar"></aside>
    </div>
    <?php include("../app/views/Footer.php"); ?>

    <script src="<?= My_Files_Root ?>assets/JS/script.js"></script>
</body>

</html>