<?php
/**
 * The template for displaying the footer.
 *
 * @package OceanWP WordPress theme
 */

?>

  </main><!-- #main -->

  <?php do_action( 'ocean_after_main' ); ?>

  <?php do_action( 'ocean_before_footer' ); ?>

  <?php
  // Elementor `footer` location.
  if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
    ?>

    <?php do_action( 'ocean_footer' ); ?>

  <?php } ?>

  <?php do_action( 'ocean_after_footer' ); ?>

</div><!-- #wrap -->

<?php do_action( 'ocean_after_wrap' ); ?>

</div><!-- #outer-wrap -->

<?php do_action( 'ocean_after_outer_wrap' ); ?>

<?php
// If is not sticky footer.
if ( ! class_exists( 'Ocean_Sticky_Footer' ) ) {
  get_template_part( 'partials/scroll-top' );
}
?>

<?php
// Search overlay style.
if ( 'overlay' === oceanwp_menu_search_style() ) {
  get_template_part( 'partials/header/search-overlay' );
}
?>

<?php
// If sidebar mobile menu style.
if ( 'sidebar' === oceanwp_mobile_menu_style() ) {

  // Mobile panel close button.
  if ( get_theme_mod( 'ocean_mobile_menu_close_btn', true ) ) {
    get_template_part( 'partials/mobile/mobile-sidr-close' );
  }
  ?>

  <?php
  // Mobile Menu (if defined).
  get_template_part( 'partials/mobile/mobile-nav' );
  ?>

  <?php
  // Mobile search form.
  if ( get_theme_mod( 'ocean_mobile_menu_search', true ) ) {
    ob_start();
    get_template_part( 'partials/mobile/mobile-search' );
    echo ob_get_clean();
  }
}
?>

<?php
// If full screen mobile menu style.
if ( 'fullscreen' === oceanwp_mobile_menu_style() ) {
  get_template_part( 'partials/mobile/mobile-fullscreen' );
}
?>

<?php wp_footer(); ?>


<script>
jQuery(document).ready(function(){
   var divs = jQuery('.text1, .text3');
     var counter = -400;
var lastScrollTop = 0;
var st = jQuery(window).scrollTop();
jQuery(window).on('scroll', function() {
  
   st = jQuery(window).scrollTop();
   if (st > lastScrollTop){
     console.log("yes");
    var counterIncrement = counter -= 2;
      var transform = "translate3d(" + counterIncrement.toFixed(2) + "px, 0px, 0px)";

       divs.css({ 'transform' : transform });
   } else {
        console.log("no");
     var counterIncrement = counter += 2;
      var transform = "translate3d(" + counterIncrement.toFixed(2) + "px, 0px, 0px)";

       divs.css({ 'transform' : transform });
   }
   lastScrollTop = st;
 
});
    
     var divs2 = jQuery('.text2');
     var counter2 = -400;
var lastScrollTop2 = 0;
jQuery(window).on('scroll', function() {
  
  var st2 = jQuery(this).scrollTop();
   if (st2 > lastScrollTop){
     console.log("yes");
    var counterIncrement2 = counter2 -= 2;
      var transform2 = "translate3d(" + counterIncrement2.toFixed(2) + "px, 0px, 0px)";

       divs2.css({ 'transform' : transform2 });
   } else {
        console.log("no");
     var counterIncrement2 = counter2 += 2;
      var transform2 = "translate3d(" + counterIncrement2.toFixed(2) + "px, 0px, 0px)";

       divs2.css({ 'transform' : transform2 });
   }
   lastScrollTop = st;
});
    }); 
</script>


<script>
  jQuery(document).ready(function(){
    jQuery('.text-hover').hover(function(){ 
      var id = jQuery(this).attr("id");
      console.log(id);
      jQuery('#image' + id).fadeIn(1000).siblings().fadeOut(0);       
    });
  });
</script>
<!-- 
<script src="./js/animation.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>

<script>
  document.addEventListener('mousemove', function (evt) {
  gsap.to('.image-trail', {
    x: evt.clientX,
    y: evt.clientY,
    stagger: -0.12
  })
});
</script> -->



<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
    jQuery(document).ready(function(){
  $(function() {
  $(".img_trail_group").draggable();
});
});
</script>


</body>
</html>




