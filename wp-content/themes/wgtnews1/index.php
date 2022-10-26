<?php
   /**
    * The main template file
    *
    * This is the most generic template file in a WordPress theme
    * and one of the two required files for a theme (the other being style.css).
    * It is used to display a page when nothing more specific matches a query.
    * E.g., it puts together the home page when no home.php file exists.
    *
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package WordPress
    * @subpackage Twenty_Nineteen
    * @since Twenty Nineteen 1.0
    */
    
   get_header();
   ?>
<!-- Top Banner Start Here -->
<div id="banner">
   <div class="container j_banner">
      <div class="row">
         <?php 
            $top_banners = get_posts(array(
              'post_type' => 'post',
              'numberposts' => 3,
              'order' =>  'ASC',
            ));
            
              $i =1;
              $j=1;
              foreach($top_banners as $top_banner ){
              if ($i ==1) {
            ?>
         <div class="col-md-8 col-12 lrpad">
            <div class="box-<?php echo $i; ?>">
               <img src="<?php echo get_the_post_thumbnail_url($top_banner->ID); ?>" alt="#" class="img-fluid">
               <div class="banner_text_part">
                  <a href="<?php get_the_permalink(); ?>">
                  <?php 
                     $top_banner_cats = get_the_category($top_banner->ID);
                     foreach($top_banner_cats as $top_banner_cat) { ?> 
                  <span class="tag"> <?php echo $top_banner_cat->name; ?></span>
                  <?php    } ?>
                  <a href="<?php echo get_the_permalink($top_banner->ID);?>">
                     <h1> <?php echo $top_banner->post_title; ?> </h1>
                  </a>
                  <span>By</span> <?php $by = $top_banner->post_author; ?>
                  <span class="aurthor"><?php echo get_the_author_meta('display_name',$by); ?></span>
                  </a>
               </div>
            </div>
         </div>
         <?php } else {  
            if($j==2) {?>
         <div class="col-md-4 col-12 lrpad">
            <?php }?>
            <?php if($i>1){ ?>
            <div class="box-<?php echo $i; ?>">
               <img src="<?php echo get_the_post_thumbnail_url($top_banner->ID); ?>" alt="#" class="img-fluid">
               <div class="banner_text_part">
                  <a href="#">
                  <?php 
                     $top_banner_cats = get_the_category($top_banner->ID);
                     foreach($top_banner_cats as $top_banner_cat) { ?>
                  <span class="tag"><?php print_r($top_banner_cat->name); ?></span>
                  <?php } ?>
                  <a href="<?php echo get_the_permalink($top_banner->ID);?>">
                     <h5><?php echo $top_banner->post_title; ?></h5>
                  </a>
                  <span >By</span>
                  <?php $by = $top_banner->post_author; ?>
                  <span class="aurthor"><?php echo get_the_author_meta('display_name',$by); ?></span>
                  </a>
               </div>
            </div>
            <?php } if($j>2){ ?>
         </div>
         <?php } } $i++; $j++; } ?>
      </div>
   </div>
