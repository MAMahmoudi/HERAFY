<?php if (!empty($My_Errors)) : ?>
    <div class="warning Form_Errors">
        <?php foreach ($My_Errors as $My_Error) : ?>
            <p><?= Esc($My_Error) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
