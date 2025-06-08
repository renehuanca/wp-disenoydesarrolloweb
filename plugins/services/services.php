<?php
function register_service_cpt()
{
    $labels = [
        'name' => 'Servicios',
        'singular_name' => 'Servicio',
        'menu_name' => 'Servicios',
        'name_admin_bar' => 'Servicios',
        'add_new' => 'Agregar nuevo',
        'add_new_item' => 'Agregar nuevo servicio',
        'new_item' => 'Nuevo servicio',
        'edit_item' => 'Editar servicio',
        'view_item' => 'Ver servicio',
        'all_items' => 'Todos los servicios',
        'search_items' => 'Buscar servicios',
        'parent_item_colon' => '',
        'not_found' => 'No se encontraron servicios.',
        'not_found_in_trash' => 'No hay sevicios en la papelera.',
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-lightbulb',
        'supports' => ['title', 'thumbnail'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'servicios'],
    ];

    register_post_type('service', $args);
}

add_action('init', 'register_service_cpt');