<?php
function register_project_cpt()
{
    $labels = [
        'name' => 'Proyectos',
        'singular_name' => 'Proyecto',
        'menu_name' => 'Proyectos',
        'name_admin_bar' => 'Proyectos',
        'add_new' => 'Agregar nuevo',
        'add_new_item' => 'Agregar nuevo Proyecto',
        'new_item' => 'Nuevo Proyecto',
        'edit_item' => 'Editar Proyecto',
        'view_item' => 'Ver Proyecto',
        'all_items' => 'Todos los Proyectos',
        'search_items' => 'Buscar Proyectos',
        'parent_item_colon' => '',
        'not_found' => 'No se encontraron Proyectos.',
        'not_found_in_trash' => 'No hay proyectos en la papelera.',
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-lightbulb',
        'supports' => ['title'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'proyectos'],
    ];

    register_post_type('project', $args);
}

add_action('init', 'register_project_cpt');