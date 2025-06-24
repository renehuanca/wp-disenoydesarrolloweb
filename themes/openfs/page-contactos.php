<?php get_header(); ?>

        <!-- CONTACT SECTION -->
        <section class="contact text-white position-relative">
            <video autoplay muted loop playsinline class="contact__video position-absolute w-100 h-100 object-fit-cover z-n1">
                <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/contactos.mp4" type="video/mp4">
                Tu navegador no soporta video.
            </video>

            <div class="contact__form container position-relative z-2">
                <div class="card">
                    <?php echo do_shortcode("[ninja_form id='1']"); ?>
                </div>
            </div>
        </section>

        <iframe class="d-block" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3216.626376984918!2d-68.12955744498308!3d-16.514230903225624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f2089c86e6d41%3A0xa0fea05833827bb1!2sOpen%20and%20Free%20Software%20Solutions%20%7C%20Dise%C3%B1o%20y%20Desarrollo%20Web%2C%20App%20Moviles%2C%20Hospedaje%20Web%20y%20Registro%20de%20Dominios!5e0!3m2!1ses-419!2sbo!4v1750456753388!5m2!1ses-419!2sbo" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

<?php get_footer(); ?>


