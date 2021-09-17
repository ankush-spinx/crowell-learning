<?php get_header(); ?>


<section class="cmn-banner case-study-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 order-2 order-lg-1 banner-content-sec wow fadeInUp">
              <div class="cmn-blue-bdr">
                <span class="h6 d-block">CASE STUDY</span>
                <h1 class="mb-0"><?php echo get_the_title(); ?></h1>
              </div>
              <div class="banner-desc">
                <div class="sub-details">
                   <?php if(get_field('subtitle')){?>
                      <span class="text-16 d-block"><strong>Company Industry:</strong><?php the_field('subtitle'); ?></span>
                    <?php } ?>
                  
                  <?php if(get_field('series_text')){?>
                      <span class="text-16 d-block"><strong>Financing:</strong> <?php the_field('series_text'); ?></span>
                      <?php } ?>
                 
                </div>
                 <?php if(get_field('quote_text')){?>
                     <h3><?php the_field('quote_text'); ?></h3>
                  <?php } ?>
          
               <?php the_field('quote_bottom_text'); ?>
              </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2">
               <?php if(has_post_thumbnail(get_the_ID())){ ?>
                <img class="shape-img" src="<?php bloginfo('template_directory');?>/img/graphic-bluebox.svg" alt="">
              <div class="right-img wow fadeInUp">
                <svg width="350" height="321" baseProfile="full" version="1.2">
                  <defs>
                    <mask id="svgmask2" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse" transform="scale(1)">
                      <image width="100%" height="321" xlink:href="<?php bloginfo('template_directory');?>/img/image-guidance-hero_listing.png" />
                    </mask>
                  </defs>
                  <image id="the-mask" mask="url(#svgmask2)" width="100%" height="321" y="0" x="0" xlink:href="<?php echo get_the_post_thumbnail_url($post->ID,'full'); ?>" />
                </svg>
              </div>
                <?php } ?>
              
            </div>
          </div>
        </div>
      </section>
      <?php if(get_field('situation')){ ?>
      <section class="editor-section">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-lg-8 col-xl-7">
              <div class="editor-div wow fadeInUp">
                  <?php the_field('situation'); ?>
              </div>
            </div>
          </div>
        </div>
      </section>
       <?php } ?>
<?php get_footer(); ?>