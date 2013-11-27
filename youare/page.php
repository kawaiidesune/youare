<?php get_header(); ?>
<div class="splash">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<?php 
					if (have_posts()) {
						// Pages and subpages
						if( is_page() ) {
							// if this page has children
							$page_object = get_post( get_query_var( 'page' ), OBJECT );
							$list_subpages = wp_list_pages( 'title_li=&depth=1&echo=0&child_of=' . (int)$page_object->ID );

							// wordpress never returns null or empty string. If children, <a> tag will be found, otherwise string is returned.
							preg_match_all( '|<a.*?href=[\'"](.*?)[\'"].*?>|i', $list_subpages, $ms );
							if( !$ms[ 1 ] ) {
								if( (int)$page_object->post_parent > 0 ) {
									$parent_post_name = $wpdb->get_var( "SELECT post_title FROM $wpdb->posts WHERE ID=" . (int)$page_object->post_parent );
									$parent_page_slug = $wpdb->get_var( "SELECT post_name FROM $wpdb->posts WHERE ID=" . (int)$page_object->post_parent );
?>
				<h1 class="bigpage title"><a href="/<?php echo $parent_page_slug; ?>" title="<?php _e('Go to', 'youare'); ?> <?php echo $parent_post_name; ?>"><?php echo $parent_post_name; ?></a></h1>
				<ul class="subnav">
					<?php wp_list_pages( 'title_li=&depth=1&child_of=' . (int)$page_object->post_parent ); ?>
				</ul>
<?php
							} else {
?>
				<h1 class="bigpage title"><?php echo $page_object->post_title; ?></h1>
<?php
							}
						} else {
							$parent_page_slug = $wpdb->get_var( "SELECT post_name FROM $wpdb->posts WHERE ID=" . (int)$page_object->post_parent );
?>
				<h1 class="bigpage title"><a href="/<?php echo $page_object->post_name; ?>" title="<?php _e('Go to', 'youare'); ?> <?php echo $page_object->post_title; ?>"><?php echo $page_object->post_title; ?></a></h1>
				<ul class="subnav">
					<?php wp_list_pages( 'title_li=&depth=1&child_of=' . (int)$page_object->ID ); ?>
				</ul>
<?php
						}
					}
?>    
    		</div>
		</div>
	</div>
</div>
<div class="container content-background">
	<div class="row">
		<div id="content" class="col-md-8 col-xs-12">
			<?php
				while (have_posts()) {
					the_post();
			?>
			<div class="single">
				<?php 
					the_content();
					edit_post_link(__('Edit This', 'youare'),'<p>','</p>');
					wp_link_pages();
				} /* rewind or continue if all posts have been fetched */
				comments_template('', true);
			} else {
			}
			
			?>
			</div><!--end single-->
		</div>
	</div>
</div>
<?php get_footer(); ?>