<?php get_header(); ?>

<section class="hero">
  <div class="container">
    <h2>Welcome to Artshine Beauty</h2>
    <p>Free Samples with Every Purchase</p>
    <a href="#testimonials" class="btn">Read Testimonials</a>
  </div>
</section>

<section id="about" class="about">
  <div class="container">
    <h3>About Us</h3>
    <p>At Artshine Beauty, we believe that every person deserves to feel radiant and confident. Our mission is to enhance natural beauty through expert skincare, luxurious treatments, and personalized care. From the moment you walk through our doors, your glow becomes our passion.</p>
    <div class="grid">
      <div>
        <h4>Skilled Professionals</h4>
        <p>Our certified estheticians and makeup artists are passionate, precise, and always up-to-date with the latest beauty trends.</p>
      </div>
      <div>
        <h4>Seamless Experience</h4>
        <p>Whether you book online or visit us in person, we ensure a smooth, welcoming experience across every device and touchpoint.</p>
      </div>
      <div>
        <h4>Clean & Conscious Beauty</h4>
        <p>We use only cruelty-free, skin-loving products and follow sustainable practices wherever possible.</p>
      </div>
    </div>
  </div>
</section>

<section id="testimonials" class="testimonials">
  <div class="container">
    <h3>What Clients Say</h3>
    <?php
$testimonials = new WP_Query(['post_type' => 'testimonial', 'posts_per_page' => 3]);
if ($testimonials->have_posts()):
    while ($testimonials->have_posts()): $testimonials->the_post(); ?>
        <div class="testimonial-card">
            <?php if (has_post_thumbnail()) echo get_the_post_thumbnail(get_the_ID(), 'testimonial-thumb'); ?>
            <h4><?php the_title(); ?></h4>
            <p><?php the_excerpt(); ?></p>
        </div>
<?php endwhile; wp_reset_postdata();
else: ?>
    <div class="testimonial-placeholder">
        <p>Our clients love the Artshine glow ✨ — but we’re waiting to share their stories! Be the first to leave a testimonial and let the world know how we helped you shine.</p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn">Contact Us</a>
    </div>
<?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
