<?php
function register_feature_cpt()
{
    $labels = [
        'name'               => 'Características',
        'singular_name'      => 'Caracteristica',
        'menu_name'          => 'Características',
        'name_admin_bar'     => 'Caracteristica',
        'add_new'            => 'Agregar nueva',
        'add_new_item'       => 'Agregar nueva característica de servicios',
        'new_item'           => 'Nueva caracteristica',
        'edit_item'          => 'Editar caracteristica',
        'view_item'          => 'Ver caracteristica',
        'all_items'          => 'Todas las caracteristicas',
        'search_items'       => 'Buscar características',
        'not_found'          => 'No se encontraron características.',
        'not_found_in_trash' => 'No hay características en la papelera.',
    ];

    $args = [
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 4,
        'menu_icon'     => 'dashicons-format-aside',
        'supports'      => ['title'],
        'has_archive'   => true,
        'rewrite'       => ['slug' => 'caracteristica'],
    ];

    register_post_type('feature', $args);
}

add_action('init', 'register_feature_cpt');