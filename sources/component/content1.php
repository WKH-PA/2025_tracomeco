<?php
$dataCategoryStep9 = DB_fet("*", "#_danhmuc", "`step` = '9' and showhi =1 and id_parent=0", " `catasort` ASC", "5", "arr");


?>

<div class="tracomeco_gt_noidung p-t-20 p-b-20">
    <div class="container-fluid">
        <div class="row flex top">
            <div class="gt_right">
                <img src="delete/gioithieu/building.jpg">
                <ul class="uu-diem wow animate__fadeInLeft"
                    style="visibility: visible; animation-name: fadeInLeft;">
                    <?php foreach ($dataCategoryStep9 as $item) { ?>
                        <li><?= $item['tenbaiviet_' . $lang]?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="gt_left">
                <img src="delete/gioithieu/gt-noidung-1.png">
                <div class="tracomeco_title_main">
                    <h3>Sứ mệnh</h3>
                    <p>Trải nghiệm khách hàng là chìa khóa của sự thành công</p>
                </div>
                <p>Hiện nay, Công ty đang đầu tư thực hiện dự án Đầu tư nâng cấp mở rộng bến sà lan 1.000 DWT trên
                    cơ sở mặt bằng các cầu cảng có sẵn tại Công ty, đáp ứng nhu cầu ngày càng cao về vận chuyển hàng
                    hóa qua cảng. Bên cạnh đó, Công ty đang triển khai xây dựng 2 dự án đầu tư : Dự án Xây dựng Nhà
                    máy lắp rắp, chế tạo xe tải, xe khách trên 24 chỗ ngồi 3.000 chiếc/năm và lắp ráp động cơ ôtô
                    5.000 chiếc/năm và Dự án Xây dựng Nhà máy chế tạo động cơ ôtô 10.000 chiếc/năm phục vụ nhu cầu
                    cấp thiết về phát triển hệ thống giao thông vận tải của cả nước nói chung và của Thành phố Hồ
                    Chí Minh nói riêng.</p>
            </div>
        </div>
        <div class="row flex">
            <div class="gt_left">
                <img src="delete/gioithieu/gt-noidung-2.png">
                <div class="tracomeco_title_main">
                    <h3>Giá trị cốt lõi</h3>
                </div>
                <p>Trước thực trạng ngành cơ khí trong giai đoạn khó khăn, khó tìm kiếm việc làm và tình hình cạnh
                    tranh ngày càng khốc liệt của cơ chế thị trường, Công ty đã chủ động, sáng tạo tìm kiếm việc làm
                    và chuyển hướng mở rộng, đa dạng hóa các lĩnh vực sản xuất kinh doanh.</p>
                <p>Đặc biệt, trong những năm gần đây Công ty không chỉ sản xuất kinh doanh trong lĩnh vực cơ khí như
                    đại tu, sửa chữa xe máy thi công công trình, sản xuất kết cấu thép các loại... mà còn tham gia
                    chế tạo các thiết bị đồng bộ, lắp đặt, xây dựng các nhà máy công nghiệp, chế tạo các loại xe
                    rơ-moóc, sửa chữa - lắp ráp ôtô, xe máy, thi công xây dựng đường xá, cầu nông thôn, mở rộng các
                    dịch vụ vận chuyển hàng hóa.</p>
            </div>
            <div class="gt_right">
                <img src="delete/gioithieu/gt-noidung-3.png">
                <div class="tracomeco_title_main">
                    <h3>Mục tiêu &amp; Tầm nhìn</h3>
                </div>
                <p>Trải qua trên 20 năm hoạt động, bằng sức mạnh đoàn kết, nhất trí của tập thể CB-CNV luôn thực
                    hiện tốt những chủ trương đúng đắn của Ban lãnh đạo, Công ty đang hoạt động ngày càng có hiệu
                    quả, hoàn thành nhiệm vụ chiến lược của Bộ và Nhà nước giao, xứng đáng là một Công ty mạnh về cơ
                    khí, đáp ứng nhu cầu phát triển công nghiệp hóa, hiện đại hóa ở phía Nam.</p>
            </div>
        </div>
    </div>
</div>