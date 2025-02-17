<?php

$noidung = LAY_baiviet($slug_step,1,'`opt2` = 1');
$imggioithieu = LAY_hinhanhcon($noidung[0]['id'],3);
$thongtin_step = LAY_anhstep_now($thongtin_step['id']);
?>
<section class="tracomeco_home_gioithieu p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="row v-center">

            <div class="col-xl-3 col-img">
                <div class="home_dichvu_hinh">
                    <?= full_img($imggioithieu[2],'') ?>
                </div>
            </div>
            <div class="col-xl-3 col-img">
                <div class="home_dichvu_hinh p-b-20">
                    <?= full_img($imggioithieu[1],'') ?>
                </div>
                <div class="home_dichvu_hinh">
                    <?= full_img($imggioithieu[0],'') ?>
                </div>
            </div>

            <div class="col-xl-6 col-txt">
                <div class="home_dichvu_text wow animate__fadeInRight">
                    <h2><?= $glo_lang['gioi_thieu'] ?></h2>
                    <?php
                    foreach ($noidung as $rows) {
                        $is_trangchu = $thongtin_step['seo_name'] == $rows['seo_name'] ? true :false;
                    ?>
                        <h3><?= $rows['tenbaiviet_'. $lang] ?></h3>
                        <?php if ($_SERVER['REQUEST_URI'] == "/") { ?>
                        <p class="short-desc"><?= $rows['mota_'. $lang] ?></p>
                        <p class="read-more">
                            <a <?= full_href($rows)?> title="<?= $glo_lang['xem_chi_tiet'] ?>"><?= $glo_lang['xem_chi_tiet'] ?><i class="fa-light fa-arrow-up-right-from-square"></i></a>
                        </p>
                        <?php } else { ?>
                            <p class="short-desc"><?= $rows['noidung_'. $lang] ?></p>
                    <?php } } ?>

                </div>
            </div>

        </div>

    </div>
</section>