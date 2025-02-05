<?php


$slug_step = "6,8";
//
$nd_kietxuat = DB_fet_rd("*", "`#_step`", " `step` IN (" . $slug_step . ") ", "   ", "2", "id");
$nd_total = DB_num_rd("SELECT `id` FROM `#_step` WHERE `showhi` =  1 AND `step` IN (" . $slug_step . ")", "#_step");

include _source . "box-header.php";
?>
<div class="page_conten_page pagewrap">
    <div class="tin_left">
        <div class="dv-home-lh flex dv-lh-detail">
            <?php
            if ($nd_total == 0) {
                echo "<div class='dv-notfull'>" . $glo_lang['khong_tim_thay_du_lieu_nao'] . "</div>";
            } else {
            foreach ($nd_kietxuat as $rows) {
                $img_bv = LAY_baiviet($rows['step'],1,"","","","1");
                if(!empty($img_bv)){
                    $img_bv = reset($img_bv);
                }
            ?>
            <div class="dv-gr-lh">
                <div class="img">
                    <a <?= full_href($rows) ?>>
                        <?= full_img($img_bv) ?></a>
                </div>
                <div class="text-left">
                    <a <?= full_href($rows) ?>>
                        <h3><?=$rows['tenbaiviet_'.$lang]?></h3>
                    </a>
                    <div class="clr"></div>
                </div>
            </div>
            <?php }} ?>
            <div class="clr"></div>
        </div>
    </div>
    <?php include _source."tin_right_1.php"; ?>
    <div class="clr"></div>
</div>