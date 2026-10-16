<!DOCTYPE html>
<html lang="ar">

<?php $Page_Title = 'تسجيل الدخول'; include(__DIR__ . '/Head.php'); ?>

<body>
    <?php include(__DIR__ . '/Header.php'); ?>
    <main class="Page_Offset Form_Page">
        <div class="Login">
            <form class="AccountLogin Form_Card" method="POST" action="<?= Url('Login') ?>">
                <?= Csrf_Field() ?>
                <h1>تسجيل الدخول</h1>
                <?php include(__DIR__ . '/Form_Errors.php'); ?>
                <div class="Type_Switch">
                    <label><input type="radio" name="type" value="account" <?= $Type === 'account' ? 'checked' : '' ?>> حرفي</label>
                    <label><input type="radio" name="type" value="company" <?= $Type === 'company' ? 'checked' : '' ?>> شركة</label>
                </div>
                <input type="email" placeholder="البريد الإلكتروني" name="email" value="<?= Old('email') ?>" class="Email_Password" required autofocus>
                <input type="password" placeholder="كلمة المرور" name="password" class="Email_Password" required>
                <button type="submit" class="LoginBtn">دخول</button>
                <p class="Form_Note">
                    ليس لديك حساب؟
                    <a href="<?= Url('Register_Account') ?>">حساب حرفي</a> أو
                    <a href="<?= Url('Register_Company') ?>">صفحة شركة</a>
                </p>
            </form>
        </div>
    </main>

    <?php include(__DIR__ . '/Footer.php'); ?>

    <script src="<?= Asset('assets/JS/script.js') ?>"></script>
</body>

</html>
