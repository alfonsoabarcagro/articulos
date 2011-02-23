<?php

/*
Plugin Name: CPI: Articulos
Plugin URI: http://guerrero.gob.mx/
Description: Modulo Administrador de Articulos del Portal
Author: CPI Guerrero
Version: 1.0.0
Author URI: http://guerrero.gob.mx/
*/


// Creamos el tipo de datos llamado Articulos
add_action('init', 'cpi_articulos_init');

/**
 * cpi_articulo_init()
 * 
 * Función que registra el tipo de datos Articulos
 * 
 * @return void
 */
function cpi_articulos_init()
{
    $caps = array (
        'edit_articulo', 
        'edit_articulos', 
        'edit_others_articulos', 
        'publish_articulos', 
        'read_articulo', 
        'read_private_articulos', 
        'delete_articulo'
    );
    
    $labels = array(
        'name'                  => 'Artículos',
        'singular_name'         => 'Artículo',
        'add_new'               => 'Agregar Nuevo Artículo',
        'add_new_item'          => 'Agregar Nuevo Artículo',
        'edit_item'             => 'Editar Artículo',
        'new_item'              => 'Nuevo Artículo',
        'view_item'             => 'Ver Artículos',
        'search_items'          => 'Buscar Artículos',
        'not_found'             => 'No se Encontraron Artículos',
        'not_found_in_trash'    => 'No hay Artículos eliminados', 
        'parent_item_colon'     => ''
    );
    
    $args = array(
        'label'                 => 'Artículos',
        'labels'                => $labels,
        'description'           => 'Administra los Artículos del Portal',
        'public'                => true,
        //'publicly_queryable'    => true,
        //'exclude_from_search'   => false,
        //'show_ui'               => true,
        'capability_type'       => 'articulo',
        'capabilities'          => $caps,
        //'hierarchical'          => true,
        'supports'              => array('title','editor','author','thumbnail','excerpt','custom-fields','revisions'),
        //'register_meta_box_cb ' => '',
        //'taxonomies'            => '',
        'menu_position'         => 3,
        //'menu_icon'             => '',
        //'permalink_epmask'      => '',
        'rewrite'               => true,
        'query_var'             => 'articulos',
        'can_export'            => true,
        //'show_in_nav_menus '    => true,
        'rewrite'               => true
    ); 
   
    register_post_type('articulos', $args); 


/*
*   Registrando categorias para familias de Articulos
*/
    $labels_fam = array(
        'name'              => 'Familia',
        'singular_name'     => 'Familias',
        'search_items'      => 'Buscar Familias',
        'all_items'         => 'Todas las Familias',
        'parent_item'       => 'Familia Padre',
        'parent_item_colon' => 'Familia Padre: ',
        'edit_item'         => 'Editar Familia', 
        'update_item'       => 'Actualizar Familia',
        'add_new_item'      => 'Agregar Nueva Familia',
        'new_item_name'     => 'Nuevo Nombre de Familia',
        'menu_name'         => 'Familias'
    ); 	

    register_taxonomy('familia', array('articulos'), array(
        'hierarchical'  => true,
        'labels'        => $labels_fam,
        'show_ui'       => true,
        'query_var'     => true,
        'rewrite'       => true
    ));


/*
*   Registrando categorias para Temas y Perfiles
*/
    $labels_temper = array(
        'name'              => 'Temas y Perfiles',
        'singular_name'     => 'Temas y Perfiles',
        'search_items'      => 'Buscar Temas y Perfiles',
        'all_items'         => 'Todos los Temas',
        'parent_item'       => 'Tema o Perfil Padre',
        'parent_item_colon' => 'Tema o Perfil Padre: ',
        'edit_item'         => 'Editar Tema o Perfil', 
        'update_item'       => 'Actualizar Tema o Perfil',
        'add_new_item'      => 'Agregar Nuevo Tema o Perfil',
        'new_item_name'     => 'Nuevo Nombre de Tema o Perfil ',
        'menu_name'         => 'Temas y Perfiles'
    ); 	

    register_taxonomy('temasyperfiles', array('articulos'), array(
        'hierarchical'  => true,
        'labels'        => $labels_temper,
        'show_ui'       => true,
        'query_var'     => true,
        'rewrite'       => true
    ));
    
    
    
/*
*   Registrando Etiquetas para Temas Asociados
*/
    $labels_tema = array(
        'name'                      => 'Temas Asociados',
        'singular_name'             => 'Tema Asociado',
        'search_items'              => 'Buscar Temas Asociados',
        'popular_items'             => 'Temas Más Usados',
        'all_items'                 => 'Todos los Temas',
        'parent_item'               => null,
        'parent_item_colon'         => null,
        'edit_item'                 => 'Editar Tema Asociado', 
        'update_item'               => 'Actualizar Tema Asociado',
        'add_new_item'              => 'Agregar Tema Asociado',
        'new_item_name'             => 'Nuevo Tema Asociado',
        'separate_items_with_commas' => 'Agrege temas separados por comas',
        'add_or_remove_items'       => 'Agregar o Borrar Temas',
        'choose_from_most_used'     => 'Elija alguno de los Temas más usados',
        'menu_name'                 => 'Temas Asociados'
    ); 

    register_taxonomy('temas','articulos',array(
        'hierarchical'  => false,
        'labels'        => $labels_tema,
        'show_ui'       => true,
        'query_var'     => true,
        'rewrite'       => true
    ));
    
/*
*   Registrando etiquetas para Perfiles
*/
    $labels_perfil = array(
        'name'                      => 'Perfiles',
        'singular_name'             => 'Perfil',
        'search_items'              => 'Buscar Perfil',
        'popular_items'             => 'Perfiles Más Usados',
        'all_items'                 => 'Todos Los Perfiles',
        'parent_item'               => null,
        'parent_item_colon'         => null,
        'edit_item'                 => 'Editar Pefil', 
        'update_item'               => 'Actualizar Perfil',
        'add_new_item'              => 'Agregar Nuevo Perfil',
        'new_item_name'             => 'Nuevo Nombre de Perfil',
        'separate_items_with_commas' => 'Agrege perfiles separados por comas',
        'add_or_remove_items'       => 'Agregar o Remover Perfiles',
        'choose_from_most_used'     => 'Elija uno de los perfiles más usados',
        'menu_name'                 => 'Perfiles'
    ); 

    register_taxonomy('perfiles','articulos',array(
        'hierarchical'  => false,
        'labels'        => $labels_perfil,
        'show_ui'       => true,
        'query_var'     => true,
        'rewrite'       => true
    ));
    
    
    /**
     * Se da de alta los Temas y Perfiles por Defecto
     *         
     */
    $temasperfiles = array(                
        'indigenas'         => 'Indígenas',  
        'jovenes'           => 'Jóvenes',
        'migrantes'         => 'Migrantes',
        'campo'             => 'Campo',
        'cultura'           => 'Cultura',
        'deporte'           => 'Deporte',
        'educacion'         => 'Educación',
        'empleo'            => 'Empleo',
        'familia'           => 'Familia',
        'gobierno'          => 'Gobierno',
        'medioambiente'     => 'Medio Ambiente',
        'negocios'          => 'Negocios',
        'salud'             => 'Salud',
        'seguridad'         => 'Seguridad',
        'transporte'        => 'Transporte',
        'turismo'           => 'Turismo',
        'vivienda'          => 'Vivienda',
        'entretenimiento'   => 'Entretenimiento',
        'mujeres'           => 'Mujeres',
        'transparencia'     => 'Transparencia',   
        'discapacitados'    => 'Discapacitados',  
        'servidorpublico'   => 'Servidor Público'
    );
                
    foreach ($temasperfiles as $termino => $nombretema) {                    
        if ( !term_exists( $termino, 'temasyperfiles' )) {     
            wp_insert_term($nombretema, 'temasyperfiles', array(
                'description'=> $nombretema,
                'slug' => $termino,
                'parent'=> ''
            ));
        }
    }   
}
  
// }}}
// {{{


add_action('init', 'add_articulo_cap');     
    
function add_articulo_cap() {
    
    $admin_art = new WP_Roles();      
    $admin_art->add_cap('author', 'edit_articulo');
    $admin_art->add_cap('author', 'edit_articulos');
    $admin_art->add_cap('author', 'edit_others_articulos');
    $admin_art->add_cap('author', 'publish_articulos');
    $admin_art->add_cap('author', 'read_articulo');
    $admin_art->add_cap('author', 'read_private_articulos');
    $admin_art->add_cap('author', 'delete_articulo');    
    
}  


// }}}
