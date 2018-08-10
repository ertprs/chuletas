<?php 
/*
**************************************************************************
   QUITA LAS CADENAS DE PETICIONES DE RECURSOS ESTÁTICOS
**************************************************************************
*/

	if(! function_exists('_remove_script_version'))
	{
	
		function _remove_script_version($src)
		{
	       
			$parts = explode( '?', $src );
			return $parts[0];
	
		}
	
	}
	add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
	add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

function _remove_query_strings_1( $src ){	
	$rqs = explode( '?ver', $src );
        return $rqs[0];
}
		if ( is_admin() ) {
// Remove query strings from static resources disabled in admin
}

		else {
add_filter( 'script_loader_src', '_remove_query_strings_1', 15, 1 );
add_filter( 'style_loader_src', '_remove_query_strings_1', 15, 1 );
}

function _remove_query_strings_2( $src ){
	$rqs = explode( '&ver', $src );
        return $rqs[0];
}
		if ( is_admin() ) {
// Remove query strings from static resources disabled in admin
}

		else {
add_filter( 'script_loader_src', '_remove_query_strings_2', 15, 1 );
add_filter( 'style_loader_src', '_remove_query_strings_2', 15, 1 );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'remove_query_strings_link' );


