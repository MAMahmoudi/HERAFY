<!DOCTYPE html>
<html lang="ar">

<?php $Page_Title = 'الإعدادات'; $Page_Styles = ['Account_Page']; include(__DIR__ . '/Head.php'); ?>

<body>
    <?php include(__DIR__ . '/Header.php'); ?>
    <?php $Is_Company = $User['type'] === 'company'; $Return_To = 'DashBoard'; ?>
    <main class="Page_Offset DashBoard">
        <h1>الإعدادات</h1>
        <p><a href="<?= Own_Page_Url() ?>">مشاهدة <?= $Is_Company ? 'صفحة الشركة' : 'ملفي الشخصي' ?> كما يراها الزوار</a></p>

        <form class="Form_Card DashBoard_Form" method="POST" action="<?= Url('DashBoard') ?>" enctype="multipart/form-data">
            <?= Csrf_Field() ?>
            <?php include(__DIR__ . '/Form_Errors.php'); ?>
            <h2>المعلومات العامة</h2>
            <?php if ($Is_Company) : ?>
                <label>اسم الشركة <input type="text" name="name" value="<?= Old('name', $Profile['name']) ?>" required></label>
                <label>الموقع الإلكتروني <input type="url" name="website" value="<?= Old('website', $Profile['website'] ?? '') ?>" placeholder="https://"></label>
                <label>وصف النشاط <textarea name="description" rows="4"><?= Old('description', $Profile['description'] ?? '') ?></textarea></label>
            <?php else : ?>
                <label>الاسم <input type="text" name="first_name" value="<?= Old('first_name', $Profile['first_name']) ?>" required></label>
                <label>اللقب <input type="text" name="last_name" value="<?= Old('last_name', $Profile['last_name']) ?>" required></label>
                <label>الحرفة
                    <select name="service_id">
                        <option value="">بدون</option>
                        <?php foreach ($Services as $Service) : ?>
                            <option value="<?= (int)$Service['id'] ?>" <?= Old('service_id', (string)$Profile['service_id']) === (string)$Service['id'] ? 'selected' : '' ?>><?= Esc($Service['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label>نبذة عنك <textarea name="bio" rows="4" placeholder="خبرتك، الأعمال التي تتقنها، أوقات العمل..."><?= Old('bio', $Profile['bio'] ?? '') ?></textarea></label>
            <?php endif; ?>
            <label>المدينة <input type="text" name="city" value="<?= Old('city', $Profile['city'] ?? '') ?>"></label>
            <label>رقم الهاتف <input type="tel" name="phone" value="<?= Old('phone', $Profile['phone'] ?? '') ?>"></label>
            <label>البريد الإلكتروني <input type="email" value="<?= Esc($Profile['email']) ?>" disabled></label>

            <h2>الصور</h2>
            <div class="DashBoard_Images">
                <?php $Picture_Field = $Is_Company ? 'logo' : 'avatar'; ?>
                <label>
                    <?= $Is_Company ? 'الشعار' : 'الصورة الشخصية' ?>
                    <img src="<?= Asset($Profile[$Picture_Field]) ?>" alt="" class="DashBoard_Avatar">
                    <input type="file" name="<?= $Picture_Field ?>" accept="image/jpeg,image/png,image/gif,image/webp">
                </label>
                <label>
                    صورة الغلاف
                    <img src="<?= Asset($Profile['cover'], 'assets/IMAGES/slider-pages/slide-page1.jpg') ?>" alt="" class="DashBoard_Cover">
                    <input type="file" name="cover" accept="image/jpeg,image/png,image/gif,image/webp">
                </label>
            </div>

            <h2>تغيير كلمة المرور</h2>
            <label>كلمة المرور الجديدة <input type="password" name="password" minlength="8" autocomplete="new-password" placeholder="اتركها فارغة للإبقاء على الحالية"></label>
            <label>أعد كتابتها <input type="password" name="password_confirm" minlength="8" autocomplete="new-password"></label>

            <button type="submit" class="LoginBtn">حفظ التعديلات</button>
        </form>

        <section class="DashBoard_Posts">
            <h2>منشوراتي (<?= count($Posts) ?>)</h2>
            <?php foreach ($Posts as $Post) : ?>
                <?php include(__DIR__ . '/Post_Card.php'); ?>
            <?php endforeach; ?>
            <?php if (!$Posts) : ?>
                <p class="Empty_State">لم تنشر أي شيء بعد. <a href="<?= Url('Account_Page') ?>">انشر أول منشور</a></p>
            <?php endif; ?>
        </section>
    </main>
    <?php include(__DIR__ . '/Footer.php'); ?>

    <script src="<?= Asset('assets/JS/script.js') ?>"></script>
</body>

</html>
