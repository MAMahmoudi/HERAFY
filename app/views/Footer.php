<footer class="Footer">
    <a href="#" id="Back_Top">إلى الأعلى</a>
    <div class="Footer_Top">
        <div>
            <h1>حرفي</h1>
            <p>نجمع الحرفيين والزبائن والشركات في مكان واحد</p>
        </div>
        <div>
            <a href="https://www.facebook.com/" aria-label="Facebook">
                <i class="fa-brands fa-facebook-square"></i>
            </a>
            <a href="https://www.twitter.com/" aria-label="Twitter">
                <i class="fa-brands fa-twitter-square"></i>
            </a>
            <a href="https://www.instagram.com/" aria-label="Instagram">
                <i class="fa-brands fa-instagram-square"></i>
            </a>
        </div>
    </div>

    <div class="Footer_Buttom">
        <div>
            <h4>حرفي</h4>
            <a href="<?= Url() ?>">الرئيسية</a>
            <a href="<?= Url('Search') ?>">ابحث عن حرفي</a>
            <a href="<?= Url('Contact_Us') ?>">إتصل بنا</a>
        </div>
        <div>
            <h4>الحرفيون</h4>
            <a href="<?= Url('Register_Account') ?>">أنشئ حسابك</a>
            <a href="<?= Url('Login') ?>">تسجيل الدخول</a>
            <a href="<?= Url('Account_Page') ?>">الخلاصة</a>
        </div>
        <div>
            <h4>الشركات</h4>
            <a href="<?= Url('Register_Company') ?>">أنشئ صفحة شركتك</a>
            <a href="<?= Url('Login?type=company') ?>">دخول الشركات</a>
            <a href="<?= Url('Search#Companies') ?>">دليل الشركات</a>
        </div>
        <div>
            <h4>الحرف</h4>
            <?php foreach ((new Service)->Most_Requested(3) as $Footer_Service) : ?>
                <a href="<?= Url('Search?service=' . $Footer_Service['id']) ?>"><?= Esc($Footer_Service['name']) ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <p class="Footer_Copyright">HERAFY &#169; <?= date('Y') ?> - جميع الحقوق محفوظة</p>
</footer>
