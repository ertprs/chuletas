<?php 
/**
 *BORRAR BARRA ADMIN 
 */
   add_filter('show_admin_bar','__return_false' );

/**
 *REMOVER "AÑADIR NUEVA" PAGINA DEL DASHBOARD 
 */
  
  add_action('admin_init','capb_mod');
  add_action('admin_menu','men_mod');
  add_action('admin_head','hide_anbu');
  add_action('admin_menu','adm_redir');
  add_action('admin_init','perm_notice');

  function capb_mod() 
  {
      $editor_role = get_role('editor');
      $editor_role -> remove_cap('publish_pages');
      $author_role = get_role('author');
      $author_role -> remove_cap('publish pages');
  }

  function men_mod() 
  {
      global $submenu;
      unset($submenu['edit.php?post_type=page'][10]);
      $submenu['edit.php?post_type=page'][10][1] = 'publish_pages';
  }

  function hide_anbu() 
  {
      global $current_screen;
      if($current_screen->id == 'edit-page' && !current_user_can('publish_pages')) 
      {
        echo '<style>.add-new-h2{display: none;}</style>';
      }
   }

  function adm_redir() 
  {
    $result = stripos($_SERVER['REQUEST_URI'], 'post-new.php?post_type=page');
    if ($result!==false && !current_user_can('publish_pages')) 
    {
      wp_redirect(get_option('siteurl') . '/wp-admin/index.php?permissions_error=true');
    }
  }

  function dbo_noti() 
  {
      echo "<div id='permissions-warning' class='error fade'><p><strong>".__('You do not have permission to access that page.')."</strong></p></div>";
  }

  function perm_notice() 
  {

    if($_GET['permissions_error']) 
    {
      add_action('admin_notices', 'dbo_noti');
    }
  }

  function modify_menu()  
  {
    global $submenu;
    unset($submenu['edit.php?post_type=page'][10]);

    // for posts it should be: 
    // unset($submenu['edit.php'][10]);
  }
  // call the function to modify the menu when the admin menu is drawn
  add_action('admin_menu','modify_menu'); 
   
/**
 *REMOVER MENSAJE DE BIENVENIDA EN DASHBOARD WP 
 */
  
      remove_action('welcome_panel', 'wp_welcome_panel'); 


/**
 *REMOVER ADD NEW BUTTON PAGE 
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

/**
 *BORRAR BASURA DEL HEAD 
 */
  
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

/**
 *REMOVER WIDGETS DE WP DASHBOARD 
 */
  

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

/**
 * REMOVER ITEMS DEL MENU DE ADINISTRACION SEGÚN USUARIO 
 */
  
        
       function uno_a_remove_menus () 
        {

            global $menu;
            global $current_user;
            get_currentuserinfo();
            $user = esc_attr($current_user->user_login);

           
              if($user != 'blessmen')
              {
               $restricted = array(
                   
                      __('Dashboard'), 
                      __('Comments'), 
                      __('Tools'), 
                      __('Settings'), 
                      __('Pages'), 
                      __('Plugins'), 
                      __('Appearance'), 
                      __('Posts'), 
               );
               end ($menu);
               while (prev($menu))
               {
                   $value = explode(' ',$menu[key($menu)][0]);
                   if(in_array($value[0] != NULL?$value[0]:"" , $restricted))
                   {
                     unset($menu[key($menu)]);
                   }
               }
           ?>
         <style>
#toplevel_page_Wordfence,#menu-users,#toplevel_page_wpcf7,#toplevel_page_mango_options,#toplevel_page_WP-Optimize,#toplevel_page_revslider,#toplevel_page_vc-general,#toplevel_page_phoeniixx,#menu-posts-block,#menu-posts-member,#menu-posts-faq,#menu-posts-clients,#menu-posts-testimonial,#menu-posts-portfolio,#toplevel_page_duplicator,#toplevel_page_ced-vm-settings,#toplevel_page_wpseo_dashboard{
            display: none;
          }
      
          #menu-posts-certificados {
            display: list-item;
          }
        </style> 
       <?php } }
        add_action('admin_menu', 'uno_a_remove_menus');

/**
 *CAMBIAR LOGO EN LOGIN 
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

/**
 * PERSONALIZAR MENSAJE DE DATOS INCORRECTOS EN LOGIN FORM 
 */
  
   function uno_a_login_error_override()
   {
       return 'Datos de Acceso Incorrectos';
   }
   add_filter('login_errors', 'uno_a_login_error_override');
/**
 *CAMBIAR TITLE EN LOGO DE LOGIN PAGE 
 */
  
  function uno_a_login_logo_url_title() 
  {
    return 'Desarrollo Web UNO A - Soluciones Efectivas';
  }
  add_filter( 'login_headertitle', 'uno_a_login_logo_url_title' );

/**
 *BRRANDING EN PIE DE ESCITORIO WP 
 */
  
    function uno_a_custom_text_in_footer_admin()
    {
      $uno = '<a href="http://www.paginasweb1a.com">Diseño Web Uno A - Soluciones Efectivas </a>';
      return $uno;
    }
    add_action( 'admin_footer_text', 'uno_a_custom_text_in_footer_admin' );
/**
 *BRANDING EN BARRA ADMIN WP 
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