<?php

// {{{

/**
 * articulos_recientes()
 *                                       
 * @return  object $articulos
 */
 
function articulos_recientes()
{

    $args = array(
        'numberposts'     => 2,
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
 * articulos_find()     Encuentra el o los posts idicados por el ID y devuelve un arreglo de objetos 
 *                      cada objeto hace referencia a los articulos solicitados por el ID 
 * 
 *      - si no lleva id, retorna todos
 *      - si lleva varios ID separados por coma, regresa los indicados
 *      - si lleva un id, solo ese articulo
 * 
 * @param string $id  IDs Separados por Coma en caso de ser varios
 * @return array Devuelve un arreglo de Objetos
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
    // Retorna un mensaje de confrmación si elimino o no el articulo 
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
