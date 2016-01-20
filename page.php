<?php while (have_posts()) : the_post(); ?>
<?php 
  // Just duplicate this template, rename to page-case-studies.php for example, then do the business in templates/content-page-case-studies.php
  // If we're not on default template and this custom page template content-page-custom-template.php file doesn't exist then just load content-page.php
  $page_template = get_page_template_slug() !== '' && locate_template('content-'.get_page_template_slug()) ?  str_replace('.php', '', get_page_template_slug()) : 'page'; // get the partial for this template, e.g. page-case-studies
  get_template_part('templates/content', $page_template); 
?>
<?php endwhile; ?>
