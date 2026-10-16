<!DOCTYPE html>
<html lang="ar">

<?php $Page_Title = 'إتصل بنا'; $Page_Styles = ['Contact_Us']; include(__DIR__ . '/Head.php'); ?>

<body>
    <?php include(__DIR__ . '/Header.php'); ?>
    <main class="Page_Offset">
        <div class="Contact_Us_Container">
            <h1>إتصل بنا</h1>
            <p class="Contact_Us_Intro">سؤال، اقتراح أو مشكلة في حسابك؟ اكتب لنا وسنرد عليك عبر البريد الإلكتروني.</p>
            <form method="POST" action="<?= Url('Contact_Us') ?>">
                <?= Csrf_Field() ?>
                <?php include(__DIR__ . '/Form_Errors.php'); ?>
                <input type="text" name="name" placeholder="الإسم" value="<?= Old('name', Current_User()['name'] ?? '') ?>" required />
                <input type="email" name="email" placeholder="البريد الإلكتروني" value="<?= Old('email') ?>" required />
                <input type="text" name="subject" placeholder="الموضوع" value="<?= Old('subject') ?>" required />
                <textarea name="message" placeholder="الرسالة" rows="4" required><?= Old('message') ?></textarea>
                <button type="submit">إرسال</button>
            </form>
        </div>
    </main>
    <?php include(__DIR__ . '/Footer.php'); ?>

    <script src="<?= Asset('assets/JS/script.js') ?>"></script>
</body>

</html>
