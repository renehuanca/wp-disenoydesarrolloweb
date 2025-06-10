<?php

function seed_features()
{
    $n = 1; // incrementa para volver a ejecutar el seeder

    if (get_option('openfs_features_seeded_' . $n)) {
        return;
    }

    // 🔄 Elimina todas las features existentes
    delete_all_posts_by_type('feature');

    // 🌱 Lista de características
    $features = [
        [
            'title'       => 'Diseño Web Corporativo',
            'description' => 'Diseño de páginas web corporativas para empresas.',
            'image_id'    => 101,
        ],
        [
            'title'       => 'Tiendas Online',
            'description' => 'Totalmente personalizadas, adaptable a las características de sus productos.',
            'image_id'    => 101,
        ],
        [
            'title'       => 'Microsites y landing pages',
            'description' => 'Dan a conocer un producto o servicio en concreto en una pequeña página web.',
            'image_id'    => 101,
        ],
        [
            'title'       => 'Apps móviles',
            'description' => 'Adaptación de sus páginas web a los diferentes dispositivos móviles.',
            'image_id'    => 101,
        ],
        [
            'title'       => 'Creación de intranets',
            'description' => 'Es la comunicación interna de las empresas y organizaciones.',
            'image_id'    => 101,
        ],
        [
            'title'       => 'Rediseño de páginas web',
            'description' => 'Actualización de diseño, contenidos y añadir nuevas funcionalidades.',
            'image_id'    => 101,
        ],
        [
            'title'       => 'Mantenimiento de webs',
            'description' => 'Solución de cualquier problema que pueda surgir a nivel técnico.',
            'image_id'    => 101,
        ],
        [
            'title'       => 'Programación web a medida',
            'description' => 'Trabajamos en el desarrollo de proyectos de todos los tamaños.',
            'image_id'    => 101,
        ],
        [
            'title'       => 'Webs institucionales',
            'description' => 'Portales web de información pública o científica.',
            'image_id'    => 101,
        ],
        [
            'title'       => 'Webs catálogo',
            'description' => 'Es la mejor forma de mostrar los productos de cualquier empresa.',
            'image_id'    => 101,
        ],
    ];

    // 🧱 Insertar características
    foreach ($features as $data) {
        $post_id = wp_insert_post([
            'post_type'   => 'feature',
            'post_title'  => $data['title'],
            'post_status' => 'publish',
        ]);

        if (!is_wp_error($post_id)) {
            update_field('description', $data['description'], $post_id);
            update_field('image', $data['image_id'], $post_id);
        }
    }

    update_option('openfs_features_seeded_' . $n, true);
}

add_action('init', 'seed_features');