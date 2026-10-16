<?php // Form to publish a post. Uses $Return_To (page to come back to) ?>
<?php $Form_User = Current_User(); ?>
<form class="Profile_Post" method="POST" action="<?= Url('Posts/create') ?>" enctype="multipart/form-data">
    <?= Csrf_Field() ?>
    <input type="hidden" name="return_to" value="<?= Esc($Return_To ?? 'Account_Page') ?>">
    <div class="Profile_Post_Input">
        <img src="<?= Asset($Form_User['avatar']) ?>" alt="">
        <textarea rows="3" name="body" maxlength="2000" required
            placeholder="<?= $Form_User['type'] === 'company' ? 'شارك عرضا أو خبرا عن منتجاتك...' : 'شارك عملا أنجزته مؤخرا...' ?>"></textarea>
    </div>
    <ul class="Profile_Post_Links">
        <li>
            <label class="Post_Image_Label">
                <img src="<?= Asset('assets/IMAGES/photo.png') ?>" alt="">
                <span data-default="صورة">صورة</span>
                <input type="file" name="image" accept="image/jpeg,image/png,image/gif,image/webp" class="Post_Image_Input">
            </label>
        </li>
        <li><button type="submit">نشر</button></li>
    </ul>
</form>
