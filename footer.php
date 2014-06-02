<style>
/*
#footer{margin-top:0px}
.footerMenu {padding-top:15px;}
*/
</style>
<div id="footer">
	<div id="footerInner">
       <a href="http://www.topcoder.com/" class="topcoderLogoMed"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/i/tcLogoSmall.png" alt="" /></a>
	  <?php wp_nav_menu( 
        array(
          'container' => false,
          'theme_location' => '',
          'menu_class' => 'footerMenu',
          'menu' => 'bottom'
        ) 
      ); ?>
    </div>
  </div>
</div>
</div>
<div class="modalWrapper"></div>
<!-- Modal Box -->
<div id="modalBox" class="videoModal modalwindow"> <a href="javascript:;" id="closeModal"></a>
  <div class="modalContentBox">
    <div class="header">NASA ISS Longeron Challenge Introduction</div>
    <div class="videoContent">
    <iframe class="iframe" width="600" height="355" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
</div>

	<div class="gameModal modalwindow">
		<iframe id="gameIframe" class="iframe" frameBorder="0" src="" width="600" height="550" frameborder="0" allowfullscreen></iframe>
		<div class="btnShareWrapper">
		<ul>
			<li class="share-twitter">
				<div class="twitter_button">		
				<a href="https://twitter.com/intent/tweet?button_hashtag=AsteroidHunters" class="twitter-hashtag-button" data-url="http://www.topcoder.com/asteroids/">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>	</div>
			</li>
			<li class="share-facebook">
				<div class="fb-share-button" data-href="http://www.topcoder.com/asteroids/" data-width="100" data-type="button_count"></div>
			</li>
		</ul>	
		</div>
			
	</div>  
	
	<div class="msgModal modalwindow">
		<span>Sorry, but the Asteroids Reloaded game does not work on a mobile device</span>
		<br /><br /><a class="btnClose" href="javascript:;">OK</a>
	</div>	
	
<!-- Modal Box End -->
</body>
<?php 
    wp_footer();
  ?>
</html>