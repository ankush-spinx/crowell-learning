<?php 
/* Template Name: Offers */
get_header(); ?>


<section class="cmn-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 order-2 order-lg-1 banner-content-sec wow fadeInUp">
              <div class="cmn-blue-bdr">
                <?php if(get_field('title',18)){?> 
                  <span class="h6 d-block"><?php the_field('title',18); ?></span>
                <?php } ?>
                <?php if(get_field('heading',18)){?> 
                <h1 class="h2"><?php the_field('heading',18); ?></h1>
                <?php } ?>
                <?php the_field('content',18); ?>
              </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2">
              <?php $image = get_field('banner_image',18);
              if( !empty( $image ) ): ?>
              <img class="shape-img" src="<?php bloginfo('template_directory'); ?>/img/graphic-bluebox.svg" alt="">
              <div class="right-img wow fadeInUp">
                <svg width="350" height="321" baseProfile="full" version="1.2">
                  <defs>
                    <mask id="svgmask4" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse" transform="scale(1)">
                      <image width="100%" height="321" xlink:href="<?php bloginfo('template_directory'); ?>/img/image-guidance-hero_listing.png" />
                    </mask>
                  </defs>
                  
                  <image id="the-mask4" mask="url(#svgmask4)" width="100%" height="321" y="0" x="0" xlink:href="<?php echo esc_url($image['url']); ?>" alt="" />
                </svg>
              </div>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
      <section class="cmn-tab insights-research-tab wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <ul id="tabs" class="nav nav-tabs list-unstyled" role="tablist">
                 <li class="nav-item">
                  <a href="<?php echo get_permalink(18); ?>" class="nav-link h5"><span>Insights</span></a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo get_permalink(334); ?>" class="nav-link h5" ><span>Announcements</span></a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo get_permalink(332); ?>" class="nav-link h5"><span>Events</span></a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo get_permalink(323); ?>" class="nav-link active h5"><span>Offers</span></a>
                </li>
              </ul>
              <div id="content" class="tab-content" role="tablist">
                <div id="offers-pane-D" class="card tab-pane show active" role="tabpanel" aria-labelledby="offers-tab-D">
                  <div class="card-header" role="tab" id="offers-heading-D">
                    <a class="h6" data-toggle="collapse" href="#offers-collapse-D" aria-expanded="" aria-controls="offers-collapse-C">Offers</a>
                  </div>
                  <div id="offers-collapse-D" class="collapse" data-parent="#content" role="tabpanel" aria-labelledby="offers-heading-D">
                    <div class="card-body pt-4 pt-lg-0">
                      <ul class="mb-0 pb-0 list-unstyled d-flex flex-wrap">
                        <?php 
                            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                            $args = array(
                                      'post_type' => 'offer',
                                      'post_status'=>'publish',
                                      'posts_per_page'=> 12,
                                      'paged' => $paged
                              );

                      $the_query = new WP_Query( $args );
                      if ( $the_query->have_posts() ) {
                          while ( $the_query->have_posts() ) {
                              $the_query->the_post();
                              $file = get_field('pdf_file');
                               ?>
                        <li>
                          <a href="<?php echo $file['url']; ?>" target="_blank" class="event-item">
                            <span class="h6 d-block"><?php echo get_post_type( $post->ID ); ?></span>
                            <span class="btn btn-link h3 big-link"><span><?php the_title(); ?></span></span>
                            <span class="text-14 d-block">
                              <span><?php echo get_the_date( 'F d, Y' ); ?></span>
                            </span>
                          </a>
                        </li>
                        <?php }?>
                      </ul>
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
                  
                      <?php } wp_reset_query(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



<?php get_footer(); ?>