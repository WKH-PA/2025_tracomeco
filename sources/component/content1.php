<?php
$dataCategoryStep9 = DB_fet("*", "#_danhmuc", "`step` = '9' and showhi =1 and id_parent=0", " `catasort` ASC", "5", "arr");
$aboutHot = DB_fet("*",
    "#_baiviet",
    "`step` = $tempDataStep and showhi =1 and opt=1 and id_parent=".$idCatategory,
    " `catasort` ASC", "3", "arr");


?>

<div class="tracomeco_gt_noidung p-t-20 p-b-20">
    <div class="container-fluid">
        <div class="row flex top">
            <div class="gt_right">
                <img src="<?= $aboutBgBox ?>">
                <ul class="uu-diem wow animate__fadeInLeft"
                    style="visibility: visible; animation-name: fadeInLeft;">
                    <?php foreach ($dataCategoryStep9 as $rows) { ?>
                        <li><?= GET_text('tenbaiviet_') ?></li>
                    <?php } ?>
                </ul>
            </div>
            <?php
            $idFirst = 0;
            foreach ($aboutHot as $rows) {
                if ($idFirst > 0)
                    continue;
                $images = $full_url . '/datafiles/' . $rows['icon'];
                ?>
                <div class="gt_left">
                    <img src="<?= $images ?>">
                    <div class="tracomeco_title_main">
                        <h3><?= GET_text('tenbaiviet_') ?></h3>
                        <p><?= GET_text('mota') ?></p>
                    </div>
                    <?= GET_text('noidung') ?>
                </div>
                <?php
                $idFirst = $rows['id'];
            } ?>
        </div>
        <div class="row flex">
            <?php
            $count = 2;
            foreach ($aboutHot as $rows) {
                if ($rows['id'] == $idFirst)
                    continue;
                $images = $full_url . '/datafiles/' . $rows['icon'];
                $class = $count % 2 == 0 ? "gt_left" : "gt_right";
                ?>
                <div class="<?= $class ?>">
                    <img src="<?= $images ?>">
                    <div class="tracomeco_title_main">
                        <h3><?= GET_text('tenbaiviet_') ?></h3>
                        <p><?= GET_text('mota') ?></p>
                    </div>
                    <?= GET_text('noidung') ?>
                </div>
                <?php
                $count++;
            } ?>
        </div>
    </div>
</div>