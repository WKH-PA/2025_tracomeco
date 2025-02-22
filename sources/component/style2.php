<?php


?>
<div class="col-xl-6 col-txt">
    <div class="home_dichvu_text wow animate__fadeInRight">
        <h2><?= GET_text('tenbaiviet_',$dataStep)  ?></h2>
        <h3>  <?= GET_text('tenbaiviet_',$aboutData) ?></h3>
        <?= $contentAbout ?>
        <?php if ($hiddenLink) { ?>
            <p class="read-more">
                <a href="<?= $link ?>"
                   title="<?= $glo_lang['xem_chi_tiet'] ?>"><?= $glo_lang['xem_chi_tiet'] ?><i
                            class="fa-light fa-arrow-up-right-from-square"></i></a>
            </p>
        <?php } ?>
    </div>
</div>
<div class="col-xl-3 col-img">
    <?php
    $idList = [];
    $count = 1;
    foreach ($dataImgChild as $imgChild) {

        $class = $count == 1 ? "p-b-20" : "";
        if ($count > 2)
            continue;
        ?>
        <div class="home_dichvu_hinh <?= $class ?>">
            <img src="<?= $fullpath . '/datafiles/' . $imgChild['icon'] ?>"/>
        </div>
        <?php
        $idList[] = $imgChild['id'];
        $count++;
    } ?>
</div>
<?php
foreach ($dataImgChild as $imgChild) {
    if (in_array($imgChild['id'], $idList))
        continue;
    ?>
    <div class="col-xl-3 col-img">
        <div class="home_dichvu_hinh">
            <img src="<?= $fullpath . '/datafiles/' . $imgChild['icon'] ?>"/>
        </div>
    </div>
    <?php
} ?>

