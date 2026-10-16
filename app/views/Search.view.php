<!DOCTYPE html>
<html lang="ar">

<?php $Page_Title = $Selected_Service ? $Selected_Service['name'] : 'ابحث عن حرفي'; include(__DIR__ . '/Head.php'); ?>

<body>
    <?php include(__DIR__ . '/Header.php'); ?>
    <main class="Page_Offset Search_Page">
        <h1><?= $Selected_Service ? 'حرفيون: ' . Esc($Selected_Service['name']) : 'ابحث عن حرفي' ?></h1>
        <form class="Search_Form" method="GET" action="<?= Url('Search') ?>">
            <input type="text" name="q" value="<?= Esc($Text) ?>" placeholder="اسم، حرفة أو كلمة...">
            <select name="service">
                <option value="">كل الحرف</option>
                <?php foreach ($Services as $Service) : ?>
                    <option value="<?= (int)$Service['id'] ?>" <?= $Service_Id === (int)$Service['id'] ? 'selected' : '' ?>><?= Esc($Service['name']) ?></option>
                <?php endforeach; ?>
            </select>
            <select name="city">
                <option value="">كل المدن</option>
                <?php foreach ($Cities as $City_Name) : ?>
                    <option value="<?= Esc($City_Name) ?>" <?= $City === $City_Name ? 'selected' : '' ?>><?= Esc($City_Name) ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="LoginBtn">بحث</button>
        </form>

        <div class="Service_Tags">
            <?php foreach ($Services as $Service) : ?>
                <a href="<?= Url('Search?service=' . $Service['id']) ?>" class="Profile_Page_Skills_Btn <?= $Service_Id === (int)$Service['id'] ? 'Active' : '' ?>"><?= Esc($Service['name']) ?></a>
            <?php endforeach; ?>
        </div>

        <p class="Results_Count"><?= count($Craftsmen) ?> حرفي</p>
        <div class="Cards_Grid">
            <?php foreach ($Craftsmen as $Craftsman) : ?>
                <?php include(__DIR__ . '/Craftsman_Card.php'); ?>
            <?php endforeach; ?>
        </div>
        <?php if (!$Craftsmen) : ?>
            <p class="Empty_State">لم نجد أي حرفي يطابق بحثك. جرب حرفة أو مدينة أخرى.</p>
        <?php endif; ?>

        <?php if ($Companies) : ?>
            <h2 id="Companies">الشركات</h2>
            <div class="Cards_Grid">
                <?php foreach ($Companies as $Company) : ?>
                    <a class="Card Company_Card" href="<?= Url('Company_Page/' . $Company['id']) ?>">
                        <img src="<?= Asset($Company['logo'], 'assets/IMAGES/logo.png') ?>" alt="" loading="lazy">
                        <h3><?= Esc($Company['name']) ?></h3>
                        <?php if ($Company['city']) : ?>
                            <p class="Card_Meta"><i class="fa-solid fa-location-dot"></i> <?= Esc($Company['city']) ?></p>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
    <?php include(__DIR__ . '/Footer.php'); ?>

    <script src="<?= Asset('assets/JS/script.js') ?>"></script>
</body>

</html>
