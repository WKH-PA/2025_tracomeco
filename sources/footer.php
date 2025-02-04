<div class="footer">
    <div class="pagewrap">
        <div class="ft-top">
            <?php
            $text_footer = LAYTEXT_rieng(88);
            ?>
            <img class="lazy" <?=full_src_lazy($text_footer,"")?> alt="<?=$text_footer['tenbaiviet_'.$lang]?>">
            <p><?=$text_footer['tenbaiviet_'.$lang]?></p>
        </div>
        <div class="top_contact">
            <div class="dv-titcus"><?=$glo_lang['customer_support'] ?></div>
            <div class="info-item">
                <div class="info-icon">
                    <i class="fa fa-map-marker"></i>
                </div>
                <div class="info-content">
                    <h6 class="info-title"><?=$glo_lang['dia_chi']?></h6>
                    <p class="info-sub-title"><?=$thongtin['diachi_'.$lang]?></p>
                </div>
                <div class="clr"></div>
            </div>
            <div class="info-item">
                <div class="info-icon">
                    <i class="fa fa-map-marker"></i>
                </div>
                <div class="info-content">
                    <h6 class="info-title"><?=$glo_lang['email_cua_chung_toi']?></h6>
                    <p class="info-sub-title"><?=$glo_lang['email_vi_lang']?></p>
                </div>
                <div class="clr"></div>
            </div>
            <div class="info-item">
                <div class="info-icon">
                    <i class="fa fa-map-marker"></i>
                </div>
                <div class="info-content">
                    <h6 class="info-title"><?=$glo_lang['lien_he_chung_toi']?></h6>
                    <p class="info-sub-title"><?=$glo_lang['sodienthoai_vi_lang']?></p>
                </div>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>
        <div class="center-footer">
            <!-- <ul class="menu-footer">
                <h3><?=$glo_lang['customer_support'] ?></h3>
                <?php
                $step = LAY_step();
                ?>
                <li><a href="<?=$full_url?>"><?=$glo_lang['trang_chu']?></a></li>
                <?php foreach ($step as $s){ ?>
                    <li><a <?=full_href($s)?>><?=$s['tenbaiviet_'.$lang]?></a></li>
                <?php } ?>
            </ul> -->
            <ul>
                <?php
                $lienhe = LAY_step(8,1);
                if ($lienhe['map_google'] != "") { ?>
                    <iframe class="iframe_load" iframe-src="<?= $lienhe['map_google'] ?>" width="100%"
                            height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                <?php } ?>
            </ul>
            <div class="clr"></div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="bottom_ft">
    <p><?= $glo_lang['ban_quyen_name'] ?> | <a href="https://web30s.vn/" title="thiết kế website" target="_blank">
            <?=$glo_lang['thiet_ke_va_phat_trien']?>
        </a> <a href="https://web30s.vn/" target="_blank">P.A Việt Nam</a></p>
    <div class="clr"></div>
</div>
<div id="back-top"><a href="#top"><i class="fa fa-angle-double-up"></i></a></div>
<a href="tel:<?=$thongtin['hotline_vi']?>" class="popup dmd-phone dmd-green dmd-show mobile" title="Hotline">
    <div class="dmd-ph-circle"></div>
    <div class="dmd-ph-circle-fill"></div>
    <div class="dmd-ph-img-circle"></div>
</a>
<!--<link href="css/lightgallery.min.css" rel="stylesheet" type="text/css" media="all"/>-->
<!--<script type="text/javascript" src="js/lightgallery-all.min.js"></script>-->
<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        $('#lightgallery').lightGallery();-->
<!--    });-->
<!--</script>-->
