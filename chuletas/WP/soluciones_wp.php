<?php 
/**
 *RECUPERAR CONTRASEÑA 
 */
 	$P$BowRVQ7v67auZFOkv9WRcrdZDTbFgL
    temporal
 /**
  * Funcion  para detectar errores en plugin . Crea un archivo log 
  */
   	if(!function_exists('bwc_activation_add_log'))
	{
		function bwc_activation_add_log()
		{
			file_put_contents( __DIR__ . '/my_loggg.txt', ob_get_contents() );
		}
		add_action('','bwc_activation_add_log' );
	}
	register_activation_hook( __FILE__, 'bwc_activation_add_log' );