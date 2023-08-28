<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/styles.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Footer.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Account_Page.css" />


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <?php include("../app/views/Header.php"); ?>
    <div class="Account_Page">
        <!--Right_Side_Bar-->
        <aside class="Right_Side_Bar">
            <div class="Profile_Box">
                <img src="<?= My_Files_Root ?>assets/IMAGES/slider-pages/slide-page1.jpg" width="100%" alt="slide-page1">
                <div class="Profile_Info">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/team/team1.jpg" alt="team1" id="Profile_Pic">
                    <h1>User 1</h1>
                    <h3>Carpenter</h3>
                    <ul>
                        <li>Your profile views <span>52</span></li>
                        <li>Your post views <span>52</span></li>
                        <li>Your connections<span>52</span></li>
                    </ul>
                </div>
            </div>
        </aside>
        <!--Main-->
        <main class="Main">
            <h1>Account_Page</h1>
        </main>
        <!--Left_Side_Bar-->
        <aside class="Left_Side_Bar"></aside>
    </div>
    <?php include("../app/views/Footer.php"); ?>

    <script src="<?= My_Files_Root ?>assets/JS/script.js"></script>
    <script src="<?= My_Files_Root ?>assets/JS/Account_Page.js"></script>
</body>

</html>