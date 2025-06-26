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

            <div class="post-content mt-3" style="text-align:justify;">
                <?php the_content(); ?>
            </div>

            <div class="post-meta mt-4 text-muted">
                Publicado el <?php echo get_the_date(); ?> por <?php the_author(); ?>
            </div>

            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                target="_blank"
                class="btn text-white" style="background-color:#244872;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                </svg>
                Compartir en Facebook
            </a>

            <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_permalink()); ?>" 
                target="_blank" 
                rel="noopener noreferrer"
                class="btn btn-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                </svg>
                Compartir en X
            </a>
            <?php 
                $mensaje = get_the_title() . ' - ' . get_permalink();
            ?>
            <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($mensaje); ?>" 
                target="_blank" 
                rel="noopener noreferrer"
                class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                </svg>
                Compartir en WhatsApp
            </a>



        </article>

    <?php endwhile;
else: ?>
    <p>No se encontró el artículo.</p>
<?php endif; ?>
</section>

<?php get_template_part( 'template-parts/question')?>

<?php get_footer(); ?>