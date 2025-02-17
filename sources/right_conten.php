<?php
    $id_parent = [5, 6];
    if (in_array($thongtin_step['id'], $id_parent)) {
        $danhmuc = GET_menu(18);
    }else{
        $danhmuc = LAY_danhmuc($thongtin_step['id'],"","`id_parent` = 0");
    }
    $thongtin_step = LAY_anhstep_now($thongtin_step['id']);
    $danhsachtinnoibat= LAY_baiviet(5,3,'`opt` =1');
    $url_parts = explode('/', $_SERVER['REQUEST_URI']);
    $seo_name = end($url_parts);
  ?>


<div class="box_right_pro_view">
    <div class="title_right"><?= SHOW_text($thongtin_step['tenbaiviet_' . $lang]) ?></div>
    <ul class="child_menu_right">
        <?php foreach ($danhmuc as $rows) {
            $active_class = ($rows['seo_name'] == $seo_name) ? 'class="active"' : '';
            ?>
            <li ><a <?= full_href($rows) . $active_class ?>><?= SHOW_text($rows['tenbaiviet_' . $lang]) ?></a></li>
        <?php } ?>
    </ul>
    <div class="clr"></div>
</div>


<div class="box_right_pro_view">
    <div class="title_right"><?=$glo_lang['tin_tuc_moi']?></div>
    <div class="tt_page_top">
        <?php foreach ($danhsachtinnoibat as $rows) { ?>
            <div class="new_id_bs">
                <li><a <?= full_href($rows) ?>><?= full_img($rows) ?></a></li>
                <ul>
                    <h3><a <?= full_href($rows) ?>><?= SHOW_text($rows['tenbaiviet_' . $lang]) ?></a></h3>
                    <p class="dated"><i class="fa-regular fa-calendar-days"></i><?= date("d/m/Y", $rows['ngaydang']); ?>
                    </p>
                </ul>
            </div>
        <?php } ?>
    </div>
    <div class="clr"></div>
</div>


<script>

    function fixSticky() {
        let el = $('.sidebar_menu');
        if (el.length === 0) return;

        let stickwidth = el.width();
        let footer = $('.stop-footer');

        function updateSticky() {
            let windowTop = $(window).scrollTop();
            let stickyTop = el.parent().offset().top; // Lấy vị trí cha chứa sidebar
            let stickyHeight = el.outerHeight();
            let footerTop = footer.length ? footer.offset().top : $(document).height();
            let limit = footerTop - stickyHeight - 50; // Giảm khoảng cách giới hạn

            if (windowTop > stickyTop && windowTop < limit) {
                el.css({
                    position: 'fixed',
                    top: '75px',
                    width: stickwidth,
                });
            } else if (windowTop >= limit) {
                el.css({
                    position: 'absolute',
                    top: (footerTop - stickyHeight - 10) + 'px',
                    width: stickwidth,
                });
            } else {
                el.css({
                    position: 'relative',
                    top: 'auto'
                });
            }
        }

        $(window).on("scroll resize", updateSticky); // Lắng nghe cả sự kiện scroll và resize
        updateSticky(); // Chạy lần đầu tiên
    }

    $(document).ready(fixSticky);

</script>