</div>
<div class="weekly_tp_news">
   <div class="container separate">
       <h1>Popular</h1> 
      
      <div class="wekly_bottom_section">
         <div class="owl-carousel owl-theme">
            <!-- loop -->             
            <?php 
               $weekly_news = get_posts(array(
                 'post_type' => 'post',
                 'numberposts' =>7,
                 'meta_key' => 'my_post_viewed',
                 'orderby' => 'meta_value_num',
                 'order' =>  'DSC',
               ));
                 query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC');
                 foreach($weekly_news as $weekly_new )
                   
               { ?>
            <div class="item">
               <div class="tp_news_cntn">
            <?php
               $image = wp_get_attachment_image_src( get_post_thumbnail_id( $weekly_new ), 'medium_what_new' );
            ?>
                  <img src="<?php echo $image[0]; ?>" height="<?php echo $image[1]; ?>" alt="">
                  <div class="tp_new_cntn_inner">
                     <?php 
                        $weekly_new_cats = get_the_category($weekly_new->ID);
                        foreach($weekly_new_cats as $weekly_new_cat) { ?>
                     <span><?php print_r($weekly_new_cat->name); ?></span>
                     <?php } ?>
                     <a href="<?php echo get_the_permalink($weekly_new->ID);?>">
                        <h5><?php echo $weekly_new->post_title; ?></h5>
                     </a>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
</div>
<div class="gallery-section">
   <div class="container">
      <div class="row">
         <!-- Start Gallery Section ~~~~~~~~~~~~~~~ -->
         <div class="col-md-8 col-12">
            <div class="wn_head_part">
               <h1>Whats New</h1>
               <div class="controler ml-auto">
                  <div class="owl-carousel1 owl-theme gal_click">
                     <button class="btn btn-default filter-button" data-filter="all">All</button>
                     <?php
                        $args = array(
                            'hide_empty'    => 1,
                            'orderby'       => 'name',
                            'order'         => 'ASC',
                            'taxonomy'      => 'category',
                        );
                        $categories = get_categories($args);        
                        foreach($categories as $category) { ?>     
                     <div class="item">     
                        <button class="btn btn-default filter-button" data-filter="port<?php echo $category->term_id; ?>"><?php echo $category->name ?></button>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
            <div class="row wn-scroller">
               <?php
                  $arguments = array(
                     'post_type'=>'post',
                     'posts_per_page'=> -1
                  );
                  
                     $posts_cat = new WP_Query($arguments);
                     
                     while ( $posts_cat->have_posts() ) : $posts_cat->the_post();
                        $categories_classes = "";
                        $categories = wp_get_object_terms(get_the_id(), 'category'); // Get categories id against a post                
                        foreach ($categories as $category) {
                           $categories_classes .= "port$category->term_id ";
                     }
               ?>

               <div class="gallery_product col-md-6 filter all <?php  echo $categories_classes; ?>">
                  <div class="item">
                     <div class="wn_news_cntn">
                        <?php the_post_thumbnail('post-thumbnail', ['class' => '', 'size' => 'medium_what_new', 'title' => 'Feature image']);?>
                     </div>
                     <div class="wn_new_cntn_inner">
                        <span class="tag"><?php echo esc_html( $category->name ); ?></span>
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <div class="details_box">
                           <span class="pre-title">By<span class="aurthor"> <?php the_author(); ?></span></span>
                           <span class="t_d"><i class="fas fa-calendar-alt"></i> <?php the_time( 'F jS, Y' ); ?></span>
                           <span class="cmnts"><i class="fas fa-comments"></i><?php echo get_comments_number($post->ID); ?></span>  
                        </div>
                     </div>
                  </div>
               </div>
               <?php endwhile;
                  wp_reset_postdata(); ?>          
            </div>


    <div class="row">
         <div class="col-md-12 col-12">
            <div class="featured_header">
               <h1>Featured Stories</h1>
            </div>
            <?php 
               $featureds = get_posts(array(
                 'post_type' => 'post',
                 'numberposts' => 7,
                 'order' =>  'DSC',
                  'meta_key' => 'meta-checkbox',
        'meta_value' => 'yes' 
               ));
               
                 $a =1;
                 $b=1;
                 foreach($featureds as $featured ){
                 if ($a ==1) {
               ?>
            <div class="row fe_fst_Box">
               <div class="col-md-6 fe_img_box">
                  <img src="<?php echo get_the_post_thumbnail_url($featured->ID); ?>" alt="" class="img-fluid">
               </div>
               <div class="col-md-6 fe_text_box">
                  <div class="fs_inner">
                     <?php 
                        $featured_cats = get_the_category($featured->ID);
                        foreach($featured_cats as $featured_cat) { ?> 
                     <span class="tag"><?php echo $featured_cat->name; ?></span>
                     <?php    } ?>
                     <a href="<?php echo get_the_permalink($featured->ID);?>">
                        <h5><?php echo $featured->post_title; ?></h5>
                     </a>
                     <div class="fs_details_box">
                        <?php $byauth = $featured->post_author; ?>
                        <span class="pre-title">By<span class="aurthor"> <?php echo get_the_author_meta('display_name',$byauth); ?></span></span>
                        <?php $dt = strtotime($featured->post_date); ?>
                        <span class="t_d"><i class="fas fa-calendar-alt"></i> <?php echo date('j M Y',$dt); ?></span>
                     </div>
                     <p class="para">
                        <?php echo $featured->post_excerpt; ?>
                     </p>
                     <a class="read_more" href="<?php echo get_the_permalink($featured->ID);?>">
                     Read More
                     </a>
                  </div>
               </div>
            </div>
            <?php } else { 
               if($b==2) {?>
            <div class="lm_box">
               <div class="row">
                  <?php }?>
                  <?php if($a>1){ ?>
                  <div class="col-md-4 col-sm-6 col-xs-12 moreBox">
                     <div class="lm_box_1">
                        <img src="<?php echo get_the_post_thumbnail_url($featured->ID); ?>" class="img-fluid lm_box_img" alt="">
                        <div class="lm_box_inner">
                           <?php 
                              $featured_cats = get_the_category($featured->ID);
                              foreach($featured_cats as $featured_cat) { ?> 
                           <span class="tag"><?php echo $featured_cat->name; ?></span>
                           <?php } ?>
                           <a href="<?php echo get_the_permalink($featured->ID);?>">
                              <h6><?php echo $featured->post_title; ?></h6>
                           </a>
                           <div class="lm_details_box">
                              <?php $byauth = $featured->post_author; ?>
                              <span class="pre-title">By <span class="aurthor"><?php echo get_the_author_meta('display_name',$byauth); ?></span></span>
                              <?php $dt = strtotime($featured->post_date); ?>
                              <span class="t_d"><i class="fas fa-calendar-alt"></i><?php echo date('j M Y',$dt); ?></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } if($b>2){ ?>
                  <?php } } $a++; $b++; } ?>
               </div>
               <!-- <div id="loadMore">
                  <a href="#">Load More</a>
               </div> -->
            </div>
         </div>
      </div>

         </div>
         <!-- End Gallery Section ~~~~~~~~~~~~~~~ -->
         <div class="col-md-4 col-12 add_section">
            <div class="wn_head_part2">
               <!-- <h3>STAY CONNECTED</h3> -->
            </div>
            <?php
               if ( is_active_sidebar( 'gallery-add-section' ) ) {
               ?>
            <div class="widget-column footer-widget-1">
               <?php dynamic_sidebar( 'gallery-add-section' ); ?>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
</div>
<!-- Featured story start -->

<!-- Featured story end -->
<!-- editors pick start -->
<div class="editor_pick">
   <div class="container">
       <div class="ep_header">
         <!-- <h2>Editor Pick</h2> -->
               <h2>Recent News</h2>
            </div>
      <div class="row">
         <div class="col-md-6 col-12">
           
            <?php 
               $editors = get_posts(array(
                 'post_type' => 'post',
                 'numberposts' => 4,
                 'order' =>  'DSC',
               ));
               
                 $k =1;
                 $l=1;
                 foreach($editors as $editor ){
                 if ($k ==1) {
               ?>
            <div class="ep_box">
               <div class="ep_img_box">
                  <img src="<?php echo get_the_post_thumbnail_url($editor->ID); ?>" class="img-fluid">
               </div>
               <div class="ep_text_box">
                  <?php 
                     $editor_cats = get_the_category($editor->ID);
                     foreach($editor_cats as $editor_cat) { ?>
                  <span class="tag"><?php echo $editor_cat->name; ?></span>
                  <?php } ?>
                  <a href="<?php echo get_the_permalink($editor->ID);?>">
                     <h2><?php echo $editor->post_title; ?></h2>
                  </a>
                  <div class="ep_details_box">
                     <?php $editorby = $editor->post_author; ?>
                     <span class="pre-title">By <span class="aurthor"><?php echo get_the_author_meta('display_name',$editorby); ?></span></span>
                     <?php $editordt = strtotime($editor->post_date); ?>
                     <span class="t_d"><i class="fas fa-calendar-alt"></i> <?php echo date('j M Y',$editordt); ?></span>
                     <span class="cmnts"><i class="fas fa-comments"></i> <?php echo get_comments_number($post->ID); ?></span>  
                  </div>
                  <p class="para">
                     <?php echo $editor->post_excerpt; ?>
                  </p>
                  <a class="read_more" href="<?php echo get_the_permalink($editor->ID);?>">
                  Read More
                  </a>
               </div>
            </div>
            <?php } else {  
               if($l==2) {?>
         </div>
         <div class="col-md-6 col-12">
            <div class="ep-header_next">
               <?php }?>
               <?php if($k>1){ ?>
               <div class="ep_box">
                  <div class="row">
                     <div class="col-md-5 col-12">
                        <div class="ep_box_img">
                           <img src="<?php echo get_the_post_thumbnail_url($editor->ID); ?>" class="img-fluid" alt="">
                        </div>
                     </div>
                     <div class="col-md-7 col-12">
                        <div class="ep_text_box">
                           <?php 
                              $editor_cats = get_the_category($editor->ID);
                              foreach($editor_cats as $editor_cat) { ?>
                           <span class="tag"><?php echo $editor_cat->name; ?></span>
                           <?php } ?>
                           <a href="<?php echo get_the_permalink($editor->ID);?>">
                              <h6><?php echo $editor->post_title; ?> </h6>
                           </a>
                           <div class="ep_details_box">
                              <?php $editorby = $editor->post_author; ?>
                              <span class="pre-title">By<span class="aurthor"> <?php echo get_the_author_meta('display_name',$editorby); ?></span></span>
                              <?php $editordt = strtotime($editor->post_date); ?>
                              <span class="t_d"><i class="fas fa-calendar-alt"></i> <?php echo date('j M Y',$editordt); ?></span>
                              <span class="cmnts"><i class="fas fa-comments"></i> <?php echo get_comments_number($editor->ID); ?></span>  
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } if($l>2){ ?>
            </div>
            <?php } } $k++; $l++; } ?>
         </div>
      </div>
   </div>
</div>
<!-- editors pick end -->
<script type="text/javascript">
   //whats new section
   
   $(document).ready(function(){
   
   $(".filter-button").click(function(){
   var value = $(this).attr('data-filter');
   
   if(value == "all")
   {
     //$('.filter').removeClass('hidden');
     $('.filter').show('1000');
   }
   else
   {
   //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
   //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
     $(".filter").not('.'+value).hide('3000');
     $('.filter').filter('.'+value).show('3000');
     
   }
   });
   
   if ($(".filter-button").removeClass("active")) {
   $(this).removeClass("active");
   }
   $(this).addClass("active");
   
   });
</script>
<?php get_footer(); ?> 