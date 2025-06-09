<?php
/*
* Plugin Name:       Contenidos OpenFS LLC
* Plugin URI:        https://github.com/Open-FS
* Description:       Gestión de contenidos personalizados para OpenFS LLC
* Version:           1.0
* Requires at least: 5.2
* Requires PHP:      8.0
* Author:            OpenFS LLC
* Author URI:        https://digitalmarketingnewjersey.us/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Update URI:        https://github.com/Open-FS
* Text Domain:       openfs-contents
* Domain Path:       /languages
*/

function register_content_custom_post_type(): void
{
    $labels = [
        'name'               => 'Contenidos',
        'singular_name'      => 'Contenido',
        'menu_name'          => 'Contenidos',
        'name_admin_bar'     => 'Contenido',
        'add_new'            => 'Agregar nuevo',
        'add_new_item'       => 'Agregar nuevo contenido',
        'new_item'           => 'Nuevo contenido',
        'edit_item'          => 'Editar contenido',
        'view_item'          => 'Ver contenido',
        'all_items'          => 'Todos los contenidos',
        'search_items'       => 'Buscar contenidos',
        'not_found'          => 'No se encontraron contenidos.',
        'not_found_in_trash' => 'No hay contenidos en la papelera.',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-format-aside',
        'supports'           => ['title'],
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'contenidos'],
        'show_in_rest'       => true,
    ];

    register_post_type('content', $args);
}

add_action('init', 'register_content_custom_post_type');

function register_content_fields(): void
{
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key'    => 'group_content_fields',
            'title'  => 'Campos del Contenido',
            'fields' => [
                [
                    'key'           => 'field_content_subtitle',
                    'label'         => 'Subtítulo',
                    'name'          => 'subtitle',
                    'type'          => 'text',
                    'instructions'  => 'Introduce el subtítulo del contenido.',
                    'required'      => 0,
                ],
                [
                    'key'           => 'field_content_description',
                    'label'         => 'Descripción',
                    'name'          => 'description',
                    'type'          => 'textarea',
                    'instructions'  => 'Escribe una descripción del contenido.',
                    'required'      => 1,
                ],
                [
                    'key'           => 'field_content_image',
                    'label'         => 'Imagen',
                    'name'          => 'image',
                    'type'          => 'image',
                    'instructions'  => 'Selecciona una imagen representativa del contenido.',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                    'library'       => 'all',
                    'required'      => 0,
                ],
                [
                    'key'           => 'field_content_orientation',
                    'label'         => 'Orientación del contenido',
                    'name'          => 'content_orientation',
                    'type'          => 'select',
                    'instructions'  => 'Selecciona la orientación del contenido.',
                    'required'      => 1,
                    'choices'       => [
                        'horizontal' => 'Contenido en horizontal',
                        'vertical'   => 'Contenido en vertical',
                    ],
                    'default_value' => 'horizontal',
                    'allow_null'    => 0,
                    'multiple'      => 0,
                ],
            ],
            'location' => [
                [
                    [
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'content',
                    ],
                ],
            ],
        ]);
    }
}

add_action('acf/init', 'register_content_fields');
