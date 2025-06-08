<?php
function register_project_fields()  
{
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key'    => 'group_project_fields',
            'title'  => 'Campos del proyecto',
            'fields' => [
                [
                    'key'           => 'field_project_subtitle',
                    'label'         => 'Subtitulo',
                    'name'          => 'subtitle',
                    'type'          => 'text',
                    'instructions'  => 'Introduce el subtitulo del proyecto.',
                    'required'      => 0,
                    'default_value' => 'DISEÑO Y DESARROLLO WEB',
                ],
                [
                    'key'           => 'field_project_image',
                    'label'         => 'Imagen',
                    'name'          => 'image',
                    'type'          => 'image',
                    'instructions'  => 'Selecciona una imagen-icono del proyecto.',
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
                        'value'    => 'project',
                    ],
                ],
            ],
        ]);
    }
}

add_action('acf/init', 'register_project_fields');
