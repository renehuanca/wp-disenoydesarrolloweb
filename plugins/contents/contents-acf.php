<?php

function register_content_fields()  
{
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key'    => 'group_content_fields',
            'title'  => 'Campos de los contenidos',
            'fields' => [
                [
                    'key'           => 'field_content_subtitle',
                    'label'         => 'Subtitulo',
                    'name'          => 'subtitle',
                    'type'          => 'text',
                    'instructions'  => 'Introduce el subtitulo del contenido.',
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
                    'instructions'  => 'Selecciona una imagen del contenido.',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                    'library'       => 'all',
                    'required'      => 0,
                ],
                [
                    'key'           => 'field_content_select',
                    'label'         => 'Orientación del contenido',
                    'name'          => 'content_type',
                    'type'          => 'select',
                    'instructions'  => 'Selecciona la orientación del contenido.',
                    'required'      => 1,
                    'choices'       => [
                        'horizontal' => 'Contenido en horizontal',
                        'vertical'  => 'Contenido en vertical',
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