        <!-- HERO SECTION -->
        <section class="hero position-relative overflow-hidden text-white">
            <video autoplay muted loop playsinline>
                <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/hero-video.mp4" type="video/mp4">
                Tu navegador no soporta el video.
            </video>
            <?php
            $sliders = new WP_Query([
                'post_type' => 'slide',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ]);
            ?>
            <div data-aos="fade-up" class="slider-hero position-relative z-1 container">
              <?php if ($sliders->have_posts()): ?>
                  <?php while($sliders->have_posts()): $sliders->the_post(); ?>
                  <section class="frase-item" style="max-width: 800px;">
                    <p class="fs-2 text-uppercase"><?php echo esc_html(get_field('subtitle')); ?></p>
                    <h1 class="display-1 fw-bolder   text-uppercase"><?php the_title(); ?></h1>
                  </section>
                  <?php endwhile; ?>
              <?php endif; ?>
              <a href="#diseno-web" class="btn btn-secondary btn-lg mt-3">SABER MÁS</a>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-bottom.svg" class="hero-bottom">
        </section>
