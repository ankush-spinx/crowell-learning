<?php get_header(); ?>

<section class="bio-detail-page">
        <div class="container">
          <div class="row">
            <div class="col-md-2 mb-4 mb-lg-0">
              <a href="<?php echo get_permalink(20); ?>" class="btn btn-link"><span>BACK</span></a>
            </div>
            <div class="col-lg-10">
              <div class="row d-block d-lg-flex">
                
                  <?php if(has_post_thumbnail(get_the_ID())){ ?>
                    <div class="col bio-img-wrap">
                  <img class="shape-img" src="<?php bloginfo('template_directory');?>/img/graphic-blueboxsmall.svg" alt="Background Graphic" width="445" height="240">
                  <div class="bio-img d-flex align-items-center justify-content-center wow fadeInUp">
                    <span>
                  <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'team-thumb'); ?>" class="img-fluid" alt="" width="254" height="254" />
                  </span>
                  </div>
                </div>
               
                <?php } ?>
                    
                <div class="col">
                  <div class="bio-details">
                    <span class="h6 d-block">
                      TEAM MEMBER
                    </span>
                    <h1><?php echo get_the_title(); ?></h1>
                    <?php if(get_field('office')){?>
                    <span class="text-16 d-block">
                      <strong>
                        Office:
                      </strong>
                      <?php the_field('office'); ?></span>
                  <?php }?>
                  <?php if(get_field('focused_on')){?>
                    <span class="text-16 d-block">
                      <strong>
                        I’m focused on:
                      </strong>
                      <?php the_field('focused_on'); ?> </span>
                  <?php } ?>
                  </div>
                </div>
                <div class="col-12 bio-content wow fadeInUp">
                  <?php if(get_field('position')){?>
                  <h3><?php the_field('position'); ?></h3>
                  <?php } ?>
                  <?php if(get_field('love_to')){?>
                  <div class="inner-content">
                    <span class="text-18 d-block">
                      <p><strong>I love:</strong> <?php the_field('love_to'); ?></p>
                    </span>
                  </div>
                  <?php } ?>
                  <?php if(get_field('phone') || get_field('email') || get_field('address')){?>
                  <div class="contact-block">
                    <h6>Contact</h6>
                    <?php if(get_field('phone')){?>
                    <span class="text-18 d-block">
                      <strong>Phone:</strong>
                      <a class="text-decoration-none" href="tel:<?php the_field('phone'); ?>">
                        <?php the_field('phone'); ?> </a>
                    </span>
                  <?php } ?>
                  <?php if(get_field('email')){?>
                    <span class="text-18 d-block">
                      <strong>Email Address:</strong>
                      <a class="text-decoration-none" href="mailto:<?php the_field('email'); ?>">
                        <?php the_field('email'); ?> </a>
                    </span>
                  <?php } ?>
                  <?php if(get_field('address')){?>
                    <span class="text-18 d-block">
                      <strong>Address:</strong>
                      <?php the_field('address'); ?> </span>
                  </div>
                  <?php } } ?>
                  <div class="article-block">
                    <?php if( have_rows('article_list') ): ?>
                       <h6>ARTICLES</h6>
                      <ul class="m-0 p-0 list-unstyled">
                      <?php while( have_rows('article_list') ): the_row(); 
                          $article = get_sub_field('article');
                          ?>
                          <?php 
                          if( $article ): 
                              $link_url = $article['url'];
                              $link_title = $article['title'];
                              $link_target = $article['target'] ? $article['target'] : '_self';
                              ?>
                              <li>
                              <a class="btn btn-link big-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
                            </li>
                          <?php endif; ?>
                      <?php endwhile; ?>
                      </ul>
                  <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php get_footer(); ?>