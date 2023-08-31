<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/styles.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Header.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Footer.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Profile.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Account_Page.css" />


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
                <a href="#" class="Profile_Page_Description_See_More_Link">See more</a>
            </div>

            <div class="Profile_Page_Description">
                <h2>khebra</h2>
                <div class="Profile_Page_Description_Item">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/microsoft.png" alt="microsoft">
                    <div>
                        <h3>Nadjar 3and microsoft</h3>
                        <b>microsoft &middot; Full time</b>
                        <b>Melbekri &middot;</b>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Quis delectus repellendus
                            impedit illo accusamus. Assumenda vel
                            consectetur quaerat temporibus nam
                            voluptatum pariatur, minus reprehenderit
                            dignissimos saepe, porro dolore labore
                            aliquam!
                        </p>
                        <hr>
                    </div>
                </div>

                <div class="Profile_Page_Description_Item">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/slack.png" alt="microsoft">
                    <div>
                        <h3>Nadjar 3and microsoft</h3>
                        <b>microsoft &middot; Full time</b>
                        <b>Melbekri &middot;</b>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Quis delectus repellendus
                            impedit illo accusamus. Assumenda vel
                            consectetur quaerat temporibus nam
                            voluptatum pariatur, minus reprehenderit
                            dignissimos saepe, porro dolore labore
                            aliquam!
                        </p>
                        <hr>
                    </div>
                </div>

                <div class="Profile_Page_Description_Item">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/google.png" alt="microsoft">
                    <div>
                        <h3>Nadjar 3and microsoft</h3>
                        <b>microsoft &middot; Full time</b>
                        <b>Melbekri &middot;</b>
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
                </div>
                <hr>
                <a href="#" class="Profile_Page_Experience_Link">Show all experiences <img src="<?= My_Files_Root ?>assets/IMAGES/right-arrow.png" alt="left arrow"> </a>
            </div>
            <div class="Profile_Page_Description">
                <h2>KRAYA</h2>
                <div class="Profile_Page_Description_Item">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/stanford.png" alt="microsoft">
                    <div>
                        <h3>kari fi Stanford</h3>
                        <b>Stanford &middot; Full time</b>
                        <b>Melbekri &middot;</b>
                        <hr>
                    </div>
                </div>

                <div class="Profile_Page_Description_Item">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/north.png" alt="microsoft">
                    <div>
                        <h3>kari fi Stanford</h3>
                        <b>Stanford &middot; Full time</b>
                        <b>Melbekri &middot;</b>
                        <hr>
                    </div>
                </div>

                <div class="Profile_Page_Description_Item">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/mit.png" alt="microsoft">
                    <div>
                        <h3>kari fi Stanford</h3>
                        <b>Stanford &middot; Full time</b>
                        <b>Melbekri &middot;</b>
                    </div>
                </div>
                <hr>
            </div>
            <div class="Profile_Page_Description">
                <h2>Skills</h2>
                <a href="#" class="Profile_Page_Skills_Btn">kolchi</a>
                <a href="#" class="Profile_Page_Skills_Btn">na3raf</a>
                <a href="#" class="Profile_Page_Skills_Btn">ndirah</a>
                <a href="#" class="Profile_Page_Skills_Btn">t3alemt</a>
                <a href="#" class="Profile_Page_Skills_Btn">ghir</a>
                <a href="#" class="Profile_Page_Skills_Btn">wahdi</a>
                <a href="#" class="Profile_Page_Skills_Btn">fi darna</a>
                <a href="#" class="Profile_Page_Skills_Btn">ma werani</a>
                <a href="#" class="Profile_Page_Skills_Btn">hta had</a>
            </div>
            <div class="Profile_Page_Description">
                <h2>Languages</h2>
                <a href="#" class="Profile_Page_Languages_Btn">na3raf</a>
                <a href="#" class="Profile_Page_Languages_Btn">nahdar</a>
                <a href="#" class="Profile_Page_Languages_Btn">ba3</a>
                <a href="#" class="Profile_Page_Languages_Btn">loghat</a>
            </div>
        </main>
        <!--Profile_Page_Left_Side_Bar-->
        <aside class="Profile_Page_Left_Side_Bar">
            <div class="Profile_Ad">
                <small>Ad &middot; &middot; &middot;</small>
                <p>lmcmcmcmcmcm</p>
                <div>
                    <img src="<?= My_Files_Root ?>assets/IMAGES/user-1.png" alt="user-1">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/mi-logo.png" alt="mi-logo">
                </div>
                <b>Brand and ssssssss</b>
                <a href="#" class="Profile_Ad_Link">Learn more</a>
            </div>
            <div class="Profile_Page_Left_Side_Bar_People">
                <h3>People you may know</h3>
                <div class="Profile_Page_Left_Side_Bar_People_Item">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/user-3.png" alt="user-3">
                    <div>
                        <h2>Benamar Hamida</h2>
                        <p>Chef ta3 wahd lhanout</p>
                        <a href="#">Connect</a>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <?php include("../app/views/Footer.php"); ?>

    <script src="<?= My_Files_Root ?>assets/JS/script.js"></script>
</body>

</html>