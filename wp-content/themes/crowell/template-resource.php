<?php 
/* Template Name: Resource */
get_header(); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

<section class="cmn-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 order-2 order-lg-1 banner-content-sec">
              <div class="cmn-blue-bdr">
                 <?php if(get_field('title')){?> 
                  <span class="h6 d-block"><?php the_field('title'); ?></span>
                <?php } ?>
               <?php if(get_field('heading')){?>
                <h1 class="h2"><?php the_field('heading'); ?></h1>
              <?php } ?>
                <?php the_field('content'); ?>
              </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2">
              <?php $image = get_field('banner_image');
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
      <section class="cmn-tab">
        <div class="container">
          <div class="row wow fadeInUp">
            <div class="col-lg-10 col-xl-9">
              <ul id="tabs" class="nav nav-tabs list-unstyled" role="tablist">
                <li data-id="#approach-slide1" class="nav-item">
                  <a id="approach-tab-A" href="#approach-pane-A" class="nav-link active h5" data-toggle="tab" role="tab"><span>Documents</span></a>
                </li>
                <li data-id="#approach-slide2" class="nav-item">
                  <a id="approach-tab-B" href="#approach-pane-B" class="nav-link  h5" data-toggle="tab" role="tab"><span>Glossary</span></a>
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
			                                'post_type' => 'document',
			                                'post_status'=>'publish',
			                                'posts_per_page'=> get_option( 'posts_per_page' ),
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
                              	<?php 
                              	 if($post_content_type == 'File'){
                              	 $file = get_field('file'); ?>
                              	 		<a target="_blank" href="<?php echo $file['url']; ?>" class="stretched-link">
			                       <?php } else if($post_content_type == 'Video') { ?>
			                       		<a data-fancybox href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="stretched-link">
			                       <?php } else { ?>
										<a href="<?php echo get_permalink($post->ID); ?>" class="stretched-link">
			                       <?php }  ?>
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
                              	<?php 
                              	 if($post_content_type == 'File'){
                              	 $file = get_field('file'); ?>
                              	 		<a target="_blank" href="<?php echo $file['url']; ?>" class="btn btn-link h3 big-link">
			                       <?php } else if($post_content_type == 'Video') { ?>
			                       		<a data-fancybox href="<?php the_field('video_url'); ?>" class="btn btn-link h3 big-link">
			                       <?php } else { ?>
										<a href="<?php echo get_permalink($post->ID); ?>" class="btn btn-link h3 big-link">
			                       <?php }  ?>
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
                    		<div class="nothing_found">No Resource Found</div>
                    	<?php } wp_reset_query(); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="approach-pane-B" class="card tab-pane fade " role="tabpanel" aria-labelledby="approach-tab-B">
                  <div class="card-header" role="tab" id="approach-heading-B">
                    <a class="h6" data-toggle="collapse" href="#approach-collapse-B" aria-expanded="" aria-controls="approach-collapse-B">Glossary</a>
                  </div>
                  <div id="approach-collapse-B" class="collapse" data-parent="#content" role="tabpanel" aria-labelledby="approach-heading-B">
                    <div class="card-body">
                      <div class="cmn-accordion glossary-accord" id="accordion">
                      	<?php if( have_rows('glossary') ): ?>
						    <?php $i=1; while( have_rows('glossary') ): the_row();
                if(get_sub_field('title') && get_sub_field('content')){ ?>
						         <div class="glossary-accord-wrap">
                          <div class="glossary-accord-head" id="heading<?php echo $i; ?>">
                            <a class="h2" href="javascript:;" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="<?php if($i==1){?>true<?php } else { ?>false<?php }?>" aria-controls="collapse<?php echo $i; ?>"><?php echo get_sub_field('title');?></a>
                          </div>
                          <div id="collapse<?php echo $i; ?>" class="collapse <?php if($i==1){?> show<?php } ?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
                            <div class="card-body">
                              <?php echo get_sub_field('content');?>
                              <?php if( have_rows('related_article') ): ?>
                              <h5>Related Articles</h5>
                              <ul class="list-unstyled">
                              <?php while( have_rows('related_article') ): the_row(); ?>
                              	<?php 
									$link = get_sub_field('article');
									if( $link ): 
									    $link_url = $link['url'];
									    $link_title = $link['title'];
									    $link_target = $link['target'] ? $link['target'] : '_self';
									    ?>
									    <li><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
									<?php endif; ?>
								<?php  endwhile; ?>
								</ul>
							<?php endif; ?>
                            </div>
                          </div>
                        </div>
						    <?php $i++; } endwhile; ?>
						<?php endif; ?>                
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="doc-create">
        <div class="container">
          <div class="row align-items-center wow fadeInUp">
            <div class="col-md-4 doc-create-img">
              <?php 
$image = get_field('own_document_image');
if( !empty( $image ) ): ?>

              <img class="shape-img" src="<?php bloginfo('template_directory'); ?>/img/Mask_background_create_document.png" alt="">
              <div class="right-img wow fadeInUp">
                <svg width="350" height="321" baseProfile="full" version="1.2">
                  <defs>
                    <mask id="svgmask004" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse" transform="scale(1)">
                      <image width="100%" height="256" xlink:href="<?php bloginfo('template_directory'); ?>/img/Mask_create_documents.png" />
                    </mask>
                  </defs>
                  <image id="the-mask004" mask="url(#svgmask004)" width="100%" height="256" y="0" x="0" xlink:href="<?php echo esc_url($image['url']); ?>" alt="" />
                </svg>
              </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6 offset-md-1">
              <div class="doc-create-wrapper">
               <?php if(get_field('own_document_title')){ ?> <h6><?php the_field('own_document_title'); ?></h6><?php } ?>
                <?php if(get_field('own_document_heading')){ ?> <h2><?php the_field('own_document_heading'); ?></h2><?php } ?>
                <?php 
$link = get_field('own_document_button');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
      <img src="<?php bloginfo('template_directory'); ?>/img/icon-external-btn.svg" alt="btn-icon" class="svg" height="16" width="16"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>



<?php get_footer(); ?>