<!DOCTYPE html>
<html lang="ar">

<head>
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/styles.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Footer.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Successful_Projects.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Account_Page.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>حرفي</title>
</head>

<body>

    <?php include("../app/views/Header.php"); ?>
    <main>
        <!--Slider-->
        <?php include("../app/views/Slider.php"); ?>
        <!--Services-->
        <section class="Services">
            <div class="SearchServices" id="SearchServices">
                <input type="text" placeholder="Looking for a craftsman service...Start here!" class="SearchServicesTxtField" id="SearchServicesTxtField">
                <ul id="AutoComplete_Results" class="AutoComplete_Results"></ul>
            </div>
            <h1>الخدمات الأكثر طلبا</h1>
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
        <!--Succuessful_Projects-->
        <section class="Succuessful_Projects">
            <h1>مشاريع ناحجة</h1>
            <div class="Succuessful_Projects_Item">
                <div class="Succuessful_Projects_Image">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/projects/project1.jpg" alt="image1" />
                    <img src="<?= My_Files_Root ?>assets/IMAGES/projects/project2.jpg" alt="image2" />
                </div>
                <div className="Succuessful_Projects_Text">
                    <h2>ddddddddddddddddddd</h2>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto vel perspiciatis
                        deleniti hic explicabo quis eius quo fugiat blanditiis odit quod, veritatis
                        nesciunt maiores consectetur sint reiciendis nihil fuga. Pariatur?

                    </p>
                </div>
            </div>
            <div class="Succuessful_Projects_Item_Reverse">
                <div class="Succuessful_Projects_Image">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/projects/project3.jpg" alt="image1" />
                    <img src="<?= My_Files_Root ?>assets/IMAGES/projects/project4.jpg" alt="image2" />
                </div>
                <div className="Succuessful_Projects_Text">
                    <h2>ddddddddddddddddddd</h2>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto vel perspiciatis deleniti
                        hic explicabo quis eius quo fugiat blanditiis odit quod, veritatis nesciunt maiores
                        consectetur sint reiciendis nihil fuga. Pariatur?
                    </p>
                </div>
            </div>
            <div class="Succuessful_Projects_Item">
                <div class="Succuessful_Projects_Image">
                    <img src="<?= My_Files_Root ?>assets/IMAGES/projects/project5.jpg" alt="image1" />
                    <img src="<?= My_Files_Root ?>assets/IMAGES/projects/project6.jpg" alt="image2" />
                </div>
                <div className="Succuessful_Projects_Text">
                    <h2>ddddddddddddddddddd</h2>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto vel perspiciatis
                        deleniti hic explicabo quis eius quo fugiat blanditiis odit quod,
                        veritatis nesciunt maiores consectetur sint reiciendis nihil fuga. Pariatur?
                    </p>
                </div>
            </div>
        </section>

    </main>

    <?php include("../app/views/Footer.php"); ?>

    <script src="<?= My_Files_Root ?>assets/JS/script.js"></script>
    <script src="<?= My_Files_Root ?>assets/JS/Image_Slider.js"></script>
    <script src="<?= My_Files_Root ?>assets/JS/Search_Services.js"></script>
</body>

</html>