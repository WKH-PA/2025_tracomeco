<?php
if ($slug_step == 16) {
    ?>
    <section class="tracomeco_home_khach_hang p-b-60 myPartner">
        <div class="container-fluid">
            <div class="tracomeco_title_main">
                <h2 class="text-uppercase m-b-30"><?= $glo_lang['bai_viet_lien_quan'] ?></h2>
            </div>
            <div class="home_khach_hang swiper myCamnhan">
                <div class="swiper-wrapper">
                    <?php foreach ($bvlienquan as $rows) { ?>
                        <li class="swiper-slide">
                            <a <?= full_href($rows) ?> title="" class="logo_bottom">
                                <?= full_img($rows,"") ?>
                                <h3><?= GET_text('tenbaiviet_') ?></h3>
                            </a>
                        </li>
                    <?php } ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <?php
} else {
    ?>

    <section class="tracomeco_home_khach_hang p-b-60">
        <div class="container-fluid">
            <div class="tracomeco_title_main">
                <h2 class="text-uppercase m-b-30"><?= $glo_lang['bai_viet_lien_quan'] ?></h2>
            </div>
            <div class="home_khach_hang swiper myCamnhan">
                <div class="swiper-wrapper">
                    <?php foreach ($bvlienquan as $rows) { ?>
                        <div class="new_id_bs m-b-10 swiper-slide">
                            <a <?= full_href($rows) ?>><?= full_img($rows) ?></a>
                            <div class="new_col">
                                <h3><a <?= full_href($rows) ?>><?= GET_text('tenbaiviet_') ?></a></h3>
                                <?php if ($thongtin_step == '5') { ?>
                                    <p class="dated"><i class="fa-regular fa-calendar-days"></i> <?= date("d/m/Y", $rows['ngaydang']) ?></p>
                                <?php } ?>
                                <p><?= limitText(GET_text('mota'), 3) ?></p>
                            </div>
                            <div class="clr"></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <?php
}
?>
