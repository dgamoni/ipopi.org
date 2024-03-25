 <?php
/**
 * terms_clauses
 *
 * filter the terms clauses
 *
 * @param $clauses array
 * @param $taxonomy string
 * @param $args array
 * @return array
**/
function terms_clauses($clauses, $taxonomy, $args)
{
    global $wpdb;

    if (isset($args['post_type']))
    {
        $clauses['join'] .= " INNER JOIN $wpdb->term_relationships AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN $wpdb->posts AS p ON p.ID = r.object_id";
        $clauses['where'] .= " AND p.post_type='{$args['post_type']}'"; 
    }
    return $clauses;
}
add_filter('terms_clauses', 'terms_clauses', 10, 3);