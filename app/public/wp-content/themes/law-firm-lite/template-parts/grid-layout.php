<?php
/**
 * The template part for displaying grid post
 *
 * @package Law Firm Lite
 * @subpackage law-firm-lite
 * @since law-firm-lite 1.0
 */
?>

<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail()) { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
	        <div class="new-text">
	        	<div class="entry-content">
	        		<p>
			          <?php $excerpt = get_the_excerpt(); echo esc_html( law_firm_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('law_firm_lite_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('law_firm_lite_excerpt_suffix','') ); ?>
			        </p>
	        	</div>
	        </div>
	        <?php if( get_theme_mod('law_firm_lite_button_text','READ MORE') != ''){ ?>
		        <div class="more-btn">
		          <a href="<?php echo esc_url(get_permalink()); ?>"><i class="<?php echo esc_attr(get_theme_mod('law_firm_lite_blog_page_button_icon','fas fa-gavel')); ?>"></i><?php echo esc_html(get_theme_mod('law_firm_lite_button_text',__('READ MORE','law-firm-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('law_firm_lite_button_text',__('READ MORE','law-firm-lite')));?></span></a>
		        </div>
	        <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>