<!DOCTYPE html>
<html lang="ar">

<?php $Page_Styles = ['Successful_Projects']; include(__DIR__ . '/Head.php'); ?>

<body>

    <?php include(__DIR__ . '/Header.php'); ?>
    <main>
        <!--Slider-->
        <?php include(__DIR__ . '/Slider.php'); ?>
        <!--Services-->
        <section class="Services">
            <form class="SearchServices" id="SearchServices" method="GET" action="<?= Url('Search') ?>" autocomplete="off">
                <input type="text" name="q" placeholder="ابحث عن حرفي: سباك، كهربائي، نجار..." class="SearchServicesTxtField" id="SearchServicesTxtField"
                    data-services="<?= Esc(json_encode(array_map(fn($Service) => ['id' => (int)$Service['id'], 'name' => $Service['name'], 'slug' => $Service['slug']], $All_Services), JSON_UNESCAPED_UNICODE)) ?>"
                    data-search-url="<?= Url('Search') ?>">
                <ul id="AutoComplete_Results" class="AutoComplete_Results"></ul>
            </form>
            <h1>الخدمات الأكثر طلبا</h1>
            <div class="MostSearchedServices">
                <?php foreach ($Services as $Service) : ?>
                    <a class="ServiceContainer" href="<?= Url('Search?service=' . $Service['id']) ?>"
                        style="background-image: url('<?= Asset($Service['image'], 'assets/IMAGES/services/service-center.jpg') ?>')">
                        <h3 class="ServiceName"><?= Esc($Service['name']) ?></h3>
                        <span class="ServiceCount"><?= (int)$Service['craftsmen_count'] ?> حرفي</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <!--Succuessful_Projects-->
        <?php if ($Projects) : ?>
            <section class="Succuessful_Projects">
                <h1>مشاريع ناجحة</h1>
                <?php foreach ($Projects as $Index => $Project) : ?>
                    <?php $Author = Post_Author($Project); ?>
                    <div class="<?= $Index % 2 ? 'Succuessful_Projects_Item_Reverse' : 'Succuessful_Projects_Item' ?>">
                        <div class="Succuessful_Projects_Image">
                            <img src="<?= Asset($Project['image']) ?>" alt="" />
                        </div>
                        <div class="Succuessful_Projects_Text">
                            <h2><a href="<?= $Author['url'] ?>"><?= Esc($Author['name']) ?></a></h2>
                            <h3><?= Esc($Author['subtitle']) ?></h3>
                            <p><?= nl2br(Esc($Project['body'])) ?></p>
                            <a class="ReadMoreBtn Small_Btn" href="<?= $Author['url'] ?>">شاهد أعماله</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <!--Craftsmen-->
        <?php if ($Craftsmen) : ?>
            <section class="Home_Section">
                <h1>حرفيون مميزون</h1>
                <div class="Cards_Grid">
                    <?php foreach ($Craftsmen as $Craftsman) : ?>
                        <?php include(__DIR__ . '/Craftsman_Card.php'); ?>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <!--Companies-->
        <?php if ($Companies) : ?>
            <section class="Home_Section Home_Companies">
                <h1>شركاء حرفي</h1>
                <div class="Companies_Strip">
                    <?php foreach ($Companies as $Company) : ?>
                        <a href="<?= Url('Company_Page/' . $Company['id']) ?>" title="<?= Esc($Company['name']) ?>">
                            <img src="<?= Asset($Company['logo'], 'assets/IMAGES/logo.png') ?>" alt="<?= Esc($Company['name']) ?>">
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <!--Join-->
        <?php if (!Is_Logged_In()) : ?>
            <section class="Join_Section">
                <div>
                    <h2>أنت حرفي؟</h2>
                    <p>أنشئ ملفك، اعرض أعمالك واجعل الزبائن يجدونك بسهولة.</p>
                    <a class="LoginBtn Inline_Btn" href="<?= Url('Register_Account') ?>">أنشئ حسابك مجانا</a>
                </div>
                <div>
                    <h2>أنت شركة؟</h2>
                    <p>روّج لمنتجاتك عند آلاف الحرفيين وادعم أفضلهم.</p>
                    <a class="LoginBtn Inline_Btn" href="<?= Url('Register_Company') ?>">أنشئ صفحة شركتك</a>
                </div>
            </section>
        <?php endif; ?>
    </main>

    <?php include(__DIR__ . '/Footer.php'); ?>

    <script src="<?= Asset('assets/JS/script.js') ?>"></script>
    <script src="<?= Asset('assets/JS/Image_Slider.js') ?>"></script>
    <script src="<?= Asset('assets/JS/Search_Services.js') ?>"></script>
</body>

</html>
