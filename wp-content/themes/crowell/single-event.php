<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
get_header();
?>
<section class="event-detail-page">
        <div class="container">
          <div class="row row wow fadeInUp">
            <div class="col-12 mb-30">
              <a href="<?php echo get_permalink(332); ?>" class="btn btn-link"><span>BACK</span></a>
            </div>
            <div class="col-lg-4 d-md-flex flex-wrap d-lg-block order-3 order-lg-1">
              <div class="box-wrap text-center">
                <a class="btn btn-primary" href="javascript:;"><img class="svg" src="<?php bloginfo('template_directory'); ?>/img/icon-external.svg" width="15.5" height="15.5">REGISTER NOW</a>
              </div>
            </div>
            <?php if(get_field('event_date') || get_field('event_time')){ ?>
            <div class="col-lg-8 order-1 order-lg-1">
              <div class="box-wrap icon-wrap date-time">
                <ul class="list-unstyled m-0 d-flex flex-wrap align-items-center flex-wrap">
                   <?php if(get_field('event_date')){ ?>
                  <li>
                    <img src="<?php bloginfo('template_directory'); ?>/img/icon-date.svg" F alt="Calender icon" class="img-fluid" width="24" height="24">
                    <h5>Date</h5>
                    <span class="text-16 d-block m-0"><?php the_field('event_date'); ?> </span>
                  </li>
                  <?php } ?>
                  <?php if(get_field('event_time')){ ?>
                  <li>
                    <img src="<?php bloginfo('template_directory'); ?>/img/icon-time.svg" alt="Timer icon" class="img-fluid" width="24" height="24">
                    <h5>Time</h5>
                    <span class="text-16 d-block m-0"><?php the_field('event_time'); ?></span>
                  </li>
                <?php } ?>
                </ul>
              </div>
            </div>
          <?php } ?>
            <div id="speaker-wrap" class="col-lg-4 order-4 d-md-flex flex-wrap d-lg-block order-lg-1">
              <?php if(get_field('event_location')){ ?>
              <div class="box-wrap icon-wrap location-wrap">
                <ul class="list-unstyled mb-0">
                  <li>
                    <img src="<?php bloginfo('template_directory'); ?>/img/icon-mapsmall.svg" alt="Clocation icon" class="img-fluid" width="24" height="24">
                    <h5>Location</h5>
                    <span class="text-16 d-block"><?php the_field('event_location'); ?></span>
                  </li>
                </ul>
              </div>
            <?php } ?>

            <?php if( have_rows('speakers') ): ?>
   <div class="box-wrap speakers-wrap">
                <h5 class="text-center">Speakers</h5>
                <ul class="list-unstyled m-0">
    <?php while( have_rows('speakers') ): the_row(); 
        $image = get_sub_field('speaker_image');
        ?>
         <li>
                    <div class="speaker-img">
                      <?php if( !empty( $image ) ) { ?>
                      <img src="<?php echo $image['url']; ?>" alt="Speakers image" class="img-fluid" width="66" height="66">
                      <?php } else { ?>
                      <img src="<?php bloginfo('template_directory'); ?>/img/team-member-placeholder.jpg" alt="Speakers image" class="img-fluid" width="66" height="66">
                      <?php } ?>
                    </div>
                    <div class="speaker-detail">
                     <?php if(get_sub_field('name')){ ?> <h5><?php the_sub_field('name'); ?></h5><?php } ?>
                     <?php if(get_sub_field('role')){ ?> <span class="text-14 d-block"><?php the_sub_field('role'); ?> </span><?php } ?>
                    </div>
                  </li>
    <?php endwhile; ?>
   </ul>
              </div>
<?php endif; ?>
            </div>
            <div class="col-lg-8 order-2 order-lg-1">
              <div class="cmn-editor">
                <h2><?php the_title(); ?></h2>
               <?php the_field('event_description'); ?>
              </div>
            </div>
          </div>
        </div>
      </section>
<?php
get_footer();
