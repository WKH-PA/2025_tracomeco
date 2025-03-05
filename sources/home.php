<?php include _source . "banner_top.php"; ?>

<?php
$ndkhac = LAYTEXT_rieng(82);
$imggioithieu = LAY_baiviet_chitiet(25);

?>
<?php include _source . "header_baiviet.php";?>

<?php $danhmuc_menu = GET_danhmuc_menu("4", 3, 4); ?>
<section class="tracomeco_home_linhvuc p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="tracomeco_title_main">
            <h2 class="text-uppercase wow animate__flipInX"><?= $glo_lang['linh_vuc_hoat_dong'] ?></h2>
        </div>
        <div class="row">
            <?php
            $stt = 1;
            foreach ($danhmuc_menu as $danhmuc) {
//                echo '<pre>';
//                var_dump($danhmuc);
                ?>
                <div class="col-xl-4">
                    <div class="linhvuc_col">
                        <img src="<?= $danhmuc['icon_danhmuc'] ?>" alt="<?= ($danhmuc['tenbaiviet_danhmuc']) ?>">
                        <div class="col_tieude wow animate__fadeInUp">
                            <span><?= str_pad($stt, 2, '0', STR_PAD_LEFT); ?></span> <!-- Số thứ tự -->
                            <h3 style="margin-right: 20px;">
                                <a href=<?= $danhmuc['seo_name_danhmuc'] ?>><?= $danhmuc['tenbaiviet_danhmuc'] ?></a>
                            </h3>
                        </div>
                        <div class="col_icon">
                            <i class="<?= $danhmuc['mota_danhmuc'] ?>"></i>
                        </div>
                        <?= $danhmuc['noidung_danhmuc'] ?>
                    </div>
                </div>
                <?php
                $stt++;
            }
            ?>
        </div>
    </div>
</section>



<?php $nd_danhgia = LAY_baiviet("15"); ?>
<section class="tracomeco_home_khach_hang p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="tracomeco_title_main">
            <h2 class="text-uppercase wow animate__flipInX"><?= $glo_lang['khach_hang_noi_ve_tracomeco'] ?></h2>
        </div>
        <div class="home_khach_hang swiper myCamnhan">
            <div class="swiper-wrapper">
                <?php
                foreach ($nd_danhgia as $rows) {
                    ?>
                    <div class="khach_hang_box swiper-slide">
                        <h3><?= GET_text('tenbaiviet_') ?></h3>
                        <?php
                        $rating = $rows['mota_vi'];
                        $total_stars = 4;
//                        echo $rating;
                        ?>
                        <p class="rate flex" style="margin:0">
                            <?php
                            for ($i = 0; $i <= $total_stars; $i++) {
                                if ($rating <= $i) {
                                    echo '<i class="fa fa-star dis-star" aria-hidden="true"></i>';

                                } else {
                                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                }

                            }
                            ?>
                        </p>
                        <?= GET_text('noidung') ?>
                    </div>
                <?php } ?>


            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<?php $banner_top = LAY_banner_new("`id_parent` = 16"); ?>
<div class="pa_home_banner">
    <div class="swiper myBanner">
        <div class="swiper-wrapper">
            <?php
            foreach ($banner_top as $rows) {
                ?>
                <div class="swiper-slide" data-swiper-slide-index="0">
                    <a <?= full_href($rows) ?>><img src="<?= full_src($rows, "") ?>">
                        <a <?= full_href($rows) ?>
                                class="button_slide wow animate__backInRight"><?= $glo_lang['xem_them'] ?> <i
                                    class="fa-light fa-arrow-up-right-from-square"></i></a>
                </div>
            <?php } ?>

        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>


