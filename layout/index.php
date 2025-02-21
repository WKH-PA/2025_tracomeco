<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Tracomeco || Công ty CP Cơ khí Xây dựng giao thông</title>
	<meta name='keywords' content='Công ty CP Cơ khí Xây dựng giao thông'/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png"/>
	<link href="css/animated-on3step.css" rel="stylesheet" type="text/css">
	<link href="css/flaticon.css" rel="stylesheet" type="text/css" />
	
	<!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<link href="css/font.css" rel="stylesheet" type="text/css" />
	<link href="css/grid.css" rel="stylesheet" type="text/css" /> 
	<link href="css/style.css" rel="stylesheet" type="text/css" /> 
	<link href="css/style_responsive.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- icons -->
    <link href="Font-Awesome-640/css/all.css" rel="stylesheet" type="text/css" />
	<!---css menu mobile--->
	<link rel="stylesheet" type="text/css" href="css/jquery.mmenu.all.css">
	<link href="css/animate.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link rel="stylesheet" type="text/css" href="images/fancybox/jquery.fancybox.css"/>

	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/jquery.caroufredsel.js"></script>
	<script type="text/javascript" src="js/wow.min.js"></script>
	<script type="text/javascript" src="js/jquery.idtabs.min.js"></script>
	<script type="text/javascript" src="js/jquery.mmenu.all.js"></script>
	<script type="text/javascript" src="js/script218.js"></script>
	<script type="text/javascript" src="images/fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="js/owl.carousel.js"></script>

</head>

<script>
	$(document).ready(function(){
	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
<body>
	<?php include"header.php";?>
	<div class="content">
		<?php
		if (isset($_GET["page"]))
		{
			$page=$_GET["page"];
			$page.=".php";
			if($page=="index.php")
				$page="trangchu.php";
			$page = str_replace("http","XXX",$page);
			$page = str_replace("https","XXX",$page);
			$page = str_replace("ftp","XXX",$page);
			$page = str_replace("ftps","XXX",$page);
			if (is_file($page))
				include $page;
			else echo "<div class='no_data'></div> <div class='pagewrap page_conten_page'>Under Contruction</div>";
		}
		else 
			include "trangchu.php";
		?>
		<div class="clr"></div>
	</div>
	<?php include"footer.php";?>

</body>
</html>