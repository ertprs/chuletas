<?php 
/*
**************************************************************************
   EVITAR GUARDAR REVISIONES DE ENTRADAS Y PAGINAS
**************************************************************************
*/
   define('WP_POST_REVISIONS',false);//false se puede reemplaar por el numero de entradas a guardar

/*
**************************************************************************
   AUMENTAR LA MEMORIA DISPOIBLE PARA PHP
**************************************************************************
*/
   define('WP_MEMORY_LIMIT','512M');

?>