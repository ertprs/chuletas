<?php 
/*
**************************************************************************
   PERSONALIZAR EL READ MORE [...] DE LOS POSTS
**************************************************************************
*/
   function uno_a_custom_read_more($more)
   {
    $rm = '...<br><br><a href="'.get_permalink().'" class="">Leer Más</a>';
     return $rm;
   }
   add_filter('excerpt_more', 'uno_a_custom_read_more');

/*
**************************************************************************
   CAMBIAR LOGO EN LOGIN
**************************************************************************
*/
   function uno_a_custom_logo_on_login() {
     
     $logo = get_bloginfo( 'template_directory' ) . '/images/logo1a.png';
     $bg    = get_bloginfo( 'template_directory' ) . '/images/bg_image.jpg';
     ?>
       <style type="text/css">
           body.login{
              background-color: #1D79E0;
              padding-top: 100px;
              padding-right: 20px;
              box-sizing: border-box;
            }
           body.login div#login {
              background-color: rgba(0,0,0,.6);
           }
           body.login div#login h1 {}
           body.login div#login h1 a {
              background-image:url(<?php echo $logo ?>) !important;
              width: 100%;
              height: 100px;
              background-size:50% ;
           }
           body.login div#login form#loginform {
              background-color: rgba(0,0,0,.65);
           }
           body.login div#login form#loginform p {
              color: red!important;
           }
           body.login div#login form#loginform p label {}
           body.login div#login form#loginform input {
              background-color: #fff;
           }
           body.login div#login form#loginform input#user_login {}
           body.login div#login form#loginform input#user_pass {}
           body.login div#login form#loginform p.forgetmenot label {
              color: #fff;
           }
           body.login div#login form#loginform p.forgetmenot input#rememberme {}
           body.login div#login form#loginform p.submit {}
           
           body.login div#login form#loginform p.submit input#wp-submit,
           body.login div#login form#lostpasswordform input#wp-submit {
              border: 0px;
              -webkit-box-shadow: none;
              box-shadow: none;
              border-radius: 0px;
              padding: 0 2rem;
              transition: all 0.8s ease;
              background-color: #1D79E0;
           }
           body.login div#login form#loginform p.submit input#wp-submit:hover,
           body.login div#login form#lostpasswordform input#wp-submit:hover {
              background-color: #4D4D56;
              text-indent: 10px;
           }
           body.login div#login p.message, body.login div#login #login_error {
                background-color: rgba(0,0,0,0.5);
                color:#fff;
                position: absolute;
                top: 0;
           }
           body.login div#login p#nav {}
           body.login div#login p#nav a {
              color: #fff;
           }
           body.login div#login p#backtoblog {}
           body.login div#login p#backtoblog a {
              color: #fff;
           }
           body.login div#login p#backtoblog a:hover, body.login div#login p#nav a:hover {
              color: #1D79E0;
           }
           /*FORMULARIO CONTRASEÑA PERDIDA*/

           body.login div#login form#lostpasswordform {
              background-color: rgba(0,0,0,.65);

           }

           /*MEDIA QUERIES*/
           @media only screen and (min-width: 768px) {
            
             body.login {
                background-image: url(<?php echo $bg ?>)!important;
             }

              body.login div#login h1 {
                display: inline-block;
                margin-top: 50px;
                width: 50%;
              }

              body.login div#login {
                width: 700px;
                margin: auto;
                position: absolute;
                top: 0;right: 0;left: 0;bottom: 0;
                height: 330px;

              }

              body.login div#login form#loginform {
                background-color: rgba(0,0,0,.6);
                float: right;
                margin: -10rem 2rem 0px 0px;
              }

              body.login div#login p#nav {
                margin: 0 auto;
                margin: 2rem 0px 0px 2rem;
              }
              body.login div#login p#backtoblog {
                margin: 0.5rem 0px 0px 2rem;
              }
           }
       </style>;
   <?php }
   add_action( 'login_head', 'uno_a_custom_logo_on_login' );


 /*
 **************************************************************************
    CAMBIAR URL DEL LOGIN WP
 **************************************************************************
 */
    function uno_a_login_logo_url() 
    {  
        $unoa = 'http://www.paginasweb1a.com';
        return $unoa;  
    }  
    add_filter( 'login_headerurl', 'uno_a_login_logo_url' );  
