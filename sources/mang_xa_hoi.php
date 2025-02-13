<?php
$mangxahoi = SHOW_mxh();
foreach ($mangxahoi as $rows) {
    // Kiểm tra nếu có hình ảnh
    $icon_url = checkImage($fullpath, $rows['icon'], $rows['duongdantin']);
    if ($thongtin['mxh_is_anh'] == 1) {
        if(!empty($rows['icon'])){
        ?>
        <a title="<?=$rows['tenbaiviet_'.$lang] ?>" href="<?= $rows['duongdantin']?>" target="_blank" rel="nofollow noopener" class="button"
           style="<?=$rows['background'] ? 'background: '.$rows['background'] : '' ?>">
            <img src="<?=$icon_url ?>" alt="<?=$rows['tenbaiviet_'.$lang] ?> " height="100%" style="position:absolute; top:50%; left:50%; transform: translate(-50%,-50%);">
        </a>
        <?php
        } else { // Nếu không có hình, hiển thị icon
            ?>
            <a title="<?=$rows['tenbaiviet_'.$lang] ?>" href="<?= $rows['duongdantin']?>" target="_blank" rel="nofollow noopener"
               style="<?=$rows['background'] ? 'background: '.$rows['background'] : '' ?>">
                <i class="<?=$rows['fontawesome'] ?>"></i>
            </a>
            <?php
        }
    }else{
?>
<a title="<?=$rows['tenbaiviet_'.$lang] ?>" href="<?= $rows['duongdantin']?>" target="_blank" rel="nofollow noopener"
   style="<?=$rows['background'] ? 'background: '.$rows['background'] : '' ?>">
    <i class="<?=$rows['fontawesome'] ?>"></i>
</a>
<?php
        }
}?>