<div id="back-top-button">
  <i class="fa-solid fa-angle-up"></i>
</div>



<script>
  $(window).scroll(function(e){
  var t = parseInt( $(window).scrollTop() );
  if ( t > 300 ) {
    $('#back-top-button').fadeIn();
  } else {
    $('#back-top-button').fadeOut();
  }
});
$('#back-top-button').click(function(){
  $("html, body").animate({ scrollTop: 0 }, "slow");
});
</script>