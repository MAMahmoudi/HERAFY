<?php // One post. Uses $Post (a row of Post::Feed) ?>
<?php $Author = Post_Author($Post); ?>
<?php $Can_Delete = Is_Logged_In($Post['author_type']) && Current_User()['id'] === (int)$Post['author_id']; ?>
<article class="Profile_Single_Post">
    <div class="Post_Author">
        <a href="<?= $Author['url'] ?>"><img src="<?= $Author['image'] ?>" alt=""></a>
        <div>
            <h1><a href="<?= $Author['url'] ?>"><?= Esc($Author['name']) ?></a></h1>
            <small><?= Esc($Author['subtitle']) ?></small>
            <small><?= Esc(Time_Ago($Post['created_at'])) ?></small>
        </div>
        <?php if ($Can_Delete) : ?>
            <form method="POST" action="<?= Url('Posts/delete/' . $Post['id']) ?>" class="Post_Delete_Form" onsubmit="return confirm('حذف هذا المنشور؟');">
                <?= Csrf_Field() ?>
                <input type="hidden" name="return_to" value="<?= Esc($Return_To ?? 'Account_Page') ?>">
                <button type="submit" title="حذف"><i class="fa-solid fa-trash"></i></button>
            </form>
        <?php endif; ?>
    </div>
    <p><?= nl2br(Esc($Post['body'])) ?></p>
    <?php if (!empty($Post['image'])) : ?>
        <img src="<?= Asset($Post['image']) ?>" alt="" class="Post_Picture" loading="lazy">
    <?php endif; ?>
</article>
