<?php get_header(); ?>

 <section class="cmn-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 order-2 order-lg-1 banner-content-sec wow fadeInUp">
              <div class="cmn-blue-bdr">
                <span class="h6 d-block">GUIDANCE</span>
                <h1 class="mb-0"><?php echo get_the_title(); ?></h1>
              </div>
              <?php if(get_field('title_bottom_heading')){ ?>
              <div class="banner-desc">
                 <?php the_field('title_bottom_heading'); ?>
              </div>
              <?php } ?>
            </div>
            <div class="col-lg-5 order-1 order-lg-2">
                <?php if(has_post_thumbnail()){ ?>
                  <img class="shape-img" src="<?php bloginfo('template_directory');?>/img/graphic-bluebox.svg" alt="">
              <div class="right-img wow fadeInUp">
                <svg width="350" height="321" baseProfile="full" version="1.2">
                  <defs>
                    <mask id="svgmask2" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse" transform="scale(1)">
                      <image width="100%" height="321" xlink:href="<?php bloginfo('template_directory');?>/img/image-guidance-hero_listing.png" />
                    </mask>
                  </defs>
                  <image id="the-mask" mask="url(#svgmask2)" width="100%" height="321" y="0" x="0" xlink:href="<?php echo get_the_post_thumbnail_url($post->ID,'guidance_size'); ?>" alt="" />
                </svg>
              </div>
                  <?php  } ?>
              
            </div>
          </div>
        </div>
      </section>
     
            <?php if( have_rows('blocks') ): ?>
               <section class="guide-goal-sec">
        <div class="container">
          <div class="row wow fadeInUp">
              <?php $i=0; while( have_rows('blocks') ): the_row(); 
                  $image = get_sub_field('icon');
                  ?>
            <div class="col-md-4 col-xl-3 <?php if($i!=0){ ?>offset-xl-1<?php } ?>">
              <div class="text-16 guide-list-wrap">
                <img class="img-fluid" src="<?php echo esc_url($image['url']); ?>" width="64" height="64" alt="">
               <p><?php the_sub_field('content'); ?></p>
              </div>
            </div>
              <?php $i++; endwhile; ?>
          
          </div>
        </div>
      </section><?php endif; ?>
      <?php if(get_field('bottom_content')){ ?>
      <section class="guide-detail">
        <div class="container">
          <div class="up-bdr">
            <div class="row wow fadeInUp">
              <div class="col-lg-10 col-xl-7">
               <?php the_field('bottom_content'); ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php } ?>
<?php get_footer(); ?>