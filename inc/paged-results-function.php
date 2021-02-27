<?php 
function myThemePostsNow ( $query = null ) {
    global $wp_query;

    if ( isset($query) && !($query instanceof WP_Query) ) {
        return; // Cancel if a query has been set and is not a WP_Query instance
    }
    elseif ( !isset($query) ) {
        $query = $wp_query; // If $query is not set, use global $wp_query data
    }

    if ( ! $query->have_posts() ) {
        return; // Cancel if $query don't have posts
    }

    // If we made it here it means we have a WP_Query with posts

    $paged = !empty($query->query_vars['paged']) ? $query->query_vars['paged'] : 1;
    $prev_posts = ( $paged - 1 ) * $query->query_vars['posts_per_page'];
    $from = 1 + $prev_posts;
    $to = count( $query->posts ) + $prev_posts;
    $of = $query->found_posts;

    // Return the information
    return sprintf( '%s-%s z %s plików do pobrania', $from, $to, $of );
}