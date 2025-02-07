<?php
    $id_parent = 0;
    $danhmuc = LAY_danhmuc($thongtin_step['id'],"","`id_parent` = '$id_parent'");
    $danhsachtinnoibat= LAY_baiviet(5,3);
  ?>
<div class="sidebar_menu" id="menu-center">
<div class="box_right_pro_view">
    <div class="title_right"><?=SHOW_text($thongtin_step['tenbaiviet_'.$lang]) ?></div>
    <ul class="child_menu_right">
        <?php foreach ($danhmuc as $rows) { ?>
            <li><a <?=full_href($rows) ?>><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a></li>
        <?php } ?>
    </ul>
    <div class="clr"></div>
</div>
<div class="box_right_pro_view">
    <div class="title_right">Tin tức mới</div>
    <div class="tt_page_top">
        <?php foreach ($danhsachtinnoibat as $rows) { ?>
            <div class="new_id_bs">
                <li><a <?=full_href($rows) ?>><?= full_img($rows) ?></a></li>
                <ul>
                    <h3><a <?=full_href($rows) ?>><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></a></h3>
                    <p class="dated"><i class="fa-regular fa-calendar-days"></i><?=date("d/m/Y", $rows['ngaydang']); ?></p>
                </ul>
            </div>
        <?php } ?>
    </div>
    <div class="clr"></div>
</div>
</div>


<script>

    function fixSticky() {
        let el = $('.sidebar_menu');
        if (el.length === 0) return; // Nếu không có sidebar, dừng luôn

        let stickyTop = el.offset().top; // Lấy vị trí ban đầu của sidebar
        let stickwidth = el.width(); // Giữ nguyên chiều rộng

        let footer = $('.stop-footer');
        let footerTop = footer.length ? footer.offset().top : $(document).height(); // Nếu không tìm thấy footer, đặt cuối trang

        $(window).scroll(function() {
            let windowTop = $(window).scrollTop(); // Lấy vị trí cuộn trang
            let stickyHeight = el.outerHeight(); // Chiều cao sidebar
            let limit = footerTop - stickyHeight - 500; // Giới hạn sidebar không đè lên footer

            if (windowTop > stickyTop && windowTop < limit) {
                el.css({
                    position: 'fixed',
                    top: '0px', // Khoảng cách từ top
                    width: stickwidth,
                });
            } else if (windowTop >= limit) {
                el.css({
                    position: 'absolute',
                    top: (footerTop - stickyHeight - 20) + 'px', // Giữ sidebar ngay trên footer
                    width: stickwidth,
                });
            } else {
                el.css({
                    position: 'relative',
                });
            }
        });
    }

    $(document).ready(function() {
        fixSticky();
    });


    $(document).ready(function() {
        fixSticky();
    });


    $(function() {
        fixSticky();
    })
</script>

