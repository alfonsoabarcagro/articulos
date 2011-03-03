<?php

// {{{

/**
 * articulos_recientes()
 *                                       
 * @return  array   $articulos  Arreglo de Ojetos
 */
 
function articulos_recientes()
{

    $args = array(
        'numberposts'     => 5,
        'orderby'         => 'post_date',
        'order'           => 'DESC',
        'post_type'       => 'articulos',
        'post_status'     => 'publish' 
    );
    $articulos = get_posts( $args );
    
    return $articulos;

} 

// }}}
// {{{
    
    
/**
 * articulos_x_temayperfil()    Devuelve un arreglo de objetos de los articulos pertenecientes al tema o perfil indicados
 *                              
 *              - Si no especifica un tema o perfil devuelve todos los articulos
 *              - Si especifica varios temas separados por coma devuelve los articulos correspondientes ordenados por fecha
 *            
 * 
 * @param   string  $catego     Cadena con el Slug de la Categoría (Tema o Perfil)
 * @return  array   $articulos  Arreglo de Objetos con los articulos encontrados
 */
function articulos_x_temayperfil( $catego = NULL )
{

    $args = array(
        'orderby'           => 'post_date',
        'order'             => 'DESC',
        'post_type'         => 'articulos',
        'post_status'       => 'publish',
        'category_name'     => $catego  
    );
    $articulos = get_posts( $args );
    
    return $articulos;

} 


// }}}
// {{{
    
    
/**
 * articulos_find()     Encuentra el o los posts idicados por el ID y devuelve un arreglo de objetos 
 *                      cada objeto hace referencia a los articulos solicitados por el ID 
 * 
 *      - si no lleva id, retorna todos
 *      - si lleva varios ID separados por coma, regresa los indicados
 *      - si lleva un id, solo ese articulo
 * 
 * @param   string  $id         IDs Separados por Coma en caso de ser varios
 * @return  array   $articulos  Arreglo de Ojetos
 */
function  articulos_find( $id = NULL )
{   
    $args = array(
        'orderby'       => 'post_date',
        'order'         => 'DESC',
        'post_type'     => 'articulos',
        'post_status'   => 'publish',
        'include'       => $id   
        
    );
    
    $articulos = get_posts( $args );      
    
    return $articulos;
}

// }}}
// {{{
    
function articulos_delete( $id )
{
    //Elimina todos los rastros del articulos
}

// }}}
// {{{
    
function articulos_update( $id, $data )
{
    // return ID   
}


function articulos_insert( $data )
{
    // return ID
}
// }}}
