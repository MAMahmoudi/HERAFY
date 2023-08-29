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
        <img src="<?= My_Files_Root ?>assets/IMAGES/slider-pages/slide-page1.jpg" width="100%" height="300px" alt="slide-page1" class="Account_Page_Cover_Image">

        <!--Right_Side_Bar-->
        <aside class="Right_Side_Bar">
            <div class="Profile_Box">
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
                <div class="Profile_Link">
                    <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/items.png" alt="items">My items</a>
                    <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/premium.png" alt="premium">Try premium</a>
                </div>
            </div>
            <div class="Profile_Activity">
                <h3>RECENT</h3>
                <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/recent.png" alt="recent">NADJAR</a>
                <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/recent.png" alt="recent">NADJAR</a>
                <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/recent.png" alt="recent">NADJAR</a>
                <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/recent.png" alt="recent">NADJAR</a>
                <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/recent.png" alt="recent">NADJAR</a>
                <h3>GROUPS</h3>
                <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/group.png" alt="group">NADJAR GROUPS</a>
                <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/group.png" alt="group">NADJAR GROUPS</a>
                <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/group.png" alt="group">NADJAR GROUPS</a>
                <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/group.png" alt="group">NADJAR GROUPS</a>
                <h3>HASHTAG</h3>
                <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/hashtag.png" alt="hashtag">NADJAR GROUPS</a>
                <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/hashtag.png" alt="hashtag">NADJAR GROUPS</a>
                <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/hashtag.png" alt="hashtag">NADJAR GROUPS</a>
                <a href="#"><img src="<?= My_Files_Root ?>assets/IMAGES/hashtag.png" alt="hashtag">NADJAR GROUPS</a>
                <div class="Profile_Discover_More">
                    <a href="#">Discover More</a>
                </div>
            </div>
        </aside>
        <!--Main-->
        <main class="Main">
            <div class="Profile_Post">
                <div class="Profile_Post_Input">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/user-1.png" alt="user-1">
                    <textarea rows="2" placeholder="Write something"></textarea>
                </div>
                <div class="Profile_Post_Links">
                    <li><img src="<?= My_Files_Root ?>assets/IMAGES/photo.png" alt="photo">Photo</li>
                    <li><img src="<?= My_Files_Root ?>assets/IMAGES/video.png" alt="photo">Video</li>
                    <li><img src="<?= My_Files_Root ?>assets/IMAGES/event.png" alt="photo">Event</li>
                    <li>Post</li>
                </div>
            </div>
            <div class="Profile_Post_Sort_By">
                <hr>
                <p>ترتيب حسب: <span> أعلى <img src="<?= My_Files_Root ?>assets/IMAGES/down-arrow.png" alt="down-arrow"></span></p>
            </div>
            <div class="Profile_Single_Post">
                <div class="Post_Author">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/user-3.png" alt="user-3">
                    <div>
                        <h1>Kadouri Karima</h1>
                        <small>tesna3 makroud 3andeha hanout kbir</small>
                        <small>2 hours ago</small>
                    </div>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Iusto, eaque eum ab eius modi nisi quasi repellendus
                    officiis eligendi veritatis vitae neque ducimus?
                    Quos vel, officia dolorum nisi facere ea.
                </p>
                <img src="<?= My_Files_Root ?>assets/IMAGES/post-image-3.png" alt="post-image-3" width="100%">
                <div class="Profile_Post_Stat">
                    <div>
                        <span class="Profile_Post_Likers">Mourad and others</span>
                        <img src="<?= My_Files_Root ?>assets/IMAGES/thumbsup.png" alt="thumbsup">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/love.png" alt="love">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/clap.png" alt="clap">
                    </div>
                    <div>
                        <span>22 comments &middot; 40 shares</span>
                    </div>
                </div>
                <div class="Profile_Post_Activity">
                    <div>
                        <img src="<?= My_Files_Root ?>assets/IMAGES/down-arrow.png" alt="down-arrow" class="Profile_Post_Activity_Arrow_Icon">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/user-1.png" alt="user-1" class="Profile_Post_Activity_User_Icon">
                    </div>
                    <div class="Profile_Post_Activity_Link">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/like.png" alt="like">
                        <span>Like</span>
                    </div>
                    <div class="Profile_Post_Activity_Link">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/comment.png" alt="comment">
                        <span>Comment</span>
                    </div>
                    <div class="Profile_Post_Activity_Link">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/share.png" alt="share">
                        <span>Share</span>
                    </div>
                    <div class="Profile_Post_Activity_Link">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/send.png" alt="send">
                        <span>Send</span>
                    </div>
                </div>
            </div>
            <div class="Profile_Single_Post">
                <div class="Post_Author">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/user-3.png" alt="user-3">
                    <div>
                        <h1>Kadouri Karima</h1>
                        <small>tesna3 makroud 3andeha hanout kbir</small>
                        <small>2 hours ago</small>
                    </div>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Iusto, eaque eum ab eius modi nisi quasi repellendus
                    officiis eligendi veritatis vitae neque ducimus?
                    Quos vel, officia dolorum nisi facere ea.
                </p>
                <img src="<?= My_Files_Root ?>assets/IMAGES/post-image-3.png" alt="post-image-3" width="100%">
                <div class="Profile_Post_Stat">
                    <div>
                        <span class="Profile_Post_Likers">Mourad and others</span>
                        <img src="<?= My_Files_Root ?>assets/IMAGES/thumbsup.png" alt="thumbsup">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/love.png" alt="love">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/clap.png" alt="clap">
                    </div>
                    <div>
                        <span>22 comments &middot; 40 shares</span>
                    </div>
                </div>
                <div class="Profile_Post_Activity">
                    <div>
                        <img src="<?= My_Files_Root ?>assets/IMAGES/down-arrow.png" alt="down-arrow" class="Profile_Post_Activity_Arrow_Icon">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/user-1.png" alt="user-1" class="Profile_Post_Activity_User_Icon">
                    </div>
                    <div class="Profile_Post_Activity_Link">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/like.png" alt="like">
                        <span>Like</span>
                    </div>
                    <div class="Profile_Post_Activity_Link">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/comment.png" alt="comment">
                        <span>Comment</span>
                    </div>
                    <div class="Profile_Post_Activity_Link">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/share.png" alt="share">
                        <span>Share</span>
                    </div>
                    <div class="Profile_Post_Activity_Link">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/send.png" alt="send">
                        <span>Send</span>
                    </div>
                </div>
            </div>
            <div class="Profile_Single_Post">
                <div class="Post_Author">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/user-3.png" alt="user-3">
                    <div>
                        <h1>Kadouri Karima</h1>
                        <small>tesna3 makroud 3andeha hanout kbir</small>
                        <small>2 hours ago</small>
                    </div>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Iusto, eaque eum ab eius modi nisi quasi repellendus
                    officiis eligendi veritatis vitae neque ducimus?
                    Quos vel, officia dolorum nisi facere ea.
                </p>
                <img src="<?= My_Files_Root ?>assets/IMAGES/post-image-3.png" alt="post-image-3" width="100%">
                <div class="Profile_Post_Stat">
                    <div>
                        <span class="Profile_Post_Likers">Mourad and others</span>
                        <img src="<?= My_Files_Root ?>assets/IMAGES/thumbsup.png" alt="thumbsup">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/love.png" alt="love">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/clap.png" alt="clap">
                    </div>
                    <div>
                        <span>22 comments &middot; 40 shares</span>
                    </div>
                </div>
                <div class="Profile_Post_Activity">
                    <div>
                        <img src="<?= My_Files_Root ?>assets/IMAGES/down-arrow.png" alt="down-arrow" class="Profile_Post_Activity_Arrow_Icon">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/user-1.png" alt="user-1" class="Profile_Post_Activity_User_Icon">
                    </div>
                    <div class="Profile_Post_Activity_Link">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/like.png" alt="like">
                        <span>Like</span>
                    </div>
                    <div class="Profile_Post_Activity_Link">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/comment.png" alt="comment">
                        <span>Comment</span>
                    </div>
                    <div class="Profile_Post_Activity_Link">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/share.png" alt="share">
                        <span>Share</span>
                    </div>
                    <div class="Profile_Post_Activity_Link">
                        <img src="<?= My_Files_Root ?>assets/IMAGES/send.png" alt="send">
                        <span>Send</span>
                    </div>
                </div>
            </div>


        </main>
        <!--Left_Side_Bar-->
        <aside class="Left_Side_Bar">
            <div class="Profile_News">
                <img src="<?= My_Files_Root ?>assets/IMAGES/more.png" alt="more" class="Profile_Info_Icon">
                <h3>أخبار</h3>
                <a href="#">Lorem ipsum dolor</a>
                <span>1d ago &middot; 10,934 readers</span>
                <a href="#">Lorem ipsum dolor</a>
                <span>1d ago &middot; 10,934 readers</span>
                <a href="#">Lorem ipsum dolor</a>
                <span>1d ago &middot; 10,934 readers</span>

                <a href="#" class="Profile_Read_More_Link">Read more</a>
            </div>

            <div class="Profile_Add">
                <small>Ad &middot; &middot; &middot;</small>
                <p>lmcmcmcmcmcm</p>
                <div>
                    <img src="<?= My_Files_Root ?>assets/IMAGES/user-1.png" alt="user-1">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/mi-logo.png" alt="mi-logo">
                </div>
                <b>Brand and ssssssss</b>
                <a href="#" class="Profile_Ad_Link">Learn more</a>
            </div>
            <div class="Profile_Useful_Links">
                <a href="#">About</a>
                <a href="#">Accessibility</a>
                <a href="#">Help center</a>
                <a href="#">Privacy policy</a>
                <a href="#">Advertising</a>
                <a href="#">Get the App</a>
                <a href="#">More</a>
                <div class="Profile_Copyright">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/logo.png" alt="Logo">
                    <p>HERAFY &#169; 2023. All right reserved.</p>
                </div>
            </div>
        </aside>
    </div>
    <?php include("../app/views/Footer.php"); ?>

    <script src="<?= My_Files_Root ?>assets/JS/script.js"></script>
    <script src="<?= My_Files_Root ?>assets/JS/Account_Page.js"></script>
</body>

</html>