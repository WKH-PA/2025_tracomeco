<?php $banner_top = LAY_banner_new("`id_parent` = 16"); ?>
<div class="bannerMain">
    <a href="#dv-home-gioithieu" class="scroll">
        <div id="downButton"></div>
    </a>
    <div class="banner owl-carousel owl-theme owl-custome" id="owl-banner">
        <?php
        foreach ($banner_top as $rows) {
            ?>
            <li>
                <img style="height: 100%;" alt="<?=$rows['tenbaiviet_'.$lang]?>" src="<?= full_src($rows, "") ?>">
                <div class="slogan">
                    <h2 class="wow fadeInDown"><?=$rows['tenbaiviet_'.$lang]?></h2>
                    <h4 class="wow fadeInUp" data-wow-duration="3s"><?=$rows['mota_'.$lang]?></h4>
                </div>
            </li>
        <?php } ?>
    </div>
    <div class="clr"></div>
</div>
<div class="clr"></div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery("#owl-banner").owlCarousel({
            items: 1,
            lazyLoad: true,
            loop: true,
            nav: true,
            // animateIn: 'fadeInRight',
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
        });
    });
</script>



