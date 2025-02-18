<?php
$idFirst = 0;
foreach ($dataImgChild as $imgChild) {
    if ($idFirst > 0)
        continue;
    ?>
    <div class="col-xl-3 col-img">
        <div class="home_dichvu_hinh">
            <img src="<?= $fullpath . '/datafiles/' . $imgChild['icon'] ?>"/>
        </div>
    </div>
    <?php
    $idFirst = $imgChild['id'];
} ?>
<div class="col-xl-3 col-img">
    <?php
    $count = 1;
    foreach ($dataImgChild as $imgChild) {
        if ($imgChild['id'] == $idFirst) {
            continue;
            $count++;
        }
        $class = $count == 2 ? "p-b-20" : "";
        ?>
        <div class="home_dichvu_hinh <?= $class ?>">
            <img src="<?= $fullpath . '/datafiles/' . $imgChild['icon'] ?>"/>
        </div>
        <?php
        $count++;
    } ?>
</div>
<div class="col-xl-6 col-txt">
    <div class="home_dichvu_text wow animate__fadeInRight">
        <h2><?= $dataStep['tenbaiviet_' . $lang] ?></h2>
        <h3>  <?= $aboutData['tenbaiviet_' . $lang] ?></h3>
        <?= $aboutData['noidung_' . $lang] ?>
        <?php if ($hiddenLink) { ?>
            <p class="read-more">
                <a href="<?= $full_url . '/' . $aboutData['seo_name'] ?>"
                   title="<?= $glo_lang['xem_chi_tiet'] ?>"><?= $glo_lang['xem_chi_tiet'] ?><i
                            class="fa-light fa-arrow-up-right-from-square"></i></a>
            </p>
        <?php } ?>
    </div>
</div>
