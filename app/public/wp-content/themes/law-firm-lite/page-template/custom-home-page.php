<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'law_firm_lite_before_slider' ); ?>

  <?php if( get_theme_mod( 'law_firm_lite_slider_arrows') != '') { ?>
  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod( 'law_firm_lite_slider_speed',3000)) ?>"> 
      <?php $law_firm_lite_pages = array();
        for ( $count = 1; $count <= 4; $count++ ) {
          $mod = intval( get_theme_mod( 'law_firm_lite_slider_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $law_firm_lite_pages[] = $mod;
          }
        }
        if( !empty($law_firm_lite_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $law_firm_lite_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>     
      <div class="carousel-inner" role="listbox">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php the_post_thumbnail(); ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( law_firm_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('law_firm_lite_slider_excerpt_number','30')))); ?></p>
                <?php if( get_theme_mod('law_firm_lite_slider_button_text','READ MORE') != ''){ ?>
                  <div class="more-btn">
                    <a href="<?php echo esc_url(get_permalink()); ?>"><i class="<?php echo esc_attr(get_theme_mod('law_firm_lite_slider_button_icon','fas fa-gavel')); ?>"></i><?php echo esc_html(get_theme_mod('law_firm_lite_slider_button_text',__('READ MORE','law-firm-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('law_firm_lite_slider_button_text',__('READ MORE','law-firm-lite')));?></span></a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php $i++; endwhile; 
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
          <div class="no-postfound"></div>
      <?php endif;
      endif;?>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Previous','law-firm-lite' );?></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Next','law-firm-lite' );?></span>
      </a>
    </div>
    <div class="clearfix"></div>
  </section>
  <?php } ?>

  <?php do_action( 'law_firm_lite_after_slider' ); ?>

  <section id="contact-sec">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <?php if( get_theme_mod( 'law_firm_lite_calling_text') != '' || get_theme_mod( 'law_firm_lite_calling_number') != '') { ?>
            <div class="con-box">
              <div class="row">
                <div class="col-lg-3 col-md-3 icon-center col-3">
                  <i class="<?php echo esc_attr(get_theme_mod('law_firm_lite_call_no_icon','fas fa-phone')); ?>"></i>
                </div>
                <div class="col-lg-9 col-md-9 p-lg-0 col-9">                
                  <p><?php echo esc_html(get_theme_mod('law_firm_lite_calling_text',''));?></p>
                  <h2><?php echo esc_html(get_theme_mod('law_firm_lite_calling_number',''));?></h2>
                </div>
              </div>
            </div>
          <?php }?>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="social-icon">
            <?php dynamic_sidebar('social-links'); ?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <?php if( get_theme_mod( 'law_firm_lite_email_text') != '' || get_theme_mod( 'law_firm_lite_email_address') != '') { ?>
            <div class="con-box">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-3 icon-center">
                  <i class="<?php echo esc_attr(get_theme_mod('law_firm_lite_email_address_icon','far fa-envelope-open')); ?>"></i>
                </div>
                <div class="col-lg-9 col-md-9 col-9 p-lg-0">
                  <p><?php echo esc_html(get_theme_mod('law_firm_lite_email_text',''));?></p>
                  <h2><?php echo esc_html(get_theme_mod('law_firm_lite_email_address',''));?></h2>
                </div>
              </div>
            </div>
          <?php }?>
        </div>
      </div>
    </div>  
  </section>

  <?php do_action( 'law_firm_lite_after_contact' ); ?>

  <section id="serv-section">
    <div class="container">
      <div class="heading-box">
        <?php if( get_theme_mod( 'law_firm_lite_section_text') != '') { ?>
          <p><?php echo esc_html(get_theme_mod('law_firm_lite_section_text',''));?></p>
        <?php } ?>
        <?php if( get_theme_mod( 'law_firm_lite_section_title') != '') { ?>
          <h3><?php echo esc_html(get_theme_mod('law_firm_lite_section_title',''));?></h3>  
        <?php } ?>
      </div>
      <div class="row">
        <?php
          $law_firm_lite_catData =  get_theme_mod('law_firm_lite_our_services','');
          if($law_firm_lite_catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html($law_firm_lite_catData,'law-firm-lite'))); ?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
          <div class="col-md-4 col-sm-6">
            <div class="box">
              <?php the_post_thumbnail(); ?>
              <div class="box-content">
                <h4 class="title"><?php the_title(); ?></h4>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( law_firm_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('law_firm_lite_practice_excerpt_number','10')))); ?></p>
                <?php if( get_theme_mod('law_firm_lite_practice_button_text','Consult Now') != ''){ ?>
                  <h6><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('law_firm_lite_practice_button_text',__('Consult Now','law-firm-lite')));?><i class="<?php echo esc_attr(get_theme_mod('law_firm_lite_our_practice_button_icon','fas fa-arrow-right')); ?>"></i><span class="screen-reader-text"><?php the_title(); ?></span></a></h6>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>

  <?php do_action( 'law_firm_lite_after_second_section' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
