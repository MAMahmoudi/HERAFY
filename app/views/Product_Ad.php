<?php // Latest product of a company, shown as an ad in the side bars. Uses $Products ?>
<?php if (!empty($Products)) : ?>
    <?php $Ad = $Products[0]; ?>
    <div class="Profile_Ad">
        <small>إعلان &middot; <?= Esc($Ad['company_name']) ?></small>
        <p><?= Esc($Ad['name']) ?></p>
        <div>
            <img src="<?= Asset($Ad['image'], 'assets/IMAGES/services/service-center.jpg') ?>" alt="">
            <img src="<?= Asset($Ad['company_logo'], 'assets/IMAGES/logo.png') ?>" alt="">
        </div>
        <b><?= Esc(Format_Price($Ad['price'])) ?></b>
        <a href="<?= Url('Company_Page/' . $Ad['company_id']) ?>" class="Profile_Ad_Link">اكتشف المزيد</a>
    </div>
<?php endif; ?>
