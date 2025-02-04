<?php
$ten_dv = LAY_step(2, 1);
$dichvu = LAY_danhmuc(2, "", "");
$ten_gt = LAY_step(1, 1);
$gioithieu = LAY_baiviet(1, "", "");
$bv_xemnhieu = DB_fet("*","#_baiviet","","`soluotxem` DESC","5",1,1);
$step = LAY_step();
$tinmoi = LAY_baiviet(5,"6","`opt` = 1");
?>
<div class="tin_right">
    <div class="box_right_pro_view">
        <div class="title_right_pro_view"><?=$glo_lang['danh_muc']?><img src="images/line.png"></div>
        <ul class="child_menu_right">
            <li><a href="<?=$full_url?>"><?=$glo_lang['trang_chu']?></a></li>
            <?php foreach ($step as $s){ ?>
                <li><a <?=full_href($s)?>><?=$s['tenbaiviet_'.$lang]?></a></li>
            <?php } ?>
        </ul>
        <div class="clr"></div>
    </div>
    <?php if(!empty($tinmoi)){ ?>
    <div class="box_right_pro_view">
        <div class="title_right_pro_view"><?=$glo_lang['tin_moi']?><img src="images/line.png"></div>
        <div class="tt_page_top flex">
            <?php foreach ($tinmoi as $rows){ ?>
            <div class="new_id_bs">
                <li><a <?=full_href($rows)?>><img class="lazy" <?=full_Src_lazy($rows)?> alt="<?=$rows['tenbaiviet_'.$lang]?>"></a></li>
                <ul>
                    <h3><a <?=full_href($rows)?>><?=$rows['tenbaiviet_'.$lang]?></a>
                    </h3>
                </ul>
                <div class="clr"></div>
            </div>
            <?php } ?>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
    <?php } ?>
    <div class="box_right_pro_view">
        <div class="title_right_pro_view"><?=$glo_lang['thong_ke_truy_cap']?><img src="images/line.png"></div>
        <div class="new_right">
            <ul>
                <h4><?=$glo_lang['so_luot_dang_online']?>: <span><?=NUMBER_fomat($online_tv) ?></span></h4>
                <h4><?=$glo_lang['so_luot_truy_cap']?>: <span><?=NUMBER_fomat($thongke_tv) ?></span></h4>
                <div class="clr"></div>
            </ul>
        </div>
    </div>
    <div class="clr"></div>
</div>
