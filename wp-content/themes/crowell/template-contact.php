<?php 
/* Template Name: Contact */
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
                <h1 class="h2 mb-0"><?php the_field('heading'); ?></h1>
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
                  
                  <image id="the-mask4" mask="url(#svgmask4)" width="100%" height="321" y="0" x="0" xlink:href="<?php echo esc_url($image['url']); ?>" />
                </svg>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
      <section class="contact-section">
        <div class="container">
          <div class="cnt-form wow fadeInUp">
            <div class="row">
              <div class="col-12">
                 <?php if(get_field('form_heading')){?>
                <h4><?php the_field('form_heading'); ?></h4>
                 <?php } ?>
              </div>
            </div>
        
             <?php echo do_shortcode('[contact-form-7 id="159" title="Contact Page"]'); ?>
            
          </div>
        </div>
      </section>
      <section class="contact-accordion-section">
        <div class="container">
          <div class="row wow fadeInUp">
            <div class="col-12">
              <?php if(get_field('email_address')){ ?>
              <div class="email-address-section">
                <h6>EMAIL ADDRESS</h6>
                <h3><a href="mailto:<?php the_field('email_address'); ?>" class="btn btn-link big-link"><span><?php the_field('email_address'); ?></span></a></h3>
              </div>
            <?php } ?>
            <?php $address_list = get_field('address_list');
            if(!empty($address_list)) { ?>
              <div class="cmn-accordion" id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <a class="h2" href="javascript:;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">offices</a>
                  </div>
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <?php 
                        foreach($address_list as $single_address){ ?>
                          <?php if($single_address['address_location'] && $single_address['address_text']){ ?>
                        <div class="office-addresses col-sm-6 col-md-4 col-lg-3 text-16">
                          <?php if($single_address['address_location']){ ?>
                          <h6><?php echo $single_address['address_location']; ?></h6>
                          <?php } ?>
                          <?php if($single_address['address_text']){ ?>
                          <p><?php echo $single_address['address_text']; ?></p>
                          <?php } ?>
                        </div>
                      <?php } } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div>
          </div>
        </div>
      </section>


<?php get_footer(); ?>