<?php
$where = "AND `opt1`=1";
$tintuc = DB_fet_rd("*", "`#_baiviet`", " `step` IN (" . 5 . ") $where ", "  ", 3, "id");
$nd_tuyendung = LAY_baiviet(6, 10, " `opt1` =1");
if (!empty($tintuc) || !empty($nd_tuyendung)) {
?>
<section class="tracomeco_home_tin_tuc p-t-60 p-b-60">
    <div class="container-fluid" style="position:relative;">
        <div class="row">
            <div class="col-xl-8">
                <div class="home_tin_tuc_main">
                    <div class="tracomeco_title_main" style="text-align: left;">
                        <h2 class="m-b-30 wow animate__flipInX"><?= $glo_lang['tin_tuc_su_kien'] ?></h2>
                    </div>
                    <div class="slide_tin_tuc">
                        <div class="block_tin_tuc row">
                            <?php
                            $first = true;
                            foreach ($tintuc

                            as $rows) {
                            if ($first) {
                            ?>
                            <div class="col-md-8">
                                <div class="post_item lg">
                                    <div class="post_img">
                                        <a <?= full_href($rows) ?>><?= full_img($rows, "") ?></a>
                                    </div>
                                    <div class="post_info">
                                        <h3><a <?= full_href($rows) ?>><?= GET_text('tenbaiviet_') ?></a></h3>
                                        <p class="dated"><i
                                                    class="fa-regular fa-calendar-days"></i> <?= date("d/m/Y", $rows['ngaydang']); ?>
                                        </p>
                                        <p style="margin-bottom: 0"><?= GET_text('mota') ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <?php
                                $first = false;
                                } else {
                                    ?>
                                    <div class="post_item">
                                        <div class="post_img">
                                            <a <?= full_href($rows) ?>><?= full_img($rows, "") ?></a>
                                        </div>
                                        <div class="post_info">
                                            <h3><a <?= full_href($rows) ?>><?= GET_text('tenbaiviet_') ?></a></h3>
                                            <p class="dated"><i
                                                        class="fa-regular fa-calendar-days"></i> <?= date("d/m/Y", $rows['ngaydang']); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <?php

                if (!empty($nd_tuyendung)) {
                    ?>
                    <div class="home_tin_tuc_side">
                        <h2><?= $glo_lang['tin_tuyen_dung'] ?></h2>
                        <?php foreach ($nd_tuyendung as $rows) { ?>
                            <div class="post_item wow animate__fadeInDown">
                                <div class="post_info">
                                    <h3><a <?= full_href($rows) ?>><?= GET_text('tenbaiviet_') ?></a></h3>
                                    <p class="dated"><i class="fa-regular fa-calendar-days"></i> <?= date("d/m/Y", $rows['ngaydang']); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
</section>
<?php } ?>

<?php
//$banner = LAY_banner_new("id_parent =29");
//?>
<!--<section class="pa_boxcontent p-t-60 p-b-60">-->
<!--    <div class="container-fluid">-->
<!--        <div class="row">-->
<!--            <div class="swiper myPartner">-->
<!--                <ul class="swiper-wrapper">-->
<!--                    --><?php
//                    foreach ($banner as $rows) { ?>
<!---->
<!--                        <li class="swiper-slide">-->
<!--                            <a --><?//= full_href($rows) ?><!-- target="_blank" title="--><?//= GET_text('tenbaiviet_') ?><!--"-->
<!--                                                       class="logo_bottom">-->
<!--                                --><?//= full_img($rows, "") ?>
<!--                            </a>-->
<!--                        </li>-->
<!--                    --><?php //} ?>
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<?php
$doitac = DB_fet_rd("*", "`#_baiviet`", " `step` IN (" . 16 . ") ", "  ", 12, "id");
?>
<section class="pa_boxcontent p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="tracomeco_title_main">
            <h2 class="text-uppercase wow animate__flipInX">Đại lý chính hãng</h2>
        </div>
        <div class="row">
            <div class="swiper myPartner">
                <ul class="swiper-wrapper">
                    <?php
                    foreach ($doitac as $rows) {?>
                        <li class="swiper-slide">

                            <a href='<?=$fullpath. "/dai-ly/" . $rows['seo_name']  ?>' title="" class="logo_bottom">
                                <?= full_img($rows, "") ?>
                                <h3><?= GET_text('tenbaiviet') ?></h3>
                            </a>
                        </li>
                    <?php } ?>


                </ul>
            </div>
        </div>
    </div>
</section>