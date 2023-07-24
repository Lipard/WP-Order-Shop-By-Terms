<?php

/**
 * Añadimos las tablas necesarias para poder posteriormente realizar la ordenación por términos
 * @param $join
 * @return string
 */
 
function codigoverso_add_necessary_joins($join){

    global $wpdb;

    if (is_shop() && !is_admin()){
        $join .= " LEFT JOIN wp_term_relationships as wptr_2 ON (wp_posts.ID = wptr_2.object_id) 
        LEFT JOIN wp_terms ON (wptr_2.term_taxonomy_id = wp_terms.term_id)
        LEFT JOIN wp_term_taxonomy ON (wptr_2.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id) ";
    }

    return $join;

}


/**
* Añadimos una comprobación para recoger solo los productos que tengan el atributo "color"
* Esto no es necesario para la correcta ordenación, solo es para que no se muestren los productos que no tengan el atributo.
* @param $where
* @return string|string[]|null
*/

function codigoverso_add_necessary_where( $where ) {
    global $wpdb;

    if ( is_shop() && !is_admin() ) {
        $where .= " AND (wp_term_taxonomy.taxonomy = 'pa_color') ";

    }

    return $where;
}


/**
 * Añadimos la ordenación por términos
 * @param $orderby
 * @return string
 */

function codigoverso_add_custom_orderby_term($orderby){
    global $wpdb;

    if ( is_shop() && !is_admin() ) {
        $orderby = !empty($orderby)? " wp_terms.name ASC, ". $orderby : " wp_terms.name ASC ";
    }

    return $orderby;
}

/**
 * Añadimos los filtros necesarios para que se apliquen las funciones anteriores
 */
 
add_filter( 'posts_join','codigoverso_add_necessary_joins');
add_filter( 'posts_where', 'codigoverso_add_necessary_where' );
add_filter( 'posts_orderby','codigoverso_add_custom_orderby_term');