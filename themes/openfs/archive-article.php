<?php get_header(); ?>
<!-- HERO SECTION -->
<section class="hero-page position-relative overflow-hidden text-white">
    <div data-aos="fade-up" data-aos-duration="800" class="hero-page__title position-relative z-1 container">
        <h2 id="slider-title" class="fs-1 fw-bold text-primary">
            NUESTRO BLOG
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
                
<section class="container my-5">
<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <article class="card">
            <img height="200px" src="<?php echo esc_url(get_field('image')['url']); ?>" class="card-img-top object-fit-cover" alt="<?php the_title(); ?>">
                <div class="card-body">
                    <h2 class="card-title text-primary fw-bold">
                        <?php the_title(); ?>
                    </h2>
                    <p class="card-text">
                        <?php echo esc_html(get_field('description')); ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Leer Mas</a>
                </div>
        </article>
    <?php endwhile; ?>
<?php else: ?>
    <p>No se encontraron artículos.</p>
<?php endif; ?>
</section>

<?php get_footer(); ?>
