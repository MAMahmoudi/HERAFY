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
        <!--Profile_Page_Main-->
        <main class="Profile_Page_Main">
            <div class="Profile_Page_Inner">
                <img src="<?= My_Files_Root ?>assets/IMAGES/user-1.png" alt="user-1" class="Profile_Pic">
                <h1>John Doe</h1>
                <b>Plumber at Lorem ipsum dolor sit amet, consectetur adipisicing </b>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing <a href="#">Contact info</a> </p>
                <div class="Profile_Page_Mutual_Connection">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/user-2.png" alt="user-2">
                    <span>1 mutual connection: Kadour Hamdani</span>
                </div>
                <div class="Profile_Page_Buttons">
                    <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/connect.png" alt="connect">Connect</a>
                    <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/message.png" alt="message">Message</a>
                </div>
            </div>
            <div class="Profile_Page_Description">
                <h2>About</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Quis delectus repellendus
                    impedit illo accusamus. Assumenda vel
                    consectetur quaerat temporibus nam
                    voluptatum pariatur, minus reprehenderit
                    dignissimos saepe, porro dolore labore
                    aliquam!
                </p>
            </div>
        </main>
        <!--Profile_Page_Left_Side_Bar-->
        <aside class="Profile_Page_Left_Side_Bar"></aside>
    </div>
    <?php include("../app/views/Footer.php"); ?>

    <script src="<?= My_Files_Root ?>assets/JS/script.js"></script>
</body>

</html>