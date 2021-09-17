<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
	  <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/img/favicon.ico" type="image/icon" />
  <!-- Include CSS files-->
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/style.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/app.css">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
 <div class="page-wrapper">
    <!-- Header section starts from here -->
    <header class="fixed-top" role="banner">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <?php 
              $logo = get_field('header_logo','option');
              if( !empty( $logo ) ): ?>
                <a class="navbar-brand" href="<?php echo home_url(); ?>">
                 <img src="<?php echo esc_url($logo['url']); ?>" alt="Logo" />
                </a> 
          <?php endif; ?>
          
          <div class="right-nav">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" aria-haspopup="true" data-target="#divNavbar" aria-expanded="false" data-display="static" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="divNavbar">
              <div class="menu-main-menu-container">
                 <?php 
	                wp_nav_menu( array(
        					    'menu'           => 'Main Menu', // Do not fall back to first non-empty menu.
        					    'theme_location' => 'menu-1',
        					    'menu_class'    => 'menu' // Do not fall back to wp_page_menu()
					       ) ); ?>
              </div>
            </div>
            <button type="button" id="header_search" class="btn" data-toggle="modal" data-target="#searchModal"></button>
          </div>
        </div>
      </nav>
    </header>
    <!-- Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="container modal-body">
            <span class="close-wrap">
              <span class="close-line close-line1"></span>
              <span class="close-line close-line2"></span>
            </span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            <form class="text-14" action="<?php echo home_url(); ?>">
              <input type="text" name="s" placeholder="Search...">
              <p>Hit enter to search or ESC to close</p>
            </form>
          </div>
        </div>
      </div>
    </div>

    <main role="main">