/*
**************************************************************************
   PERSONALIZAR MENSAJE DE DATOS INCORRECTOS EN LOGIN FORM
**************************************************************************
*/
   function uno_a_login_error_override()
   {
       return 'Datos de Acceso Incorrectos';
   }
   add_filter('login_errors', 'uno_a_login_error_override');
   	
/*
**************************************************************************
 CAMBIAR TITLE EN LOGO DE LOGIN PAGE
**************************************************************************
*/
	function uno_a_login_logo_url_title() 
	{
		return 'Desarrollo Web UNO A - Soluciones Efectivas';
	}
	add_filter( 'login_headertitle', 'uno_a_login_logo_url_title' );


 /*
 **************************************************************************
    BRRANDING EN PIE DE ESCITORIO WP
 **************************************************************************
 */
    function uno_a_custom_text_in_footer_admin()
    {
    	$uno = '<a href="http://www.paginasweb1a.com">Diseño Web Uno A - Soluciones Efectivas </a>';
      return $uno;
    }
    add_action( 'admin_footer_text', 'uno_a_custom_text_in_footer_admin' );

/*
**************************************************************************
   REMOVER ADD NEW BUTTON PAGE
**************************************************************************
*/
   
  if(! function_exists('uno_a_removing_add_new_button'))
  {

    function uno_a_removing_add_new_button()
    { ?>
         <style>
            #wpbody #wpbody-content a.page-title-action {
              display: none!important;
            }
          
         </style>
      

    <?php }

  }
  add_action('admin_head','uno_a_removing_add_new_button');

/*
**************************************************************************
   BRANDING EN BARRA ADMIN WP
**************************************************************************
*/
    if (!function_exists("uno_a_add_item_in_admin_bar")) 
    {
    
      function uno_a_add_item_in_admin_bar()
      {
    
        global $wp_admin_bar;

        $wp_admin_bar->add_menu([
          'id'    => 'uno_a',
          'title' => 'Diseño Web UNO A - Soluciones Efectivas',
          'href'  => 'http://www.paginasweb1a.com'
        ]);
    
      }
    }
     add_action('wp_before_admin_bar_render','uno_a_add_item_in_admin_bar' );

/*
**************************************************************************
   REMOVER WIDGETS DE WP DASHBOARD
**************************************************************************
*/

   // if (!function_exists("uno_a_removiendo_widget")) 
   // {
    
   //    function uno_a_removiendo_widget()
   //    {
     
   //      global $wp_meta_boxes;

   //      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
   //      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
   //      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
   //      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
   //      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
   //      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
   //      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
   //      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);    
   //      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
     
   //    }
   //  }
   //    add_action('wp_dashboard_setup','uno_a_removiendo_widget' );

  function disable_default_dashboard_widgets() 
  {
   
    remove_meta_box('dashboard_right_now', 'dashboard', 'core');
    remove_meta_box('dashboard_activity', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
    remove_meta_box('dashboard_plugins', 'dashboard', 'core');
   
    remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
    remove_meta_box('dashboard_primary', 'dashboard', 'core');
    remove_meta_box('dashboard_secondary', 'dashboard', 'core');
  }
  add_action('admin_menu', 'disable_default_dashboard_widgets');

/*
**************************************************************************
   REMOVER MENSAJE DE BIENVENIDA EN DASHBOARD WP
**************************************************************************
*/
      remove_action('welcome_panel', 'wp_welcome_panel');


   

?>