<!DOCTYPE html>
<html lang="ar">

<?php $Page_Title = 'حساب حرفي جديد'; include(__DIR__ . '/Head.php'); ?>

<body>
    <?php include(__DIR__ . '/Header.php'); ?>
    <main class="Page_Offset Form_Page">
        <div class="Login">
            <form class="AccountLogin Form_Card" method="POST" action="<?= Url('Register_Account') ?>">
                <?= Csrf_Field() ?>
                <h1>إنشاء حساب حرفي</h1>
                <?php include(__DIR__ . '/Form_Errors.php'); ?>
                <input type="text" placeholder="الاسم" name="first_name" value="<?= Old('first_name') ?>" class="Email_Password" required autofocus>
                <input type="text" placeholder="اللقب" name="last_name" value="<?= Old('last_name') ?>" class="Email_Password" required>
                <input type="email" placeholder="البريد الإلكتروني" name="email" value="<?= Old('email') ?>" class="Email_Password" required>
                <select name="service_id" class="Email_Password">
                    <option value="">حرفتك</option>
                    <?php foreach ($Services as $Service) : ?>
                        <option value="<?= (int)$Service['id'] ?>" <?= Old('service_id') === (string)$Service['id'] ? 'selected' : '' ?>><?= Esc($Service['name']) ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="text" placeholder="المدينة" name="city" value="<?= Old('city') ?>" class="Email_Password">
                <input type="tel" placeholder="رقم الهاتف" name="phone" value="<?= Old('phone') ?>" class="Email_Password">
                <input type="password" placeholder="كلمة المرور (8 أحرف على الأقل)" name="password" class="Email_Password" minlength="8" required>
                <input type="password" placeholder="أعد كتابة كلمة المرور" name="password_confirm" class="Email_Password" minlength="8" required>
                <button type="submit" class="LoginBtn">إنشاء الحساب</button>
                <p class="Form_Note">لديك حساب؟ <a href="<?= Url('Login') ?>">سجل الدخول</a></p>
            </form>
        </div>
    </main>

    <?php include(__DIR__ . '/Footer.php'); ?>

    <script src="<?= Asset('assets/JS/script.js') ?>"></script>
</body>

</html>
