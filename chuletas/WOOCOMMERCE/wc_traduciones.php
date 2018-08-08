<?php 

/*
**************************************************************************
   TRADUCCIONES
**************************************************************************
*/
if(! function_exists('uno_a_traducir_eres_cliente'))
   {
   
     function uno_a_traducir_eres_cliente($translated)
     {
          
       $translated = str_ireplace('If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.',  'Si ya tienes un a cuenta con nosotros, ingresa tus datos en el siguiente formulario. Si eres cliento nuevo, puedes crear tu cuenta checando la casilla de verficación en la parte inferior de esta página ',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_eres_cliente');
  add_filter('ngettext',  'uno_a_traducir_eres_cliente');
  
/**********************************************************************/


if(! function_exists('uno_a_traducir_aprobacion_comentario'))
   {
   
     function uno_a_traducir_aprobacion_comentario($translated)
     {
          
       $translated = str_ireplace('Your comment is awaiting approval',  'Tu comentario esta pendiente de aprobación',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_aprobacion_comentario');
  add_filter('ngettext',  'uno_a_traducir_aprobacion_comentario');
  
/**********************************************************************/
if(! function_exists('uno_a_traducir_mensaje_crear_cuenta'))
   {
   
     function uno_a_traducir_mensaje_crear_cuenta($translated)
     {
          
       $translated = str_ireplace('Create an account by entering the information below. If you are a returning customer please login at the top of the page.',  'Crea una cuenta ingresando la información a continuación. Si ya eres cliente, por favor ingresa a tu cuenta a traves del menu de la página.',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_mensaje_crear_cuenta');
  add_filter('ngettext',  'uno_a_traducir_mensaje_crear_cuenta');
  
/**********************************************************************/
if(! function_exists('uno_a_traducir_mensaje_envio'))
   {
   
     function uno_a_traducir_mensaje_envio($translated)
     {
          
       $translated = str_ireplace('Shipping costs will be calculated once you have provided your address.',  'Los costos de envío serán calculados cuando ingreses tu dirección.',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_mensaje_envio');
  add_filter('ngettext',  'uno_a_traducir_mensaje_envio');
  
/**********************************************************************/
if(! function_exists('uno_a_traducir_cualquiera'))
   {
   
     function uno_a_traducir_cualquiera($translated)
     {
          
       $translated = str_ireplace('Cualquiera',  'Cualquier',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_cualquiera');
  add_filter('ngettext',  'uno_a_traducir_cualquiera');
  
/**********************************************************************/
if(! function_exists('uno_a_traducir_calculate_shipping'))
   {
   
     function uno_a_traducir_calculate_shipping($translated)
     {
          
       $translated = str_ireplace('Calculate shipping',  'Calcular el envío',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_calculate_shipping');
  add_filter('ngettext',  'uno_a_traducir_calculate_shipping');
  
/**********************************************************************/
if(! function_exists('uno_a_traducir_your_review'))
   {
   
     function uno_a_traducir_your_review($translated)
     {
          
       $translated = str_ireplace('Your review',  'Tu comentario',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_your_review');
  add_filter('ngettext',  'uno_a_traducir_your_review');

/**********************************************************************/

if(! function_exists('uno_a_traducir_texto_error'))
   {
   
     function uno_a_traducir_texto_error($translated)
     {
          
       $translated = str_ireplace('Hay algunos problemas con los artículos en tu carrito (mostrados arriba). Por favor vuelve al carrito y resuelve los inconvenientes antes de pasar a pagar.',  '<h3>Contactanos y obten tu descuento <a href="https://www.calzadosofia.com/contactanos">Aqui</a></h3>',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_texto_error');
  add_filter('ngettext',  'uno_a_traducir_texto_error');
/**********************************************************************/
if(! function_exists('uno_a_traducir_return_cart'))
   {
   
     function uno_a_traducir_return_cart($translated)
     {
          
       $translated = str_ireplace('Return to cart',  'Volver al carrito',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_return_cart');
  add_filter('ngettext',  'uno_a_traducir_return_cart');
/**********************************************************************/

if(! function_exists('uno_a_traducir_return_shop'))
   {
   
     function uno_a_traducir_return_shop($translated)
     {
          
       $translated = str_ireplace('Return to shop',  'Volver a la tienda',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_return_shop');
  add_filter('ngettext',  'uno_a_traducir_return_shop');

/**********************************************************************/


if(! function_exists('uno_a_traducir_sort_by'))
   {
   
     function uno_a_traducir_sort_by($translated)
     {
          
       $translated = str_ireplace('Sort by',  'Ordenar por',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_sort_by');
  add_filter('ngettext',  'uno_a_traducir_sort_by');

/**********************************************************************/


if(! function_exists('uno_a_traducir_clear_selection'))
   {
   
     function uno_a_traducir_clear_selection($translated)
     {
          
       $translated = str_ireplace('Clear Selection',  'Limpiar Selección',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_clear_selection');
  add_filter('ngettext',  'uno_a_traducir_clear_selection');

/**********************************************************************/


if(! function_exists('uno_a_traducir_product_description'))
   {
   
     function uno_a_traducir_product_description($translated)
     {
          
       $translated = str_ireplace('Product Description',  'Descripción del Producto',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_product_description');
  add_filter('ngettext',  'uno_a_traducir_product_description');

/**********************************************************************/


if(! function_exists('uno_a_traducir_recent_orders'))
   {
   
     function uno_a_traducir_recent_orders($translated)
     {
          
       $translated = str_ireplace('Recent Orders',  'Pedidos recientes',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_recent_orders');
  add_filter('ngettext',  'uno_a_traducir_recent_orders');

/**********************************************************************/

if(! function_exists('uno_a_traducir_payment_info'))
   {
   
     function uno_a_traducir_payment_info($translated)
     {
          
       $translated = str_ireplace('Payment information',  'Información de pago',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_payment_info');
  add_filter('ngettext',  'uno_a_traducir_payment_info');

/**********************************************************************/

   

if(! function_exists('uno_a_traducir_ir_al_pago'))
   {
   
     function uno_a_traducir_ir_al_pago($translated)
     {
          
       $translated = str_ireplace('Proceed to checkout',  'Ir al pago',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_ir_al_pago');
  add_filter('ngettext',  'uno_a_traducir_ir_al_pago');

/**********************************************************************/

  if(! function_exists('uno_a_traducir_update_cart'))
   {
   
     function uno_a_traducir_update_cart($translated)
     {
          
       $translated = str_ireplace('Update cart',  'Actualizar Carrito',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_update_cart');
  add_filter('ngettext',  'uno_a_traducir_update_cart');

/**********************************************************************/

  if(! function_exists('uno_a_traducir_apply_coupon'))
   {
   
     function uno_a_traducir_apply_coupon($translated)
     {
          
       $translated = str_ireplace('Apply coupon',  'Aplicar Cupón',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_apply_coupon');
  add_filter('ngettext',  'uno_a_traducir_apply_coupon');

/**********************************************************************/

  if(! function_exists('uno_a_traducir_billing_details'))
   {
   
     function uno_a_traducir_billing_details($translated)
     {
          
       $translated = str_ireplace('Billing Details',  'Detalles de facturación',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_billing_details');
  add_filter('ngettext',  'uno_a_traducir_billing_details');

/**********************************************************************/

if(! function_exists('uno_a_traducir_type_text'))
   {
   
     function uno_a_traducir_type_text($translated)
     {
          
       $translated = str_ireplace('Type text and hit enter',  'Escriba el nombre del producto',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_type_text');
  add_filter('ngettext',  'uno_a_traducir_type_text');

/**********************************************************************/
if(! function_exists('uno_a_traducir_shipping_address'))
   {
   
     function uno_a_traducir_shipping_address($translated)
     {
          
       $translated = str_ireplace('Shipping address',  'Dirección de Envio',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_shipping_address');
  add_filter('ngettext',  'uno_a_traducir_shipping_address');

/**********************************************************************/
if(! function_exists('uno_a_traducir_billing_address'))
   {
   
     function uno_a_traducir_billing_address($translated)
     {
          
       $translated = str_ireplace('Billing address',  'Dirección de facturación',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_billing_address');
  add_filter('ngettext',  'uno_a_traducir_billing_address');

/**********************************************************************/
if(! function_exists('uno_a_traducir_info_adicional'))
   {
   
     function uno_a_traducir_info_adicional($translated)
     {
          
       $translated = str_ireplace('Additional information',  'Información Adicional',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_info_adicional');
  add_filter('ngettext',  'uno_a_traducir_info_adicional');

/**********************************************************************/

if(! function_exists('uno_a_traducir_order_note'))
   {
   
     function uno_a_traducir_order_note($translated)
     {
          
       $translated = str_ireplace('Order notes',  'Notas del Pedido',  $translated);
       return $translated;
   
     }
   
   }
  add_filter('gettext',  'uno_a_traducir_order_note');
  add_filter('ngettext',  'uno_a_traducir_order_note');