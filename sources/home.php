<?php include _source . "banner_top.php"; ?>
<?php $ndkhac = LAYTEXT_rieng(82); ?>
<div class="dv-home-gioithieu" id="dv-home-gioithieu">
    <div class="pagewrap">
        <div class="vc_col-sm-6">
            <div class="article_heading">
                <p class="heading_primary">
                    <?= $ndkhac['p1_' . $lang] ?>
                </p>
                <h3 class="heading_secondary">
                    <?= $ndkhac['tenbaiviet_' . $lang] ?>
                </h3>
            </div>
            <div class="showText">
                <?= $ndkhac['noidung_' . $lang] ?>
            </div>
            <p class="read_more"><a class="wow fadeInUp" <?= full_href($ndkhac) ?>><?= $glo_lang['xem_them'] ?> <i
                        class="fa fa-caret-right"></i></a></p>
        </div>
        <div class="vc_col-sm-6">
            <div class="image-3d-effect">
                <!--                <div class="side left"></div>-->
                <!--                <div class="side right"></div>-->
                <div class="images">
                    <div class="front-image" style="background-image: url(<?= full_src($ndkhac, "") ?>)"></div>
                    <div class="back-image" style="background-image: url(<?= full_src($ndkhac, "", "icon_hover") ?>)">
                    </div>
                </div>
            </div>
            <script>
                $(function () {
                });
            </script>
        </div>
        <div class="clr"></div>
    </div>
</div>
<?php $gioithieu_home = LAY_baiviet(1, 1, "`p2` = 1");
if (!empty($gioithieu_home)) {
    $gioithieu_home = reset($gioithieu_home);
    $step_gioithieu = LAY_step(1);
    $step_gioithieu = reset($step_gioithieu);
    $bv_chitiet_gioithieu = DB_fet("*", "#_baiviet_chitiet", "`showhi` = 1 and id_parent =" . $gioithieu_home['id'] . "", "`catasort` DESC, `id` DESC", "", 1);
    ?>
    <div class="dv-home-tamnhin">
        <div class="pagewrap">
            <div class="article_heading">
                <h3 class="heading_secondary">
                    <?= $gioithieu_home['tenbaiviet_' . $lang] ?>
                </h3>
            </div>
            <div class="our_product_id">
                <?php foreach ($bv_chitiet_gioithieu as $rows) { ?>
                    <ul class="">
                        <li><img class="lazy" <?= full_src_lazy($rows, "") ?> alt="<?= $rows['tenbaiviet_' . $lang] ?>">
                        </li>
                        <h3>
                            <?= $rows['tenbaiviet_' . $lang] ?>
                        </h3>
                        <div class="showText2 limit-row-4" style="text-align: center;">
                            <?= strip_tags($rows['noidung_' . $lang]) ?>
                        </div>
                        <p class="read_more"><a class="wow fadeInUp c-scroll-js" <?= full_href($step_gioithieu, "#dv_" . $gioithieu_home['id']) ?>><?= $glo_lang['xem_them'] ?>
                                <i class="fa fa-caret-right"></i></a></p>
                    </ul>
                <?php } ?>
                <div class="clr"></div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener("hashchange", function () {
            window.scrollTo(window.scrollX, window.scrollY - 100);
        });
    </script>
<?php } ?>
<?php
$dichvu = LAY_baiviet(3, 4, "`opt2` = 1");
if (!empty($dichvu)) {
    ?>
    <div class="dv-home-dichvu">
        <div class="pagewrap">
            <div class="article_heading">
                <p class="heading_primary">
                    <?= $glo_lang['dich_vu'] ?>
                </p>
                <h3 class="heading_secondary">
                    <?= $glo_lang['mota_dich_vu'] ?>
                </h3>
            </div>
            <div id="pro_tabs">
                <ul class="listtabs">
                    <?php
                    //$i = 1;
                    foreach ($dichvu as $rows) { ?>
                        <li>
                            <a href="#tab<?= $rows['id'] ?>" onclick="return false;" <?= $rows['id'] == 1 ? 'class="selected"' : '' ?>>
                                <div class="media-body">
                                    <h3>
                                        <?= $rows['tenbaiviet_' . $lang] ?>
                                    </h3>
                                    <p>
                                        <?= strip_tags($rows['mota_' . $lang]) ?>
                                    </p>
                                </div>
                            </a>
                        </li>
                    <?php //$i++;
                    } ?>
                    <div class="clr"></div>
                </ul>
            </div>
            <!--            <div class="dv-home-gt">-->
            <!--                -->
            <?php //$data = array("1","1","1","1","1","1") ?>
            <!--                <div class="tab-content owl-auto owl-carousel owl-theme owl-custome" data0="-->
            <? //=$data[0] ?><!--" data1="-->
            <? //=$data[1] ?><!--" data2="-->
            <? //=$data[2] ?><!--" data3="-->
            <? //=$data[3] ?><!--" data4="-->
            <? //=$data[4] ?><!--" data5="-->
            <? //=$data[5] ?><!--" is_slidespeed="5000" is_autoplay="1">-->
            <!--                    -->
            <?php
            //                    $i = 1;
//                    foreach ($dichvu as $rows) { ?>
            <!--                        <div class="tab-item" >-->
            <!--                            <div class="form-intro"><img class="lazy" -->
            <? //= full_src_lazy($rows, "") ?>
            <!--                                                         alt="-->
            <? //= $rows['tenbaiviet_' . $lang] ?><!--"></div>-->
            <!--                        </div>-->
            <!--                        -->
            <?php //$i++;
//                    } ?>
            <!--                </div>-->
            <!--                <div class="clr"></div>-->
            <!--            </div>-->
            <div class="dv-home-gt">
                <div class="tab-content">
                    <?php
                    //$i = 1;
                    foreach ($dichvu as $rows) { ?>
                        <div class="tab-item" id="tab<?= $rows['id'] ?>">
                            <div class="form-intro"><img class="lazy" <?= full_src_lazy($rows, "") ?>
                                    alt="<?= $rows['tenbaiviet_' . $lang] ?>"></div>
                        </div>
                    <?php //$i++;
                    } ?>
                </div>
                <div class="clr"></div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $("#pro_tabs ul").idTabs("!mouseover");
                });
            </script>
            <div class="clr"></div>
        </div>
    </div>
