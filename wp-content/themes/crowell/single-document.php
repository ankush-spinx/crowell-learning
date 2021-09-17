<?php get_header(); ?>
<section class="knowledge-detail">
        <div class="container">
          <div class="row wow fadeInUp">
            <div class="col-md-2 mb-4 mb-md-0">
              <a href="<?php echo get_permalink(17); ?>" class="btn btn-link"><span>BACK</span></a>
            </div>
            <div class="col-md-10 col-lg-9 col-xl-7">
              <div class="cmn-blue-bdr">
                <span class="h6">RESOURCES</span>
                <h1><?php the_title(); ?></h1>
              </div>
              <div class="pg-disc text-14">
                <?php $cat_stage = get_the_terms(get_the_ID(),'stage'); ?>
                <?php if(!empty($cat_stage)){ ?>
                  <span><b>Stage:</b>
                  <?php $k=1; foreach($cat_stage as $single_stage){
                  if($k==1){ 
                   echo $single_stage->name; 
                   } else {  
                    echo ", ".$single_stage->name; } 
                      $k++; } ?></span>
                <?php } ?>
                <?php $cat_topic = get_the_terms(get_the_ID(),'topic'); ?>
                <?php if(!empty($cat_topic)){ ?>
                  <span><b>Topic:</b>
                  <?php $j=1; foreach($cat_topic as $single_topic){
                  if($j==1){ 
                   echo $single_topic->name; 
                   } else {  
                    echo ", ".$single_topic->name; } 
                      $j++; } ?></span>
                <?php } ?><span>By 
                    <?php global $post; echo the_author_meta( 'user_nicename' , $post->post_author ); ?> 
                  </span> <span><?php echo get_the_date( 'F d, Y' ); ?></span>
              </div>
              <div class="cms-content-wrap">
               <?php the_field('html_content'); ?>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php get_footer(); ?>