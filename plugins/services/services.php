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
                    'instructions'  => 'Escribe una descripción del servicio.',
                    'required'      => 1,
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
function seed_services() 
{
    if (get_option('openfs_services_seeded-2')) {  // to seed just increment
        return;
    }

    $services = [
        [
            'title'       => 'DISEÑO Y DESARROLLO WEB',
            'subtitle'    => 'DISEÑO Y DESARROLLO WEB',
            'description' => 'Diseño de Páginas Webs increíbles. Desarrollo Web profesional enfocado a tus objetivos empresariales.',
        ],
        [
            'title'       => 'HOSPEDAJE WEB',
            'subtitle'    => 'HOSPEDAJE WEB',
            'description' => 'Alojamiento Web u Hospedaje Web tráfico ilimitado, copias de seguridad, bases de datos. Servidores VPS, Servidores dedicados, Servidores Cloud, etc.',
        ],
        [
            'title'       => 'APLICACIÓN WEB PROGRESIVA',
            'subtitle'    => 'APLICACIÓN WEB PROGRESIVA',
            'description' => 'Una experiencia similar a una aplicación nativa, servicio instalable en escritorio y dispositivos móviles. La última tendencia en Diseño de páginas Web en Bolivia, no depende de una plataforma.',
        ],
        [
            'title'       => 'CERTIFICADOS DE SEGURIDAD',
            'subtitle'    => 'CERTIFICADOS DE SEGURIDAD',
            'description' => 'Alta seguridad de encriptación y mayor confianza en el Diseño de tu Página Web con certificados SSL/TSL',
        ],
        [
            'title'       => 'DISEÑO DE LANDING PAGES',
            'subtitle'    => 'DISEÑO DE LANDING PAGES',
            'description' => 'Páginas de Aterrizaje o Landing Pages para tus campañas de marketing digital, ahorra dinero y tiempo en tus estrategias digitales con nuestro servicio de Diseño Web.',
        ],
        [
            'title'       => 'TIENDAS VIRTUALES',
            'subtitle'    => 'TIENDAS VIRTUALES',
            'description' => 'Lleva tu negocio tradicional al mundo del comercio electrónico con una tienda Virtual, Diseño Web de Catálogos Online con Pagos en Linea por medio de tarjetas de Débito/Crédito.',
        ],
        [
            'title'       => 'ATENCIÓN PERSONALIZADA Y SOPORTE TÉCNICO',
            'subtitle'    => 'ATENCIÓN PERSONALIZADA Y SOPORTE TÉCNICO',
            'description' => 'Ponemos todos los medios a tu alcance (Presencial, Chat en Linea, teléfono, WhatsApp, Email) para estar siempre en contacto.',
        ],

    ];

    foreach ($services as $data) {
        $post_id = wp_insert_post([
            'post_type'   => 'service',
            'post_title'  => $data['title'],
            'post_status' => 'publish',
        ]);

        if (!is_wp_error($post_id)) {
            update_field('subtitle', $data['subtitle'], $post_id);
            update_field('description', $data['description'], $post_id);
            update_field('color', $data['color'], $post_id);
            update_field('image', $data['image_id'], $post_id); 
        }
    }

    update_option('openfs_services_seeded-2', true);
}

add_action('init', 'seed_services');


