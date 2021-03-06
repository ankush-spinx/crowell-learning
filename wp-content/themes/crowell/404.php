<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

<section class="cmn-banner error-pg testassss">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 order-2 order-lg-1 banner-content-sec wow fadeInUp">
              <div class="cmn-blue-bdr">
                <span class="h6 d-block">404 ERROR</span>
                <h1>Whoops!</h1>
              </div>
              <p>We’re sorry, but the page you’re looking for doesn’texist. Please go back to <a href="<?php echo home_url();?>" target="_blank">TheGrowthStudio.com</a> or <a target="_blank" href="<?php echo home_url('/contact');?>">reach out to us</a> if you’re still having issues.</p>
              <a href="<?php echo home_url();?>" class="btn btn-primary">GO HOME</a>
              <div class="err-link-wrap">
                <p>Here are some other helpful links:</p>
                <ul class="list-unstyled">
                  <li><a href="<?php echo get_permalink(16);?>" class="btn btn-link"><span>Guidance</span></a></li>
                  <li><a href="<?php echo get_permalink(17);?>" class="btn btn-link"><span>Resources</span></a></li>
                  <li><a href="<?php echo get_permalink(18);?>" class="btn btn-link"><span>Insights</span></a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2">
              <img class="shape-img" src="<?php bloginfo('template_directory');?>/img/graphic-bluebox.svg" alt="">
              <div class="right-img wow fadeInUp">
                <svg width="350" height="321" baseProfile="full" version="1.2">
                  <defs>
                    <mask id="svgmask2" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse" transform="scale(1)">
                      <image width="100%" height="321" xlink:href="<?php bloginfo('template_directory');?>/img/image-guidance-hero_listing.png" />
                    </mask>
                  </defs>
                  <image id="the-mask" mask="url(#svgmask2)" width="100%" height="321" y="0" x="0" xlink:href="<?php bloginfo('template_directory');?>/img/image-404.png" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </section>
<?php
get_footer();
