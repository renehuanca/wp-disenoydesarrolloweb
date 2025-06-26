<?php get_header(); ?>
<div class="bg-dark-subtle text-dark">
    <div class="bg-dark" style="height: 100px;"></div>
    <div class="d-flex align-items-center justify-content-center min-vh-100 px-2">
        <div class="text-center">
            <h1 class="display-1 fw-bold">404</h1>
            <p class="fs-2 fw-medium mt-4">Oops! Página no encontrada</p>
            <p class="mt-4 mb-5">La página que estás buscando no existe o ha sido movida.</p>
            <a href="<?php echo home_url(); ?>" class="btn btn-primary fw-semibold rounded-pill px-4 py-2 custom-btn">
                Ir al inicio
            </a>
        </div>
    </div>
</div>
<?php get_footer(); ?>