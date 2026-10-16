<!DOCTYPE html>
<html lang="ar">

<?php $Page_Title = $Company['name']; $Page_Styles = ['Account_Page']; include(__DIR__ . '/Head.php'); ?>

<body>
    <?php include(__DIR__ . '/Header.php'); ?>
    <?php $Page_Url = 'Company_Page/' . $Company['id']; $Return_To = $Page_Url . '?tab=posts'; ?>

    <main>
        <!-- Cover and logo -->
        <div class="Cover_Image_Div">
            <div><img src="<?= Asset($Company['cover'], 'assets/IMAGES/banner/banner1.jpg') ?>" alt="" height="400" width="100%" class="Company_Cover"></div>
            <img src="<?= Asset($Company['logo'], 'assets/IMAGES/logo.png') ?>" alt="<?= Esc($Company['name']) ?>" width="150" height="150" class="User_Pic" />

            <nav class="NavBar">
                <a class="NavBarBtn <?= $Tab === 'products' ? 'Active' : '' ?>" href="<?= Url($Page_Url . '?tab=products') ?>">المنتجات (<?= count($Products) ?>)</a>
                <a class="NavBarBtn <?= $Tab === 'posts' ? 'Active' : '' ?>" href="<?= Url($Page_Url . '?tab=posts') ?>">المنشورات (<?= count($Posts) ?>)</a>
                <a class="NavBarBtn <?= $Tab === 'sponsored' ? 'Active' : '' ?>" href="<?= Url($Page_Url . '?tab=sponsored') ?>">الحرفيون المدعومون (<?= count($Sponsored) ?>)</a>
            </nav>
        </div>

        <!-- Company space -->
        <div class="UserSpace">
            <aside class="LeftNavBar Company_Info">
                <h1><?= Esc($Company['name']) ?></h1>
                <p><?= $Company['description'] ? nl2br(Esc($Company['description'])) : 'لم تضف هذه الشركة وصفا بعد.' ?></p>
                <ul class="LeftNavBarList">
                    <?php if ($Company['city']) : ?>
                        <li class="LeftNavBarListItems"><i class="fa-solid fa-location-dot"></i> <?= Esc($Company['city']) ?></li>
                    <?php endif; ?>
                    <?php if ($Company['phone']) : ?>
                        <li class="LeftNavBarListItems"><i class="fa-solid fa-phone"></i> <a href="tel:<?= Esc(str_replace(' ', '', $Company['phone'])) ?>"><bdi dir="ltr"><?= Esc($Company['phone']) ?></bdi></a></li>
                    <?php endif; ?>
                    <li class="LeftNavBarListItems"><i class="fa-solid fa-envelope"></i> <a href="mailto:<?= Esc($Company['email']) ?>"><?= Esc($Company['email']) ?></a></li>
                    <?php if ($Company['website']) : ?>
                        <li class="LeftNavBarListItems"><i class="fa-solid fa-globe"></i> <a href="<?= Esc($Company['website']) ?>" rel="noopener nofollow" target="_blank">الموقع الإلكتروني</a></li>
                    <?php endif; ?>
                </ul>
                <?php if ($Is_Owner) : ?>
                    <a class="LoginBtn Inline_Btn" href="<?= Url('DashBoard') ?>">تعديل الصفحة</a>
                <?php endif; ?>
            </aside>

            <div class="Posts">
                <?php if ($Tab === 'products') : ?>
                    <?php if ($Is_Owner) : ?>
                        <form class="PostingPanel Product_Form" method="POST" action="<?= Url('Company_Page/add_product') ?>" enctype="multipart/form-data">
                            <?= Csrf_Field() ?>
                            <h3>إضافة منتج</h3>
                            <input type="text" name="name" placeholder="اسم المنتج" required maxlength="120">
                            <input type="number" name="price" placeholder="السعر بالدينار (اختياري)" min="0" step="0.01">
                            <textarea name="description" placeholder="وصف المنتج" rows="3" class="Post_Text_Area"></textarea>
                            <label>صورة المنتج: <input type="file" name="image" accept="image/jpeg,image/png,image/gif,image/webp"></label>
                            <input type="submit" value="إضافة" class="Post_Btn">
                        </form>
                    <?php endif; ?>
                    <div class="TimeLine Products_Grid">
                        <?php foreach ($Products as $Product) : ?>
                            <div class="Card Product_Card">
                                <img src="<?= Asset($Product['image'], 'assets/IMAGES/services/service-center.jpg') ?>" alt="" loading="lazy">
                                <h3><?= Esc($Product['name']) ?></h3>
                                <p class="Card_Subtitle"><?= Esc(Format_Price($Product['price'])) ?></p>
                                <?php if ($Product['description']) : ?>
                                    <p><?= nl2br(Esc($Product['description'])) ?></p>
                                <?php endif; ?>
                                <?php if ($Is_Owner) : ?>
                                    <form method="POST" action="<?= Url('Company_Page/delete_product/' . $Product['id']) ?>" onsubmit="return confirm('حذف هذا المنتج؟');">
                                        <?= Csrf_Field() ?>
                                        <button type="submit" class="Link_Btn Danger">حذف</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                        <?php if (!$Products) : ?>
                            <p class="Empty_State">لا توجد منتجات بعد.</p>
                        <?php endif; ?>
                    </div>
                <?php elseif ($Tab === 'posts') : ?>
                    <?php if ($Is_Owner) : ?>
                        <?php include(__DIR__ . '/Post_Form.php'); ?>
                    <?php endif; ?>
                    <?php foreach ($Posts as $Post) : ?>
                        <?php include(__DIR__ . '/Post_Card.php'); ?>
                    <?php endforeach; ?>
                    <?php if (!$Posts) : ?>
                        <p class="Empty_State">لا توجد منشورات بعد.</p>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="TimeLine Cards_Grid">
                        <?php foreach ($Sponsored as $Craftsman) : ?>
                            <?php include(__DIR__ . '/Craftsman_Card.php'); ?>
                        <?php endforeach; ?>
                        <?php if (!$Sponsored) : ?>
                            <p class="Empty_State">لا تدعم هذه الشركة أي حرفي بعد.<?= $Is_Owner ? ' افتح ملف حرفي واضغط على "رعاية هذا الحرفي".' : '' ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </main>

    <?php include(__DIR__ . '/Footer.php'); ?>

    <script src="<?= Asset('assets/JS/script.js') ?>"></script>

</body>

</html>
