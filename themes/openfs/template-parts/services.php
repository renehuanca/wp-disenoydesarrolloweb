<?php
$services = new WP_Query([
    'post_type' => 'service',
    'posts_per_page' => -1,
    'meta_key' => 'order',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
]);
?>
<!-- SERVICES SECTION -->
<section class="services position-relative pt-5">
    <div class="container">
        <h2 class="display-4 fw-bold pb-5">
            <span class="writing-text position-absolute"></span>
            <br> DE PAGINAS WEB<span class="text-primary"> EN BOLIVIA</span>
        </h2>
        <div class="container">
            <div class="row">
                <?php if ($services->have_posts()): ?>
                    <?php while($services->have_posts()): $services->the_post(); ?>
                        <div class="col-md-6 mb-4">
                            <article class="card p-2 border-0 shadow h-100" data-aos="fade-up">
                                <div class="card-body d-flex flex-column text-center text-lg-start flex-lg-row gap-4">
                                    <img height="100px" 
                                        class="object-fit-contain"
                                        src="<?php echo esc_url(get_field('image')['url']); ?>"
                                        alt="<?php the_title(); ?>">
                                    <div>
                                        <h3 class="fs-5 card-title"><?php the_title(); ?></h3>
                                        <p><?php echo esc_html(get_field('description')); ?></p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    No hay servicios
                <?php endif; ?>
            </div>
        </div>
    </div>
    <svg fill="#FFF" class="services-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 91"
        preserveAspectRatio="none">
        <path d="M0 0v.4c67.3 41.8 265.8 72 500.2 72 234 0 432.2-30.2 499.8-71.8V0H0z"></path>
    </svg>
</section>
