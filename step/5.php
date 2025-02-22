<?php
if (isset($_SESSION['id'])) {
    $info_acc = DB_fet("*", "#_members", "`id` = '" . $_SESSION['id'] . "' AND `phanquyen` = 0", "`id` DESC", 1);
    if (mysqli_num_rows($info_acc)) {
        $info_acc = mysqli_fetch_assoc($info_acc);
        foreach ($info_acc as $key => $value) {
            ${$key} = $value;
        }
    }
}
// full_src($thongtin_step, '')
include _source . "box-header.php";
?>
    <div class="page_conten_page p-t-60 p-b-60">
        <div class="container-fluid">
            <div class="left_contact">
                <div class="contact-thongtin">
                    <?php
                    $i = 0;
                    $baiviet = LAY_baiviet($thongtin_step['id'],1,'opt =1 ');
//                    echo $baiviet ;
                    foreach ($baiviet as $rows) {
                        $i++;
                        // if($i > 1) continue;
                        // full_img($rows, '')
                        ?>
                        <h3><?=GET_text('tenbaiviet')?></h3>
                    <ul>
                        <p><?=GET_text('noidung') ?></p>
                    </ul>

                    <?php } ?>
                </div>
                <h3 class="p-t-30"><?=$glo_lang['gui_thong_tin_lien_he']?></h3>
                <div class="contact">
                    <?php include _source."lien_he_form.php";?>
                </div>
            </div>

            <div class="contact-maps">
                <?php if ($thongtin_step['map_google'] != "") { ?>
                    <iframe src="<?= $thongtin_step['map_google']?>" width="100%" height="580" style="border:0;" allowfullscreen loading="lazy"></iframe>
                <?php } ?>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>
    </div>

<section class="tracomeco_gt_visao p-b-60">
    <div class="container-fluid">
        <div class="tracomeco_title_main">
            <h2 class="text-uppercase m-b-10"><?=$glo_lang['dai_ly_cua_chung_toi']?></h2>
        </div>
        <div class="tracomeco-bar tracomeco-black tracomeco-flex">
            <?php
            $baiviet2 = LAY_baiviet($thongtin_step['id'], 2, 'opt = 0');
            $count = 1;
            foreach ($baiviet2 as $rows) {
                $cityId = "city_" . $count;
                $activeClass = ($count == 1) ? 'tracomeco-red' : ''; // Nút đầu tiên có màu xanh
                ?>
                <button class="tracomeco-bar-item tracomeco-button tablink <?= $activeClass ?>"
                        data-id="<?= $cityId ?>"
                        data-title="<?= GET_text('tenbaiviet') ?>"
                        data-content="<?= htmlspecialchars(GET_text('noidung')) ?>"
                        onclick="openCity(this, '<?= $cityId ?>')">
                    <?= GET_text('tenbaiviet') ?>
                </button>
                <?php
                $count++;
            }
            ?>
        </div>
        <?php
        $count = 1;
        foreach ($baiviet2 as $rows) {
            $cityId = "city_" . $count;
            $activeClass = ($count == 1) ? 'active' : '';
            ?>
            <div id="<?= $cityId ?>" class="tracomeco-container tracomeco-border city <?= $activeClass ?>">
                <iframe src="<?= GET_text('mota') ?>" width="100%" height="400" style="border:0;" allowfullscreen loading="lazy"></iframe>
                <p><?= GET_text('noidung') ?></p>
            </div>
            <?php
            $count++;
        }
        ?>
    </div>
</section>


<style>
    .tracomeco-flex {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }
    .tablink {
        padding: 10px 15px;
        background: #333;
        color: #fff;
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s ease;
    }
    .tablink.tracomeco-red {
        background: red;
    }
    .city {
        display: none;
    }
    .city.active {
        display: block;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let firstTab = document.querySelector(".tablink");
        if (firstTab) {
            firstTab.click();
        }
    });
</script>

<script>
    function openCity(element, cityName) {
        var i, x, tablinks;

        // Ẩn tất cả các phần tử có class "city"
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }

        // Xóa class "tracomeco-red" khỏi tất cả các tablinks
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("tracomeco-red"); // Dùng classList.remove thay vì replace()
        }

        // Hiển thị nội dung của tab được chọn
        var cityElement = document.getElementById(cityName);
        if (cityElement) {
            cityElement.style.display = "block";
        } else {
            console.error("Không tìm thấy phần tử có ID:", cityName);
            return;
        }

        // Thêm class "tracomeco-red" vào nút được click
        element.classList.add("tracomeco-red");

        console.log("Tab được chọn:", element.innerText);
    }
</script>
