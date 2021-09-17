<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>
<?php if(!is_404()){ ?>
   <?php if(get_field('get_in_touch_title','option') && get_field('get_in_touch_heading','option')){ ?>
  <section class="cmn-cta">
        <div class="container">
          <div class="row align-items-center wow fadeInUp">
            <div class="gred-bg col-md-11"></div>
            <div class="col-md-6 cta-content">
              <div class="cta-content-wrap text-16">
                <?php if(get_field('get_in_touch_title','option')){?><h6><?php the_field('get_in_touch_title','option'); ?></h6><?php } ?>
                <?php if(get_field('get_in_touch_heading','option')){?><h2><?php the_field('get_in_touch_heading','option'); ?></h2>
              <?php } ?>
               		<?php the_field('get_in_touch_content','option'); ?>
               		<?php 
                $link = get_field('get_in_touch_button','option');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
              </div>
            </div>
             <?php $cta_img = get_field('get_in_touch_image','option'); ?>
            <div class="col-md-5 ml-auto cta-img">
              <?php if( !empty( $cta_img ) ): ?>
              <div class="right-img">
                <svg width="445" height="399" baseProfile="full" version="1.2">
                  <defs>
                    <mask id="svgmask04" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse" transform="scale(1)">
                      <image width="100%" height="399" xlink:href="<?php bloginfo('template_directory'); ?>/img/Mask_footer.png" />
                    </mask>
                  </defs>
                 
                  <image id="the-mask04" mask="url(#svgmask04)" width="100%" height="399" y="0" x="0" xlink:href="<?php echo esc_url($cta_img['url']); ?>" alt="" />
                </svg>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
    </main>
  <?php } } ?>
  <footer>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="footer-row">
              <?php 
              $footer_logo = get_field('footer_logo','option');
              if( !empty( $footer_logo ) ): ?>
                 <div class="footer-logo">
                 <a class="navbar-brand" href="<?php echo home_url(); ?>">
                   <img src="<?php echo esc_url($footer_logo['url']); ?>" alt="Footer Logo" />
                </a>
              </div>
          <?php endif; ?>
             
              <div class="footer-social">
                <ul>
                	<?php if(get_field('twitter_link','option')){ ?>
                  <li>
                    <a href="<?php the_field('twitter_link','option'); ?>" title="Social Media" target="_blank">
                      <img class="svg" src="<?php bloginfo('template_directory');?>/img/icon-twitter.svg" alt="" height="24" width="24" />
                    </a>
                  </li>
             		 <?php } ?>
             		 <?php if(get_field('facebook_link','option')){ ?>
                  <li>
                    <a href="<?php the_field('facebook_link','option'); ?>" title="Social Media" target="_blank">
                      <img class="svg" src="<?php bloginfo('template_directory');?>/img/icon-fb.svg" alt="" height="24" width="24" />
                    </a>
                  </li>
                   <?php } ?>
             		 <?php if(get_field('linkedin_link','option')){ ?>
                  <li>
                    <a href="<?php the_field('linkedin_link','option'); ?>" title="Social Media" target="_blank">
                      <img class="svg" src="<?php bloginfo('template_directory');?>/img/icon-linkedin.svg" alt="" height="24" width="24" />
                    </a>
                  </li>
                   <?php } ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 ft-menu with-submenu">
            <?php 
	                wp_nav_menu( array(
					    'menu'           => 'Footer Menu 1', // Do not fall back to first non-empty menu.
					    'menu_class'    => 'menu' // Do not fall back to wp_page_menu()
					) ); ?>
          </div>
          <div class="col-md-6 col-lg-3 ft-menu">
            <?php 
	                wp_nav_menu( array(
					    'menu'           => 'Footer Menu 2', // Do not fall back to first non-empty menu.
					    'menu_class'    => 'menu' // Do not fall back to wp_page_menu()
					) ); ?>
          </div>
          <div class="col-md-6 col-lg-3 ft-menu with-submenu">
             <?php 
	                wp_nav_menu( array(
					    'menu'           => 'Footer Menu 3', // Do not fall back to first non-empty menu.
					    'menu_class'    => 'menu' // Do not fall back to wp_page_menu()
					) ); ?>
          </div>
          <div class="col-md-6 col-lg-3 ft-menu">
            <?php 
	                wp_nav_menu( array(
					    'menu'           => 'Footer Menu 4', // Do not fall back to first non-empty menu.
					    'menu_class'    => 'menu' // Do not fall back to wp_page_menu()
					) ); ?>
            <div class="copyright-text text-14">
              <p>© <?php echo date('Y'); ?> GrowthStudio. GrowthStudio™ is a part of <a href="javascript:;" target="_blank" title="Crowell & Moring LLP">Crowell & Moring LLP</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- Include Core files -->
  <script src="<?php bloginfo('template_directory');?>/js/app.js"></script>
  <script>
    $(document).ready(function() {
      $('.cmn-slider-wrap').slick({
        dots: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        variableWidth: true,
        responsive: [{
            breakpoint: 991,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              variableWidth: false,
            }
          }
        ]
      });
    });
  </script>
<script>
    $=jQuery;
    $(document).ready(function() {
      /**  Select2 Custom ini **/
      $("#stage").select2({
        placeholder: "Filter by Stage",
        width: '100%',
        minimumResultsForSearch: -1,
      });
      $("#topic").select2({
        placeholder: "Filter by Topic",
        width: '100%',
        minimumResultsForSearch: -1,
      });
      // Accordian
      $('.card').on('shown.bs.collapse', function(e) {
        var $panel = $(this).closest('.card');
        var $headerheight = $('header').outerHeight(true);
        $('html,body').animate({
          scrollTop: $panel.offset().top - $headerheight - 10
        }, 500);
      });
      $('.glossary-accord-wrap').on('shown.bs.collapse', function(e) {
        e.stopPropagation();
        var $panel = $(this).closest('.glossary-accord-wrap');
        var $headerheight = $('header').outerHeight(true);
        $('html,body').animate({
          scrollTop: $panel.offset().top - $headerheight - 10
        }, 500);
      });

      jQuery('#stage, #topic').change(function() {
      $(this).closest("form").submit();
     });
    });
  </script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>
