<div id="social-icons" class="col-md-5 col-xs-12">
			     <?php if ( of_get_option('weibo', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('weibo', true)); ?>" title="微博" ><i class="social-icon fa fa-weibo"  aria-hidden="true"></i></a>
	             <?php } ?>
				 <?php if ( of_get_option('weixin', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('weixin', true)); ?>" title="微信" ><i class="social-icon fa fa-weixin" aria-hidden="true"></i></a>
	             <?php } ?>
				 <?php if ( of_get_option('facebook', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('facebook', true)); ?>" title="Facebook" ><i class="social-icon fa fa-facebook-square" aria-hidden="true"></i></a>
	             <?php } ?>
	            <?php if ( of_get_option('twitter', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url("http://twitter.com/".of_get_option('twitter', true)); ?>" title="Twitter" ><i class="social-icon fa fa-twitter-square" aria-hidden="true"></i></a>
	             <?php } ?>
	             <?php if ( of_get_option('google', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('google', true)); ?>" title="Google Plus" ><i class="social-icon fa fa-google-plus-square" aria-hidden="true"></i></a>
	             <?php } ?>
	             <?php if ( of_get_option('feedburner', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('feedburner', true)); ?>" title="RSS Feeds" ><i class="social-icon fa fa-rss-square" aria-hidden="true"></i></a>
	             <?php } ?>
	             <?php if ( of_get_option('pinterest', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('pinterest', true)); ?>" title="Pinterest" ><i class="social-icon fa fa-pinterest-square" aria-hidden="true"></i></a>
	             <?php } ?>
	             <?php if ( of_get_option('instagram', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('instagram', true)); ?>" title="Instagram" ><i class="social-icon fa fa-instagram" aria-hidden="true"></i></a>
	             <?php } ?>
	             <?php if ( of_get_option('linkedin', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('linkedin', true)); ?>" title="LinkedIn" ><i class="social-icon fa fa-linkedin-square" aria-hidden="true"></i></a>
	             <?php } ?>
	             <?php if ( of_get_option('youtube', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('youtube', true)); ?>" title="YouTube" ><i class="social-icon fa fa-youtube-square" aria-hidden="true"></i></a>
	             <?php } ?>
	             <?php if ( of_get_option('flickr', true) != "") { ?>
				 <a target="_blank" href="<?php echo esc_url(of_get_option('flickr', true)); ?>" title="Flickr" ><i class="social-icon fa fa-flickr" aria-hidden="true"></i></a>
	             <?php } ?>
         
	</div>
