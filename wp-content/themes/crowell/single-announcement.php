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

	<section class="announcements-detail ">
        <div class="container">
          <div class="row wow fadeInUp">
            <div class="col-md-2 mb-4 mb-lg-0">
              <a href="<?php echo get_permalink(334); ?>" class="btn btn-link"><span>BACK</span></a>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 cmn-editor">
              <h6><?php echo get_post_type( $post->ID); ?></h6>
              <h1><?php the_title(); ?></h1>
              <h4><?php echo get_the_date( 'F d, Y' ); ?></h4>
              <?php $content_post = get_post(get_the_ID());
					$content = $content_post->post_content;
					$content = apply_filters('the_content', $content);
					$content = str_replace(']]>', ']]&gt;', $content);
					echo $content; 
			  ?>
            </div>
          </div>
        </div>
      </section>

<?php
get_footer();
