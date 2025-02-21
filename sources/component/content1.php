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
                    <?php foreach ($dataCategoryStep9 as $item) { ?>
                        <li><?= $item['tenbaiviet_' . $lang] ?></li>
                    <?php } ?>
                </ul>
            </div>
            <?php
            $idFirst = 0;
            foreach ($aboutHot as $item) {
                if ($idFirst > 0)
                    continue;
                $images = $full_url . '/datafiles/' . $item['icon'];
                ?>
                <div class="gt_left">
                    <img src="<?= $images ?>">
                    <div class="tracomeco_title_main">
                        <h3><?= $item['tenbaiviet_' . $lang] ?></h3>
                        <p><?= $item['mota_' . $lang] ?></p>
                    </div>
                    <?= $item['noidung_' . $lang] ?>
                </div>
                <?php
                $idFirst = $item['id'];
            } ?>
        </div>
        <div class="row flex">
            <?php
            $count = 2;
            foreach ($aboutHot as $item) {
                if ($item['id'] == $idFirst)
                    continue;
                $images = $full_url . '/datafiles/' . $item['icon'];
                $class = $count % 2 == 0 ? "gt_left" : "gt_right";
                ?>
                <div class="<?= $class ?>">
                    <img src="<?= $images ?>">
                    <div class="tracomeco_title_main">
                        <h3><?= $item['tenbaiviet_' . $lang] ?></h3>
                        <p><?= $item['mota_' . $lang] ?></p>
                    </div>
                    <?= $item['noidung_' . $lang] ?>
                </div>
                <?php
                $count++;
            } ?>
        </div>
    </div>
</div>