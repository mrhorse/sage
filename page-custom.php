<?php
/**
 * Template Name: Custom page template
 */
?>
<?php 

while (have_posts()) : the_post();
  // get the partial for this template, based on this template slug, e.g. content-page-custom.php
  get_template_part('templates/content', str_replace('.php', '', get_page_template_slug()));
endwhile; 

?>
