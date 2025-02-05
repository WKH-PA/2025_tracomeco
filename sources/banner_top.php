<?php $banner_top = LAY_banner_new("`id_parent` = 16"); ?>
<div class="pa_home_banner">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            foreach ($banner_top as $rows) {
                ?>
                <div class="swiper-slide">
                        <li>
                            <img src="<?= full_src($rows, "") ?>">
                        </li>
                </div>
            <?php } ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>