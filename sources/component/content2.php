<section class="tracomeco_gt_thongso p-t-60 p-b-60" style="background: url(<?= $aboutBg ?>);background-size: cover;">
    <div class="container-fluid">
        <div class="row">
            <?php for ($i = 1; $i <= 4; $i++) {
                $number = !empty($glo_lang['numer_' . $i]) ? $glo_lang['numer_' . $i] :10;
                $title = !empty($glo_lang['title_' . $i]) ? $glo_lang['title_' . $i] : "title_" . $i;
                $desc = !empty($glo_lang['desc_' . $i]) ? $glo_lang['desc_' . $i] : "desc_" . $i;
                ?>
                <div class="col-xl-3">
                    <span class="count"><?= $number ?></span>
                    <div class="thongso_col">
                        <h3><?= $title ?></h3>
                        <p><?= $desc ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php
$aboutHot = DB_fet("*",
    "#_baiviet",
    "`step` = $tempDataStep and showhi =1 and opt=1 and id_parent=" . $idCatategory,
    " `catasort` ASC", "", "arr");

?>

<section class="tracomeco_gt_visao p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="tracomeco_title_main">
            <h2 class="text-uppercase m-b-10"><?= $arr_running['mota_' . $lang] ?></h2>
            <?= $arr_running['noidung_' . $lang] ?>
        </div>
        <div class="tracomeco-container">
            <div class="tracomeco-bar tracomeco-black">
                <?php
                $count = 1;
                foreach ($aboutHot as $item) {
                    $class = $count == 1 ? "tracomeco-red" : "";
                    $id = $item['id'];
                    ?>
                    <button class="tracomeco-bar-item tracomeco-button tablink <?= $class ?>"
                            onclick="openCity(event,'tab_<?= $id ?>')"><?= $item['tenbaiviet_' . $lang] ?>
                    </button>
                    <?php
                    $count++;
                } ?>
            </div>
            <?php
            $count = 1;
            foreach ($aboutHot as $item) {
                $id = $item['id'];
                $isFirst = $count == 1 ? "" : "hidden";
                ?>
                <div id='tab_<?= $id ?>' class="tracomeco-container tracomeco-border city <?=$isFirst?>">
                    <?= $item['noidung_' . $lang] ?>
                </div>
                <?php
                $count++;
            } ?>
        </div>
    </div>
</section>
<script>
    function openCity(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" tracomeco-red", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " tracomeco-red";
    }
</script>