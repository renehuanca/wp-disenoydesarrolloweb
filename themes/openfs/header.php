<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Diseño y desarrollo web - Openfs">
    <meta name="keywords" content="diseno de paginas web, desarrollo de paginas web, desarrollo web, diseño web, la paz, bolivia, creacion de paginas web, sitio web, diseño, desarrollo, pagina web, diseño paginas web, creacion de paginas web, diseño web profesional, empresa de diseño web, programacion web, empresas de desarrollo web, diseño y desarrollo web, como crear una pagina web, aplicaciones web, programacion web, portal web, desarrollo web la paz, desarrollo web bolivia, diseño web joomla, desarrollo de sistemas web, posicionamiento de paginas web, alojamiento de paginas web, mantenimiento pagina web, diseño y desarrollo, mejores creadores de paginas web, optimizacion de paginas web, optimizacion web, desarrollo web responsive, diseño aplicaciones web">
    <meta name="description" content="✅ Diseño de Paginas Web ✅ Diseño  Web Profesional ✅Desarrollo Web ✅ La Paz, Bolivia. ✅ Si tu objetivo es ser el primero en Google te ayudamos a lograrlo.">
    <title>Diseño de Páginas Web - Openfs</title>
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <!-- HEADER -->
    <header id="header" class="position-fixed w-100 z-1">
        <div class="container w-100 h-100 d-flex justify-content-between align-items-center">
            <a href="<?php echo home_url(); ?>" class="logo-openfs">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" height="60px" alt="Diseño y desarrollo web - Logo Openfs">
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" id="menu-toggle" class="text-white" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-menu-icon lucide-menu">
                <path d="M4 12h16" />
                <path d="M4 18h16" />
                <path d="M4 6h16" />
            </svg>
            <!-- DESKTOP MENU -->
            <?php
                $services = new WP_Query([
                    'post_type' => 'service',
                    'posts_per_page' => -1,
                    'meta_key' => 'order',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                ]);
            ?> 
            <nav id="menu-lg" class="position-relative">
                <ul class="list-unstyled d-flex justify-content-between m-0 p-4 fw-semibold">
                    <li class="position-relative grupo-servicios">
                        <a href="#" class="px-3 text-white text-decoration-none d-block py-2">SERVICIOS</a>
                        
                        <ul class="submenu-lg list-unstyled position-absolute bg-white text-black mt-0 py-2 px-3 shadow rounded">
                            <?php if ($services->have_posts()): ?>
                                    <?php while($services->have_posts()): $services->the_post(); ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>" class="d-block p-2 text-decoration-none text-muted fw-normal" style="font-size: 14px;"><?php the_title() ?></a>
                                    </li>
                                    <?php endwhile; ?>
                            <?php else: ?>
                                    No hay servicios
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('/about'); ?>" class="px-3 text-white text-decoration-none d-block py-2">SOBRE OPENFS</a>
                    </li>
                    <li><a href="<?php echo site_url('/articulos'); ?>" class="px-3 text-white text-decoration-none d-block py-2">BLOG</a></li>
                    <li><a href="<?php echo site_url('/portfolio'); ?>" class="px-3 text-white text-decoration-none d-block py-2">PORTAFOLIO</a></li>
                    <li><a href="<?php echo site_url('/contactos'); ?>" class="px-3 text-white text-decoration-none d-block py-2">CONTACTOS</a>
                    </li>
                </ul>
            </nav>

            <!-- MOBILE MENU -->
            <nav id="menu" class="menu-slide bg-white position-fixed top-0 end-0 h-100 translate-end">
                <ul class="list-unstyled m-0 p-4">
                    <li class="d-flex justify-content-end pb-3">
                        <button id="close-menu-button" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-x-icon lucide-x">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg>
                        </button>
                    </li>
                    <li>
                        <button
                            class="fw-bold text-black text-decoration-none d-block p-3 border-0 bg-transparent w-100 text-start d-flex justify-content-between align-items-center"
                            id="toggle-servicios">
                            SERVICIOS
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M8 12h8" />
                                <path d="M12 8v8" />
                            </svg>
                        </button>
                        <ul class="submenu list-unstyled ps-4 pe-4" id="submenu-servicios">
                            <?php if ($services->have_posts()): ?>
                                <?php while($services->have_posts()): $services->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>" class="text-black text-decoration-none d-block py-2" style="font-size: 14px"><?php the_title() ?></a>
                                </li>
                                <?php endwhile; ?>
                            <?php else: ?>
                                    No hay servicios
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('/about'); ?>" class="fw-bold text-black text-decoration-none d-block p-3">SOBRE
                            OPENFS</a></li>
                    <li><a href="<?php echo site_url('/articulos'); ?>" class="fw-bold text-black text-decoration-none d-block p-3">BLOG</a></li>
                    <li><a href="<?php echo site_url('/portfolio'); ?>"
                            class="fw-bold text-black text-decoration-none d-block p-3">PORTAFOLIO</a></li>
                    <li><a href="<?php echo site_url('/contactos'); ?>"
                            class="fw-bold text-black text-decoration-none d-block p-3">CONTACTOS</a></li>
                </ul>
            </nav>

        </div>
    </header>

    <main class="position-relative z-0">

