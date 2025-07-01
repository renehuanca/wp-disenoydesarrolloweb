<?php get_header(); ?>
        <!-- HERO SECTION -->
        <section class="hero-page position-relative overflow-hidden text-white">
            <div data-aos="fade-up" data-aos-duration="800" class="hero-page__title position-relative z-1 container">
                <h2 id="slider-title" class="fs-1 fw-bold text-white">
                    NUESTRO PORTAFOLIO
                </h2>
                <p class="hero-page__description">
                    Diseños que conectan, impactan y destacan en el mundo digital.
                </p>
            </div>
            <svg fill="#FFF" class="services-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 91"
                preserveAspectRatio="none">
                <path d="M0 0v.4c67.3 41.8 265.8 72 500.2 72 234 0 432.2-30.2 499.8-71.8V0H0z"></path>
            </svg>
        </section>

        <!-- GALLERY SECTION -->
        <?php 
        $paged = max(1, get_query_var('paged'));

        $services = new WP_Query([
                'post_type' => 'project',
                'posts_per_page' => 12,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'paged' => $paged,
            ]);
        ?>
        <section class="container mt-3">
            <div class="gallery mt-5">
                
                <?php if ($services->have_posts()): ?>
                    <?php while($services->have_posts()): $services->the_post(); ?>
                    <a href="#" class="gallery__item">
                        <div class="gallery__overlay">
                            <h3 class="fw-bold"><?php the_title(); ?></h3>
                            <p><?php echo esc_html(get_field('subtitle')); ?></p>
                        </div>
                        <img class="gallery__image" src="<?php echo esc_url(get_field('image')['url']); ?>" alt="<?php the_title(); ?>">
                    </a>
                    <?php endwhile; ?>

                    
                <?php else: ?>
                    No hay proyectos
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php
            $total_pages = $services->max_num_pages;
            if ($total_pages > 1):
                $current_page = max(1, get_query_var('paged'));

                $pagination_links = paginate_links([
                    'total'        => $total_pages,
                    'current'      => $current_page,
                    'prev_text'    => 'Anterior',
                    'next_text'    => 'Siguiente',
                    'type'         => 'array', 
                ]);
            ?>

                <nav aria-label="Page navigation" class="my-5">
                <ul class="pagination justify-content-center">
                    <?php foreach ($pagination_links as $link): ?>
                    <li class="page-item <?php echo strpos($link, 'current') !== false ? 'active' : ''; ?>">
                        <?php
                        echo str_replace('page-numbers', 'page-link', $link);
                        ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                </nav>
            <?php endif; ?>
            <!-- end pagination -->

        </section>

        <?php get_template_part( 'template-parts/question')?>

<?php get_footer(); ?>


