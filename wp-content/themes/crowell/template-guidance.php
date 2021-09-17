<?php 
/* Template Name: Guidance */
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
                <h2 class="mb-0"><?php the_field('heading'); ?></h2>
            <?php } ?>
            <?php if(get_field('content')){?>
                <div class="banner-desc">
                  <?php the_field('content'); ?>
                </div>
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
                    <mask id="svgmask2" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse" transform="scale(1)">
                      <image width="100%" height="321" xlink:href="<?php bloginfo('template_directory');?>/img/image-guidance-hero_listing.png" />
                    </mask>
                  </defs>
                   
                  <image id="the-mask" mask="url(#svgmask2)" width="100%" height="321" y="0" x="0" xlink:href="<?php echo esc_url($image['url']); ?>" alt="" />
                </svg>
              </div>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
      <section class="cmn-listing">
        <div class="container">
          
          	 <?php 
             $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args = array(
                                'post_type' => 'guidances',
                                'post_status'=>'publish',
                                'posts_per_page'=> 12,
                                'paged' => $paged
                            );

                $the_query = new WP_Query( $args );
                // The Loop
                if ( $the_query->have_posts() ) { ?>
                  <div class="row wow fadeInUp">
                    <?php
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
            <div class="col-md-6 col-lg-4">
              <div class="listing-blocks">
                <div class="listing-image-box">
                  <?php if(has_post_thumbnail()){ ?>
                  <img style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID,'guidance_size'); ?>');" src="<?php bloginfo('template_directory'); ?>/img/0.gif" alt="" class="divImg" />
                <?php } else { ?>
                  <img style="background-image: url('<?php bloginfo('template_directory'); ?>/img/placeholder-image.png');" src="<?php bloginfo('template_directory'); ?>/img/0.gif" alt="" class="divImg" />
                  <?php  } ?>
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

             <?php }?>
             </div>
                   <div class="pagination">
                  <?php 
                      echo paginate_links( array(
                          'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                          'total'        => $the_query->max_num_pages,
                          'current'      => max( 1, get_query_var( 'paged' ) ),
                          'format'       => '?paged=%#%',
                          'show_all'     => false,
                          'type'         => 'plain',
                          'end_size'     => 2,
                          'mid_size'     => 1,
                          'prev_next'    => true,
                          'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
                          'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
                          'add_args'     => false,
                          'add_fragment' => '',
                      ) );
                  ?>
              </div>
            
         <?php }
                wp_reset_postdata();?>
          
        </div>
      </section>


<?php get_footer(); ?>