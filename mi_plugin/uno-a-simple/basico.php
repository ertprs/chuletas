<?php 
if ( ! defined( 'WPINC' ) ) {
 die;
}
/*
**************************************************************************
   BORRAR BARRA ADMIN
**************************************************************************
*/
   add_filter('show_admin_bar','__return_false' );
 /*
 **************************************************************************
    BORRAR BASURA DEL HEAD
 **************************************************************************
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
/*
**************************************************************************
   GOOGLE ANALITYCS AL FOOTER
**************************************************************************
*/
  if(! function_exists('uno_a_add_google_analytics'))
  {
  
    function uno_a_add_google_analytics()
    {
       echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
       echo '<script type="text/javascript">';
       echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
       echo 'pageTracker._trackPageview();';
       echo '</script>';
    }
  
  }
  add_action('wp_footer','uno_a_add_google_analytics');
  
/*
**************************************************************************
   PROTEGER DE URL MALICIOSAS
**************************************************************************
*/
   global $user_ID;

    if($user_ID) 
    {
      if(!current_user_can('level_10')) 
      {
        if (strlen($_SERVER['REQUEST_URI']) > 255 ||
          strpos($_SERVER['REQUEST_URI'], "eval(") ||
          strpos($_SERVER['REQUEST_URI'], "CONCAT") ||
          strpos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
          strpos($_SERVER['REQUEST_URI'], "base64")) 
        {
          @header("HTTP/1.1 414 Request-URI Too Long");
          @header("Status: 414 Request-URI Too Long");
          @header("Connection: Close");
          @exit;
        }
      }
    }
/*
 **************************************************************************
    REMOVER ITEMS DEL MENU DE ADINISTRACION
 **************************************************************************
 */
     
    function uno_a_remove_menus () 
    {
        global $menu;

        $restricted = array(
               __('Dashboard'),
               __('Links'), 
               __('Pages'), 
               __('Tools'), 
               __('Users'), 
               __('Settings'), 
               __('Comments'), 
              // __('Plugins')
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
    }
    //add_action('admin_menu', 'uno_a_remove_menus');

/*
**************************************************************************
   REMOVER "AÑADIR NUEVA" PAGINA DEL DASHBOARD
**************************************************************************
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



 