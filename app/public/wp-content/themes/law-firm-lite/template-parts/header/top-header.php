<?php
/**
 * The template part for header
 *
 * @package Law Firm Lite 
 * @subpackage law-firm-lite
 * @since law-firm-lite 1.0
 */
?>

<?php if( get_theme_mod( 'law_firm_lite_location') != '' || get_theme_mod( 'law_firm_lite_open_time') != '' ) { ?>

	<?php if( get_theme_mod('law_firm_lite_topbar_hide_show') != ''){ ?>
		<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4">
					    <?php if( get_theme_mod( 'law_firm_lite_location') != '') { ?>
		          			<p><i class="<?php echo esc_attr(get_theme_mod('law_firm_lite_location_address_icon','fas fa-map-marker-alt')); ?>"></i><?php echo esc_html(get_theme_mod('law_firm_lite_location',''));?></p>
		    			<?php } ?>
				    </div>
				    <div class="col-lg-4 col-md-4">
					    <?php if( get_theme_mod( 'law_firm_lite_open_time') != '') { ?>
		          			<p><i class="<?php echo esc_attr(get_theme_mod('law_firm_lite_timing_icon','far fa-clock')); ?>"></i><?php echo esc_html(get_theme_mod('law_firm_lite_open_time',''));?></p>
		        		<?php }?>
				    </div>
				    <div class="col-lg-4 col-md-4">
				    	<?php if( get_theme_mod( 'law_firm_lite_top_btn_url') != '' || get_theme_mod( 'law_firm_lite_top_btn_text') != '') { ?>
				    	<div class="top-btn">
				    		<a href="<?php echo esc_url(get_theme_mod('law_firm_lite_top_btn_url',''));?>"><i class="<?php echo esc_attr(get_theme_mod('law_firm_lite_top_btn_icon','fas fa-gavel')); ?>"></i><?php echo esc_html(get_theme_mod('law_firm_lite_top_btn_text',''));?></a>
				    	</div>
				    	<?php }?>
				    </div>
				</div>
			</div>
		</div>
	<?php } ?>

<?php }?>