<!DOCTYPE html>
<html lang="ar">

<?php $Page_Title = 'الخلاصة'; $Page_Styles = ['Account_Page']; include(__DIR__ . '/Head.php'); ?>

<body>
    <?php include(__DIR__ . '/Header.php'); ?>
    <?php $Return_To = 'Account_Page'; ?>
    <div class="Account_Page">
        <img src="<?= Asset($Profile['cover'], 'assets/IMAGES/slider-pages/slide-page1.jpg') ?>" width="100%" height="300" alt="" class="Account_Page_Cover_Image">
        <!--Right_Side_Bar-->
        <aside class="Right_Side_Bar">
            <div class="Profile_Box">
                <div class="Profile_Info">
                    <img src="<?= Asset($User['avatar']) ?>" alt="" id="Profile_Pic">
                    <h1><?= Esc($User['name']) ?></h1>
                    <h3><?= Esc($User['type'] === 'company' ? 'شركة' : ($Profile['service_name'] ?? 'حرفي')) ?></h3>
                    <ul>
                        <?php foreach ($Stats as $Label => $Value) : ?>
                            <li><?= Esc($Label) ?> <span><?= (int)$Value ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="Profile_Link">
                    <a href="<?= Own_Page_Url() ?>"><img src="<?= Asset('assets/IMAGES/items.png') ?>" alt="">صفحتي</a>
                    <a href="<?= Url('DashBoard') ?>"><img src="<?= Asset('assets/IMAGES/setting.png') ?>" alt="">الإعدادات</a>
                </div>
            </div>
            <div class="Profile_Activity">
                <h3>الحرف الأكثر طلبا</h3>
                <?php foreach ($Services as $Service) : ?>
                    <a href="<?= Url('Search?service=' . $Service['id']) ?>"><img src="<?= Asset('assets/IMAGES/hashtag.png') ?>" alt=""><?= Esc($Service['name']) ?></a>
                <?php endforeach; ?>
                <div class="Profile_Discover_More">
                    <a href="<?= Url('Search') ?>">اكتشف المزيد</a>
                </div>
            </div>
        </aside>
        <!--Main-->
        <main class="Main">
            <?php include(__DIR__ . '/Post_Form.php'); ?>
            <div class="Profile_Post_Sort_By">
                <hr>
                <p>آخر المنشورات</p>
            </div>
            <?php foreach ($Posts as $Post) : ?>
                <?php include(__DIR__ . '/Post_Card.php'); ?>
            <?php endforeach; ?>
            <?php if (!$Posts) : ?>
                <p class="Empty_State">لا توجد منشورات بعد، كن أول من ينشر!</p>
            <?php endif; ?>
        </main>
        <!--Left_Side_Bar-->
        <aside class="Left_Side_Bar">
            <?php include(__DIR__ . '/People.php'); ?>
            <?php include(__DIR__ . '/Product_Ad.php'); ?>
            <?php include(__DIR__ . '/Useful_Links.php'); ?>
        </aside>
    </div>
    <?php include(__DIR__ . '/Footer.php'); ?>

    <script src="<?= Asset('assets/JS/script.js') ?>"></script>
</body>

</html>
