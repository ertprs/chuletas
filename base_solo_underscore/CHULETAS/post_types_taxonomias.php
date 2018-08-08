<?php
/*
 **************************************************************************
    REGISTRAR CUSTOM POST TYPE RECETAS
 **************************************************************************
 */

	if(! function_exists('gourmet_add_post_recetas'))
	{

		function gourmet_add_post_recetas()
		{
			$singular    = 'Receta';
			$plural      =  $singular.'s';
			$text_domain = 'gourmet_artist';

			$labels = [
				'name'                  => _x( $plural,  $text_domain ),
				'singular_name'         => _x( $singular,$text_domain ),
				'menu_name'             => __( $plural, $text_domain ),
				'name_admin_bar'        => __( $plural, $text_domain ),
				'parent_item_colon'     => __( $sigular.' Padre:', $text_domain ),
				'all_items'             => __( 'Todas las '.$plural, $text_domain ),
				'add_new_item'          => __( 'Agregar Nueva '.$singular, $text_domain ),
				'add_new'               => __( 'Agregar Nueva '.$singular, $text_domain ),
				'new_item'              => __( 'Nueva '.$singular, $text_domain ),
				'edit_item'             => __( 'Editar '.$singular, $text_domain ),
				'update_item'           => __( 'Actualizar '.$singular, $text_domain ),
				'view_item'             => __( 'Ver '.$singular, $text_domain ),
				'view_items'            => __( 'Ver '.$plural, $text_domain ),
				'search_items'          => __( 'Buscar '.$singular, $text_domain ),
				'not_found'             => __( 'No se encontraron '.$plural, $text_domain ),
				'not_found_in_trash'    => __( 'No hay '.$plural.' en la papelera', $text_domain ),
				'featured_image'        => __( 'Imagen Destacada', $text_domain ),
			];
			$args = [
				'label'                 => __( $plural, $text_domain ),
				'description'           => __( 'Recetas para cocina', $text_domain ),
				'labels'                => $labels,
				'supports'              => array('title','editor','thumbnail','excerpt','author','comments','revisions','custom-fields' ),
				'taxonomies'            => array( 'category', 'post_tag' ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_icon'             => 'dashicons-book-alt',
				'menu_position'         => 5,
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => true,
				'has_archive'           => true,		
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			];
			register_post_type( $plural, $args );
			
		}

	}
	add_action('init','gourmet_add_post_recetas' );
/*
**************************************************************************
   REGISTRAR TAXONOMIA HORARIO
**************************************************************************
*/
   if(! function_exists('add_taxonomia_horario'))
   {
   
   	function add_taxonomia_horario()
   	{
   		$singular    = 'Horario';
   		$plural      = 'Horarios';
   		$post_type   = 'recetas';
   		$minuscula   = 'horario';
   		$text_domain = 'gourmet_artist';
   
   		$labels = [
   			'name'                       => _x( $singular, $text_domain ),
   			'singular_name'              => _x( $singular,  $text_domain ),
   			'menu_name'                  => __( $singular, $text_domain ),
   			'all_items'                  => __( 'Todos Items', $text_domain ),
   			'parent_item'                => __( $singular.' Padre', $text_domain ),
   			'parent_item_colon'          => __( $singular.' Padre:', $text_domain ),
   			'new_item_name'              => __( 'Nuevo '.$singular, $text_domain ),
   			'add_new_item'               => __( 'Agregar Nuevo '.$singular, $text_domain ),
   			'edit_item'                  => __( 'Editar ' .$singular, $text_domain ),
   			'update_item'                => __( 'Actualizar '.$singular, $text_domain ),
   			'view_item'                  => __( 'Ver '.$singular, $text_domain ),
   			'separate_items_with_commas' => __( 'Separar Elementos Con Comas', $text_domain ),
   			'add_or_remove_items'        => __( 'Agregar o remover '.$plural, $text_domain ),
   			'choose_from_most_used'      => __( 'Escoja entre los más usados', $text_domain ),
   			'popular_items'              => __( $plural.' más vistos', $text_domain ),
   			'search_items'               => __( 'Buscar '.$plural, $text_domain ),
   			'not_found'                  => __( 'No se encontraron '.$plural, $text_domain ),
   			'no_terms'                   => __( 'No hay '.$plural, $text_domain ),
   			'items_list'                 => __( 'Listado de '.$plural, $text_domain ),
   			'items_list_navigation'      => __( 'Items list navigation', $text_domain ),
   		];
   		$args = [
   			'labels'                     => $labels,
   			'rewrite'                    => ['slug'  => 'tipo-receta'],
   			'hierarchical'               => true,
   			'public'                     => true,
   			'show_ui'                    => true,
   			'query_var'                  => true,
   			'show_admin_column'          => true,
   			'show_in_nav_menus'          => true,
   			'show_tagcloud'              => true,
   		];
   		register_taxonomy( $minuscula, array( $post_type ), $args );
   		
   	}
   
   }
   add_action('init','add_taxonomia_horario' );