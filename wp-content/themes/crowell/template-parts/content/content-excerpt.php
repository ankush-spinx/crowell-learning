<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>
<div class="media-loop">
                <div class="media">
                  <div class="media-body">
                    <?php the_title( sprintf( '<a class="btn btn-link h3 big-link" href="%s" rel="bookmark"><span>', esc_url( get_permalink() ) ), '</span></a>' );?>
                    <div class="cmn-post-details text-14">
                      <span><?php echo get_the_date( 'F d, Y' ); ?></span><span><?php echo get_the_author(); ?></span>
                    </div>
                  </div>
                </div>
              </div>



