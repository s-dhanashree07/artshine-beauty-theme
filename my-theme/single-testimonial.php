<?php get_header(); ?>

<div class="container testimonial-single">
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <?php if (has_post_thumbnail()): ?>
      <div class="testimonial-thumb">
        <?php the_post_thumbnail('testimonial-thumb', ['alt' => get_the_title()]); ?>
      </div>
    <?php endif; ?>

    <header>
      <h2><?php the_title(); ?></h2>
      <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
    </header>

    <article>
      <?php the_content(); ?>
    </article>

    <nav class="testimonial-nav">
      <?php previous_post_link('%link','« Previous'); ?>
      <?php next_post_link('%link','Next »'); ?>
    </nav>

    <div class="back-home">
      <a href="<?php echo home_url(); ?>#testimonials">&larr; Back to home</a>
    </div>
    
  <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
