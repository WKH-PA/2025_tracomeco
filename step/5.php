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
                        <h3><?=$rows['tenbaiviet_'.$lang]?></h3>
                    <ul>
                        <p><?= $rows['noidung_' . $lang] ?></p>
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
                    <iframe class="iframe_load" iframe-src="<?= $thongtin_step['map_google'] ?>" width="100%"
                            height="580" frameborder="0" style="border:0" allowfullscreen></iframe>
                <?php } ?>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>
    </div>

<section class="tracomeco_gt_visao p-b-60">
    <div class="container-fluid">
        <div class="tracomeco_title_main">
            <h2 class="text-uppercase m-b-10">Đại lý của chúng tôi</h2>
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
                        data-title="<?= $rows['tenbaiviet_' . $lang] ?>"
                        data-content="<?= htmlspecialchars($rows['noidung_' . $lang]) ?>"
                        onclick="openCity(this, '<?= $cityId ?>')">
                    <?= $rows['tenbaiviet_' . $lang] ?>
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
            $activeClass = ($count == 1) ? 'active' : ''; // Mặc định hiển thị nội dung đầu tiên
            ?>
            <div id="<?= $cityId ?>" class="tracomeco-container tracomeco-border city <?= $activeClass ?>">
                <iframe src="<?= $rows['mota_' . $lang] ?>" width="100%" height="400" style="border:0;" allowfullscreen loading="lazy"></iframe>
                <p><?= $rows['noidung_' . $lang] ?></p>
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

    function openCity(button, cityId) {
        document.querySelectorAll(".tablink").forEach(btn => btn.classList.remove("tracomeco-red"));
        button.classList.add("tracomeco-red");
        document.querySelectorAll(".city").forEach(city => city.classList.remove("active"));
        document.getElementById(cityId).classList.add("active");
        let title = button.getAttribute("data-title");
        let content = button.getAttribute("data-content");
        console.log("Tiêu đề: ", title);
        console.log("Nội dung: ", content);
    }


</script>
