<?php 
/* Template Name: Insight */
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
                  <a href="<?php echo get_permalink(18); ?>" class="nav-link active h5"><span>Insights</span></a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo get_permalink(334); ?>" class="nav-link h5" ><span>Announcements</span></a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo get_permalink(332); ?>" class="nav-link h5"><span>Events</span></a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo get_permalink(323); ?>" class="nav-link h5"><span>Offers</span></a>
                </li>
              </ul>
             

               <div id="content" class="tab-content" role="tablist">
                 <div id="approach-pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="approach-tab-A">
                  <div class="card-header" role="tab" id="approach-heading-A">
                    <a class="h6" data-toggle="collapse" href="#approach-collapse-A" aria-expanded="true" aria-controls="approach-collapse-A">Documents</a>
                  </div>
                  <div id="approach-collapse-A" class="collapse show" data-parent="#content" role="tabpanel" aria-labelledby="approach-heading-A">
                    <div class="card-body pt-4 pt-lg-0">
                      <div class="tabbing-data">
                        <div class="tab-filter-wrap">
                          <form name="filterForm" method="GET">
                            <div class="cmn-select"><select id="stage" name="stage">
                                <option></option>
                                <option value="0">All</option>
                            <?php $terms = get_terms( array(
                    'taxonomy' => 'stage',
                    'hide_empty' => false,
                ) ); 
                            foreach($terms as $single_term){
              ?>
              <option <?php if(isset($_GET['stage']) && ($_GET['stage']==$single_term->term_id)){ echo "selected"; } ?> value="<?php echo $single_term->term_id; ?>"><?php echo $single_term->name; ?></option>
              <?php } ?>
                              </select></div>
                            <div class="cmn-select"><select id="topic" name="topic">
                                <option></option>
                                <option value="0">All</option>
                              <?php $terms = get_terms( array(
                    'taxonomy' => 'topic',
                    'hide_empty' => false,
                ) ); 
                            foreach($terms as $single_term){
              ?>
              <option <?php if(isset($_GET['topic']) && ($_GET['topic']==$single_term->term_id)){ echo "selected"; } ?> value="<?php echo $single_term->term_id; ?>"><?php echo $single_term->name; ?></option>
              <?php } ?>
                              </select></div>
                          </form>
                        </div>
                        <div class="cmn-data-wrapper">
                  <?php 
                  $tax_query = array('relation' => 'AND');
              if (isset($_GET['stage'])  && $_GET['stage'] !='')
              {
                if($_GET['stage'] != 0){
                  $tax_query[] =  array(
                          'taxonomy' => 'stage',
                          'field' => 'term_id',
                          'terms' => $_GET['stage']
                      );
                }
              }
              if (isset($_GET['topic']) && $_GET['topic'] !='')
              {
                if($_GET['topic'] != 0){
                  $tax_query[] =  array(
                          'taxonomy' => 'topic',
                          'field' => 'term_id',
                          'terms' => $_GET['topic']
                      );
              }
              }
                            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                      $args = array(
                                      'post_type' => 'post',
                                      'post_status'=>'publish',
                                      'posts_per_page'=> 10,
                                      'tax_query' => $tax_query,
                                      'paged' => $paged
                              );

                      $the_query = new WP_Query( $args );
                      if ( $the_query->have_posts() ) {
                          while ( $the_query->have_posts() ) {
                              $the_query->the_post();
                              $post_content_type = get_field('content_type');
                               ?>
                          <div class="cmn-docs-loop">
                            <div class="media">
                              <div class="asset-wrapper external-icon">
                               
                    <a href="<?php echo get_permalink($post->ID); ?>" class="stretched-link">
                           
                                <?php if(has_post_thumbnail()) { 
                      ?>
                          <img src="<?php the_post_thumbnail_url(); ?>" alt="" />
                      <?php 
                      } else {       
                      ?>
                       <img class="icon-img" src="<?php bloginfo('template_directory'); ?>/img/doc.png" width="25" height="25" alt="">
                  <?php } ?>
                                
                                </a>
                              </div>
                              <div class="media-body">
                             
                    <a href="<?php echo get_permalink($post->ID); ?>" class="btn btn-link h3 big-link">
                             
                                  <span><?php echo get_the_title(); ?></span>
                                </a>
                                <div class="cmn-post-details text-14">
                                  <span><?php echo get_the_date( 'F d, Y' ); ?></span>
                                  <span><?php echo get_the_author(); ?></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php }?>
                         <div class="pagination justify-content-start pt-0 pt-lg-4 pb-3 pb-lg-4">
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
                      <?php } else{ ?>
                        <div class="nothing_found">No Insight Found</div>
                      <?php } wp_reset_query(); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
              </div>




            </div>
          </div>
        </div>
      </section>



<?php get_footer(); ?>