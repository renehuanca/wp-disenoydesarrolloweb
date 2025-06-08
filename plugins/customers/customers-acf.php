<?php
function register_customer_fields()  
{
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key'    => 'group_customers_fields',
            'title'  => 'Campos del Cliente',
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

