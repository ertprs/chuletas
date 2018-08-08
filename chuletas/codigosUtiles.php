<?php
//Eliminar barra admin 
add_filter('show_admin_bar','__return_false()' );

//Agregar boton  en el single product page
add_action('woocommerce_after_add_to_cart_button','cmk_additional_button');
function cmk_additional_button() {
	echo '<a href="http://cigarreriatodoterreno.com/contactanos/" type="submit" class="button alt">Pedirlo a Domicilio</a>';
}

//Quitar tabs de comentaros y descripcion de debajo del producto
add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs)
{
   unset($tabs['reviews']);
   return $tabs;
}
//Remover items del menu de adinistracion
 
function remove_menus () {
global $menu;
    $restricted = array(__('Dashboard'),  __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
    end ($menu);
    while (prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);
        if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
    }
}
add_action('admin_menu', 'remove_menus');

//* Cambia el texto del botón Añadir al carrito en WooCommerce en un producto individual: WooCommerce 2.1o superior
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );
function woo_custom_cart_button_text() {
 
        return __( 'Mi Texto 1', 'woocommerce' );
 
}

//Quitar productos relacionados
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


//Borrar campos del checkout de woocommerce 
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_email']);
    unset($fields['billing']['billing_city']);
    unset( $tabs['additional_information'] );
    return $fields;
}
?>