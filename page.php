<?php 

while (have_posts()) : the_post();
  // get the partial for this template,
  get_template_part('templates/content', str_replace('.php', '', get_page_template_slug()));
endwhile; 

?>
