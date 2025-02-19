 <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

<script type='text/javascript' src='js/jquery.marquee.min.js'></script>
<script type="text/javascript" src="js/jquery.carouFredSel.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
<!--<script type="text/javascript" src="js/jquery.masonry.min.js"></script>-->
<script type="text/javascript" src="js/jquery.idTabs.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.caroufredsel/6.2.1/jquery.carouFredSel.min.js"></script>-->

 <!-- <script type="text/javascript" src="js/script218.js"></script>-->
<!--<script type="text/javascript" src="images/fancybox/jquery.fancybox.js"></script>-->
<!-- <script type="text/javascript" language="javascript" src="js/flexcroll.js"></script>-->
<!--<script src="js/galleria-1.2.8.min.js"></script>-->
<!--<script type="text/javascript" src="js/jquery.unleash.js"></script>-->
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/noty.js" defer="defer" async></script>
<!--<script type="text/javascript" src="js/jquery.mmenu.all.js"></script>-->
<!--<script type="text/javascript" src="js/owl.carousel.js"></script>-->
<!--<script type="text/javascript" src="js/scroll.js"></script>-->
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.caroufredsel.js"></script>
<!--<script type="text/javascript" src="js/jquery.idtabs.min.js"></script>-->
<script type="text/javascript" src="js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="js/script218.js"></script>
<script type="text/javascript" src="images/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/owl.carousel.js"></script>
<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        new WOW().init();-->
<!--        $('.content a').fancybox();-->
<!--    });-->
<!--</script>-->
<!--<script type="text/javascript" src="js/jquery.simplyscroll.js"></script>-->
<!--<script type="text/javascript">-->
<!--    (function ($) {-->
<!--        $(function () { //on DOM ready-->
<!--            $("#scroller").simplyScroll();-->
<!--        });-->
<!--    })(jQuery);-->
<!--</script>-->
<script>
    // function openCity(evt, cityName) {
    //     var i, x, tablinks;
    //     x = document.getElementsByClassName("city");
    //     for (i = 0; i < x.length; i++) {
    //         x[i].style.display = "none";
    //     }
    //     tablinks = document.getElementsByClassName("tablink");
    //     for (i = 0; i < x.length; i++) {
    //         tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
    //     }
    //     document.getElementById(cityName).style.display = "block";
    //     evt.currentTarget.className += " w3-red";
    // }
    //
    // function openCity2(evt, cityName) {
    //     var i, tabcontent2, tablinks2;
    //     tabcontent2 = document.getElementsByClassName("tabcontent2");
    //     for (i = 0; i < tabcontent2.length; i++) {
    //         tabcontent2[i].style.display = "none";
    //     }
    //     tablinks2 = document.getElementsByClassName("tablinks2");
    //     for (i = 0; i < tablinks2.length; i++) {
    //         tablinks2[i].className = tablinks2[i].className.replace(" active", "");
    //     }
    //     document.getElementById(cityName).style.display = "block";
    //     evt.currentTarget.className += " active";
    // }

    $(document).ready(function () {
        $(function () {
          $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
              Counter: $(this).text()
            }, {
              duration: 10000,
              easing: 'swing',
              step: function (now) {
                $(this).text(Math.ceil(now));
              }
            });
          });
        });
        var topH = $(".header").height();
        $(".l-header").css({ top: topH });
        $(window).scroll(function () {
            if ($(this).scrollTop() > topH) {
                $('.l-header').addClass("fixed");
            } else {
                $('.l-header').removeClass("fixed");
            }
        });

    });
</script>

<script type="text/javascript">
    // $(document).ready(function () {
    //     $('.autoplay').slick({
    //         dots: false,
    //         infinite: true,
    //         slidesToShow: 4,
    //         slidesToScroll: 1,
    //         autoplay: true,
    //         autoplaySpeed: 3000,
    //         responsive: [
    //             {
    //                 breakpoint: 767,
    //                 settings: {
    //                     slidesToShow: 2,
    //                     slidesToScroll: 1
    //                 }
    //             },
    //         ]
    //     });
    //     $('.autoplay1').slick({
    //         dots: false,
    //         infinite: true,
    //         slidesToShow: 4,
    //         slidesToScroll: 1,
    //         autoplay: true,
    //         autoplaySpeed: 3000,
    //         responsive: [
    //             {
    //                 breakpoint: 767,
    //                 settings: {
    //                     slidesToShow: 2,
    //                     slidesToScroll: 1
    //                 }
    //             },
    //         ]
    //     });
    // });
</script>

<script type="text/javascript">
    // $(document).ready(function () {
    // $('.multiple-items').slick({
    //     dots: false,
    //     infinite: true,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     autoplay: true,
    //     autoplaySpeed: 3000,
    // });
    // $('.multiple-items1').slick({
    //     dots: false,
    //     infinite: true,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     autoplay: true,
    //     autoplaySpeed: 10000,
    //
    // });
    // $('.multiple-items2').slick({
    //     dots: false,
    //     infinite: true,
    //     slidesToShow: 2,
    //     slidesToScroll: 1,
    //     autoplay: true,
    //     autoplaySpeed: 10000,
    //     responsive: [
    //         {
    //             breakpoint: 767,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1
    //             }
    //         },
    //     ]
    //
    // });
    // });
</script>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        // var hei_box_menu = $(".dv-header").height();
        // $(".dv-menu-home").height(hei_box_menu + 20);
        $(".scroll").click(function (event) {
            var hei_box_menu = $(".dv-header").height() - 158;
            if ($(".dv-header.fixed").height() != null) {
                console.log(123);
                hei_box_menu = $(".dv-header.fixed").height() - 40;
            }
            event.preventDefault();
            // console.log($(this.hash).offset().top)
            $('html,body').animate({ scrollTop: $(this.hash).offset().top - hei_box_menu - 40 }, 0);
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

        if ("IntersectionObserver" in window) {
            let lazyImageObserver = new IntersectionObserver(function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        let lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;
                        lazyImage.srcset = lazyImage.dataset.srcset;
                        //lazyImage.classList.remove("lazy");
                        lazyImageObserver.unobserve(lazyImage);
                    }
                });
            });

            lazyImages.forEach(function (lazyImage) {
                lazyImageObserver.observe(lazyImage);
            });
        } else {
        }
    });
    var loadDeferredStyles = function () {
        // var addStylesNode = document.getElementById("deferred-styles");
        // if (!addStylesNode) return;
        // var replacement = document.createElement("div");
        // replacement.innerHTML = addStylesNode.textContent;
        // document.body.appendChild(replacement);
        // addStylesNode.parentElement.removeChild(addStylesNode);
    };

    var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
        window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;

    if (raf) {
        raf(function () { window.setTimeout(loadDeferredStyles, 0); });
    } else {
        window.addEventListener('load', loadDeferredStyles);
    }


</script>