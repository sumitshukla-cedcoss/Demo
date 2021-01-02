<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Law Firm Lite
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-vw">
	<div class="container">
		<div class="page-content">
	    	<h1><?php echo esc_html(get_theme_mod('law_firm_lite_404_page_title',__('404 Not Found','law-firm-lite')));?></h1>
			<p class="text-404"><?php echo esc_html(get_theme_mod('law_firm_lite_404_page_content',__('Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.','law-firm-lite')));?></p>
			<?php if( get_theme_mod('law_firm_lite_404_page_button_text','GO BACK') != ''){ ?>
				<div class="more-btn">
			        <a href="<?php echo esc_url(home_url()); ?>"><i class="<?php echo esc_attr(get_theme_mod('law_firm_lite_404_page_button_icon','fas fa-gavel')); ?>"></i><?php echo esc_html(get_theme_mod('law_firm_lite_404_page_button_text',__('GO BACK','law-firm-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('law_firm_lite_404_page_button_text',__('GO BACK','law-firm-lite')));?></span></a>
			    </div>
			<?php } ?>
		</div>
		<div class="clearfix"></div>
	</div>
</main>

<?php get_footer(); ?>