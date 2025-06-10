<?php get_header(); ?>
        <!-- HERO SECTION -->
        <section class="hero-page position-relative overflow-hidden text-white">
            <div data-aos="fade-up" data-aos-duration="800" class="hero-page__title position-relative z-1 container">
                <h2 id="slider-title" class="fs-1 fw-bold text-primary">
                    SOBRE OPENFS SRL
                </h2>
                <p class="hero-page__description">
                    Solución de software abierto y libre
                </p>
            </div>
            <svg fill="#FFF" class="services-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 91"
                preserveAspectRatio="none">
                <path d="M0 0v.4c67.3 41.8 265.8 72 500.2 72 234 0 432.2-30.2 499.8-71.8V0H0z"></path>
            </svg>
        </section>


        <!-- QUIENES SOMOS -->
        <section class="container mt-3">
            <?php echo do_shortcode('[contact-form-7 id="93c2401" title="Contact form 1"]'); ?>
        </section>

<?php get_footer(); ?>


