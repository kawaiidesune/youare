<?php _e('Share it', 'youare'); ?>: <a href="http://youare.com/?text=<?php the_title_attribute(); ?> <?php the_permalink(); ?>" title="Share on YouAre!" class="youare">YouAre</a> <a href="http://twitter.com/home?status=<?php the_title_attribute(); ?> <?php the_permalink(); ?>" title="<?php _e('Share on', 'youare'); ?> Twitter!" class="twitter">Twitter</a> <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="<?php _e('Share on', 'youare'); ?> Facebook" class="facebook">Facebook</a>