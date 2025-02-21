<div class="header_top header_top_pa">
    <div class="container-fluid">
        <div class="">
            <ul class="menu top-nav">
                <div class="san-uudai">
                    <ul class="features-list flex">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="index.php?page=gioithieu">Giới thiệu</a></li>
                        <li><a href="index.php?page=tintuc">Tin tức</a></li>
                        <li><a href="index.php?page=thu-vien-anh-va-video">Thư viện ảnh</a></li>
                        <li><a href="index.php?page=lienhe">Liên hệ</a></li>
                    </ul>
                </div>
                <li class="lang flex">
                    <a href="/en/" style="background:none;"><img src="images/vn.png" style="height:20px;width:20px;" alt="Tiếng việt"></a>
                    <span>|</span>
                    <a href="/en/" style="background:none;"><img src="images/eng.png" style="height:20px;width:20px;" alt="Tiếng anh"></a>
                </li>

            </ul>
        </div>
    </div>
</div>


<div class="header header_pa">
    <div class="container-fluid">
        <div class="row flex" style="align-items:center;">
            <div class="logo_top">
            	<a href="index.php"><img src="images/logo.png" /></a>
            </div>

            <div class="main_menu">
                <ul class="menu menu_pc">
                    <li>
                        <a href="index.php?page=gioithieu">Giới thiệu <i class="fa-regular fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="index.php?page=gioithieu">Về công ty <i class="fa-light fa-angle-right"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="index.php?page=gioithieu" title="Về công ty 1">Về công ty 1</a></li>
                                    <li><a href="index.php?page=gioithieu" title="Về công ty 2">Về công ty 2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="index.php?page=van-hoa-cong-ty">Văn hóa công ty</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?page=linhvuc">Lĩnh vực hoạt động <i class="fa-regular fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="index.php?page=linhvuc">Công nghiệp ô tô</a>
                            </li>
                            <li>
                                <a href="index.php?page=linhvuc">Dịch vụ cảng</a>
                            </li>
                            <li>
                                <a href="index.php?page=linhvuc">Cơ khí & Công nghiệp hỗ trợ</a>
                            </li>
                        </ul>
                    </li>

                    <li><a href="index.php?page=quan-he-co-dong">Quan hệ cổ đông <i class="fa-regular fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="index.php?page=thong-tin-co-dong">Thông tin cổ đông</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">Truyền thông <i class="fa-regular fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="index.php?page=tintuc">Tin tức</a>
                            </li>
                            <li>
                                <a href="index.php?page=tuyendung">Tin tuyển dụng</a>
                            </li>
                            <li>
                                <a href="index.php?page=thu-vien-anh-va-video">Thư viện ảnh và video</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?page=lienhe">Liên hệ</a>
                    </li>
                </ul>
            </div>
            <?php include "menu-mobile.php" ?>

        </div>
    </div>
</div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var dropdownContent = this.nextElementSibling;
          if (dropdownContent.style.display === "block") {
              dropdownContent.style.display = "none";
          } else {
              dropdownContent.style.display = "block";
          }
      });
  }
</script>


<script>
    $(document).ready(function(){
  // Thêm debounce để tối ưu hiệu năng
      let scrollTimer;
      $(window).scroll(function(){
        clearTimeout(scrollTimer);
        scrollTimer = setTimeout(function(){
          if ($(window).scrollTop() > 150) {
            $('.header').addClass('fixed');
        } else {
            $('.header').removeClass('fixed');
        }
    }, 10); // Độ trễ 10ms
    });
  });
</script>
