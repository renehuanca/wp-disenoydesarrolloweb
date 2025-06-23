<?php get_header(); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <!-- HERO SECTION -->
        <section class="hero-page position-relative overflow-hidden text-white">
            <div data-aos="fade-up" data-aos-duration="800" class="hero-page__title position-relative z-1 container">
                <h1 id="slider-title" class="fs-1 fw-bold" style="color: <?php the_field('color') ? the_field('color') : 'var(--brand-primary)'; ?>!important;">
                    <?php the_title(); ?>
                </h1>
                <p class="text-white fs-5 fw-light text-uppercase">
                    <?php the_field('subtitle'); ?>
                </p>
                <p class="hero-page__description">
                    <?php the_field('description'); ?>
                </p>
            </div>
            <svg fill="#FFF" class="services-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 91"
                preserveAspectRatio="none">
                <path d="M0 0v.4c67.3 41.8 265.8 72 500.2 72 234 0 432.2-30.2 499.8-71.8V0H0z"></path>
            </svg>
        </section>

        <?php
            $relatedItems = get_field('related_features');
            if ($relatedItems) :
                $features = array_filter($relatedItems, function($post) {
                    return $post->post_type === 'feature';
                });
                $contents = array_filter($relatedItems, function($post) {
                    return $post->post_type === 'content';
                });
            
        ?>

            <!-- FEATURE CARDS SECTION -->
            <?php if($features): ?>
                <section class="parallax-section container mt-5">
                    <div class="radial-gradient row text-center mb-4 d-flex justify-content-center">
                        <?php foreach($features as $feature): ?>
                            <?php $image = get_field('image', $feature->ID); ?>
                            <div class="col-md-4 mb-4">
                                <article class="card h-100 shadow border-0" data-aos="fade-up">
                                    <div class="card-img-wrapper">
                                        <img 
                                            src="<?php echo esc_url($image['url']); ?>" 
                                            class="img-fluid"
                                            alt="<?php echo esc_attr($image['alt']) ? esc_attr($image['alt']) : esc_attr($feature->post_title); ?>"
                                        >
                                    </div>
                                    <div class="card-body">
                                        <h2 class="card-title text-dark fw-bold fs-5">
                                            <?php echo esc_html($feature->post_title); ?>
                                        </h2>
                                        <p class="text-body">
                                            <?php echo esc_html($feature->description); ?>
                                        </p>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <!-- CONTENT SECTION -->
            <?php if ($contents): ?>
                <section class="certificados-ssl container">
                    <?php foreach($contents as $content): ?>
                            <?php if (get_field('content_orientation', $content->ID) == 'vertical'): ?>
                                <div class="text-center my-5" data-aos="fade-up">
                                    <?php if (get_field('image', $content->ID)): ?>
                                        <img height="" src="<?php echo esc_url(get_field('image', $content->ID)['url']); ?>" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                    <h2 class="font-black mx-auto" style="max-width: 700px;color: <?php the_field('color') ? the_field('color') : 'var(--brand-primary)'; ?>!important;">
                                        <?php echo get_the_title($content->ID); ?>
                                    </h2>
                                    <p class="fw-bold"><?php echo esc_html(get_field('subtitle', $content->ID)); ?></p>
                                    <p class="lead"><?php echo esc_html(get_field('description', $content->ID)); ?></p>
                                </div>
                            <?php elseif(get_field('content_orientation', $content->ID) == 'horizontal'): ?>
                                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center my-5">
                                    <div data-aos="fade-right">
                                        <h2 class="font-black" style="color: <?php the_field('color') ? the_field('color') : 'var(--brand-primary)'; ?>!important;">
                                            <?php echo get_the_title($content->ID); ?>
                                        </h2>
                                        <p class="fw-bold"><?php echo esc_html(get_field('subtitle', $content->ID)); ?></p>
                                        <p class="certificados-ssl__description"><?php echo esc_html(get_field('description', $content->ID)); ?></p>
                                    </div>
                                    <div class="px-md-5 w-100 text-center" data-aos="flip-up">
                                    <?php if (get_field('image', $content->ID)): ?>
                                        <img  src="<?php echo esc_url(get_field('image', $content->ID)['url']); ?>" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                    <?php endforeach; ?>
                </section>
            <?php endif; ?>
        <?php endif; ?>

    <?php endwhile; endif; ?>

    <?php get_template_part( 'template-parts/question')?>
<?php get_footer(); ?>
