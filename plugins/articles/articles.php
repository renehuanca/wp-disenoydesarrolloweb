<?php
/*
* Plugin Name:       Artículos OpenFS LLC
* Plugin URI:        https://github.com/Open-FS
* Description:       Gestión de artículos (blog) para OpenFS LLC
* Version:           1.0
* Requires at least: 5.2
* Requires PHP:      8.0
* Author:            OpenFS LLC
* Author URI:        https://digitalmarketingnewjersey.us/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Update URI:        https://github.com/Open-FS
* Text Domain:       openfs-articles
* Domain Path:       /languages
*/

function register_article_custom_post_type(): void
{
    $labels = [
        'name'               => 'Artículos',
        'singular_name'      => 'Artículo',
        'menu_name'          => 'Artículos',
        'name_admin_bar'     => 'Artículo',
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
        'menu_position'      => 12,
        'menu_icon'          => 'dashicons-media-document',
        'supports'           => ['title', 'editor'],
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'articulos'],
        'show_in_rest'       => false,
    ];

    register_post_type('article', $args);
}

add_action('init', 'register_article_custom_post_type');

function register_article_fields(): void
{
    if (function_exists('acf_add_local_field_group')) 
    {
        acf_add_local_field_group([
            'key'    => 'group_article_fields',
            'title'  => 'Campos del Artículo',
            'fields' => [
                [
                    'key'           => 'field_article_image',
                    'label'         => 'Imagen',
                    'name'          => 'image',
                    'type'          => 'image',
                    'instructions'  => 'Selecciona una imagen representativa del artículo.',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                    'library'       => 'all',
                    'required'      => 1,
                ],
                [
                    'key'           => 'field_article_description',
                    'label'         => 'Descripción',
                    'name'          => 'description',
                    'type'          => 'textarea',
                    'instructions'  => 'Escribe una descripción personalizada del artículo.',
                    'required'      => 1,
                ],
            ],
            'location' => [
                [
                    [
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'article', 
                    ],
                ],
            ],
        ]);
    }
}

add_action('acf/init', 'register_article_fields');
