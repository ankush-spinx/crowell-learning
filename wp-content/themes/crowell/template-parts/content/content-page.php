<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>
<section  id="post-<?php the_ID(); ?>" <?php post_class('cmn-cms'); ?>>
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-xl-7 wow fadeInUp">
              <div class="cmn-blue-bdr">
                <h1><?php the_title(); ?></h1>
              </div>
              <div class="cms-content">
               <?php the_content(); ?>
              </div>
            </div>
          </div>
        </div>
      </section>
