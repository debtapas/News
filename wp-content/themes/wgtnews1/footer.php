<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>

	</div><!-- #content -->

<!--Footer Add Section start -->
<div class="col-md-12 col-12 ad-space">
             <?php
           if ( is_active_sidebar( 'footer-add-widgets' ) ) {
         ?>
          <div class="widget-column footer-widget-1">
          <?php dynamic_sidebar( 'footer-add-widgets' ); ?>
          </div>
        <?php } ?>
          </div>
          <!--Footer Add Section end -->


  <!-- footer -->
 <?php if ( is_active_sidebar( 'footerone' ) || is_active_sidebar( 'footertwo' ) || is_active_sidebar( 'footerthree' ) ) {?>
            <footer class="footer">
                <div class="container">
                    <div class="row">
                       
                                <?php if ( is_active_sidebar( 'footerone' ) ) {?>
                                    <div class="col-lg-4 col-md-6 col-12 footer_card footer_scl">              
                                        <div class="row">
                                            <?php dynamic_sidebar( 'footerone' ); ?>
                                        </div> 
                                    </div>
                                <?php } ?>

                                <?php if ( is_active_sidebar( 'footertwo' ) ) {?>
                                    <div class="col-lg-4 col-md-6 col-12 footer_card">              
                                        <div class="row">
                                            <?php dynamic_sidebar( 'footertwo' ); ?>
                                        </div> 
                                    </div>
                                <?php } ?>

                                <?php if ( is_active_sidebar( 'footerthree' ) ) {?>
                                    <div class="col-lg-4 col-md-6 col-12 footer_card">              
                                        <div class="row">
                                            <?php dynamic_sidebar( 'footerthree' ); ?>
                                        </div> 
                                    </div>
                                <?php } ?>    
                    </div>
                </div>
                 <?php } ?>
                 
                <div class="footer_cpy_rit">
                    <div class="container">
               <p> <?php echo date("Y"); ?> , All Right Reserved - Developed by <a href="https://www.webgentechnologies.com/">WGT</a></p>
               </div>
               </div>
            </footer>
   
    <!-- footer ends-->
 
	<script type="text/javascript">
      jQuery('.owl-carousel').owlCarousel({
                loop:true,
                autoplay:true,
                margin:10,
                nav:false,
                responsive:{
                   0:{
                     items:1
                   },
                   600:{
                     items:2
                   },
                  1000:{
                     items:3
                   }
                       }
      })

   </script>

<script type="text/javascript">
    
    jQuery('.owl-carousel1').owlCarousel({
    loop:true,
    nav:true,
    dots:false,
    autoWidth:true,
    responsive:{
        0:{
            items:3
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>

<script type="text/javascript">
 var selector = '.filter-button';

$(selector).on('click', function(){
    $(selector).removeClass('active');
    $(this).addClass('active');
});
</script>
    
  </body>
</html>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
