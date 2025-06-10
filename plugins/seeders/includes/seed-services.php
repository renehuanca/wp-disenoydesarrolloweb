<?php

function seed_services() 
{
    $n = 6; // increment to seed

    if (get_option('openfs_services_seeded_'.$n)) { 
        return;
    }

    delete_all_posts_by_type('service');

    $services = [
        [
            'title'       => 'DISEÑO Y DESARROLLO WEB holoa mundo',
            'subtitle'    => 'Sitios web únicos adaptados a tu negocio',
            'description' => 'Diseño de Páginas Webs increíbles. Desarrollo Web profesional enfocado a tus objetivos empresariales.',
            'color'       => '#4A90E2',
            'image_id'    => 229,
        ],
        [
            'title'       => 'HOSPEDAJE WEB',
            'subtitle'    => 'Servidores rápidos, seguros y escalables',
            'description' => 'Alojamiento Web u Hospedaje Web tráfico ilimitado, copias de seguridad, bases de datos. Servidores VPS, Servidores dedicados, Servidores Cloud, etc.',
            'color'       => '#7B1FA2',
            'image_id'    => 229,
        ],
        [
            'title'       => 'APLICACIÓN WEB PROGRESIVA',
            'subtitle'    => 'Tecnología web que funciona como app móvil',
            'description' => 'Una experiencia similar a una aplicación nativa, servicio instalable en escritorio y dispositivos móviles. La última tendencia en Diseño de páginas Web en Bolivia, no depende de una plataforma.',
            'color'       => '#009688',
            'image_id'    => 229,
        ],
        [
            'title'       => 'CERTIFICADOS DE SEGURIDAD',
            'subtitle'    => 'Protege tu web y genera confianza',
            'description' => 'Alta seguridad de encriptación y mayor confianza en el Diseño de tu Página Web con certificados SSL/TSL',
            'color'       => '#F44336',
            'image_id'    => 229,
        ],
        [
            'title'       => 'DISEÑO DE LANDING PAGES',
            'subtitle'    => 'Páginas efectivas para campañas exitosas',
            'description' => 'Páginas de Aterrizaje o Landing Pages para tus campañas de marketing digital, ahorra dinero y tiempo en tus estrategias digitales con nuestro servicio de Diseño Web.',
            'color'       => '#FF9800',
            'image_id'    => 229,
        ],
        [
            'title'       => 'TIENDAS VIRTUALES',
            'subtitle'    => 'Comercio electrónico a la medida de tu marca',
            'description' => 'Lleva tu negocio tradicional al mundo del comercio electrónico con una tienda Virtual, Diseño Web de Catálogos Online con Pagos en Línea por medio de tarjetas de Débito/Crédito.',
            'color'       => '#03A9F4', 
            'image_id'    => 229,
        ],
        [
            'title'       => 'ATENCIÓN PERSONALIZADA Y SOPORTE TÉCNICO',
            'subtitle'    => 'Acompañamiento constante para tu tranquilidad',
            'description' => 'Ponemos todos los medios a tu alcance (Presencial, Chat en Línea, teléfono, WhatsApp, Email) para estar siempre en contacto.',
            'color'       => '#8BC34A',
            'image_id'    => 229,
        ],
    ];

    foreach ($services as $data) {
        $post_id = wp_insert_post([
            'post_type'   => 'service',
            'post_title'  => $data['title'],
            'post_status' => 'publish',
        ]);

        if (!is_wp_error($post_id)) {
            update_field('subtitle', $data['subtitle'], $post_id);
            update_field('description', $data['description'], $post_id);
            update_field('color', $data['color'], $post_id);
            update_field('image', $data['image_id'], $post_id); 
        }
    }

    update_option('openfs_services_seeded_'.$n, true);
}

add_action('init', 'seed_services');
