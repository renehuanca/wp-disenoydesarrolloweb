<?php
function register_service_fields()  
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
                    'label'         => 'Subtitulo',
                    'name'          => 'subtitle',
                    'type'          => 'text',
                    'instructions'  => 'Introduce el subtitulo del servicio.',
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
                    'post_type'     => ['feature', 'content'], // Solo el cpt características 
                    'filters'       => ['search', 'post_type'], // select para buscar se puede agregar taxonomy
                    'elements'      => '',
                    'min'           => '',
                    'max'           => '',
                    'return_format' => 'object', // WP_Post objects
                    'multiple'      => 1,
                    'instructions'  => 'Selecciones las caracteristicas que tiene el servicio (se mostrarán en cards)',
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
