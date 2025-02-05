<?php
    $nd = LAYTEXT_rieng(93);
    if(!empty($nd['icon'])){
        $background = "background: url('".$fullpath . '/' . $nd['duongdantin'] . '/' . $nd['icon']."');    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;";
    }else{
        $background = "background: #333;";
    }
?>
<div class="banner_detail" style="<?=$background?>"></div>
<div class="page_conten_page pagewrap">
    <div class="tin_left_nd tin_left_2column" style="width: 100%;">
        <div class="showText">
            <?php
            $noidung = SHOW_text($nd['noidung_' . $_SESSION['lang']]);
            echo $noidung;
            ?>
        </div>
    </div>
    <div class="clr"></div>
</div>