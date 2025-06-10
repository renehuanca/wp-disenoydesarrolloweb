<?php

function seed_contents()
{
    $n = 1; 
    if (get_option('openfs_contents_seeded_' . $n)) {
        return;
    }

    delete_all_posts_by_type('content');

    $contents = [
        [
            'title'              => 'Diseño Responsivo',
            'subtitle'           => 'Multiplique sus ventas con un sitio Responsivo.',
            'description'        => 'Somos pioneros en el diseño responsivo, presente su sitio en cualquier dispositivo móvil, sin importar si visita el sitio desde una tableta o desde un celular, el sitio se ajustará para mostrar la información correctamente, haciendo que la experiencia del usuario sea única.',
            'image_id'           => 101,
            'content_orientation' => 'horizontal',
        ],
        [
            'title'              => 'CREEMOS EN EL PODER DEL DISEÑO Y EL DESARROLLO PARA TRANSFORMAR EMPRESAS',
            'subtitle'           => 'No pongas en duda tu negocio dando una mala imagen.',
            'description'        => 'Cuando una persona llega a un sitio web, los primeros segundos son esenciales para que el cliente decida quedarse o no, por ello, es de suma importancia que el diseño refleje la calidad de los servicios que ofreces y perfección hasta en el más mínimo detalle, originando un “efecto contagioso” a todo aquel que te visite.',
            'image_id'           => 102,
            'content_orientation' => 'vertical',
        ],
    ];

    foreach ($contents as $content) {
        $post_id = wp_insert_post([
            'post_type'   => 'content',
            'post_title'  => $content['title'],
            'post_status' => 'publish',
        ]);
        if (!is_wp_error($post_id)) {
            update_field('subtitle', $content['subtitle'], $post_id);
            update_field('description', $content['description'], $post_id);
            update_field('image', $content['image_id'], $post_id);
            update_field('content_orientation', $content['content_orientation'], $post_id);
        }
    }

    update_option('openfs_contents_seeded_' . $n, true);
}

add_action('init', 'seed_contents');
