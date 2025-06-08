<?php
function register_customer_cpt()
{
    $labels = [
        'name'               => 'Clientes',
        'singular_name'      => 'Cliente',
        'menu_name'          => 'Clientes',
        'name_admin_bar'     => 'cliente',
        'add_new'            => 'Agregar nuevo',
        'add_new_item'       => 'Agregar nuevo cliente',
        'new_item'           => 'Nuevo cliente',
        'edit_item'          => 'Editar cliente',
        'view_item'          => 'Ver cliente',
        'all_items'          => 'Todos los clientes',
        'search_items'       => 'Buscar clientes',
        'not_found'          => 'No se encontraron clientes.',
        'not_found_in_trash' => 'No hay clientes en la papelera.',
    ];

    $args = [
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-groups',
        'supports'      => ['title'],
        'has_archive'   => true,
        'rewrite'       => ['slug' => 'cliente'],
    ];

    register_post_type('customer', $args);
}

add_action('init', 'register_customer_cpt');