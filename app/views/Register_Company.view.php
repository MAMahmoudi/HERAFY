<!DOCTYPE html>
<html lang="ar">

<?php $Page_Title = 'صفحة شركة جديدة'; include(__DIR__ . '/Head.php'); ?>

<body>
    <?php include(__DIR__ . '/Header.php'); ?>
    <main class="Page_Offset Form_Page">
        <div class="Login">
            <form class="AccountLogin Form_Card" method="POST" action="<?= Url('Register_Company') ?>">
                <?= Csrf_Field() ?>
                <h1>إنشاء صفحة شركة</h1>
                <?php include(__DIR__ . '/Form_Errors.php'); ?>
                <input type="text" placeholder="اسم الشركة" name="name" value="<?= Old('name') ?>" class="Email_Password" required autofocus>
                <input type="email" placeholder="البريد الإلكتروني" name="email" value="<?= Old('email') ?>" class="Email_Password" required>
                <input type="text" placeholder="المدينة" name="city" value="<?= Old('city') ?>" class="Email_Password">
                <input type="tel" placeholder="رقم الهاتف" name="phone" value="<?= Old('phone') ?>" class="Email_Password">
                <input type="password" placeholder="كلمة المرور (8 أحرف على الأقل)" name="password" class="Email_Password" minlength="8" required>
                <input type="password" placeholder="أعد كتابة كلمة المرور" name="password_confirm" class="Email_Password" minlength="8" required>
                <button type="submit" class="LoginBtn">إنشاء الصفحة</button>
                <p class="Form_Note">لديك حساب؟ <a href="<?= Url('Login?type=company') ?>">سجل الدخول</a></p>
            </form>
        </div>
    </main>

    <?php include(__DIR__ . '/Footer.php'); ?>

    <script src="<?= Asset('assets/JS/script.js') ?>"></script>
</body>

</html>
