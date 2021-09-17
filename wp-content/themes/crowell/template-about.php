<?php 
/* Template Name: About */
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
                <h1 class="h2"><?php the_field('heading'); ?></h1>
              <?php } ?>
                <?php the_field('content'); ?>
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
                  
                  <image id="the-mask4" mask="url(#svgmask4)" width="100%" height="321" y="0" x="0" xlink:href="<?php echo esc_url($image['url']); ?>" alt="" />
                </svg>
              </div>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
      <section class="about-sec">
        <div class="container">
          <?php $repeter_fields= get_field('bottom_section');
          foreach($repeter_fields as $single_fields){ ?>
          <div class="row about-sec-wrap wow fadeInUp">
            <div class="col-md-2 about-head order-2 order-md-1">
              <?php if($single_fields['title']) { ?>
                <h6><?php echo $single_fields['title']; ?></h6>
              <?php } ?>
            </div>
            <div class="col-md-6 col-xl-5 order-3 order-md-2">
              <?php echo $single_fields['content']; ?>
              <?php 
$link = $single_fields['button'];
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>
            </div>
            <div class="col-md-4 ml-auto order-1 order-md-3">
              <?php if($single_fields['image']){ ?>
              <svg width="350" height="321" baseProfile="full" version="1.2">
                <defs>
                  <mask id="svgmask3" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse" transform="scale(1)">
                    <image width="100%" height="321" xlink:href="<?php bloginfo('template_directory');?>/img/image-guidance-hero_listing.png" />
                  </mask>
                </defs>
                <image id="the-mask3" mask="url(#svgmask3)" width="100%" height="321" y="0" x="0" xlink:href="<?php echo $single_fields['image']['url']; ?>" alt="" />
              </svg>
            <?php } ?>
            </div>
          </div>
         <?php } ?>
        </div>
      </section>

<?php get_footer(); ?>