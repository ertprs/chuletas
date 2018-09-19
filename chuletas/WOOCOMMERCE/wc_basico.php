<?php 
/*
**************************************************************************
   BORRAR SKU
**************************************************************************
*/
    add_action('woocommerce_before_single_product_summary', function() {
        add_filter('wc_product_sku_enabled', '__return_false');
    });

/*
**************************************************************************
   AGREGAR DESCRIPCION DEL PRODUCTO VARIABLE EN CHECKOUT 
**************************************************************************
*/
  if(! function_exists('uno_a_add_description_product_variable_checkout'))
  {
  
    function uno_a_add_description_product_variable_checkout($name, $cart_item, $cart_item_key)
    {
         $product_item = $cart_item['data'];

         if(!empty($product_item) && $product_item->is_type( 'variation' ) ) 
         {
             // WC 3+ compatibility
             $description = version_compare( WC_VERSION, '3.0', '<' ) ? $product_item->get_variation_description() : $product_item->get_description();
             $result = __( '', 'woocommerce' ) . $description;

             return $name . '<br>' . $result;
         } else
             return $name;
      
  
    }
  
  }
  add_filter('woocommerce_cart_item_name','uno_a_add_description_product_variable_checkout',20, 3);

   /*
 **************************************************************************
    EVITAR QUE EL CLIENTE PUBLIQUE PRODUCTOS
 **************************************************************************
 */

 function Uno_a_limitar_productos() 
 {
     global $post_type;
     global $wpdb;

     $limite = 50; 
     if( $post_type === 'product' ) 
     {
         $cantidad = $wpdb->get_var( "SELECT count(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'product'" );
         if( $cantidad >= $limite ) 
         { 
             wp_die( sprintf( __("Error, no puedes crear más de %s productos."), $limite) ); 
         }
     }
    return;
  }
 add_action( 'admin_head-post-new.php', 'Uno_a_limitar_productos' );
/*
**************************************************************************
   CAMBIAR A PESO COLOMBIANO
**************************************************************************
*/
   if(! function_exists('uno_a_cambiar_moneda'))
   {
   
       function uno_a_cambiar_moneda($simbolo,$moneda)
       {
          $simbolo = 'CO $';
          return $simbolo;
           
   
       }
   
   }
   add_filter('woocommerce_currency_symbol','uno_a_cambiar_moneda',10,2);
/*
**************************************************************************
   OCULTAR OTROS METODOS DE PAGO CUANDO EL ENVIO ES GRATIS
**************************************************************************
*/
   

function hide_shipping_when_free_is_available( $rates, $package ) {
  $new_rates = array();
  foreach ( $rates as $rate_id => $rate ) {
    // Only modify rates if free_shipping is present.
    if ( 'free_shipping' === $rate->method_id ) {
      $new_rates[ $rate_id ] = $rate;
      break;
    }
  }

  if ( ! empty( $new_rates ) ) {
    //Save local pickup if it's present.
    foreach ( $rates as $rate_id => $rate ) {
      if ('local_pickup' === $rate->method_id ) {
        $new_rates[ $rate_id ] = $rate;
        break;
      }
    }
    return $new_rates;
  }

  return $rates;
}

add_filter( 'woocommerce_package_rates', 'hide_shipping_when_free_is_available', 10, 2 );
/*
**************************************************************************
   SUBTITULOS EN PRODUCTOS
**************************************************************************
*/


add_action( 'woocommerce_product_options_general_product_data', 'my_custom_field' );

function my_custom_field() {

woocommerce_wp_text_input( 
    array( 
        'id'          => '_subtitle', 
        'label'       => __( 'Subtitulo', 'woocommerce' ), 
        'placeholder' => 'Subtítulo....',
        'description' => __( 'Escribe el subtítulo del producto.', 'woocommerce' ) 
    )
);

}

add_action( 'woocommerce_process_product_meta', 'my_custom_field_save' );

