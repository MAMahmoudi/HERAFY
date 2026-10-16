<?php $Header_User = Current_User(); ?>
<header class="ToolBar" id="ToolBar">
    <div class="Login_Btn" id="Login_Btn">
        <?php if ($Header_User) : ?>
            <span class="Login_Btn_User">
                <img src="<?= Asset($Header_User['avatar']) ?>" alt="">
                <?= Esc(mb_strimwidth($Header_User['name'], 0, 12, '…')) ?>
            </span>
            <ul class="Login_List">
                <li><a href="<?= Url('Account_Page') ?>">الخلاصة</a></li>
                <li><a href="<?= Own_Page_Url() ?>">صفحتي</a></li>
                <li><a href="<?= Url('DashBoard') ?>">الإعدادات</a></li>
                <li>
                    <form method="POST" action="<?= Url('Logout') ?>">
                        <?= Csrf_Field() ?>
                        <button type="submit">خروج</button>
                    </form>
                </li>
            </ul>
        <?php else : ?>
            تسجيل الدخول
            <ul class="Login_List">
                <li><a href="<?= Url('Login') ?>">دخول</a></li>
                <li><a href="<?= Url('Register_Account') ?>">حساب حرفي</a></li>
                <li><a href="<?= Url('Register_Company') ?>">حساب شركة</a></li>
            </ul>
        <?php endif; ?>
    </div>

    <nav>
        <ul class="NavBarList">
            <li><a href="<?= Url() ?>">الرئيسية</a></li>
            <li><a href="<?= Url('Search') ?>">خدمات</a>
                <ul class="DropDownMenu">
                    <?php foreach ((new Service)->Most_Requested(5) as $Header_Service) : ?>
                        <li><a href="<?= Url('Search?service=' . $Header_Service['id']) ?>"><?= Esc($Header_Service['name']) ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="<?= Url('Search') ?>">كل الحرف</a></li>
                </ul>
            </li>
            <li><a href="<?= Url('Search') ?>">الحرفيون</a></li>
            <li><a href="<?= Url('Search#Companies') ?>">الشركات</a></li>
            <li><a href="<?= Url('Contact_Us') ?>">إتصل بنا</a></li>
        </ul>
    </nav>

    <a href="<?= Url() ?>" class="Logo">
        <img src="<?= Asset('assets/IMAGES/White_Logo.png') ?>" alt="حرفي" height="40" id="Logo">
    </a>
</header>
<?php $Flash_Messages = Take_Flash_Messages(); ?>
<?php if ($Flash_Messages) : ?>
    <div class="Flash_Messages" id="Flash_Messages">
        <?php foreach ($Flash_Messages as $Flash_Message) : ?>
            <div class="Flash Flash_<?= Esc($Flash_Message['type']) ?>"><?= Esc($Flash_Message['message']) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
