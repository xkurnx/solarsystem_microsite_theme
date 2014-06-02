<?php
/*
Template Name: Home
*/

?>
<?php get_header();?>
<?php				
	  //$page=get_page_by_path('challenge-details');
	  $homeBannerText = get_post_meta($post->ID, "Challenge Banner Text", true);
	  $bannerImage = get_post_meta($post->ID, "Banner Image", true);
	  $bannerImageValue = wp_get_attachment_image_src( $bannerImage,"full");
	  $bannerImageValue = $bannerImageValue[0];						

			$YoutubeID = get_post_meta($post->ID, "Video YouTube ID", true);
			$videoTitle =  get_post_meta($post->ID, "Video Title", true);
			$jsvideo =  ( $YoutubeID == '' ) ?"alert('Video is coming soon')":"popupYT('".$YoutubeID."','".$videoTitle."')";
				
			$box1Icon = get_post_meta($post->ID, "Box 1 Icon", true);
			$box1IconImg = wp_get_attachment_image_src( $box1Icon);	
			$box1IconImg = $box1IconImg[0];					
			$box1Title = get_post_meta($post->ID, "Box 1 Title", true);
			$box1Text = get_post_meta($post->ID, "Box 1 Text", true);

			$box2Icon = get_post_meta($post->ID, "Box 2 Icon", true);
			$box2IconImg = wp_get_attachment_image_src( $box2Icon);	
			$box2IconImg = $box2IconImg[0];					
			$box2Title = get_post_meta($post->ID, "Box 2 Title", true);
			$box2Text = get_post_meta($post->ID, "Box 2 Text", true);

			$box3Icon = get_post_meta($post->ID, "Box 3 Icon", true);
			$box3IconImg = wp_get_attachment_image_src( $box3Icon);	
			$box3IconImg = $box3IconImg[0];					
			$box3Title = get_post_meta($post->ID, "Box 3 Title", true);
			$box3Text = get_post_meta($post->ID, "Box 3 Text", true);

			$box4Icon = get_post_meta($post->ID, "Box 4 Icon", true);
			$box4IconImg = wp_get_attachment_image_src( $box4Icon);	
			$box4IconImg = $box4IconImg[0];					
			$box4Title = get_post_meta($post->ID, "Box 4 Title", true);
			$box4Text = get_post_meta($post->ID, "Box 4 Text", true);

		?>
    <!-- Content Wrapper -->
<div id="homePage">
    <div id="contentWrapper">
      <div id="homeBanner" style="background-image:url('<?php echo $bannerImageValue;?>');">		
	  
        <div class="introContent">
		<div class="asteroidsClicker playGame" onclick="playAsteroidsGame();" alt="You Found Me">		
		</div>
			<?php  if($homeBannerText != null) :
			echo apply_filters('the_content', $homeBannerText);
		  endif;?>

		      <ul class="info">
		      	<li class="first">

		      		<h5>
		      			<?php if($box1IconImg != null) {?>
							<img src="<?php echo $box1IconImg;?>" alt="" />
						<?php } ;?>
		      			<?php if($box1Title != null) : echo apply_filters('the_content', $box1Title); endif;?>
		      		</h5>
		      		<a class="btnWatch" href="javascript:;" onclick="<?php echo $jsvideo;?>"></a>
					<p>
		      			<?php if($box1Text != null) : echo apply_filters('the_content', $box1Text); endif;?>
		  			</p>
		      	</li>

		      	<li>
		      		
		      		<h5>
		      			<?php if($box2IconImg != null) {?>
							<img src="<?php echo $box2IconImg;?>" alt="" />
						<?php } ;?>
		      			<?php if($box2Title != null) : echo apply_filters('the_content', $box2Title); endif;?>
		      		</h5>
		      		<p>
		      			<?php if($box2Text != null) : echo apply_filters('the_content', $box2Text); endif;?>
		  			</p>
		      	</li>

		      	<li>
		      		
		      		<h5>
		      			<?php if($box3IconImg != null) {?>
							<img src="<?php echo $box3IconImg;?>" alt="" />
						<?php } ;?>
		      			<?php if($box3Title != null) : echo apply_filters('the_content', $box3Title); endif;?>
		      		</h5>
		      		<p>
		      			<?php if($box3Text != null) : echo apply_filters('the_content', $box3Text); endif;?>
		  			</p>
		      	</li>

		      	<li>
		      		
		      		<h5>
		      			<?php if($box4IconImg != null) {?>
							<img src="<?php echo $box4IconImg;?>" alt="" />
						<?php } ;?>
		      			<?php if($box4Title != null) : echo apply_filters('the_content', $box4Title); endif;?>
		      		</h5>
		      		<p>
		      			<?php if($box4Text != null) : echo apply_filters('the_content', $box4Text); endif;?>
		  			</p>
		      	</li>
		      </ul>
		      <div class="clear"></div>
		</div>
      </div>
	 
	</div> 
	 
</div>
<?php get_footer(); ?>