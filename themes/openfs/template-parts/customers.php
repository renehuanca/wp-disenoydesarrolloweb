<?php
$customers = new WP_Query([
    'post_type' => 'customer',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
]);
?>
        <!-- CUSTOMERS SECTION -->
        <section class="customers text-center position-relative">
            <svg class="position-relative" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"
                preserveAspectRatio="none">
                <path d="M0,22.3V0H1000V100Z" transform="translate(0 0)" style="opacity:0.66"></path>
                <path d="M0,6V0H1000V100Z" transform="translate(0 0)"></path>
            </svg>
            <div class="position-relative py-5">
                <h2 class="fs-1 fw-bold text-white">NUESTROS CLIENTES <br>
                    NUESTRO PORTAFOLIO</h2>
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                    <?php if ($customers->have_posts()): ?>
                        <?php while($customers->have_posts()): $customers->the_post(); ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url(get_field('image')['url']); ?>" alt="<?php the_title(); ?>" height="60px">
                        </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    </div>
                </div>

                <a href="<?php echo site_url('/portfolio'); ?>" class="btn btn-primary btn-lg">VEA TODO NUESTRO PORTAFOLIO</a>
            </div>
            <svg class="customers-bottom" fill="#FFF" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"
                preserveAspectRatio="none">
                <path d="M0,22.3V0H1000V100Z" transform="translate(0 0)" style="opacity:0.66"></path>
                <path d="M0,6V0H1000V100Z" transform="translate(0 0)"></path>
            </svg>
        </section>