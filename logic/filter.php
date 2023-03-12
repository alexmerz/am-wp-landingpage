<?php

namespace AM_WP_Landingpage;

class Logic_Landingpage {
    public function __construct() {
        \add_filter( 'request', array( $this, 'request' ), 10, 1 );
    }

    public function request( $query_vars ) {  
        if ( \is_admin() ) {
            return $query_vars;
        }
        
        // Check if we have a category page
        if ( isset( $query_vars['category_name'] ) && '' !== $query_vars['category_name'] ) {

            $json_cat_map = \get_option( 'am-wp-landingpage-mapping-category', '{"meintest":{"target":"meintestpage"}}' );
            $cat_map = \json_decode( $json_cat_map, true );
            if( null === $cat_map ) {
                return $query_vars;
            }
            // ignore if we have a paged request
            if( isset( $query_vars['paged'] ) && is_numeric( $query_vars['paged'] ) ) {
                return $query_vars;
            }

            // finally check if we have a mapping for the category
            if( isset( $cat_map[ $query_vars['category_name'] ] ) ) {
                $query_vars = array(
                    'pagename' => $cat_map[ $query_vars['category_name'] ]['target']
                );
    
                return $query_vars;
            }

            return $query_vars;
        }

        return $query_vars;
    }
}