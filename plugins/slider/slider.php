<?php
/*
* Plugin Name:       Slider del texto principal OpenFS LLC
* Plugin URI:        https://github.com/Open-FS
* Description:       Gestión del Slider para OpenFS LLC
* Version:           1.0
* Requires at least: 5.2
* Requires PHP:      8.0
* Author:            OpenFS LLC
* Author URI:        https://digitalmarketingnewjersey.us/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Update URI:        https://github.com/Open-FS
* Text Domain:       openfs-slider
* Domain Path:       /languages
*/

function register_slide_custom_post_type(): void
{
    $labels = [
        'name'               => 'Slides',
        'singular_name'      => 'Slide',
        'menu_name'          => 'Slides',
        'name_admin_bar'     => 'Slide',
        'add_new'            => 'Agregar nuevo',
        'add_new_item'       => 'Agregar nuevo slide',
        'new_item'           => 'Nuevo slide',
        'edit_item'          => 'Editar slide',
        'view_item'          => 'Ver slide',
        'all_items'          => 'Todos los slides',
        'search_items'       => 'Buscar slides',
        'not_found'          => 'No se encontraron slides.',
        'not_found_in_trash' => 'No hay slides en la papelera.',
    ];

    $args = [
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 3,
        'menu_icon'     => 'dashicons-image-flip-horizontal',
        'supports'      => ['title'],
        'has_archive'   => false,
        'rewrite'       => ['slug' => 'slides'],
        'show_in_rest'  => true,
    ];

    register_post_type('slide', $args);
}

add_action('init', 'register_slide_custom_post_type');

function register_slide_fields(): void
{
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([ 
            'key'    => 'group_slide_fields',
            'title'  => 'Campos del slide',
            'fields' => [
                [
                    'key'           => 'field_slide_subtitle',
                    'label'         => 'Subtítulo',
                    'name'          => 'subtitle',
                    'type'          => 'text',
                    'instructions'  => 'Introduce el subtítulo del slide este se verá por encima del titulo grande.',
                    'required'      => 1,
                ],
            ],
            'location' => [
                [
                    [
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'slide',
                    ],
                ],
            ],
        ]);
    }
}

add_action('acf/init', 'register_slide_fields');
