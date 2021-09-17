<?php 
/* Template Name: Clients */
get_header(); ?>


   <section class="cmn-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 order-2 order-lg-1 banner-content-sec wow fadeInUp">
              <div class="cmn-blue-bdr">
               <?php if(get_field('title')){?>
                <span class="h6 d-block"><?php the_field('title'); ?></span>
              <?php } ?>
              <?php if(get_field('heading')){?>
                <h1 class="h2  mb-0"><?php the_field('heading'); ?></h2>
            <?php } ?>
            <?php if(get_field('content')){?>
                  <?php the_field('content'); ?>
            <?php } ?>
              </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2">
              <?php $image = get_field('banner_image');
                   if( !empty( $image ) ): ?>
              <img class="shape-img" src="<?php bloginfo('template_directory');?>/img/graphic-bluebox.svg" alt="">
              <div class="right-img wow fadeInUp">
                <svg width="350" height="321" baseProfile="full" version="1.2">
                  <defs>
                    <mask id="svgmask4" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse" transform="scale(1)">
                      <image width="100%" height="321" xlink:href="<?php bloginfo('template_directory');?>/img/image-guidance-hero_listing.png" />
                    </mask>
                  </defs>
                  <image id="the-mask4" mask="url(#svgmask4)" width="100%" height="321" y="0" x="0" xlink:href="<?php echo esc_url($image['url']); ?>" alt="Our team" />
                </svg>
              </div>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
    
<section class="team-list client-list">
        <div class="container">
          <div class="row wow fadeInUp">
             <?php 
                $args = array(
                                'post_type' => 'case-study',
                                'post_status'=>'publish',
                                'posts_per_page'=> -1
                            );

                $the_query = new WP_Query( $args );
                // The Loop
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
            <div class="col-lg-10 col-xl-9">
              <div class="team-item">
                <a href="<?php echo get_permalink($post->ID); ?>" class="team-img stretched-link">
                   <?php if(has_post_thumbnail(get_the_ID())){ ?>
                  <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'case-thumb'); ?>" class="img-fluid" alt="" width="256" height="222" />
                <?php } else { ?>
                  <img src="<?php bloginfo('template_directory'); ?>/img/placeholder-image.png" class="img-fluid" alt="" width="256" height="222" />
                <?php } ?>
                </a>
                <div class="team-content">
                  <div class="row">
                    <div class="col-md-6 mb-4 mb-md-0">
                      <a class="h3 btn btn-link big-link" href="<?php echo get_permalink($post->ID); ?>"><span><?php echo get_the_title(); ?></span></a>
                      <?php if(get_field('subtitle')){?>
                      <span class="text-14"><?php the_field('subtitle'); ?></span>
                    <?php } ?>
                    <?php if(get_field('series_text')){?>
                      <span class="text-14 value"><?php the_field('series_text'); ?></span>
                      <?php } ?>
                    </div>
                    <?php if(get_field('quote_text')){?>
                    <div class="col-md-6 text-16">
                      <p><?php the_field('quote_text'); ?></p>
                    </div>
                  <?php } ?>
                  </div>
                </div>
              </div>
            </div>
             <?php } } wp_reset_postdata();?>
          </div>
        </div>
      </section>
<?php get_footer(); ?>