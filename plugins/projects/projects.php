<?php
/*
* Plugin Name:       Proyectos OpenFS LLC
* Plugin URI:        https://github.com/Open-FS
* Description:       Gestión de proyectos personalizados para OpenFS LLC
* Version:           1.0
* Requires at least: 5.2
* Requires PHP:      8.0
* Author:            OpenFS LLC
* Author URI:        https://digitalmarketingnewjersey.us/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Update URI:        https://github.com/Open-FS
* Text Domain:       openfs-projects
* Domain Path:       /languages
*/

function register_project_custom_post_type(): void
{
    $labels = [
        'name'               => 'Proyectos',
        'singular_name'      => 'Proyecto',
        'menu_name'          => 'Proyectos',
        'name_admin_bar'     => 'Proyecto',
        'add_new'            => 'Agregar nuevo',
        'add_new_item'       => 'Agregar nuevo Proyecto',
        'new_item'           => 'Nuevo Proyecto',
        'edit_item'          => 'Editar Proyecto',
        'view_item'          => 'Ver Proyecto',
        'all_items'          => 'Todos los Proyectos',
        'search_items'       => 'Buscar Proyectos',
        'not_found'          => 'No se encontraron Proyectos.',
        'not_found_in_trash' => 'No hay proyectos en la papelera.',
    ];

    $args = [
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 3,
        'menu_icon'     => 'dashicons-lightbulb',
        'supports'      => ['title'],
        'has_archive'   => true,
        'rewrite'       => ['slug' => 'proyectos'],
        'show_in_rest'  => true,
    ];

    register_post_type('project', $args);
}

add_action('init', 'register_project_custom_post_type');

function register_project_fields(): void
{
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key'    => 'group_project_fields',
            'title'  => 'Campos del proyecto',
            'fields' => [
                [
                    'key'           => 'field_project_subtitle',
                    'label'         => 'Subtítulo',
                    'name'          => 'subtitle',
                    'type'          => 'text',
                    'instructions'  => 'Introduce el subtítulo del proyecto.',
                    'required'      => 0,
                    'default_value' => 'DISEÑO Y DESARROLLO WEB',
                ],
                [
                    'key'           => 'field_project_image',
                    'label'         => 'Imagen',
                    'name'          => 'image',
                    'type'          => 'image',
                    'instructions'  => 'Selecciona una imagen-icono del proyecto.',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                    'library'       => 'all',
                    'required'      => 1,
                ],
            ],
            'location' => [
                [
                    [
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'project',
                    ],
                ],
            ],
        ]);
    }
}

add_action('acf/init', 'register_project_fields');
