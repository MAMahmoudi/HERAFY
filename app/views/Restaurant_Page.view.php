<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/styles.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <?php
    include("Header.php");

    ?>

    <main>
        <!-- Cover and profile pic -->
        <div class="Cover_Image">
            <div><img src="<?= My_Files_Root ?>assets/images/home-bg.jpg" alt="background" height="400px" width="100%"></div>
            <img src="<?= My_Files_Root ?>assets/images/pic-3.png" alt="My photo" width="200px" class="User_Pic" />

            <nav class="NavBar">
                <button class="NavBarBtn">Post</button>
                <button class="NavBarBtn">Photos</button>
                <button class="NavBarBtn">Videos</button>
            </nav>
        </div>

        <!-- User space -->
        <div class="UserSpace">
            <div class="LeftNavBar">
                <ul class="LeftNavBarList">
                    <li class="LeftNavBarListItems">Item</li>
                    <li class="LeftNavBarListItems">Item</li>
                    <li class="LeftNavBarListItems">Item</li>
                    <li class="LeftNavBarListItems">Item</li>
                    <li class="LeftNavBarListItems">Item</li>
                </ul>


            </div>
            <div class="Posts">
                <div class="PostingPanel">
                    <textarea name="Post_Text_Area" placeholder="What's in your mind" cols="30" rows="10" class="Post_Text_Area"></textarea>
                    <input type="submit" value="Post" class="Post_Btn">
                </div>
                <div class="TimeLine">
                    <div class="Single_Post">
                        <div><img src="<?= My_Files_Root ?>assets/images/Cuscus.jpg" width="300" height="200" style="border-radius: 30px;" alt="Couscous"></div>
                        <hr />
                        <div class="DishDescription">
                            <!--
                            <div class="DishMaker">
                                <h3 style=" margin: 0px;">Dish Maker</h3>
                                <h3 style=" margin: 0px; ">1st December 2023</h3>
                            </div>
                            <hr/>
                            <div class="DishInfo">
                            <h3 style=" margin: 0px;">Couscous</h3>-->
                            <p style="text-align: justify;">
                                Couscous is a staple food throughout the Maghrebi cuisines of Algeria, Tunisia, Mauritania, Morocco, and Libya.
                                It was integrated into French and European cuisine at the beginning of the twentieth century, through the French
                                colonial empire and the Pieds-Noirs of Algeria. In 2020, couscous was added to UNESCO's Intangible Cultural Heritage list.
                            </p>
                        </div>
                        <br>
                    </div>

                    <div class="Single_Post">
                        <div><img src="<?= My_Files_Root ?>assets/images/Cuscus.jpg" width="300" height="200" style="border-radius: 30px;" alt="Couscous"></div>
                        <hr />
                        <div class="DishDescription">
                            <!--
                            <div class="DishMaker">
                                <h3 style=" margin: 0px;">Dish Maker</h3>
                                <h3 style=" margin: 0px; ">1st December 2023</h3>
                            </div>
                            <hr/>
                            <div class="DishInfo">
                            <h3 style=" margin: 0px;">Couscous</h3>-->
                            <p style="text-align: justify;">
                                Couscous is a staple food throughout the Maghrebi cuisines of Algeria, Tunisia, Mauritania, Morocco, and Libya.
                                It was integrated into French and European cuisine at the beginning of the twentieth century, through the French
                                colonial empire and the Pieds-Noirs of Algeria. In 2020, couscous was added to UNESCO's Intangible Cultural Heritage list.
                            </p>
                        </div>
                        <br>
                    </div>

                </div>
            </div>
        </div>

    </main>
    <?php
    include("Footer.php");
    ?>
</body>

</html>