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
    include("../app/views/Header.php");

    ?>

    <main>
        <!-- Cover and profile pic -->
        <div class="Cover_Image_Div">
            <div><img src="<?= My_Files_Root ?>assets/IMAGES/banner/banner1.jpg" alt="background" height="400px" width="100%"></div>
            <img src="<?= My_Files_Root ?>assets/images/team/team6.jpg" alt="My photo" width="150px" height="150px" class="User_Pic" />

            <nav class="NavBar">
                <button class="NavBarBtn">Post</button>
                <button class="NavBarBtn">Photos</button>
                <button class="NavBarBtn">Videos</button>
            </nav>
        </div>

        <!-- User space -->
        <div class="UserSpace">
            <aside class="LeftNavBar">
                <ul class="LeftNavBarList">
                    <li class="LeftNavBarListItems">Item</li>
                    <li class="LeftNavBarListItems">Item</li>
                    <li class="LeftNavBarListItems">Item</li>
                    <li class="LeftNavBarListItems">Item</li>
                    <li class="LeftNavBarListItems">Item</li>
                </ul>
            </aside>
            <div class="Posts">
                <div class="PostingPanel">
                    <textarea name="Post_Text_Area" placeholder="What's in your mind" cols="30" rows="10" class="Post_Text_Area"></textarea>
                    <input type="submit" value="Post" class="Post_Btn">
                </div>
                <div class="TimeLine">
                    <div class="Single_Post">
                        <div>
                            <img class="Post_Image" id="Post_Image" src="<?= My_Files_Root ?>assets/images/projects/project1.jpg" width="300" height="200" alt="Couscous">
                        </div>
                        <div class="Post_Description">
                            <p style="text-align: justify;">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia cupiditate delectus in animi enim labore id! A cum voluptate, dolor accusamus eligendi, molestias omnis eos voluptatum saepe quibusdam iste sint.
                            </p>
                        </div>
                    </div>

                    <div class="Single_Post">
                        <div>
                            <img class="Post_Image" id="Post_Image" src="<?= My_Files_Root ?>assets/images/projects/project2.jpg" width="300" height="200" alt="Couscous">
                        </div>
                        <div class="Post_Description">
                            <p style="text-align: justify;">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia cupiditate delectus in animi enim labore id! A cum voluptate, dolor accusamus eligendi, molestias omnis eos voluptatum saepe quibusdam iste sint.
                            </p>
                        </div>
                    </div>

                    <div class="Single_Post">
                        <div>
                            <img class="Post_Image" id="Post_Image" src="<?= My_Files_Root ?>assets/images/projects/project3.jpg" width="300" height="200" alt="Couscous">
                        </div>
                        <div class="Post_Description">
                            <p style="text-align: justify;">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia cupiditate delectus in animi enim labore id! A cum voluptate, dolor accusamus eligendi, molestias omnis eos voluptatum saepe quibusdam iste sint.
                            </p>
                        </div>
                    </div>

                    <div class="Single_Post">
                        <div>
                            <img class="Post_Image" id="Post_Image" src="<?= My_Files_Root ?>assets/images/projects/project4.jpg" width="300" height="200" alt="Couscous">
                        </div>
                        <div class="Post_Description">
                            <p style="text-align: justify;">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia cupiditate delectus in animi enim labore id! A cum voluptate, dolor accusamus eligendi, molestias omnis eos voluptatum saepe quibusdam iste sint.
                            </p>
                        </div>
                    </div>

                    <div class="Single_Post">
                        <div>
                            <img class="Post_Image" id="Post_Image" src="<?= My_Files_Root ?>assets/images/projects/project5.jpg" width="300" height="200" alt="Couscous">
                        </div>
                        <div class="Post_Description">
                            <p style="text-align: justify;">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia cupiditate delectus in animi enim labore id! A cum voluptate, dolor accusamus eligendi, molestias omnis eos voluptatum saepe quibusdam iste sint.
                            </p>
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </main>

    <?php include("../app/views/Footer.php"); ?>

    <script src="<?= My_Files_Root ?>assets/JS/script.js"></script>

</body>

</html>