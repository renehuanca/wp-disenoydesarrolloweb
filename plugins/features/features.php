<?php
/*
* Plugin Name:       Características OpenFS LLC
* Plugin URI:        https://github.com/Open-FS
* Description:       Gestión de características de servicios para OpenFS LLC
* Version:           1.0
* Requires at least: 5.2
* Requires PHP:      8.0
* Author:            OpenFS LLC
* Author URI:        https://digitalmarketingnewjersey.us/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Update URI:        https://github.com/Open-FS
* Text Domain:       openfs-features
* Domain Path:       /languages
*/

function register_feature_custom_post_type(): void
{
    $labels = [
        'name'               => 'Características',
        'singular_name'      => 'Característica',
        'menu_name'          => 'Características',
        'name_admin_bar'     => 'Característica',
        'add_new'            => 'Agregar nueva',
        'add_new_item'       => 'Agregar nueva característica de servicios',
        'new_item'           => 'Nueva característica',
        'edit_item'          => 'Editar característica',
        'view_item'          => 'Ver característica',
        'all_items'          => 'Todas las características',
        'search_items'       => 'Buscar características',
        'not_found'          => 'No se encontraron características.',
        'not_found_in_trash' => 'No hay características en la papelera.',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'menu_position'      => 8,
        'menu_icon'          => 'dashicons-button',
        'supports'           => ['title'],
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'caracteristica'],
        'show_in_rest'       => true,
    ];

    register_post_type('feature', $args);
}

add_action('init', 'register_feature_custom_post_type');

function register_feature_fields(): void
{
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key'    => 'group_feature_fields',
            'title'  => 'Campos de las características de servicios',
            'fields' => [
                [
                    'key'           => 'field_feature_image',
                    'label'         => 'Imagen',
                    'name'          => 'image',
                    'type'          => 'image',
                    'instructions'  => 'Selecciona una imagen o icono de la característica.',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                    'library'       => 'all',
                    'required'      => 1,
                ],
                [
                    'key'           => 'field_feature_description',
                    'label'         => 'Descripción',
                    'name'          => 'description',
                    'type'          => 'textarea',
                    'instructions'  => 'Escribe una descripción de la característica.',
                    'required'      => 0,
                ],
            ],
            'location' => [
                [
                    [
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'feature',
                    ],
                ],
            ],
        ]);
    }
}

add_action('acf/init', 'register_feature_fields');
