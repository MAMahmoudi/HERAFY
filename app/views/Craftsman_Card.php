<?php // One craftsman. Uses $Craftsman (a row with service_name) ?>
<a class="Card Craftsman_Card" href="<?= Url('Profile/' . $Craftsman['id']) ?>">
    <img src="<?= Asset($Craftsman['avatar']) ?>" alt="" loading="lazy">
    <h3><?= Esc($Craftsman['first_name'] . ' ' . $Craftsman['last_name']) ?></h3>
    <p class="Card_Subtitle"><?= Esc($Craftsman['service_name'] ?? 'حرفي') ?></p>
    <?php if (!empty($Craftsman['city'])) : ?>
        <p class="Card_Meta"><i class="fa-solid fa-location-dot"></i> <?= Esc($Craftsman['city']) ?></p>
    <?php endif; ?>
</a>
