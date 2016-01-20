<?php while (have_posts()) : the_post(); ?>
   <?php 
    // Just duplicate this template, rename to page-case-studies.php for example, then do the business in templates/content-page-case-studies.php
    $page_template = get_page_template_slug() !== '' ?  str_replace('.php', '', get_page_template_slug() : 'page' ); // get the partial for this template, e.g. page-case-studies
    get_template_part('templates/content', $page_template); 
  ?>
<?php endwhile; ?>
