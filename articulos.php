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

 // {{{
 
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
        'capability_type'       => 'articulo',
        'capabilities'          => $caps,
        'taxonomies'            => array('category','post_tag',),
        'supports'              => array('title', 'editor', 'thumbnail','excerpt'),
        'menu_position'         => 3,
        'rewrite'               => true,
        'query_var'             => 'articulos',
        'can_export'            => true,
        'rewrite'               => true
    ); 
   
    register_post_type('articulos', $args); 
}
  
// }}}
// {{{


add_action('init', 'add_articulo_cap');     
 
/**
 * add_articulo_cap()
 * 
 * Función que agrega las capacidades a los respectivos roles de usuarios
 * 
 * @return void
 */
 
function add_articulo_cap() {
    
    $admin_art = new WP_Roles();      
    $admin_art->add_cap('author', 'edit_articulo');
    $admin_art->add_cap('author', 'edit_articulos');
    $admin_art->add_cap('author', 'edit_others_articulos');
    $admin_art->add_cap('author', 'publish_articulos');
    $admin_art->add_cap('author', 'read_articulo');
    $admin_art->add_cap('author', 'read_private_articulos');
    $admin_art->add_cap('author', 'delete_articulo'); 
    
    // Tambien se deben dar permisos al administrador a todo
    $admin_art->add_cap('administrator', 'edit_articulo');
    $admin_art->add_cap('administrator', 'edit_articulos');
    $admin_art->add_cap('administrator', 'edit_others_articulos');
    $admin_art->add_cap('administrator', 'publish_articulos');
    $admin_art->add_cap('administrator', 'read_articulo');
    $admin_art->add_cap('administrator', 'read_private_articulos');
    $admin_art->add_cap('administrator', 'delete_articulo');    
    
}  

// }}}
