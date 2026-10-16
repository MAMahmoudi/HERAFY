<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="حرفي: منصة تجمع الحرفيين والزبائن والشركات في الجزائر">
    <title><?= Esc(!empty($Page_Title) ? $Page_Title . ' | حرفي' : 'حرفي - HERAFY') ?></title>
    <link rel="icon" href="<?= Asset('assets/IMAGES/favicon.png') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= Asset('assets/CSS/styles.css') ?>" />
    <link rel="stylesheet" href="<?= Asset('assets/CSS/Header.css') ?>" />
    <link rel="stylesheet" href="<?= Asset('assets/CSS/Footer.css') ?>" />
    <?php foreach ($Page_Styles ?? [] as $Style) : ?>
        <link rel="stylesheet" href="<?= Asset('assets/CSS/' . $Style . '.css') ?>" />
    <?php endforeach; ?>
    <link rel="stylesheet" href="<?= Asset('assets/CSS/Herafy.css') ?>" />
</head>
