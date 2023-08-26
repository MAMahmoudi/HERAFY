<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/styles.css" />
    <link rel="stylesheet" href="<?= My_Files_Root ?>assets/CSS/Footer.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <?php
    include("../app/views/Header.php");
    ?>
    <main>
        <?php
        include("../app/views/Slider.php");
        ?>

        <div class="Login">
            <form class="AccountLogin" name="tasjil" method="POST" autocomplete="off">
                <h1>Account registration</h1><br>
                <?php if (!empty($akhtaa)) : ?>
                    <div class="warning">
                        <?= implode("<br>", $akhtaa) ?>
                    </div>
                <?php endif; ?>
                <input type="text" placeholder="First name" name="ism" class="Email_Password" autofocus="autofocus"><br>
                <input type="text" placeholder="Last name" name="laqab" class="Email_Password"><br>
                <input type="email" placeholder="Enter your email or phone number" name="mostakhdim" class="Email_Password" required><br>
                <input type="password" placeholder="Enter your password" name="kalimat_sir" class="Email_Password" required><br>
                <input type="password" placeholder="Enter your password again" name="Re_kalimat_sir" class="Email_Password" required><br>
                <button type="submit" class="LoginBtn" name="tasjil_submit">Create Account</button><br>

            </form>
        </div>
        <a href="<?= My_Files_Root ?>Account_Page">Account Page</a>
    </main>


    <?php include("../app/views/Footer.php"); ?>

    <script src="<?= My_Files_Root ?>assets/JS/script.js"></script>
</body>

</html>