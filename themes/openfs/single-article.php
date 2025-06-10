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
<?php
if (have_posts()):
    while (have_posts()): the_post(); ?>

        <article>

            <img height="200px" src="<?php echo esc_url(get_field('image')['url']); ?>" class="card-img-top object-fit-cover rounded" alt="<?php the_title(); ?>">
            <h1 class="text-primary my-4"><?php the_title(); ?></h1>

            <?php if (has_post_thumbnail()): ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="post-content mt-3">
                <?php the_content(); ?>
            </div>

            <div class="post-meta mt-4 text-muted">
                Publicado el <?php echo get_the_date(); ?> por <?php the_author(); ?>
            </div>

        </article>

    <?php endwhile;
else: ?>
    <p>No se encontró el artículo.</p>
<?php endif; ?>
</section>

<?php get_footer(); ?>