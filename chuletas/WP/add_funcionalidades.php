<?php 
/**
 * REDIRIGIR A UNA PAGIA E ESPECIFICO CUANDO SE ENVIE UN MESAJE EN LA PAGINA DE CONTACTO 
 */
var $j = jQuery.noConflict();

$j(document).ready(function() {
	"use strict";
	
    document.addEventListener( 'wpcf7mailsent', function( event ) {
      location = 'https://bogotawebcompany.com/gracias/';
    }, false );

	

	});
