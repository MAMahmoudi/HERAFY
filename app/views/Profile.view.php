<!DOCTYPE html>
<html lang="ar">

<?php
$Full_Name = $Profile['first_name'] . ' ' . $Profile['last_name'];
$Page_Title = $Full_Name;
$Page_Styles = ['Account_Page', 'Profile'];
include(__DIR__ . '/Head.php');
?>

<body>
    <?php include(__DIR__ . '/Header.php'); ?>
    <?php $Return_To = 'Profile/' . $Profile['id']; ?>
    <div class="Profile_Page">
        <img src="<?= Asset($Profile['cover'], 'assets/IMAGES/slider-pages/slide-page1.jpg') ?>" width="100%" height="300" alt="" class="Profile_Page_Cover_Image">
        <!--Profile_Page_Main-->
        <main class="Profile_Page_Main">
            <div class="Profile_Page_Inner">
                <img src="<?= Asset($Profile['avatar']) ?>" alt="" class="Profile_Pic">
                <h1><?= Esc($Full_Name) ?></h1>
                <b><?= Esc($Profile['service_name'] ?? 'حرفي') ?><?= $Profile['city'] ? ' &middot; ' . Esc($Profile['city']) : '' ?></b>
                <p class="Profile_Contact">
                    <?php if ($Profile['phone']) : ?>
                        <a href="tel:<?= Esc(str_replace(' ', '', $Profile['phone'])) ?>"><i class="fa-solid fa-phone"></i> <bdi dir="ltr"><?= Esc($Profile['phone']) ?></bdi></a>
                    <?php endif; ?>
                    <a href="mailto:<?= Esc($Profile['email']) ?>"><i class="fa-solid fa-envelope"></i> <?= Esc($Profile['email']) ?></a>
                </p>
                <div class="Profile_Page_Mutual_Connection">
                    <span><?= (int)$Profile['profile_views'] ?> مشاهدة للملف &middot; عضو منذ <?= Esc(date('Y', strtotime($Profile['created_at']))) ?></span>
                </div>
                <div class="Profile_Page_Buttons">
                    <?php if ($Is_Owner) : ?>
                        <a href="<?= Url('DashBoard') ?>"><img src="<?= Asset('assets/IMAGES/setting.png') ?>" alt="">تعديل الملف</a>
                    <?php elseif (Is_Logged_In('company')) : ?>
                        <form method="POST" action="<?= Url('Profile/sponsor/' . $Profile['id']) ?>">
                            <?= Csrf_Field() ?>
                            <button type="submit"><img src="<?= Asset('assets/IMAGES/connect.png') ?>" alt=""><?= $Is_Sponsor ? 'إلغاء الرعاية' : 'رعاية هذا الحرفي' ?></button>
                        </form>
                    <?php endif; ?>
                    <?php if (!$Is_Owner && $Profile['phone']) : ?>
                        <a href="tel:<?= Esc(str_replace(' ', '', $Profile['phone'])) ?>"><img src="<?= Asset('assets/IMAGES/message.png') ?>" alt="">اتصل</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="Profile_Page_Description">
                <h2>نبذة</h2>
                <p><?= $Profile['bio'] ? nl2br(Esc($Profile['bio'])) : 'لم يضف هذا الحرفي نبذة بعد.' ?></p>
            </div>

            <?php if ($Sponsors) : ?>
                <div class="Profile_Page_Description">
                    <h2>الشركات الراعية</h2>
                    <?php foreach ($Sponsors as $Sponsor) : ?>
                        <div class="Profile_Page_Description_Item">
                            <img src="<?= Asset($Sponsor['logo'], 'assets/IMAGES/logo.png') ?>" alt="">
                            <div>
                                <h3><a href="<?= Url('Company_Page/' . $Sponsor['id']) ?>"><?= Esc($Sponsor['name']) ?></a></h3>
                                <hr>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="Profile_Page_Description Profile_Portfolio">
                <h2>الأعمال المنجزة</h2>
                <?php if ($Is_Owner) : ?>
                    <?php include(__DIR__ . '/Post_Form.php'); ?>
                <?php endif; ?>
                <?php foreach ($Posts as $Post) : ?>
                    <?php include(__DIR__ . '/Post_Card.php'); ?>
                <?php endforeach; ?>
                <?php if (!$Posts) : ?>
                    <p class="Empty_State">لا توجد أعمال منشورة بعد.</p>
                <?php endif; ?>
            </div>
        </main>
        <!--Profile_Page_Left_Side_Bar-->
        <aside class="Profile_Page_Left_Side_Bar">
            <?php include(__DIR__ . '/Product_Ad.php'); ?>
            <?php include(__DIR__ . '/People.php'); ?>
        </aside>
        <div class="Profile_Page_Bottom_Bar">
            <?php include(__DIR__ . '/Useful_Links.php'); ?>
        </div>
    </div>
    <?php include(__DIR__ . '/Footer.php'); ?>

    <script src="<?= Asset('assets/JS/script.js') ?>"></script>
</body>

</html>
