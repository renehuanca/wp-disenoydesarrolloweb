<?php get_header(); ?>
        <!-- HERO SECTION -->
        <section class="hero-page position-relative overflow-hidden text-white">
            <div data-aos="fade-up" data-aos-duration="800" class="hero-page__title position-relative z-1 container">
                <h2 id="slider-title" class="fs-1 fw-bold text-white">
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
            <h2 class="fs-1 fw-bold mb-3">QUIENES SOMOS?</h2>
            <p><span class="text-primary fw-bold">Open and Free Software Solutions SRL</span> – OpenFS SRL – Software
                Libre
                Bolivia, es el principal referente del sector privado en el ámbito de Tecnologías de Información y
                Comunicación en base a Software Libre y Código Abierto en el Estado Plurinacional de Bolivia.
            </p>
            <article class="p-4 shadow d-flex justify-content-center align-items-center gap-4 mb-4" data-aos="fade-right">
                <div>
                    <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-play-icon lucide-play">
                        <polygon points="6 3 20 12 6 21 6 3" />
                    </svg>
                </div>
                <div>
                    <h3 class="fw-bold">MISION</h3>
                    <p>
                        Fomentar una industria Tecnologías de Información y Comunicación en base a Software Libre y
                        Código
                        Abierto, que genere valor añadido a los servicios corporativos del sector gubernamental,
                        Académico,
                        Industrial, Cooperación y otros sectores empresariales</p>
                </div>

            </article>

            <article class="p-4 shadow d-flex justify-content-center align-items-center gap-4" data-aos="fade-right" data-aos-duration="800">
                <div>
                    <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-play-icon lucide-play">
                        <polygon points="6 3 20 12 6 21 6 3" />
                    </svg>
                </div>
                <div>
                    <h3 class="fw-bold">VISIÓN</h3>
                    <p>
                        Proyectar una industria de Tecnologías de Información y Comunicación basada en Software Libre y
                        Código Abierto, sostenible y respaldada por Estándares Abiertos, que promueva la innovación, la
                        independencia tecnológica y el desarrollo colaborativo.</p>
                </div>
            </article>
        </section>

        <!-- OUR HISTORY -->
        <section class="container">
            <h3 class="fw-bold fs-1 text-center mt-3 mt-md-5">HISTORIA</h3>
            <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                <img class="rounded-circle object-fit-cover" height="250px" width="250px"
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/romulo-v-betarncourt-ceo.jpg" alt="Foto del SEO de OPEN FS">
                <div>
                    <p>
                        <span class="fw-bold">Open and Free Software Solutions SRL – OpenFS SRL </span>– Software Libre
                        Bolivia, es una empresa
                        legalmente establecida con Matricula de Comercio <span class="fw-bold">Nº 00157952</span>,
                        registrada desde el 17 de
                        Diciembre de
                        2009 a la fecha.
                    </p>

                    <p>
                        Nace por la necesidad a un acceso soberano a las Tecnologías de Información y Comunicación que
                        reduzcan los lazos de la dependencia tecnológica en nuestra sociedad, para brindar soberanía y
                        liberación tecnológica para los Bolivianos
                    </p>
                </div>
            </div>
        </section>


        <?php get_template_part( 'template-parts/question')?>

<?php get_footer(); ?>

