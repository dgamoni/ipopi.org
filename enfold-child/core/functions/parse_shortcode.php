<?php 

function get_pattern( $text ) {
    $pattern = get_shortcode_regex();
    preg_match_all( "/$pattern/s", $text, $c );
    return $c;
}

function parse_atts( $content ) {
    $content = preg_match_all( '/([^ ]*)=(\'([^\']*)\'|\"([^\"]*)\"|([^ ]*))/', trim( $content ), $c );
    list( $dummy, $keys, $values ) = array_values( $c );
    $c = array();
    foreach ( $keys as $key => $value ) {
        $value = trim( $values[ $key ], "\"'" );
        $type = is_numeric( $value ) ? 'int' : 'string';
        $type = in_array( strtolower( $value ), array( 'true', 'false' ) ) ? 'bool' : $type;
        switch ( $type ) {
            case 'int': $value = (int) $value; break;
            case 'bool': $value = strtolower( $value ) == 'true'; break;
        }
        $c[ $keys[ $key ] ] = $value;
    }
    return $c;
}

function the_shortcodes( &$output, $text, $child = false ) {

    $patts = get_pattern( $text );
    $t = array_filter( get_pattern( $text ) );
    if ( ! empty( $t ) ) {
        list( $d, $d, $parents, $atts, $d, $contents ) = $patts;
        $out2 = array();
        $n = 0;
        foreach( $parents as $k=>$parent ) {
            ++$n;
            $name = $child ? 'child' . $n : $n;
            $t = array_filter( get_pattern( $contents[ $k ] ) );
            $t_s = the_shortcodes( $out2, $contents[ $k ], true );
            $output[ $name ] = array( 'name' => $parents[ $k ] );
            $output[ $name ]['atts'] = parse_atts( $atts[ $k ] );
            $output[ $name ]['original_content'] = $contents[ $k ];
            $output[ $name ]['content'] = ! empty( $t ) && ! empty( $t_s ) ? $t_s : $contents[ $k ];
        }
    }
    return array_values( $output );
}