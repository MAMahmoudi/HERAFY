<?php // Craftsmen suggestions in the side bars. Uses $People ?>
<?php if (!empty($People)) : ?>
    <div class="Profile_Page_Left_Side_Bar_People">
        <h3>حرفيون قد تعرفهم</h3>
        <?php foreach ($People as $Person) : ?>
            <div class="Profile_Page_Left_Side_Bar_People_Item">
                <img src="<?= Asset($Person['avatar']) ?>" alt="">
                <div>
                    <h2><?= Esc($Person['first_name'] . ' ' . $Person['last_name']) ?></h2>
                    <p><?= Esc(trim(($Person['service_name'] ?? '') . ' - ' . ($Person['city'] ?? ''), ' -')) ?></p>
                    <a href="<?= Url('Profile/' . $Person['id']) ?>">عرض الملف</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
