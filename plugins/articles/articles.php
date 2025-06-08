<?php
function register_articulo_cpt()
{
    $labels = [
        'name'               => 'Artículos',
        'singular_name'      => 'Artículo',
        'menu_name'          => 'Artículos',
        'name_admin_bar'     => 'artículo',
        'add_new'            => 'Agregar nuevo',
        'add_new_item'       => 'Agregar nuevo artículo',
        'new_item'           => 'Nuevo artículo',
        'edit_item'          => 'Editar artículo',
        'view_item'          => 'Ver artículo',
        'all_items'          => 'Todos los artículos',
        'search_items'       => 'Buscar artículos',
        'not_found'          => 'No se encontraron artículos.',
        'not_found_in_trash' => 'No hay artículos en la papelera.',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-media-document',
        'supports'           => ['title', 'editor', 'thumbnail'],
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'articulos'],
        'show_in_rest'       => true,
    ];

    register_post_type('article', $args);
}

add_action('init', 'register_articulo_cpt');