<?php } ?>

<?php
$tin_moi = LAY_baiviet(5, 3, "`opt1` = 1");
if (!empty($tin_moi)) {
    ?>
    <div class="dv-home-tintuc">
        <div class="pagewrap">
            <div class="article_heading">
                <p class="heading_primary">
                    <?= $glo_lang['tin_moi_nhat'] ?>
                </p>
                <h3 class="heading_secondary">
                    <?= $glo_lang['tin_tuc_su_kien'] ?>
                </h3>
            </div>
            <div class="tt_page tt_page_top tt_page_top_home flex">
                <?php
                $i = 1;
                foreach ($tin_moi as $rows) { ?>
                    <div class="new_id_bs">
                        <li><a <?= full_href($rows) ?>>
                                <?php if ($i == 1 || $rows['icon_hover'] == "") { ?>
                                    <img class="lazy" <?= full_src_lazy($rows, "") ?> alt="<?= $rows['tenbaiviet_' . $lang] ?>">
                                <?php } else { ?>
                                    <img class="lazy" <?= full_src_lazy($rows, "", "icon_hover") ?>
                                        alt="<?= $rows['tenbaiviet_' . $lang] ?>">
                                <?php } ?>
                            </a></li>
                        <ul>
                            <h3><a <?= full_href($rows) ?>><?= $rows['tenbaiviet_' . $lang] ?></a>
                            </h3>
                            <p><i class="fa fa-calendar"></i>
                                <?= date("d/m/Y", $rows['ngaydang']) ?>
                            </p>
                        </ul>
                        <div class="clr"></div>
                    </div>
                    <?php $i++;
                } ?>
            </div>
            <div class="clr"></div>
        </div>
    </div>
<?php } ?>
<?php
$tuyendung = LAY_baiviet(6, 3);
if (!empty($tuyendung)) {
    ?>
    <div class="dv-home-tuyendung">
        <div class="pagewrap">
            <div class="col-md-12">
                <?php foreach ($tuyendung as $rows) { ?>
                    <div class="col-md-4">
                        <h4 class="text-color"><a <?= full_href($rows) ?> class="text-color"><?= $glo_lang['tuyen_dung'] ?></a></h4>
                        <h2 class="text-l"><a class="white" <?= full_href($rows) ?>><?= $rows['tenbaiviet_' . $lang] ?></a>
                        </h2>
                        <p class="m-0">
                            <?= $rows['mota_' . $lang] ?>
                        </p>
                    </div>
                <?php } ?>
                <div class="clr"></div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
$doitac = LAY_banner_new("`id_parent` = 29");
if (!empty($doitac)) {
    ?>
    <div class="dv-home-doitac">
        <div class="pagewrap">
            <div class="article_heading">
                <h4 class="heading_secondary">
                    <?= $glo_lang['doi_tac_cua_chung_toi'] ?>
                </h4>
            </div>
            <?php $data = array("3", "4", "5", "6", "7", "8") ?>
            <div class="logo_doitac owl-auto owl-carousel owl-theme owl-custome" id="images_slide" data0="<?= $data[0] ?>"
                data1="<?= $data[1] ?>" data2="<?= $data[2] ?>" data3="<?= $data[3] ?>" data4="<?= $data[4] ?>"
                data5="<?= $data[5] ?>" is_slidespeed="1000" is_navigation="1" is_autoplay="1">
                <?php foreach ($doitac as $rows) { ?>
                    <ul>
                        <li><a target="<?= $rows['blank'] ?>" <?= full_href($rows) ?>>
                                <img class="lazy" <?= full_src_lazy($rows) ?> alt="<?= $rows['tenbaiviet_' . $lang] ?>" /></a></li>
                    </ul>
                <?php } ?>
            </div>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
<?php } ?>