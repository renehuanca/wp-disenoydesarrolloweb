<?php
/*
* Plugin Name:       Servicios OpenFS LLC
* Plugin URI:        https://github.com/Open-FS
* Description:       Gestión de servicios personalizados para OpenFS LLC
* Version:           1.0
* Requires at least: 5.2
* Requires PHP:      8.0
* Author:            OpenFS LLC
* Author URI:        https://digitalmarketingnewjersey.us/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Update URI:        https://github.com/Open-FS
* Text Domain:       openfs-services
* Domain Path:       /languages
*/

function register_service_custom_post_type(): void
{
    $labels = [
        'name'               => 'Servicios',
        'singular_name'      => 'Servicio',
        'menu_name'          => 'Servicios',
        'name_admin_bar'     => 'Servicio',
        'add_new'            => 'Agregar nuevo',
        'add_new_item'       => 'Agregar nuevo servicio',
        'new_item'           => 'Nuevo servicio',
        'edit_item'          => 'Editar servicio',
        'view_item'          => 'Ver servicio',
        'all_items'          => 'Todos los servicios',
        'search_items'       => 'Buscar servicios',
        'not_found'          => 'No se encontraron servicios.',
        'not_found_in_trash' => 'No hay servicios en la papelera.',
    ];

    $args = [
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 1,
        'menu_icon'     => 'dashicons-lightbulb',
        'supports'      => ['title', 'thumbnail'],
        'has_archive'   => true,
        'rewrite'       => ['slug' => 'servicios'],
        'show_in_rest'  => true,
    ];

    register_post_type('service', $args);
}

add_action('init', 'register_service_custom_post_type');

function register_service_fields(): void
{
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key'    => 'group_service_fields',
            'title'  => 'Campos del Servicio',
            'fields' => [
                [
                    'key'           => 'field_service_image',
                    'label'         => 'Imagen',
                    'name'          => 'image',
                    'type'          => 'image',
                    'instructions'  => 'Selecciona una imagen-icono del servicio.',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                    'library'       => 'all',
                    'required'      => 1,
                ],
                [
                    'key'           => 'field_service_subtitle',
                    'label'         => 'Subtítulo',
                    'name'          => 'subtitle',
                    'type'          => 'text',
                    'instructions'  => 'Introduce el subtítulo del servicio.',
                    'required'      => 0,
                ],
                [
                    'key'           => 'field_service_description',
                    'label'         => 'Descripción',
                    'name'          => 'description',
                    'type'          => 'textarea',
                    'instructions'  => 'Escribe una descripción del servicio. (máximo 200 caracteres).',
                    'required'      => 1,
                    'maxlength'     => 200,
                ],
                [
                    'key'           => 'field_service_color',
                    'label'         => 'Color',
                    'name'          => 'color',
                    'type'          => 'color_picker',
                    'instructions'  => 'Proporciona un color característico del servicio.',
                    'required'      => 0,
                ],
                [
                    'key'           => 'field_service_order',
                    'label'         => 'Orden',
                    'name'          => 'order',
                    'type'          => 'number',
                    'instructions'  => 'Indica el orden en que se debe mostrar este servicio (menor primero).',
                    'required'      => 0,
                    'default_value' => 0,
                ],
                [
                    'key'           => 'field_related_features',
                    'label'         => 'Características que tiene',
                    'name'          => 'related_features',
                    'type'          => 'relationship',
                    'post_type'     => ['feature', 'content'],
                    'filters'       => ['search', 'post_type'],
                    'return_format' => 'object',
                    'instructions'  => 'Selecciona las características que tiene el servicio (se mostrarán en cards)',
                    'required'      => 0,
                ],
            ],
            'location' => [
                [
                    [
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'service',
                    ],
                ],
            ],
        ]);
    }
}

add_action('acf/init', 'register_service_fields');
