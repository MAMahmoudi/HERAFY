<!DOCTYPE html>
<html lang="ar">

<?php $Page_Title = 'الصفحة غير موجودة'; include(__DIR__ . '/Head.php'); ?>

<body>
    <?php include(__DIR__ . '/Header.php'); ?>
    <main class="Page_Offset Not_Found">
        <h1>404</h1>
        <p>عذرا، الصفحة التي تبحث عنها غير موجودة.</p>
        <a class="LoginBtn Inline_Btn" href="<?= Url() ?>">العودة إلى الرئيسية</a>
    </main>
    <?php include(__DIR__ . '/Footer.php'); ?>

    <script src="<?= Asset('assets/JS/script.js') ?>"></script>
</body>

</html>
