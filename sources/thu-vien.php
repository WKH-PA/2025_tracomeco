<?php
$slug_step = "10";
//
$nd_kietxuat = DB_fet_rd("*", "`#_step`", " `step` IN (" . $slug_step . ") ", "   ", "2", "id");
$nd_total = DB_num_rd("SELECT `id` FROM `#_step` WHERE `showhi` =  1 AND `step` IN (" . $slug_step . ")", "#_step");
$img_bv = LAY_baiviet($slug_step, "", "", "", "");
$video_bv = LAY_baiviet("13", "", "", "", "");
include _source . "box-header.php";
?>

<div class="page_conten_page p-t-60 p-b-30">
    <div class="container-fluid">
        <div class="tracomeco_title_main">
            <h2 class="text-uppercase m-b-30"><?= $glo_lang['thu_vien_anh'] ?></h2>
        </div>
        <div class="tt_tintuc hinhanh_popup flex">
            <?php foreach ($img_bv as $key => $rows) { ?>
                <div class="new_id_bs m-b-30" style="cursor: pointer;" data-target="#hinhanh<?= $key ?>">
                    <a href=""><?= full_img($rows) ?></a>
                    <div class="new_col">
                        <h3><i class="fa-light fa-image"></i> <?= GET_text('tenbaiviet_') ?></h3>
                    </div>
                    <div class="clr"></div>
                    <!--- popup-box --->
                    <div id="hinhanh<?= $key ?>" class="overlay-dark">
                        <div class="popup-box">
                            <div class="close"><i class="fa-light fa-xmark"></i></div>
                            <div class="content_croll">
                                <?php
                                $img_ct = LAY_imghinhanhcon($rows['id'], 8);
                                if (is_array($img_ct) && !empty($img_ct)) {
                                    ?>
                                    <h2 style="font-size: 23px; margin-bottom: 25px; text-align: center;">
                                        <?= GET_text('tenbaiviet_') ?>
                                    </h2>
                                    <div class="row m-0">
                                        <?php foreach ($img_ct as $rowss) { ?>
                                            <div class="col-xl-4 m-b-20">
                                                <?= full_img($rowss) ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <p style="text-align: center;">Không có hình ảnh.</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="clr"></div>
    </div>
</div>

<div class="page_conten_page p-b-60">
    <div class="container-fluid">
        <div class="tracomeco_title_main">
            <h2 class="text-uppercase m-b-30"><?= $glo_lang['thu_vien_video'] ?></h2>
        </div>
        <div class="tracomeco_home_tin_tuc hinhanh_popup" style="background: none;">
            <div class="slide_tin_tuc video_popup">
                <div class="block_tin_tuc row">
                    <?php
                    $first = true;
                    foreach ($video_bv as $rows) {
                    if ($first) {
                    ?>
                    <div class="col-md-8">
                        <div class="post_item lg new_id_bs" style="cursor: pointer; width: 100%; box-shadow: none;"
                             data-target="#video1">
                            <div class="post_img">
                                <a><img src="<?= $fullpath . '/datafiles/' . $rows['icon'] ?>"
                                        class="isload isload_full isload_full_1"
                                        alt="<?= GET_text('tenbaiviet_') ?>"></a>
                            </div>
                            <div class="post_info">
                                <h3><a><i class="fa-light fa-circle-play"></i> <?= GET_text('tenbaiviet_') ?></a>
                                </h3>
                            </div>
                            <!--- popup-box --->
                            <div id="video1" class="overlay-dark">
                                <div class="popup-box">
                                    <div class="close"><i class="fa-light fa-xmark"></i></div>
                                    <div class="content_croll" style="height: auto;">
                                        <h2 style="font-size: 23px;margin-bottom: 25px;text-align: center;"><?= GET_text('tenbaiviet_') ?></h2>
                                        <iframe width="100%" height="650" src="<?= $rows['p1'] ?>"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin"
                                                allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php
                        $first = false;
                        } else {
                            ?>
                            <div class="post_item new_id_bs" style="cursor: pointer; width: 100%; box-shadow: none;"
                                 data-target="#video2">
                                <div class="post_img">
                                    <a><img src="<?= $fullpath . '/datafiles/' . $rows['icon'] ?>"
                                            class="isload isload_full isload_full_1"
                                            alt="<?= GET_text('tenbaiviet_') ?>"></a>
                                </div>
                                <div class="post_info">
                                    <h3><a><i class="fa-light fa-circle-play"></i> <?= GET_text('tenbaiviet_') ?>
                                        </a></h3>
                                </div>
                                <div id="video2" class="overlay-dark">
                                    <div class="popup-box">
                                        <div class="close"><i class="fa-light fa-xmark"></i></div>
                                        <div class="content_croll" style="height: auto;">
                                            <h2 style="font-size: 23px;margin-bottom: 25px;text-align: center;"><?= GET_text('tenbaiviet_') ?></h2>
                                            <iframe width="100%" height="650" src="<?= $rows['p1'] ?>"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </div>

