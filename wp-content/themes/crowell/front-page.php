<?php get_header(); ?>

  
      <section class="cmn-banner hp-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 order-2 order-lg-1 banner-content-sec wow fadeInUp">
              <?php if(get_field('banner_title')){ ?><h1><?php the_field('banner_title');?></h1><?php } ?>
              <?php the_field('banner_text');?>
              <?php 
                  $link = get_field('banner_button');
                  if( $link ): 
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self';
                      ?>
                      <a class="btn btn-link big-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                  <?php endif; ?>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 ml-auto wow fadeInUp">
                     <?php $image = get_field('banner_image');
                      if( !empty( $image ) ):
                      ?>
                      <div class="shape-img">
                <svg width="720" height="630" baseProfile="full" version="1.2">
                  <defs>
                    <mask id="svgmask2" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse" transform="scale(1)">
                      <image width="100%" height="630" xlink:href="<?php bloginfo('template_directory'); ?>/img/Mask_homepage_background_shape.png" />
                    </mask>
                  </defs>
                     
                   <image id="the-mask2" mask="url(#svgmask2)" width="100%" height="630" y="0" x="0" xlink:href="<?php echo esc_url($image['url']); ?>" />
                </svg>
                       </div>
                  <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
      <section class="cmn-event-list">
        <div class="container wow fadeInUp">
          <div class="row">
            <?php 
                            $event1 = date( 'Y-m-d' );
                            $args = array(
                                      'post_type' => 'event',
                                      'post_status'=>'publish',
                                      'posts_per_page'=> 1,
                                      'meta_key' => 'event_date',
                                      'orderby' => 'meta_value_num',
                                      'order' => 'ASC',
                                        'meta_query'    => array(
                                              'relation' => 'AND',
                                              array(
                                                    'key'     => 'event_date',
                                                    'value'   => $event1,
                                                    'compare' => '>=',
                                                    'type'    => 'DATE',
                                                  ),
                                              array(
                                                  'key'       => 'featured_post',
                                                  'value'     => 1,
                                              )
                                          )
                              );

                      $the_query = new WP_Query( $args );
                      $post_count = $the_query->post_count;
                     
                      if ( $the_query->have_posts() ) {
                          while ( $the_query->have_posts() ) {
                              $the_query->the_post();
                               ?>
                    <div class="col-md-6 col-lg-4">
                      <a href="<?php echo get_permalink($post->ID); ?>" class="event-item">
                        <span class="h6 d-block">EVENT</span>
                        <span class="btn btn-link h3 big-link"><span><?php the_title(); ?>
                            </span></span>
                        <span class="text-14 d-block">
                          <span><?php echo get_the_date( 'F d, Y' ); ?></span>
                        </span>
                      </a>
                    </div>
                <?php } } wp_reset_postdata(); ?>
           <?php 
                         if($post_count > 0){
                          $per_page = 2;
                         } else {
                          $per_page = 3;
                         }
                            $args = array(
                                      'post_type' => 'announcement',
                                      'post_status'=>'publish',
                                      'posts_per_page'=>$per_page,
                                        'meta_query'    => array(
                                              array(
                                                  'key'       => 'featured_post',
                                                  'value'     => 1,
                                              )
                                          )
                              );

                      $the_query = new WP_Query( $args );
                      $post_count_announcement = $the_query->post_count;
                     if($post_count == 0 && $post_count_announcement==0){
                        $args = array(
                                      'post_type' => 'announcement',
                                      'post_status'=>'publish',
                                      'posts_per_page'=>3,
                              );

                      $the_query = new WP_Query( $args );

                     }
                      if ( $the_query->have_posts() ) {
                          while ( $the_query->have_posts() ) {
                              $the_query->the_post();
                               ?>
                    <div class="col-md-6 col-lg-4">
                      <a href="<?php echo get_permalink($post->ID); ?>" class="event-item">
                        <span class="h6 d-block">ANNOUNCEMENT</span>
                        <span class="btn btn-link h3 big-link"><span><?php the_title(); ?>
                            </span></span>
                        <span class="text-14 d-block">
                          <span><?php echo get_the_date( 'F d, Y' ); ?></span>
                        </span>
                      </a>
                    </div>
                <?php } } wp_reset_postdata(); ?>
          </div>
          <div class="row pt-lg-3">
            <div class="col-12">
              <?php 
              $link_news = get_field('news_button_link');
              if( $link_news ): 
                  $link_url = $link_news['url'];
                  $link_title = $link_news['title'];
                  $link_target = $link_news['target'] ? $link_news['target'] : '_self';
                  ?>
                  <a class="btn btn-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
              <?php endif; ?>
          
            </div>
          </div>
        </div>
      </section>
      <section class="cmn-slider cmn-listing">
        <div class="container wow fadeInUp">
          <div class="row">
            <div class="col-md-7">
              <div class="cmn-blue-bdr">
                <?php if(get_field('guidance_section_title')) { ?>
                  <h6><?php the_field('guidance_section_title'); ?></h6>
                <?php } ?>
                <?php if(get_field('guidance_section_heading')) { ?>
                <h2><?php the_field('guidance_section_heading');?></h2>
                <?php } ?>
                <?php the_field('guidance_section_content');?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="cmn-slider-wrap">
                <?php 
                $args = array(
                                'post_type' => 'guidances',
                                'post_status'=>'publish',
                                'posts_per_page'=> 10
                            );

                $the_query = new WP_Query( $args );
                // The Loop
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                         <div class="slide-box">
                  <div class="listing-blocks">
                    <div class="listing-image-box">
                      <img style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID,'guidance_size'); ?>');" src="<?php bloginfo('template_directory'); ?>/img/0.gif" alt="" class="divImg">
                    </div>
                    <div class="listing-box-data text-16">
                      <a class="stretched-link" href="<?php echo get_permalink($post->ID);?>">
                        <span class="btn btn-link big-link h3">
                          <span><?php echo get_the_title(); ?></span>
                        </span>
                      </a>
                      <p><?php echo get_the_excerpt();?></p>
                    </div>
                  </div>
                </div>
                        <?php
                    }
                }
                wp_reset_postdata();?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="hp-about">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 about-img-wrap wow fadeInUp">
               <?php $imagebottom = get_field('about_section_big_image'); ?>
              <?php if( !empty( $imagebottom ) ): ?>
              <div class="abt-back-img">
                <svg width="475" height="593" baseProfile="full" version="1.2">
                  <defs>
                    <mask id="svgmask3" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse" transform="scale(1)">
                      <image width="100%" height="593" xlink:href="<?php bloginfo('template_directory'); ?>/img/Mask_homepage_proving_landscape.png" />
                    </mask>
                  </defs>
                  <image id="the-mask3" mask="url(#svgmask3)" width="100%" height="593" y="0" x="0" xlink:href="<?php echo esc_url($imagebottom['url']); ?>" />
                </svg>
              </div>
            <?php endif; ?>
              <?php $imagetop = get_field('about_section_small_image'); ?>
              <?php if( !empty( $imagetop ) ): ?>
              <div class="abt-front-img">
                <svg width="350" height="399" baseProfile="full" version="1.2">
                  <defs>
                    <mask id="svgmask4" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse" transform="scale(1)">
                      <image width="100%" height="399" xlink:href="<?php bloginfo('template_directory'); ?>/img/Mask.png" />
                    </mask>
                  </defs>
                  <image id="the-mask4" mask="url(#svgmask4)" width="100%" height="399" y="0" x="0" xlink:href="<?php echo esc_url($imagetop['url']); ?>" />
                </svg>
              </div>
            <?php endif; ?>
            </div>
            <div class="col-md-6 col-xl-5 ml-auto wow fadeInUp">
              <div class="cmn-blue-bdr">
                <?php if(get_field('about_title')){ ?><h6><?php the_field('about_title'); ?></h6><?php } ?>
                <?php if(get_field('about_heading')){ ?><h2><?php the_field('about_heading');?></h2><?php } ?>
              </div>
              <?php the_field('about_content');?>
              <?php 
                $link = get_field('about_button');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
    

<?php get_footer(); ?>