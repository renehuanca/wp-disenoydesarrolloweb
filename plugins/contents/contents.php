<?php
function register_content_cpt()
{
    $labels = [
        'name'               => 'Contenidos',
        'singular_name'      => 'Contenido',
        'menu_name'          => 'Contenidos',
        'name_admin_bar'     => 'Contenido',
        'add_new'            => 'Agregar nueva',
        'add_new_item'       => 'Agregar nuevo contenido',
        'new_item'           => 'Nueva Contenido',
        'edit_item'          => 'Editar contenido',
        'view_item'          => 'Ver contenido',
        'all_items'          => 'Todas las contenidos',
        'search_items'       => 'Buscar contenido',
        'not_found'          => 'No se encontraron contenidos.',
        'not_found_in_trash' => 'No hay contenidos en la papelera.',
    ];

    $args = [
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 4,
        'menu_icon'     => 'dashicons-format-aside',
        'supports'      => ['title'],
        'has_archive'   => true,
        'rewrite'       => ['slug' => 'contenidos'],
    ];

    register_post_type('content', $args);
}

add_action('init', 'register_content_cpt');