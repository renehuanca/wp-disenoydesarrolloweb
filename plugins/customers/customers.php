<?php
/*
* Plugin Name:       Clientes OpenFS LLC
* Plugin URI:        https://github.com/Open-FS
* Description:       Gestión de clientes para OpenFS LLC
* Version:           1.0
* Requires at least: 5.2
* Requires PHP:      8.0
* Author:            OpenFS LLC
* Author URI:        https://digitalmarketingnewjersey.us/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Update URI:        https://github.com/Open-FS
* Text Domain:       openfs-customers
* Domain Path:       /languages
*/

function register_customer_custom_post_type(): void
{
    $labels = [
        'name'               => 'Clientes',
        'singular_name'      => 'Cliente',
        'menu_name'          => 'Clientes',
        'name_admin_bar'     => 'Cliente',
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
        'labels'             => $labels,
        'public'             => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => ['title'],
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'cliente'],
        'show_in_rest'       => true,
    ];

    register_post_type('customer', $args);
}

add_action('init', 'register_customer_custom_post_type');

function register_customer_fields(): void
{
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key'    => 'group_customer_fields',
            'title'  => 'Campos del Cliente',
            'fields' => [
                [
                    'key'           => 'field_customer_image',
                    'label'         => 'Imagen',
                    'name'          => 'image',
                    'type'          => 'image',
                    'instructions'  => 'Selecciona una imagen-icono del cliente.',
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
                        'value'    => 'customer',
                    ],
                ],
            ],
        ]);
    }
}

add_action('acf/init', 'register_customer_fields');
