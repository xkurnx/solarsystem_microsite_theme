<?php
/*
Template Name: Winner template
*/
?>
<?php 
get_header();
the_post();
?>

<script>
	$(document).ready(function(){
		$('tbody tr:odd').each(function(){
			$(this).addClass('odd');
		})
	})
</script>
<!-- Content Wrapper -->
  <div id="contentWrapper">
    <div id="contentArea">
        <h2><?php the_title();?></h2>
        <?php 
		remove_filter('the_content', 'wpautop');
		the_content();?>
		
		<div id="homeBottomBanner" class="clear">
          <a id="homeBannerLeft" href="<?php
                  $page=get_page_by_path('home');
                  $homeBannerLeftLink = get_post_meta($page->ID, "Home Banner Left Link", true);
                  if($homeBannerLeftLink!=null) :
                    echo $homeBannerLeftLink;
                  else:?>
                  javascript:;
                  <?php 
                  endif;
               ?> " target="_blank">
               
              <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/i/regitsterNowImage.png" alt="" />
            </a>
            <a id="homeBannerMiddle" href="<?php
                  $page=get_page_by_path('home');
                  $homeBannerMiddleLink = get_post_meta($page->ID, "Home Banner Middle Link", true);
                  if($homeBannerMiddleLink!=null) :
                    echo $homeBannerMiddleLink;
                  else:?>
                  javascript:;
                  <?php 
                  endif;
               ?>" target="_blank">
              <strong>
                <?php
                  $page=get_page_by_path('home');
                  $homeBannerMiddleTitle = get_post_meta($page->ID, "Home Banner Middle Title", true);
                  if($homeBannerMiddleTitle!=null) :
                    echo $homeBannerMiddleTitle;
                  else:?>
                  NTL
                  <?php 
                  endif;
               ?>       
              </strong>
              <?php
                $page=get_page_by_path('home');
                $homeBannerMiddleText = get_post_meta($page->ID, "Home Banner Middle Text", true);
                if($homeBannerMiddleText!=null) :
                  echo $homeBannerMiddleText;
                endif;
              ?>
        
            </a>
            <a id="homeBannerRight" href="<?php
                  $page=get_page_by_path('home');
                  $homeBannerRightLink = get_post_meta($page->ID, "Home Banner Right Link", true);
                  if($homeBannerRightLink!=null) :
                    echo $homeBannerRightLink;
                  else:?>
                  javascript:;
                  <?php 
                  endif;
               ?> " target="_blank">
              <strong>
                <?php
                  $page=get_page_by_path('home');
                  $homeBannerRightTitle = get_post_meta($page->ID, "Home Banner Right Title", true);
                  if($homeBannerRightTitle!=null) :
                    echo $homeBannerRightTitle;
                  else:?>
                  CEOCI
                  <?php 
                  endif;
               ?>       
              </strong>
                <?php
                  $page=get_page_by_path('home');
                  $homeBannerRightText = get_post_meta($page->ID, "Home Banner Right Text", true);
                  if($homeBannerRightText!=null) :
                    echo $homeBannerRightText;
                  endif;
                ?>
            </a>
        </div>
  	</div>
  </div>

<?php get_footer(); ?>