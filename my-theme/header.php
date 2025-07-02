<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if (is_singular() && pings_open()) : ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
  <div class="container">
    <div class="site-branding">
      <?php if (has_custom_logo()): ?>
        <?php the_custom_logo(); ?>
      <?php else: ?>
        <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
      <?php endif; ?>
      <p class="site-description"><?php bloginfo('description'); ?></p>
    </div>
    <nav class="site-navigation">
      <?php
      wp_nav_menu([
        'theme_location' => 'header-menu',
        'menu_class'     => 'nav-menu',
        'container'      => false,
      ]);
      ?>
    </nav>
    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">☰</button>
  </div>
</header>

<script>
(function() {
  const btn = document.querySelector('.menu-toggle'),
        nav = document.querySelector('.site-navigation');
  btn.addEventListener('click', () => {
    const expanded = btn.getAttribute('aria-expanded') === 'true' || false;
    btn.setAttribute('aria-expanded', !expanded);
    nav.classList.toggle('active');
  });
})();
</script>
