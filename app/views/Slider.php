<section class="Cover">
    <div class="Slides_Container_Div">
        <div class="Slider">
            <img class="Slides_Previous_Btn" id="Slides_Previous_Btn" src="<?= Asset('assets/IMAGES/arrow-left-out.svg') ?>" alt="السابق">
            <div class="Slides_Container" id="Slides_Container">
                <?php for ($i = 1; $i <= 5; $i++) : ?>
                    <div class="Slide"><img src="<?= Asset('assets/IMAGES/slider-main/bg' . $i . '.jpg') ?>" alt="" height="600" width="100%"></div>
                <?php endfor; ?>
            </div>
            <img class="Slides_Next_Btn" id="Slides_Next_Btn" src="<?= Asset('assets/IMAGES/arrow-right-out.svg') ?>" alt="التالي">
        </div>
    </div>
</section>
