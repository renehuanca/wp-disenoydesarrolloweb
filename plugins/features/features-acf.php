<?php

function register_feature_fields()  
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
                    'instructions'  => 'Selecciona una imagen o icono de la caracteristica.',
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

