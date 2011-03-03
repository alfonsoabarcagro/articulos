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
    $id_array = explode(",", $id);
    $total_ids = count($id_array);
     
    if ( $id == NULL ){ // Si no se indico ningun ID devuelve todos los articulos   
        $args = array(
            'orderby'         => 'post_date',
            'order'           => 'DESC',
            'post_type'       => 'articulos',
            'post_status'     => 'publish' 
        );
        $articulos = get_posts( $args );  
          
    }else if( $total_ids == 1 ){ // Si indico solo un ID devuelve el articulo correspondiente
        $articulos[1] = get_post( $id_array[0] );
        
    }else{ // Si se indicaron varios IDs separados por coma devuelve los articulos correspondientes
        $i = 0;
        foreach ($id_array as $id_temp){
            $i++;
            $articulos[$i] = get_post( $id_temp );
        } 
    }
    
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