function my_custom_field_save( $post_id ){  

    $subtitle = $_POST['_subtitle'];
    if( !empty( $subtitle ) )
        update_post_meta( $post_id, '_subtitle', esc_attr( $subtitle ) );

}
 /*
**************************************************************************
   CAMBIAR TAB DESCRIPTION POR EL NOMBRE DEL PRODUCTO
**************************************************************************
*/
   if(! function_exists('uno_a_titulo_descripcion'))
   {
   
     function uno_a_titulo_descripcion($tabs)
     {
          
        global $post;
        if(isset($tabs['description']['title']))
        {
          $tabs['description']['title'] = $post->post_title;
        }
        return $tabs;
   
     }
   
   }
   add_filter('woocommerce_product_tabs','uno_a_titulo_descripcion',10,1);
  /*
  **************************************************************************
     LIMITAR LA CANTIDAD DE ARTICULOS POR PEDIDO
  **************************************************************************
  */
  function uno_a_limitar_productos_por_pedido() 
  {
    $maximo = 6;
    $total_products = 0;

    foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) 
    {
      $total_products += $values['quantity'];
    }
    if (  $total_products  > 6 ) 
    {?>
      <img src="<?php echo get_template_directory_uri().'/images/banner_tienda.jpg' ?>" alt="">
      <?php
        wc_add_notice( sprintf( __('<h3>Tenemos descuentos para compras mayores a %s unidades.</h3>', 'woocommerce'), $maximo ), 'error' );
    }
  }
  add_action( 'woocommerce_check_cart_items', 'uno_a_limitar_productos_por_pedido' );



  /*
  **************************************************************************
     BANNER TIENDA
  **************************************************************************
  */

  if(! function_exists('uno_a_baner_shop_page'))
  {

    function uno_a_baner_shop_page()
    { ?>
         <a  href="https://eleganciaytradicion.com/contactanos/" target="_blank">
       <img class="img-responsive" id="banner_shop" src="<?php echo get_template_directory_uri().'/images/baner_descuento.jpg' ?>" alt="">
       </a>

    <?php }

  }
  add_action('woocommerce_before_main_content','uno_a_baner_shop_page');



  /*
  **************************************************************************
     MOSTRAR SOLO ENVIO GRATIS Y RECOGIDA LOCAL
  **************************************************************************
  */
  if(! function_exists('uno_a_show_only_freeShipping_and_localPickUp'))
  {

  	function uno_a_show_only_freeShipping_and_localPickUp($available_methods)
  	{
         
  		if ( isset( $available_methods['advanced_free_shipping'] ) && isset( $available_methods['local_pickup'] ) ) :
  			$new_methods = array( 
  				'advanced_free_shipping' => $available_methods['advanced_free_shipping'],
  				'local_pickup' => $available_methods['local_pickup'],
  			);
  			return $new_methods;
  		endif;
  		
  		if ( isset( $available_methods['free_shipping'] ) && isset( $available_methods['local_pickup'] ) ) :
  			$new_methods = array( 
  				'advanced_free_shipping' => $available_methods['advanced_free_shipping'],
  				'local_pickup' => $available_methods['local_pickup'],
  			);
  			return $new_methods;
  		endif;
  		
  				 	
  		return $available_methods;

  	}

  }
  add_action('woocommerce_package_rates','uno_a_show_only_freeShipping_and_localPickUp');





  /*
  **************************************************************************
     AGREGAR NUEVA TAB EN SINGLE PRODUCT
  **************************************************************************
  */
    if(! function_exists('uno_a_add_new_tab_single_product'))
    {
    
      function uno_a_add_new_tab_single_product($tabs)
      {
           $tabs['envio']['title']    = 'Envios';
           $tabs['envio']['callback'] = 'envio_content';
           $tabs['envio']['priority'] = 50;
        
          return $tabs;
      }
    
    }
    add_filter('woocommerce_product_tabs','uno_a_add_new_tab_single_product');

    //FUNCION QUE CREA EL CONTENIDO DE LA NUEVA  TAB
      if(! function_exists('envio_content'))
      {
      
        function envio_content()
        {  ?>
             
            <div role="tabpanel" class="tab-pane panel entry-content active" id="tab-envios" style="display: block;">
                                
              <h5>Envios</h5>

            <p>Los productos comprados en www.eleganciaytradicion.com serán enviados a nivel Nacional con la empresa de transporte  <a href="http://www.enviacolvanes.com.co/" target="_blank"> ENVIA COLVANES</a>, siempre teniendo presente la seguridad, cobertura y calidad en el servicio.</p>
            <h6>Tiempos de entrega</h6>
            <p>Es para www.eleganciaytradicion.com muy importante que conozcas los tiempos de entrega con los cuales nos comprometemos a la hora de que realices una compra, por lo anterior, te informamos que el tiempo de entrega de los productos es:</p>
            <ul>
              <li>Aproximadamente <b>1 a 5  días hábiles</b> a nivel urbano, regional y nacional.</li>
              <li>Hasta <b>8 o más días hábiles</b> para otros destinos especiales. Lo anterior teniendo en cuenta que todos los despachos se harán desde la ciudad de Bogotá D.C.</li>
            </ul>
            <p>Conoce más acerca de nuestra politica de envíos <a href="https://eleganciaytradicion.com/politicas-de-envio/" target="_blank">AQUÍ</a> </p>
            <p>Para cambios o devoluciones te invitamos a leer nuestras políticas de <a href="https://eleganciaytradicion.com/cambios-y-devoluciones/" target="_blank"> Cambios o Devoluciones</a> </p>
            <p>Ver <a href="https://eleganciaytradicion.com/terminos-y-condiciones/" target="_blank">Términos y Condiciones</a></p>
            <div class="pagination"></div>
                            </div>
      
        <?php }
      
      }
  /*
  **************************************************************************
     AGREGAR CONTENIDO DESPUES DEL BOTON ADD TO CART
  **************************************************************************
  */  

    if(! function_exists('uno_a_add_payment_image'))
    {

      function uno_a_add_payment_image()
      { ?>
          <!-- <img class="img-responsive" id="pagoset" src="<?php echo get_template_directory_uri().'/images/pagos_et.png' ?>" alt=""><br> -->
           <br>
           <h4>Desplaza las miniaturas con el ratón.</h4>
     <?php }

    }
    add_action('woocommerce_after_add_to_cart_button','uno_a_add_payment_image');

    if(! function_exists('uno_a_add_content_before_variation'))
    {

      function uno_a_add_content_before_variation()
      {
          echo "<div class='mitalla'>";
          echo "¿Como se cuál es mi talla? Descubrelo <a href='https://eleganciaytradicion.com/preguntas-frecuentes/#divtalla' target='_blank'>AQUÍ</a>";  
          echo "</div>";  

      }

    }
    add_action('woocommerce_before_add_to_cart_button','uno_a_add_content_before_variation',10);
  /*
  **************************************************************************
     AGREGAR BANNER DEBAJO DE TABS EN SINGLE PRODUCT
  **************************************************************************
  */
    if(! function_exists('add_banner_single_product_page'))
    {

      function add_banner_single_product_page()
      { ?>
           
        <img class="img-responsive" src="<?php echo get_template_directory_uri().'/images/elegancia-tradicion-banner.jpg' ?>" alt="">

      <?php }

    }
    add_action('woocommerce_after_single_product','add_banner_single_product_page',50);
  /*
  **************************************************************************
     BORRAR CAMPOS DEL CHECKOUT DE WOOCOMMERCE 
  **************************************************************************
  */
  function uno_a_custom_override_checkout_fields( $fields ) 
      {
          unset($fields['billing']['billing_company']);
          unset($fields['billing']['billing_postcode']);
          unset($fields['shipping']['shipping_postcode']);
          unset($fields['billing']['billing_address_2']);
          unset( $tabs['additional_information'] );
          unset($fields['order']['order_comments']);
          unset($fields['billing']['billing_city']);
          
         
          
          return $fields;
      }
      add_filter( 'woocommerce_checkout_fields' , 'uno_a_custom_override_checkout_fields' );
  /*
  **************************************************************************
     GUARDAR LA INFO DE LOS NUEVOS CAMPOS CREADOS EN EL CHECKOUT
  **************************************************************************
  */
     
      
     function uno_a_actualizar_info_pedido_con_nuevo_campo( $order_id ) 
     {
         if ( ! empty( $_POST['nif'] ) ) 
         {
             update_post_meta( $order_id, 'NIF', sanitize_text_field( $_POST['nif'] ) );
         }
     }
     add_action( 'woocommerce_checkout_update_order_meta', 'uno_a_actualizar_info_pedido_con_nuevo_campo' );
  /*
  **************************************************************************
     CAMBIAR TEXTO EN ORDENAR PRODUCTOS EN WOOCOMMERCE
  **************************************************************************
  */
     if(! function_exists('uno_a_cambiar_texto_orderby'))
     {
     
       function uno_a_cambiar_texto_orderby($filtro)
       {
            
            $filtro['menu_order'] = __('Orden Inicial','woocommerce');
            $filtro['popularity'] = __('Popularidad','woocommerce');
            $filtro['rating']     = __('Calificación','woocommerce');
            $filtro['date']       = __('Nuevos productos ','woocommerce');
            $filtro['price']      = __('Precio más  bajo','woocommerce');
            $filtro['price-desc'] = __('Precio más alto','woocommerce');
            $filtro['title-asc']  = __('De la A-Z','woocommerce');
            $filtro['title-desc'] = __('De la Z-A','woocommerce');
            return $filtro;
          }
     
     }
    add_filter('woocommerce_catalog_orderby','uno_a_cambiar_texto_orderby',40);